@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.news'))

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div id="hero-carousel-indicators"></div>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" style="background-image: url({{ asset('img/banner/nusa_hero_1.jpg') }})">
        <div class="carousel-container">
          <div class="container">
            <h2>@lang('messages.news')</h2>
            <p>
            @lang('messages.short_news')
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

  <!-- ======= Nusa Advocates Section ======= -->
  <section id="Nusa Advocates" class="Nusa Advocates">

    <div class="container" data-aos="fade-up">
      <div class="section-title p-0">
        <h2>@lang('messages.news')</h2>
      </div>


      <div class="filter-sections row con" data-aos="fade-up" data-aos-delay="200">
          @foreach($news as $new)
          <div class="col-xl-4 col-md-6 align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box content box-news">
              <a href="{{ route('newsdetail', ['lang' => app()->getLocale(), 'slug' => $new->slug]) }}" class="">
                <div class="img-news text-center mx-auto mb-3">
                  <img src="{{ asset('storage/news').'/'.$new->image }}" alt="">
                </div>
                <div class="p-2">
                  <h4 class="title-news">{{ $new->title }}</h4>
                  <span class="date-news">{{ date('F Y', strtotime($new->date )) }} </span>
    
                  <p class="desc-news">{{ $new->short_desc }}
                  </p>
                </div>
              </a>
            </div>
          </div>
          @endforeach
      </div>

    </div>
  </section><!-- End Nusa Advocates Section -->

</main><!-- End #main -->
@endsection