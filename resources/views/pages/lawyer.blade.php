@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.principal_lawyer'))

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div id="hero-carousel-indicators"></div>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" style="background-image: url({{ asset('img/banner/nusa_hero_2.jpg') }})">
        <div class="carousel-container">
          <div class="container">
            <h2>@lang('messages.principal_lawyer')</h2>
            <p>
            @lang('messages.short_principal_lawyer')
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">
  <section id="team" class="team section">
    <div class="container">
      <div class="row gy-4">
        @foreach($lawyers as $lawyer)
        <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="team-member d-flex align-items-start">
            <div class="member-info">
              <h4 class="color-gold">{{ $lawyer->name }}</h4>
              <span>{{ $lawyer->level }}</span>
              <p class="text-justify">
                {!! nl2br(e($lawyer->description)) !!}
                <!-- email -->
                @if($lawyer->email)
                <br><br>
                <a href="mailto:{{ $lawyer->email }}"><i class="bi bi-envelope"></i> {{ $lawyer->email }}</a>
                @endif
              </p>
            </div>
            <div class="pic"><img src="{{ asset('storage/lawyer') . '/' . $lawyer->image }}" class="img-fluid" alt=""></div>
          </div>
        </div>
        @endforeach

        <!-- <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="team-member d-flex align-items-start">
            <div class="pic"><img src="https://kap-msh.com/img/team/profile-default.512x511.png" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Andika Mendrofa</h4>
              <span>Lawyer</span>
              <p class="text-justify">Andika is a seasoned corporate lawyer with extensive experience across mergers and acquisitions, corporate transactions, foreign investments, joint ventures, restructuring, and financing. He brings strategic insights and tailored solutions to complex legal challenges, specializing in sectors such as energy and natural resources, capital markets, manufacturing, and infrastructure. <br><br>
                Andika holds a doctoral degree in Public Administration from the University of Padjadjaran. He earned his law degree from the Faculty of Law at the University of Indonesia and a master’s degree in business administration from the University of Prasetiya Mulya. <br><br>
                Andika is a member of the Indonesian Bar Association (PERADI) and the Capital Market Legal Consultants Association (HKHPM). He also serves as a board member in several companies and is involved as a sport committee member at the Indonesia Kurash Federation (Ferkushi).
              </p>
              <div class="social">
                <a href="javascript:void(0)"><i class="bi bi-envelope"></i></a>
                <a href="javascript:void(0)"><i class="bi bi-facebook"></i></a>
                <a href="javascript:void(0)"> <i class="bi bi-linkedin"></i> </a>
              </div>
            </div>
          </div>
        </div> -->
        
      </div>

    </div>

  </section>


</main><!-- End #main -->
@endsection