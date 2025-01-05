@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.practice_area'))

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div id="hero-carousel-indicators"></div>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" style="background-image: url({{ asset('img/banner/nusa_hero_2.jpg') }})">
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
<section id="faq-2" class="faq-2">
  <div class="container">

  <div class="row">
    <div class="col-lg-12">
      <div class="faq-container text-justify">
      @foreach ($practices as $practice)
        <div class="faq-item">
          <h3>{{ $practice->name }}</h3>
            <p class="mb-0">{{ $practice->description }}</p>
        </div>
      @endforeach
      </div>

    </div>

  </div>

</div>
</section><!-- End FAQ Section -->


</main><!-- End #main -->
@endsection