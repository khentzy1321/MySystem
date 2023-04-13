@extends('layouts.admin')

@section('content')
<style>
    #video-container {
        position: relative;
    }

    #overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .quagga-canvas {
        width: 100%;
        height: 100%;
    }
</style>
<div>
    <div id="video-container">
        <div id="overlay">
            <canvas class="quagga-canvas"></canvas>
        </div>
    </div>
    <button id="start-scanner">Start Scanner</button>
    <div id="barcode-container"></div>
</div>



<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var scannerStarted = false;
    var video = document.createElement('video');

    document.getElementById('start-scanner').addEventListener('click', function() {
        if (!scannerStarted) {
            startScanner();
            scannerStarted = true;
        } else {
            stopScanner();
            scannerStarted = false;
        }
    });

    function startScanner() {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                video.srcObject = stream;
                video.play();
                document.getElementById('video-container').appendChild(video);
            })
            .catch(function(error) {
                console.log(error);
            });

            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: video
                },
                decoder: {
                    readers: ["ean_reader", "upc_reader", "code_128_reader"]
                },
                // Set the dimensions of the canvas overlay
                locate: true,
                numOfWorkers: 4,
                locator: {
                    patchSize: "medium",
                    halfSample: true
                },
                debug: {
                    drawBoundingBox: true,
                    showFrequency: false,
                    drawScanline: true,
                    showPattern: false
                },
                canvas: {
                    // Set the dimensions of the canvas overlay
                    width: 640,
                    height: 480
                }
            }, function(err) {
                if (err) {
                    console.log(err);
                    return;
                }
                console.log("Quagga initialization succeeded");
                Quagga.start();

                // Add the onProcessed callback function
                Quagga.onProcessed(function(result) {
                    var drawingCtx = Quagga.canvas.ctx.overlay,
                        drawingCanvas = Quagga.canvas.dom.overlay;

                    if (result) {
                        if (result.boxes) {
                            drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                            result.boxes.filter(function (box) {
                                return box !== result.box;
                            }).forEach(function (box) {
                                Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
                            });
                        }

                        if (result.box) {
                            Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
                        }

                        if (result.codeResult && result.codeResult.code) {
                            console.log("Barcode detected and processed : [" + result.codeResult.code + "]", result);
                        }
                    }
                });
            });

            Quagga.onDetected(function(result) {
                var barcode = result.codeResult.code;
                document.getElementById('barcode-container').innerHTML = barcode;

                axios.get('https://api.openproductdata.com/products?barcode=' + barcode)
                    .then(function(response) {
                        var products = response.data.products;
                        if (products.length > 0) {
                            var product = products[0];
                            document.getElementById('product-container').innerHTML = product.name;
                        } else {
                            document.getElementById('product-container').innerHTML = 'Product not found';
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                        document.getElementById('product-container').innerHTML = 'Error retrieving product information';
                    });
            });
    }

    function stopScanner() {
        video.srcObject.getTracks().forEach(function(track) {
            track.stop();
        });
        video.parentNode.removeChild(video);
    }
</script>

@endsection
