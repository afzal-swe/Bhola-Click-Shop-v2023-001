@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="main-content col-lg-10">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-10">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Order</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Product</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Product Price</th>
                                        <th>Total Price</th>
                                        <th>Payment Methord</th>
                                        <th>Delivery Methord</th>
                                        <th>Payment Status</th>
                                        <th>Delivery Status</th>
                                        <th>Deliverd</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($order_details as $key=>$row)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        
                                        <td>{{ $row->product_name  }}</td>
                                        <td>{{ $row->product_quantity }}</td>
                                        <td>{{ $row->product_price }}</td>
                                        <td>{{ $row->total }}</td>
                                        <td>{{ $row->payment_method }}</td>
                                        <td>{{ $row->delivery_method }}</td>
                                        <td>{{ $row->payment_status }}</td>
                                        <td>{{ $row->delivery_status }}</td>
                                        <td>
                                            @if ($row->delivery_status=='Painding')
                                            <a href="{{ route('delivered.order',$row->id) }}" onclick="return confirm('Are you sure this Product is delivered !!')" class="btn btn-primary">Delivered</a>
                                            @else
                                            <a href="{{ route('delivered.order',$row->id) }}" onclick="return confirm('Are you sure this Product is cancel delivered !!')" class="btn btn-danger">Cancel</a>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('order.view',$row->id)}}" class="btn btn-success sm" title="View Data"><i class="ri-eye-off-fill"></i></a>
                                            <a href="{{ route('order.destroy',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
</div>
@endsection
