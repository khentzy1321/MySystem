<?php

namespace App\Http\Controllers;

// use App\Models\Product;
use Illuminate\Http\Request;

class BarcodeScannerController extends Controller
{
    public function handleBarcode(Request $request)
    {
        // $product = Product::where('barcode', $barcode)->first();


        // if (!$product) {
        //     return response()->json(['error' => 'Product not found'], 404);
        // }

        return view('barcode.index');
    }
}
