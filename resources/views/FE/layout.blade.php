
@extends('FE.layout_theme')
@section('content')

            @include('FE.layouts.product_new')
            @include('FE.layouts.featured_item')
            @include('FE.layouts.author_home')
            @include('FE.layouts.products_top_view')
     <!--************************************
					Best Selling Start
			*************************************-->
            <!-- <section class="tg-sectionspace tg-haslayout 2333">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-sectionhead">
                                <h2><span>People’s Choice</span>Bestselling Books</h2>
                                <a class="tg-btn" href="javascript:void(0);">View All</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="tg-bestsellingbooksslider"
                                class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                                <div class="item">
                                    <div class="tg-postbook">
                                        <figure class="tg-featureimg">
                                            <div class="tg-bookimg">
                                                <div class="tg-frontcover"><img
                                                        src="{{URL::asset('FE/images/books/img-01.jpg')}}"
                                                        alt="image description"></div>
                                                <div class="tg-backcover"><img
                                                        src="{{URL::asset('FE/images/books/img-01.jpg')}}"
                                                        alt="image description"></div>
                                            </div>
                                            <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                <i class="icon-heart"></i>
                                                <span>add to wishlist</span>
                                            </a>
                                        </figure>
                                        <div class="tg-postbookcontent">
                                            <ul class="tg-bookscategories">
                                                <li><a href="javascript:void(0);">Adventure</a></li>
                                                <li><a href="javascript:void(0);">Fun</a></li>
                                            </ul>
                                            <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                            <div class="tg-booktitle">
                                                <h3><a href="javascript:void(0);">Help Me Find My Stomach</a></h3>
                                            </div>
                                            <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela
                                                    Gunning</a></span>
                                            <span class="tg-stars"><span></span></span>
                                            <span class="tg-bookprice">
                                                <ins>$25.18</ins>
                                                <del>$27.20</del>
                                            </span>
                                            <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                                <i class="fa fa-shopping-basket"></i>
                                                <em>Add To Basket</em>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!--************************************
					Best Selling End
			*************************************-->
            <!--************************************
					Featured Item Start
			*************************************-->
            <!-- <section class="tg-bglight tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="tg-featureditm">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                                <figure><img src="{{URL::asset('FE/images/img-02.png')}}" alt="image description">
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="tg-featureditmcontent">
                                    <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                    <div class="tg-booktitle">
                                        <h3><a href="javascript:void(0);">Things To Know About Green Flat Design</a>
                                        </h3>
                                    </div>
                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Farrah
                                            Whisenhunt</a></span>
                                    <span class="tg-stars"><span></span></span>
                                    <div class="tg-priceandbtn">
                                        <span class="tg-bookprice">
                                            <ins>$23.18</ins>
                                            <del>$30.20</del>
                                        </span>
                                        <a class="tg-btn tg-btnstyletwo tg-active" href="javascript:void(0);">
                                            <i class="fa fa-shopping-basket"></i>
                                            <em>Add To Basket</em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!--************************************
					Featured Item End
			*************************************-->
            <!--************************************
					New Release Start
			*************************************-->
            <!-- <section class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="tg-newrelease">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="tg-sectionhead">
                                    <h2><span>Taste The New Spice</span>New Release Books</h2>
                                </div>
                                <div class="tg-description">
                                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna
                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip
                                        commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor
                                        fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                                </div>
                                <div class="tg-btns">
                                    <a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
                                    <a class="tg-btn" href="javascript:void(0);">Read More</a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="tg-newreleasebooks">
                                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                            <div class="tg-postbook">
                                                <figure class="tg-featureimg">
                                                    <div class="tg-bookimg">
                                                        <div class="tg-frontcover"><img
                                                                src="{{URL::asset('FE/images/books/img-07.jpg')}}"
                                                                alt="image description"></div>
                                                        <div class="tg-backcover"><img
                                                                src="{{URL::asset('FE/images/books/img-07.jpg')}}"
                                                                alt="image description"></div>
                                                    </div>
                                                    <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                        <i class="icon-heart"></i>
                                                        <span>add to wishlist</span>
                                                    </a>
                                                </figure>
                                                <div class="tg-postbookcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-booktitle">
                                                        <h3><a href="javascript:void(0);">Help Me Find My Stomach</a>
                                                        </h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a
                                                            href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    <span class="tg-stars"><span></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                            <div class="tg-postbook">
                                                <figure class="tg-featureimg">
                                                    <div class="tg-bookimg">
                                                        <div class="tg-frontcover"><img
                                                                src="{{URL::asset('FE/images/books/img-08.jpg')}}"
                                                                alt="image description"></div>
                                                        <div class="tg-backcover"><img
                                                                src="{{URL::asset('FE/images/books/img-08.jpg')}}"
                                                                alt="image description"></div>
                                                    </div>
                                                    <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                        <i class="icon-heart"></i>
                                                        <span>add to wishlist</span>
                                                    </a>
                                                </figure>
                                                <div class="tg-postbookcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-booktitle">
                                                        <h3><a href="javascript:void(0);">Drive Safely, No Bumping</a>
                                                        </h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a
                                                            href="javascript:void(0);">Sunshine Orlando</a></span>
                                                    <span class="tg-stars"><span></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-4 hidden-md">
                                            <div class="tg-postbook">
                                                <figure class="tg-featureimg">
                                                    <div class="tg-bookimg">
                                                        <div class="tg-frontcover"><img
                                                                src="{{URL::asset('FE/images/books/img-09.jpg')}}"
                                                                alt="image description"></div>
                                                        <div class="tg-backcover"><img
                                                                src="{{URL::asset('FE/images/books/img-09.jpg')}}"
                                                                alt="image description"></div>
                                                    </div>
                                                    <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                        <i class="icon-heart"></i>
                                                        <span>add to wishlist</span>
                                                    </a>
                                                </figure>
                                                <div class="tg-postbookcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Adventure</a></li>
                                                        <li><a href="javascript:void(0);">Fun</a></li>
                                                    </ul>
                                                    <div class="tg-booktitle">
                                                        <h3><a href="javascript:void(0);">Let The Good Times Roll Up</a>
                                                        </h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a
                                                            href="javascript:void(0);">Elisabeth Ronning</a></span>
                                                    <span class="tg-stars"><span></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!--************************************
					New Release End
			*************************************-->
            <!--************************************
					Collection Count Start
			*************************************-->
            <!-- <section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100"
                data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-04.jpg">
                <div class="tg-sectionspace tg-collectioncount tg-haslayout">
                    <div class="container">
                        <div class="row">
                            <div id="tg-collectioncounters" class="tg-collectioncounters">
                                <div class="tg-collectioncounter tg-drama">
                                    <div class="tg-collectioncountericon">
                                        <i class="icon-bubble"></i>
                                    </div>
                                    <div class="tg-titlepluscounter">
                                        <h2>Drama</h2>
                                        <h3 data-from="0" data-to="6179213" data-speed="8000"
                                            data-refresh-interval="50">6,179,213</h3>
                                    </div>
                                </div>
                                <div class="tg-collectioncounter tg-horror">
                                    <div class="tg-collectioncountericon">
                                        <i class="icon-heart-pulse"></i>
                                    </div>
                                    <div class="tg-titlepluscounter">
                                        <h2>Horror</h2>
                                        <h3 data-from="0" data-to="3121242" data-speed="8000"
                                            data-refresh-interval="50">3,121,242</h3>
                                    </div>
                                </div>
                                <div class="tg-collectioncounter tg-romance">
                                    <div class="tg-collectioncountericon">
                                        <i class="icon-heart"></i>
                                    </div>
                                    <div class="tg-titlepluscounter">
                                        <h2>Romance</h2>
                                        <h3 data-from="0" data-to="2101012" data-speed="8000"
                                            data-refresh-interval="50">2,101,012</h3>
                                    </div>
                                </div>
                                <div class="tg-collectioncounter tg-fashion">
                                    <div class="tg-collectioncountericon">
                                        <i class="icon-star"></i>
                                    </div>
                                    <div class="tg-titlepluscounter">
                                        <h2>Fashion</h2>
                                        <h3 data-from="0" data-to="1158245" data-speed="8000"
                                            data-refresh-interval="50">1,158,245</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!--************************************
					Collection Count End
			*************************************-->
            <!--************************************
					Picked By Author Start
			*************************************-->
            <!-- <section class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-sectionhead">
                                <h2><span>Some Great Books</span>Picked By Authors</h2>
                                <a class="tg-btn" href="javascript:void(0);">View All</a>
                            </div>
                        </div>
                        <div id="tg-pickedbyauthorslider"
                            class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">

                            <div class="item">
                                <div class="tg-postbook">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img
                                                    src="{{URL::asset('FE/images/books/img-12.jpg')}}"
                                                    alt="image description"></div>
                                        </div>
                                        <div class="tg-hovercontent">
                                            <div class="tg-description">
                                                <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore
                                                    toloregna aliqua enim adia minim veniam, quis nostrud.</p>
                                            </div>
                                            <strong class="tg-bookpage">Book Pages: 206</strong>
                                            <strong class="tg-bookcategory">Category: Adventure, Fun</strong>
                                            <strong class="tg-bookprice">Price: $23.18</strong>
                                            <div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
                                        </div>
                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <div class="tg-booktitle">
                                            <h3><a href="javascript:void(0);">There’s No Time Like The Present</a></h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Patrick
                                                Seller</a></span>
                                        <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                            <i class="fa fa-shopping-basket"></i>
                                            <em>Add To Basket</em>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section> -->
            <!--************************************
					Picked By Author End
			*************************************-->
            <!--************************************
					Testimonials Start
			*************************************-->
            <!-- <section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600"
                data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
                <div class="tg-sectionspace tg-haslayout">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                                <div id="tg-testimonialsslider"
                                    class="tg-testimonialsslider tg-testimonials owl-carousel">
                                    <div class="item tg-testimonial">
                                        <figure><img src="{{URL::asset('FE/images/author/imag-02.jpg')}}"
                                                alt="image description"></figure>
                                        <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut
                                                labore tolore magna aliqua enim ad minim veniam, quis nostrud
                                                exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
                                        <div class="tg-testimonialauthor">
                                            <h3>Holli Fenstermacher</h3>
                                            <span>Manager @ CIFP</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!--************************************
					Testimonials End
			*************************************-->

            <!--************************************
					Call to Action Start
			*************************************-->
            <!-- <section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600"
                data-parallax="scroll" data-image-src="images/parallax/bgparallax-06.jpg">
                <div class="tg-sectionspace tg-haslayout">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="tg-calltoaction">
                                    <h2>Open Discount For All</h2>
                                    <h3>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et
                                        dolore.</h3>
                                    <a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!--************************************
					Call to Action End
			*************************************-->
          
@endsection