@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.home'))

@section('content')

@include('layout-views.slider')

<main id="main">
  <div class="img-bg1">
    <img src="{{ asset('img/img-view/dots.png') }}" alt="">
  </div>
  <div class="img-bg2">
    <img src="{{ asset('img/img-view/circle-blue.png') }}" alt="">
  </div>
  <div class="img-bg3">
    <img src="{{ asset('img/img-view/dots.png') }}" alt="">
  </div>
  <div class="img-bg4">
    <img src="{{ asset('img/img-view/dots.png') }}" alt="">
  </div>

  <section id="Nusa Advocates" class="Nusa Advocates">

    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>@lang('messages.nusa_advocates')</h2>
        <p class="desc-title">
        @lang('messages.desc_nusa_1')
        </p>
      </div>
    </div>
  </section><!-- End Nusa Advocates Section -->

  <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url(https://technext.github.io/lawmaker/images/hero_1.jpg);' data-aos="zoom-in" data-aos-delay="100">
          </div>
          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
          @lang('messages.desc_nusa_2')
            <div class="content pt-2 mt-0 text-right">
              <a href="{{ route('about', ['lang' => app()->getLocale()]) }}" class="read-more"><span>@lang('messages.see_more') </span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->

    

  <section id="faq-2" class="faq-2">

<!-- Section Title -->
<div class="container section-title aos-init aos-animate" data-aos="fade-up">
  <h2>@lang('messages.practice_area')</h2>
</div><!-- End Section Title -->

<div class="container">

  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="faq-container text-justify">

      @php $no = 1; @endphp
      @foreach ($practices as $practice)
        <div class="faq-item">
          <i class="faq-icon bi bi-{{ $no++ }}-circle-fill"></i>
          <h3>{{ $practice->name }}</h3>
            <p>{{ $practice->description }}</p>
        </div>
      @endforeach


      </div>

    </div>

  </div>

</div>

</section>

</main><!-- End #main -->
@endsection