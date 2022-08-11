	<!--************************************
					Testimonials Start
			*************************************-->
	<section class="tg-parallax tg-bgtestimonials tg-haslayout" style="margin: 30px 0;" data-z-index="-100"
	    data-appear-top-offset="600" data-parallax="scroll"
	    data-image-src="{{URL::asset('image_FE/parallax/bgparallax-05.jpg')}}">
	    <div class="tg-sectionspace tg-haslayout">
	        <div class="container">
	            <div class="row">
	                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
	                    <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
	                        @foreach($authors_all as $value)
	                        <div class="item tg-testimonial">
	                            <figure><img src="{{URL::asset('image/author/'.$value->author_image)}}" style="height: 120px; width: 120px; object-fit: contain;" alt="image description">
	                            </figure>
	                            <blockquote><q>{{$value->description}}</q></blockquote>
	                            <div class="tg-testimonialauthor">
	                                <h3> <a href="/tac-gia-{{$value['id']}}">{{$value['name']}}</a></h3>
	                            </div>
	                        </div>
	                        @endforeach
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!--************************************
					Testimonials End
			*************************************-->