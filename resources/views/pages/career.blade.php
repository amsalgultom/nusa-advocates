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
      <div class="row">
          <div class="col-lg-4 col-md-4 col-12">
            <div class="featured-insights__tile promo-content-tile  ">
              <a class="promo-content-link" href="{{ asset('img/career2.jpg') }}" target="_blank">
                <div class="container-table">
                  <div class="container-row ">
                    <div class="content">
                      <div class="content-meta-header">
                        <div class="content-type-label text-uppercase">
                          {{ __('messages.career') }}  | 08 April 2024
                        </div>
                      </div>
                      <div class="content-headline">
                        WE ARE RECRUITING
                          <!-- <img src="{{ asset('img/career2.jpg') }}" alt="career" class="img-custom"> -->
                      </div>
                      <div class="content-summary">
                        WE ARE GRATEFUL FOR THE ENTHUSIASTIC RESPONSE WE’VE RECEIVED. IF YOU HAVE NOT YET APPLIED, SUBMIT YOUR APPLICATION BEFORE 23:59 - APRIL 11
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
      </div>
    </div>
</section>

</main><!-- End #main -->
@endsection