
<div class="container-fluid">
    <div class="content">
        <div class="card shadow p-3 py-4">
            <div class="text-center mt-3">
                <span class="badge badge-success">Active</span>
                    <h5 class="mt-2 mb-0">About Me</h5>
                    <span>Member</span>
                </div>
        </div>
        <div class="card shadow p-3 py-4">
            <div class="card-header d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#addbio">
                      <i class="fas fa-plus"></i>
               </button></div>
            <div class="card-body">
            <div class="text-center mt-3">
                @foreach($bios as $bio)
                <p>{{ $bio->prof }}</p>
            </div>
            <li>{{ $bio->addbio }}</li>
            @endforeach

            <hr>
            <div class="text-center">
            <code>you can also visit me on</code>
            </div>

            <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    <div class="buttons d-flex justify-content-center">
                        <button class="btn btn-outline-primary px-4 mx-2"><i class="fas fa-thumbs-up"></i></button>
                        <button class="btn btn-outline-primary px-4"><i class="fas fa-phone"></i></button>
                    </div>
            </div>

        @include('profile.inc.create')
        </div>
    </div>
</div>
<style>
  body{
    background:#eee;
}

.card{
    border:none;

    position:relative;
    overflow:hidden;
    border-radius:8px;
    cursor:pointer;
}

.card:before{

    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#E1BEE7;
    transform:scaleY(1);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:after{

    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#8E24AA;
    transform:scaleY(0);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:hover::after{
    transform:scaleY(1);
}


.fonts{
    font-size:18px;
    color: black;
}

.social-list{
    display:flex;
    list-style:none;
    justify-content:center;
    padding:0;
}

.social-list li{
    padding:10px;
    color:black;
    font-size:25px;
}


.buttons button:nth-child(1){
       border:1px solid #8E24AA !important;
       color:#8E24AA;
       height:40px;
}

.buttons button:nth-child(1):hover{
       border:1px solid #8E24AA !important;
       color:#fff;
       height:40px;
       background-color:#8E24AA;
}

.buttons button:nth-child(2){
       border:1px solid #8E24AA !important;
       background-color:#8E24AA;
       color:#fff;
       height:40px;
}
.px-4{
  color: black;
}

</style>
