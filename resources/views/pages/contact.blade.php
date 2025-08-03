@extends('layout-views.app')
@section('title', 'Nusa Advocates | '. __('messages.contact_us'))

@section('content')
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div id="hero-carousel-indicators"></div>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url({{ asset('img/banner/nusa_hero_2.jpg') }})">
                <div class="carousel-container">
                    <div class="container">
                        <h2>@lang('messages.contact_us')</h2>
                        <p>
                            @lang('messages.short_contact_us')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= Nusa Advocates Section ======= -->
    <section id="Nusa Advocates" class="Nusa Advocates">

        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d741.0359684602786!2d106.80597898584939!3d-6.224932931627447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f10054c6f60b%3A0xd52aefa21b2214d2!2sNusa%20Advocates!5e0!3m2!1sen!2sid!4v1747825937746!5m2!1sen!2sid" width="100%" height="450" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2948781225546!2d106.8065393!3d-6.224795899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f190ebb77d3f%3A0xa703a92087300d95!2sSequis%20center!5e0!3m2!1sid!2sid!4v1734503955329!5m2!1sid!2sid" width="100%" height="450" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    </div>
                </div>
                <!-- <div class="col-md-4 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box-contact">
                    <p>@lang('messages.short_contact_us')</p>
                        <ul class="contact-list">
                            <li>Nusa Advocates</li>
                            <li><i class="bi bi-geo-alt mr-2 icon-contact-top"></i>Sequis Center 9th Floor, Unit 10 <br>
                            Jl. Jenderal Sudirman No. 71 <br>
                            Jakarta 12190, Indonesia</li>
                            <li><i class="bi bi-telephone mr-2"></i> +62 21 2526587</li>
                              <li><i class="bi bi-envelope mr-2"></i> nusa@nusaadvocates.com</li>
                              <li><i class="bi bi-globe mr-2"></i> www.nusaadvocates.com</li>
                        </ul>
                        <div class="d-flex justify-content-center isosmed">
                            <div class="icon-sosmed">
                                <a href="#">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </div>
                            <div class="icon-sosmed">
                                <a href="#">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section><!-- End Nusa Advocates Section -->

</main><!-- End #main -->

@push('after_footer')
<ul>
    <h4 class="mb-2 p-0">@lang('messages.contact_japan_title')</h4>
    <h4 class="mb-0 p-0">Nexel Partners</h4>
    <li class="mb-0 p-0">Mita-Kokusai Bldg. 22F, 1-4-28, Mita, Minato-ku <br> Tokyo 108-0073 Japan</li>
    <li class="mb-0 p-0">Tel : 03-5427-5830 (representative)</li>
    <li class="mb-0 p-0">Fax : 03-5427-5832</li>
    <li class="mb-0 p-0">Web :&nbsp;<a href="https://nslaw.org/ " target="_blank" rel="noopener noreferrer">nslaw.org</a></li>
</ul>
    @endpush

    @endsection