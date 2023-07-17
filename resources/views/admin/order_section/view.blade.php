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
                            <!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                                    <title>Invoice #{{ $order_view->product_id }}</title>

                                    <style>
                                        html,
                                        body {
                                            margin: 10px;
                                            padding: 10px;
                                            font-family: sans-serif;
                                        }
                                        h1,h2,h3,h4,h5,h6,p,span,label {
                                            font-family: sans-serif;
                                        }
                                        table {
                                            width: 100%;
                                            border-collapse: collapse;
                                            margin-bottom: 0px !important;
                                        }
                                        table thead th {
                                            height: 28px;
                                            text-align: left;
                                            font-size: 16px;
                                            font-family: sans-serif;
                                        }
                                        table, th, td {
                                            border: 1px solid #ddd;
                                            padding: 8px;
                                            font-size: 14px;
                                        }

                                        .heading {
                                            font-size: 24px;
                                            margin-top: 12px;
                                            margin-bottom: 12px;
                                            font-family: sans-serif;
                                        }
                                        .small-heading {
                                            font-size: 18px;
                                            font-family: sans-serif;
                                        }
                                        .total-heading {
                                            font-size: 18px;
                                            font-weight: 700;
                                            font-family: sans-serif;
                                        }
                                        .order-details tbody tr td:nth-child(1) {
                                            width: 20%;
                                        }
                                        .order-details tbody tr td:nth-child(3) {
                                            width: 20%;
                                        }

                                        .text-start {
                                            text-align: left;
                                        }
                                        .text-end {
                                            text-align: right;
                                        }
                                        .text-center {
                                            text-align: center;
                                        }
                                        .company-data span {
                                            margin-bottom: 4px;
                                            display: inline-block;
                                            font-family: sans-serif;
                                            font-size: 14px;
                                            font-weight: 400;
                                        }
                                        .no-border {
                                            border: 1px solid #fff !important;
                                        }
                                        .bg-blue {
                                            background-color: #414ab1;
                                            color: #fff;
                                        }
                                    </style>
                                </head>
                                <body>

                                    <table class="order-details">
                                        <thead>
                                            <tr>
                                                <th width="50%" colspan="2">
                                                    <h2 class="text-start">Bhola99</h2>
                                                </th>
                                                <th width="50%" colspan="2" class=" company-data">
                                                    <span>Invoice Id: #{{ $order_view->product_id }}</span> <br>
                                                    <span>Phone Number: {{ $order_view->phone }}</span> <br>
                                                    <span>Date: 24 / 09 / 2022</span> <br>
                                                    <span>Zip code : 560077</span> <br>
                                                    <span>{{ $order_view->address }}</span> <br>
                                                </th>
                                            </tr>
                                            <tr class="bg-blue">
                                                <th width="50%" colspan="2">Order Details</th>
                                                <th width="50%" colspan="2">User Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Order Id: </td>
                                                <td>#{{$order_view->product_id}}</td>
                                                
                                                <td>Full Name: {{$order_view->first_name}} {{$order_view->last_name}}</td>
                                            </tr>

                                            <tr>
                                                <td>Tracking Id/No.: </td>
                                                <td>Null</td>
                                                
                                                <td>Email : {{ $order_view->email }}</td>
                                            </tr>

                                            <tr>
                                                <td>Ordered Date: </td>
                                                <td>{{ $order_view->created_at }}</td>
                                                
                                                <td>Phone: {{ $order_view->phone }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Payment Method: </td>
                                                <td>{{ $order_view->payment_method }}</td>

                                                <td>City: {{ $order_view->city }}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Delivery Method: </td>
                                                <td>{{ $order_view->delivery_method }}</td>

                                                <td>Zone: {{ $order_view->zone }}</td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Payment Status: </td>
                                                <td>{{ $order_view->payment_status }}</td>

                                                <td>Pin code:</td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Delivery Status: </td>
                                                <td>{{ $order_view->delivery_status }}</td>

                                                <td>Address: {{ $order_view->address }}</td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="no-border text-start heading" colspan="5">
                                                    Order Items
                                                </th>
                                            </tr>
                                            <tr class="bg-blue">
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="10%">{{ $order_view->product_id }}</td>
                                                <td>{{ $order_view->product_name }}</td>
                                                <td width="10%">${{ $order_view->product_price }}</td>
                                                <td width="10%">{{ $order_view->product_quantity }}</td>
                                                <td width="15%" class="fw-bold">${{ $order_view->total }}</td>
                                            </tr>
                                           
                                            <tr>
                                                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                                                <td colspan="1" class="total-heading">${{ $order_view->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <p class="text-center">
                                        Thank your for shopping with Bhola99
                                    </p>

                                </body>
                                </html>
                            <a href="{{ route('order.index',$order_view->id) }}" class="btn btn-primary ">Back to home</a>
                            <a href="{{ route('send.email',$order_view->id) }}" class="btn btn-info ">Send Email</a>
                            <a href="{{ route('invoice.view',$order_view->id) }}" class="btn btn-secondary ">invoice View</a>
                            <a href="{{ route('invoice.prient',$order_view->id) }}" class="btn btn-secondary ">invoice PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
