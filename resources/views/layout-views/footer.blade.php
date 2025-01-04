  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <!-- <div class="col-lg-5 col-md-6 footer-contact">
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
          </div> -->
          <!-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>@lang('messages.features')</h4>
            <ul>
              <li><a href="#">Kiila Kiila Cafe</a></li>
              <li><a href="#">Parakarta</a></li>
            </ul>
          </div> -->

          <div class="col-md-12 footer-links">
            <h4>@lang('messages.contact_us')</h4>
            <ul>
              <li>@lang('messages.short_contact_us')</li>
              <li>Nusa Advocates <br>
                Sequis Center, 9th Floor, Jl. Jenderal Sudirman No. 71  Jakarta 12190, Indonesia
            </a></li>
            <li><i class="bi bi-telephone icon-foot"></i> <a href="#">+62 21 2526587</a> &nbsp;&nbsp;<i class="bi bi-envelope icon-foot"></i> <a href="#">nusa@nusaadvocates.com</a> &nbsp;&nbsp;<i class="bi bi-globe icon-foot"></i> <a href="#">www.nusaadvocates.com</a></li>
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