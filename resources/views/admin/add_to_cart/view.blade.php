@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"><br><br>
                        {{-- <center>
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($blog->blog_image)) ? 
                                                                     url('image/blog/'.$blog->blog_image):url('image/No_Image_Available.jpg') }}" alt="Card image cap">
                        </center> --}}
                        <div class="card-body">
                            <h2>Cart Info</h2><br>
                            <h3>User Information</h3><br>
                            <h4 class="card-title">User Name : {{ $view->user_name }}</h4>
                            <hr>
                            <h4 class="card-title">User ID : {{ $view->user_id }}</h4>
                            <hr>
                            <h4 class="card-title">User Email : {{ $view->user_email }}</h4>
                            <hr>
                            <h4 class="card-title">User Phone : {{ $view->user_phone }}</h4>
                            <hr>
                            <h4 class="card-title">User Address : {{ $view->user_address }}</h4>
                            <hr>
                            <h3>Add to cart Info</h3><br>
                            <h4 class="card-title"><img src="{{ asset($view->image) }}" style="width: 140px; height:110px"> </h4>
                            <hr>
                            <h4 class="card-title">Product Name : {{ $view->product_title }}</h4>
                            <hr>
                            <h4 class="card-title">Product ID : {{ $view->product_id }}</h4>
                            <hr>
                            <h4 class="card-title">Product Quantity : {{ $view->quantity }}</h4>
                            <hr>
                            <h4 class="card-title">Product Price : {{ $view->price }}</h4>
                            <hr>
                            <h4 class="card-title">Discription : </h4>
                            <hr>
                            <a href="{{ route('cart.index',$view->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
