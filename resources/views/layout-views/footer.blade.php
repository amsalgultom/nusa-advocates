  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6 footer-contact">
            <img src="{{ asset('img/logo-nusa.png') }}" alt="" class="logo-footer">
            <p class="text-com-footer">
              @lang('messages.footer')
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>@lang('messages.practice_area')</h4>
            <ul>
              @foreach ($footer_practices as $practice)
              <li><a href="{{ route('practice_area', ['lang' => app()->getLocale()]) }}">{{ $practice->name }}</a></li>
              @endforeach
            </ul>
          </div>
          <!-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>@lang('messages.features')</h4>
            <ul>
              <li><a href="#">Kiila Kiila Cafe</a></li>
              <li><a href="#">Parakarta</a></li>
            </ul>
          </div> -->

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>@lang('messages.contact_us')</h4>
            <ul>
              <li><i class="bi bi-geo-alt mr-2 icon-top"></i><a href="#" class="line-height">
              Sequis Center 9<sup>th</sup> Floor<br>
              Jl. Jenderal Sudirman No. 71 <br>
              Jakarta 12190, Indonesia
            </a></li>
            <li><i class="bi bi-telephone mr-2"></i> <a href="#">+62 21 2526587</a></li>
              <li><i class="bi bi-envelope mr-2"></i> <a href="#">nusa@nusaadvocates.com</a></li>
              <li><i class="bi bi-globe mr-2"></i> <a href="#">www.nusaadvocates.com</a></li>
            </ul>
            <!-- <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div> -->
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix text-center">
      <div class="copyright">
        Copyright &copy; 2024 <bold><span>Nusa Advocates</span></bold>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->