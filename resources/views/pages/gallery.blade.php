@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.gallery'))

@section('content')
<main id="main">

  
  
  
  
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>@lang('messages.gallery')</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <ul id="portfolio-flters" class="d-flex justify-content-center gallery-filter" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">@lang('messages.all')</li>
        <li data-filter=".filter-kemang">Kemang</li>
        <li data-filter=".filter-ciputat">Ciputat</li>
        <li data-filter=".filter-pik">Pantain Indah Kapuk</li>
      </ul>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach($galleries as $gallery)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$gallery->category}}">
          <div class="portfolio-img"><img src="{{ asset('storage/gallery').'/'.$gallery->image }}" style="width: 100% !important;" class="img-fluid" alt=""></div>
        </div>
        @endforeach

      </div>

    </div>
  </section>

</main>

@endsection