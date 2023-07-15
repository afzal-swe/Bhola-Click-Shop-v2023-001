<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('asset/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('asset/css/responsive.css') }}" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    
      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('frontend.topbar.header');
         <!-- end header section -->
        

<main>

<div class="container custom-container">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add to cart</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Model</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $total_price=0; ?>
                        @foreach ($cart_view as $key=>$row)
                       
                        <tr>
                           
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ asset($row->image) }}" style="width: 40px; height:40px"></td>
                           <td>{{ $row->product_title }}</td>
                           <td>{{ $row->product_id }}</td>
                           <td>{{ $row->quantity }}</td>
                           <td>{{ $row->price }}</td>
                           <td>{{ $row->price }}</td>
                           <td>
                            
                            
                            <a href="{{route('order.cancel',$row->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data">Cancel</a>
                            
                        </td>
                        </tr>
                       <?php $total_price=$total_price + $row->price ?>
                        @endforeach
                        <tr>
                               
                            <td colspan="8" style="text-align: right;">Sub-Total : {{$total_price}}৳</td>
                            
                        </tr>
                        <tr>
                            
                            <td colspan="8" style="text-align: right;">Total : {{$total_price}}৳</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div><br>
      
            <a href="{{ route('confirm.order') }}" class="btn btn-info" >Confirm Order</a>
           
        
    </div> <!-- end col -->
</div><br>




</main>




      <!-- end client section -->
      <!-- footer start -->
      @include('frontend.footer.footer');
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Bhola99</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Md.Afzal Hossen</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('asset/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('asset/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('asset/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('asset/js/custom.js') }}"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;
           
               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;
           
               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;
           
               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
           </script>
            
   </body>
</html>


