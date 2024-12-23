@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. $news[0]->title )

@section('content')
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

    <div class="container mt-5" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12">
          <img src="{{ asset('storage/news').'/'.$news[0]->image }}" alt="" class="img-newsdetail">
          <h4 class="title-newsdetail">{{$news[0]->title}}</h4>
          <p>{{ date('d F Y', strtotime($news[0]->date )) }}</p>
          <span class="desc-newsdetail">
            {!! $news[0]->desc !!}
          </span>
        </div>
      </div>
    </div>
  </section><!-- End Nusa Advocates Section -->

</main><!-- End #main -->
@endsection