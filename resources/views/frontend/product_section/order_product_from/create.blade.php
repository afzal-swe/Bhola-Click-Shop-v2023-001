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
      <link href="{{ asset('asset/css/from.css') }}" rel="stylesheet" />
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



<section class="checkout bg-bt-gray p-tb-15">
    <div class="container">
        <div class="alert alert-info m-b-30"><span style="font-style: italic;">ইএমআই এর ক্ষেত্রে অবশ্যই ক্রেতার নির্দিষ্ট ব্যাংক এর ক্রেডিট কার্ড থাকতে হবে।</span></div>        <h1 class="page-title">Checkout</h1>
        <form class="checkout-content" id="checkout-form" action="{{ route('confirm_order.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="page-section ws-box section-reward">
                        <div class="info">
                            <h2>Star Point</h2>
                            <p class="blurb">Earn Star Points and use on your next order</p>
                        </div>
                        <div class="sticker reward">
                            <p class="material-icons">stars</p>
                            <span class="points">25</span>
                            <span class="text">Star Points</span>
                        </div>
                        <a href="https://www.startech.com.bd/account/login" class="btn">Login to Avail</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="page-section ws-box">
                        <div class="section-head">
                            <h2><span>1</span>Customer Information</h2>
                        </div>
                        <div class="address">
                            <div class="multiple-form-group">
                                <div class="form-group">
                                    <label class="control-label" for="input-firstname">First Name</label>
                                    <input class="form-control" name="first_name" type="text" id="input-firstname" value="" placeholder="First Name*" required>

                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="input-lastname">Last Name</label>
                                    <input type="text" id="input-lastname" name="last_name" value="" class="form-control" placeholder="Last Name*" required>

                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="input-address">Address</label>
                                <input type="text" id="input-address" name="address" value="" class="form-control" placeholder="Address*" required>

                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                           <div class="form-group">
                               <label class="control-label" for="input-telephone">Mobile</label>
                               <input type="tel" id="input-telephone" name="phone" value="" class="form-control" placeholder="Telephone*" required>

                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" for="input-email">
                                <label class="control-label">Email</label>
                                <input type="email" id="input-email" name="email" value="" class="form-control" placeholder="E-Mail*" required>

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="multiple-form-group">
                                <div class="form-group" for="input-city">
                                    <label class="control-label">City</label>
                                    <input type="text" id="input-city" name="city" value="" class="form-control" placeholder="City*" required>

                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group" for="input-zone">
                                    <label class="control-label">Zone</label>
                                    <select name="zone" id="input-zone" class="form-control" required>
                                        <option value="Dhaka City" selected=""> Dhaka City</option>
                                        <option value="Khulna City"> Khulna City</option>
                                        <option value="Rajshahi City"> Rajshahi City</option>
                                        <option value="Rangpur City"> Rangpur City</option>
                                        <option value="Chittagong City">Chittagong City</option>
                                        <option value="Gazipur City">Gazipur City</option>
                                        <option value="Others">Others</option>
                                    </select>

                                    @error('zone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Comment</label>
                            <textarea class="form-control" name="comment" value="" placeholder="Comment" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="row row-payment-delivery-order">
                        <div class="col-md-6 col-sm-12 payment-methods">
                            <div class="page-section ws-box">
                                <div class="section-head">
                                    <h2><span>2</span>Payment Method</h2>
                                </div>
                                <p>Select a payment method</p>
                                <label class="radio-inline">
                                    <input type="radio" name="payment_method" value="Cash on Delivery" checked="checked">Cash on Delivery                                
                                </label><br>

                                <label class="radio-inline">
                                        <input type="radio" name="payment_method" value="POS on Delivery">
                                        POS on Delivery                                
                                </label><br>

                                <label class="radio-inline">
                                        <input type="radio" name="payment_method" value="online">
                                        Online Payment                                </label><br>
                                                                <div class="accepted-logo">
                                    <h5>We Accept : </h5>
                                    <a href="#"><img class="logo logo-visa" src="catalog/view/theme/starship/images/card-logo.png"></a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12 delivery-methods">
                            <div class="page-section ws-box">
                                <div class="section-head">
                                    <h2><span>3</span>Delivery Method</h2>
                                </div>
                                    <p>Select a delivery method</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="delivery_method" value="Home Delivery" checked="checked">
                                        Home Delivery - 60৳                                
                                    </label><br>

                                    <input type="hidden" name="flat.flat.title" value="Home Delivery">
                                    <label class="radio-inline">
                                        <input type="radio" name="delivery_method" value="pickup.pickup">
                                        Store Pickup - 0৳                                
                                    </label><br>

                                    <input type="hidden" name="pickup.pickup.title" value="Store Pickup">
                                    <label class="radio-inline">
                                        <input type="radio" name="delivery_method" value="express.express">
                                        Request Express - Charge Applicable                               
                                    </label><br>
                                    <input type="hidden" name="express.express.title" value="Request Express">
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="page-section ws-box voucher-coupon">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12" id="gift-voucher">
                                        <div class="input-group">
                                            <input type="text" name="voucher" placeholder="Gift Voucher" id="input-voucher" class="form-control">
                                            <span class="input-group-btn"><button type="button" id="button-voucher" data-loading-text="Loading..." class="btn st-outline">Apply Voucher</button></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12" id="discount-coupon">
                                        <div class="input-group">
                                            <input type="text" name="coupon" placeholder="Promo / Coupon Code" id="input-coupon" class="form-control">
                                            <span class="input-group-btn"><button type="button" id="button-coupon" data-loading-text="Loading..." class="btn st-outline">Apply Coupon</button></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 details-section-wrap">
                            <div class="page-section ws-box">
                                <div class="section-head">
                                    <h2><span>4</span>Order Overview</h2>
                                </div>
                                <table class="table-bordered bg-white checkout-data">
                                    <thead>
                                        <tr>
                                            <td>Product Name</td>
                                            <td>Price</td>
                                            <td class="text-right">Total</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $total_price=0; ?>
                                        @foreach ($cart as $row)
                                        <tr>
                                            <td class="name">
                                                <a href="https://www.startech.com.bd/tp-link-tapo-c210-wi-fi-camera">{{ $row->product_title }}</a>
                                                <div class="options">
                                                </div>
                                                <div class="fade">Star Points: 25</div>
                                            </td>
                                            <td class="price"><span>{{ $row->price }}৳ </span> <span> x </span> <span>1</span></td>
                                            <td class="price text-right">{{ $row->price }}৳ </td>
                                        </tr>
                                        <?php $total_price=$total_price + $row->price ?>
                                        @endforeach
                                        <tr class="total">
                                            <td colspan="2" class="text-right"><strong>Sub-Total:</strong></td>
                                            <td class="text-right"><span class="amount">{{ $total_price }}৳ </span></td>
                                        </tr>
                                                                            <tr class="total">
                                            <td colspan="2" class="text-right"><strong>Home Delivery:</strong></td>
                                            <td class="text-right"><span class="amount">60৳</span></td>
                                        </tr>
                                                                            <tr class="total">
                                            <td colspan="2" class="text-right"><strong>Total:</strong></td>
                                            <td class="text-right"><span class="amount">{{ $total_price }}৳ </span></td>
                                        </tr>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            
            <div class="checkout-final-action">
                <div class="agree-text" style="margin-bottom: 10px">
                    I have read and agree to the 
                    <a href="https://www.startech.com.bd/warranty-policy" target="_blank"><b>Terms and Conditions</b></a>, 
                    <a href="https://www.startech.com.bd/privacy" target="_blank"><b>Privacy Policy</b></a> and 
                    <a href="https://www.startech.com.bd/refund-policy" target="_blank"><b>Refund and Return Policy</b></a>                                        
                    <input type="checkbox" name="agree" value="1" checked="checked">
                </div>
                <button id="button-confirm" class="btn submit-btn pull-right" type="submit">Confirm Order</button>
            </div>

        </form>

    </div>
</section>

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


