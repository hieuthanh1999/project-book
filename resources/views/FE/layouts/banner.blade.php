  <!--************************************
					Latest News Start
			*************************************-->
  <section class="tg-sectionspace tg-haslayout" style="padding: 0">
      <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
          @foreach ($banners as $banner)
          <article class="item tg-post">
              <figure><a href="javascript:void(0);"><img src="{{URL::asset('image/banner/'.$banner['image'])}}"
                          alt="image description"></a></figure>

          </article>
          @endforeach
      </div>
  </section>
  <!--************************************
					Latest News End
			*************************************-->