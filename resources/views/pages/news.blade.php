@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.news'))

@section('content')
<main id="main">  <!-- ======= Nusa Advocates Section ======= -->
  <section id="Nusa Advocates" class="Nusa Advocates mt-5">
    <div class="container mt-4">
      <h4 class="title-newsdetail">@lang('messages.firm_news')</h4>
    </div>
  @foreach($news as $new)
    <div class="container mt-3">
      <div class="row">
        <div class="col-lg-12">
          <p class="mb-0">{{ date('d F Y', strtotime($new->date )) }}</p>
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