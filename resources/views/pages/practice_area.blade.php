@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.practice_area'))

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div id="hero-carousel-indicators"></div>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" style="background-image: url({{ asset('img/banner/nusa_hero_1.jpg') }})">
        <div class="carousel-container">
          <div class="container">
            <h2>@lang('messages.practice_area')</h2>
            <p>
            @lang('messages.short_practice_area')
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

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

<section id="faq-2" class="faq-2">
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
</section><!-- End FAQ Section -->


</main><!-- End #main -->
@endsection