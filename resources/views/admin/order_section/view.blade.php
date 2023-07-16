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
                            <h2>Order Info</h2><br>
                            <h3>User Information</h3><br>
                            <h4 class="card-title">First Name : {{ $order_view->first_name }}</h4>
                            <hr>
                            <h4 class="card-title">First Name : {{ $order_view->last_name }}</h4>
                            <hr>
                            <h4 class="card-title">Phone Number : {{ $order_view->phone }}</h4>
                            <hr>
                            <h4 class="card-title">E-mail : {{ $order_view->email }}</h4>
                            <hr>
                            <h4 class="card-title">City : {{ $order_view->city }}</h4>
                            <hr>
                            <h4 class="card-title">Zone : {{ $order_view->zone }}</h4>
                            <hr>
                            <h4 class="card-title">Address : {{ $order_view->address }}</h4>
                            <hr>
                            <h4 class="card-title">Comment : {{ $order_view->comment }}</h4>
                            <hr>
                            <h3>Add to cart Info</h3><br>
                            
                            <h4 class="card-title">Product Id : {{ $order_view->user_id }}</h4>
                            <hr>
                            <h4 class="card-title">Product Name : {{ $order_view->product_name }}</h4>
                            <hr>
                            <h4 class="card-title">Product Quantity : {{ $order_view->product_quantity }}</h4>
                            <hr>
                            <h4 class="card-title">Payment Methord : {{ $order_view->payment_method }}</h4>
                            <hr>
                            <h4 class="card-title">Delivery Methord : {{ $order_view->delivery_method }}</h4>
                            <hr>
                            <h4 class="card-title">Product Price : {{ $order_view->product_price }}</h4>
                            <hr>
                            <h4 class="card-title">Total Price : {{ $order_view->total }}</h4>
                            <hr>
                            <h4 class="card-title">Discription : </h4>
                            <hr>
                            <a href="{{ route('order.index',$order_view->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
