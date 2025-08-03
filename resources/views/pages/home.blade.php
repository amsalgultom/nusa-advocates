@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.home'))

@section('content')

@include('layout-views.slider')

<main id="main">

  <!-- <div class="img-bg1">
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
  </div> -->

  <!-- <section id="Nusa Advocates" class="Nusa Advocates">

    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>@lang('messages.nusa_advocates')</h2>
        <p class="desc-title">
        @lang('messages.desc_nusa_1')
        </p>
      </div>
    </div>
  </section> -->

  <!-- ======= Why Us Section ======= -->
  <!-- <section id="why-us" class="why-us">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-5 align-items-stretch video-box hero-img" style='background-image: url({{ asset('img/banner/nusa_hero_3.jpg') }});' data-aos="zoom-in" data-aos-delay="100">
          </div>
          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
          @lang('messages.desc_nusa_2')
            <div class="content pt-2 mt-0 text-right">
              <a href="{{ route('about', ['lang' => app()->getLocale()]) }}" class="read-more"><span>@lang('messages.see_more') </span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section> -->


  <section id="faq-2" class="faq-2">

    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
      <h2>@lang('messages.news')</h2>
    </div>

    <div class="container">

      <div class="row justify-content-center">
        @foreach($news as $new)
          <div class="col-lg-4 col-md-4 col-12">
            <div class="featured-insights__tile promo-content-tile" style="height: 100%;">
              <a class="promo-content-link" href="{{ $new->link_redirect ? $new->link_redirect : '#' }}" target="_blank">
                <div class="container-table">
                  <div class="container-row ">
                    <div class="content">
                      <div class="content-meta-header">
                        <div class="content-type-label text-uppercase">
                          @php $lang = app()->getLocale(); @endphp
                          {{ __('messages.' . $new->type) }}  {{ $new->date ? '| ' . \Carbon\Carbon::parse($new->date)->locale($lang)->translatedFormat('d F Y') : '' }} {{ $new->category ? '| ' . $new->category : '' }}
                        </div>
                      </div>
                      <div class="content-headline">
                        {!! $new->title !!}
                      </div>
                      <div class="content-summary">
                        {!! $new->short_desc !!}
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        @endforeach

      </div>

    </div>

  </section>

</main><!-- End #main -->
@endsection