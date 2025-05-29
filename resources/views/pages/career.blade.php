@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.career'))

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div id="hero-carousel-indicators"></div>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" style="background-image: url({{ asset('img/banner/nusa_hero_2.jpg') }})">
        <div class="carousel-container">
          <div class="container">
            <h2>@lang('messages.career')</h2>
            <p>
              @lang('messages.short_career')
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">
  <!-- <section id="faq-2" class="faq-2">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="faq-container text-justify">
            Our firm is designed for growth, and we are continually seeking dynamic and driven individuals who aspire to join our team of lawyers and staff. 
            If you are interested in becoming part of our firm, please submit your application and CV to: <a href="mailto:nusa@nusaadvocates.com">nusa@nusaadvocates.com</a>
          </div>

        </div>

      </div>

    </div>
  </section> -->

  <!-- <div class="container">
    <div class="text-center">
      <img src="{{ asset('img/career2.jpg') }}" alt="career" class="img-custom">
    </div>
  </div> -->
  <section id="Nusa Advocates" class="Nusa Advocates mt-3">
    <div class="container">
      @foreach($careers as $career)
      <div class="col-lg-4 col-md-4 col-12">
        <div class="featured-insights__tile promo-content-tile  ">
          <a class="promo-content-link" href="{{ $career->link_redirect ? $career->link_redirect : '#' }}" target="_blank">
            <div class="container-table">
              <div class="container-row ">
                <div class="content">
                  <div class="content-meta-header">
                    <div class="content-type-label text-uppercase">
                      {{ __('messages.career') }} {{ $career->date ? '| ' . date('d F Y', strtotime($career->date )) : '' }}
                    </div>
                  </div>
                  <div class="content-headline">
                    {{ app()->getLocale() == 'en' ? $career->title_en : $career->title_id }}
                  </div>
                  <div class="content-summary">
                    {!! app()->getLocale() == 'en' ? $career->description_en : $career->description_id !!}
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </section>

</main><!-- End #main -->
@endsection