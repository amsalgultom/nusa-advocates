@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.news'))

@section('content')
<main id="main">  <!-- ======= Nusa Advocates Section ======= -->
  <section id="Nusa Advocates" class="Nusa Advocates mt-5">
  @foreach($news as $new)
    <div class="container mt-4">
      <div class="row">
        <div class="col-lg-12">
          <h4 class="title-newsdetail">{{ $new->title }}</h4>
          <p>{{ date('d F Y', strtotime($new->date )) }}</p>
          <span class="desc-newsdetail">
            {!! $new->desc !!}
          </span>
        </div>
      </div>
    </div>
    @endforeach
    
  </section>
</main><!-- End #main -->
@endsection