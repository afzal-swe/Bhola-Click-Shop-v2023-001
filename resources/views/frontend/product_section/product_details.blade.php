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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('frontend.topbar.header');
         <!-- end header section -->
        

<main>

<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row ">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Product Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product_details->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- portfolio-details-area -->
<section class="services__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="services__details__thumb">
                    <img src="{{ asset($product_details->image) }}" alt="">
                </div>
                <div class="services__details__content">
                    <h2 class="title">{{ $product_details->title }}</h2><br>
                    {{-- <p>Discription : {!! $product_details->description !!}</p> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="services__sidebar">
                    
                    <div class="widget">
                        <h5 class="title">Product Information</h5>
                        <ul class="sidebar__contact__info">
                            <li><span>Date :</span> January, 2021</li>
                            <li><span>Location :</span> East Meadow NY 11554</li>
                            <li><span>Client :</span> American</li>
                            <li class="cagegory"><span>Category :</span>
                                <a href="portfolio.html">Photo,</a>
                                <a href="portfolio.html">UI/UX</a>
                            </li>
                            <li><span>Project Link :</span> <a href="portfolio-details.html">https://www.yournews.com/</a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="title">Contact Information</h5>
                        <ul class="sidebar__contact__info">
                            <li><span>Address :</span> 8638 Amarica Stranfod, <br> Mailbon Star</li>
                            <li><span>Mail :</span> yourmail@gmail.com</li>
                            <li><span>Phone :</span> +7464 0187 3535 645</li>
                            <li><span>Fax id :</span> +9 659459 49594</li>
                        </ul>
                        {{-- <ul class="sidebar__contact__social">
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul> --}}
                    </div>
                </aside>
            </div>

            <div class="col-lg-12">
                <aside class="services__sidebar">
                    
                    <div class="widget">
                        <h5 class="title">Product Details</h5>
                        <hr>
                        <ul class="sidebar__contact__info">
                            <li><span>Product Name : </span> {{$product_details->title}}</li>
                            <li><span>Product Category : </span> {{$product_details->category_name}}</li>
                            <li><span>Product Post Date : </span> {{$product_details->title}}</li>
                            <li><span>Product Price : </span> {{$product_details->price}}</li>
                            <li><span>Discount Price : </span>{{$product_details->discount_price}}</li>
                            <li><span>Product Quantity : </span> {{$product_details->quantity}}</li>
                            <li><span>Product Status : </span> {{$product_details->status}}</li>
                        </ul><br>
                        <h4>Discription</h4>
                        <p> {!! $product_details->description !!}</p><br><br>
                        <a href="" class="btn btn-primary">Add to Cart</a><br><hr>
                    </div>
                    
                </aside>
            </div>
            
        </div>
    </div>
</section>
<!-- portfolio-details-area-end -->


<!-- contact-area -->
<section class="homeContact homeContact__style__two">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title"> Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <h2 class="mail"><a href="mailto:afzal.swe@gmail.com">Bhola99@gmail.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="POST" action="#">
                            @csrf
                            <input name="name" type="text" placeholder="Enter name*">
                            <input name="email" type="email" placeholder="Enter mail*">
                            <input name="phone" type="number" placeholder="Enter number*">
                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">Send Message</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

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
   </body>
</html>


