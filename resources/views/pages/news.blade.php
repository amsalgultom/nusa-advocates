@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.news'))


<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div id="hero-carousel-indicators"></div>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" style="background-image: url({{ asset('img/banner/nusa_hero_2.jpg') }})">
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

@section('content')
<main id="main">
  <!-- ======= Nusa Advocates Section ======= -->
  <section id="Nusa Advocates" class="Nusa Advocates mt-3">
    <div class="container">
      <div class="row">
        @foreach($news as $new)
          @if(request()->segment(2) == $new->type )
          <div class="col-lg-4 col-md-4 col-12">
            <div class="featured-insights__tile promo-content-tile  ">
              <a class="promo-content-link" href="{{ $new->link_redirect ? $new->link_redirect : '#' }}" target="_blank">
                <div class="container-table">
                  <div class="container-row ">
                    <div class="content">
                      <div class="content-meta-header">
                        <div class="content-type-label text-uppercase">
                          {!! $new->type !!} {{ $new->date ? '| ' . date('d F Y', strtotime($new->date )) : '' }} {{ $new->category ? '| ' . $new->category : '' }}
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
          @endif
        @endforeach
      </div>
    </div>

  </section>
</main><!-- End #main -->
@endsection