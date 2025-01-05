@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. $news[0]->title )

@section('content')
<main id="main">  <!-- ======= Nusa Advocates Section ======= -->
  <section id="Nusa Advocates" class="Nusa Advocates mt-4">

    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-12">
          <!-- <img src="{{ asset('storage/news').'/'.$news[0]->image }}" alt="" class="img-newsdetail"> -->
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