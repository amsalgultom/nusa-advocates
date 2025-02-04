@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.about_us'))

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div id="hero-carousel-indicators"></div>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" style="background-image: url({{ asset('img/banner/nusa_hero_2.jpg') }})">
        <div class="carousel-container">
          <div class="container">
            <h2>@lang('messages.about_us')</h2>
            <p>
            @lang('messages.short_about_us')
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">
  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <!-- <div class="col-lg-5 align-items-stretch video-box hero-img" style='background-image: url({{ asset('img/banner/nusa_hero_3.jpg') }});' data-aos="zoom-in" data-aos-delay="100">
          </div> -->
          <div class="col-lg-12">
          @lang('messages.desc_nusa_2')
          @lang('messages.desc_nusa_3')
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->
</main><!-- End #main -->
@endsection
