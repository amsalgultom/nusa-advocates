<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center justify-between">

    <h1 class="logo">
      <a href="{{ route('home', ['lang' => app()->getLocale()]) }}">
        <img src="{{ asset('img/logo-nusa.png') }}" alt="" class="">
      </a>
    </h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    <div class="right-header">
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ (request()->segment(2) == '') ? 'active' : '' }}" href="{{ route('home', ['lang' => app()->getLocale()]) }}">@lang('messages.home')</a></li>
          <li><a class="nav-link scrollto {{ (request()->segment(2) == 'about') ? 'active' : '' }}" href="{{ route('about', ['lang' => app()->getLocale()]) }}">@lang('messages.about_us')</a></li>
          <li><a class="nav-link scrollto {{ (request()->segment(2) == 'practice_area') ? 'active' : '' }}" href="{{ route('practice_area', ['lang' => app()->getLocale()]) }}">@lang('messages.practice_area')</a></li>
          <li><a class="nav-link scrollto {{ (request()->segment(2) == 'principal_lawyer') ? 'active' : '' }}" href="{{ route('principal_lawyer', ['lang' => app()->getLocale()]) }}">@lang('messages.principal_lawyer')</a></li>
          <!-- <li><a class="nav-link scrollto {{ (request()->segment(2) == 'news') ? 'active' : '' }}" href="{{ route('news', ['lang' => app()->getLocale()]) }}">@lang('messages.news')</a></li> -->
          <li class="dropdown"><a href="#" class="{{ (request()->segment(2) == 'news' || request()->segment(2) == 'update') ? 'active' : '' }}"><span>@lang('messages.news_update')</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('news', ['lang' => app()->getLocale()]) }}">@lang('messages.just_news')</a></li>
              <li><a href="{{ route('update', ['lang' => app()->getLocale()]) }}">@lang('messages.just_update')</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto {{ (request()->segment(2) == 'career' ) ? 'active' : '' }}" href="{{ route('career', ['lang' => app()->getLocale()]) }}">@lang('messages.career')</a></li>
          <li><a class="nav-link scrollto {{ (request()->segment(2) == 'contact' ) ? 'active' : '' }}" href="{{ route('contact', ['lang' => app()->getLocale()]) }}">@lang('messages.contact_us')</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div class="switch my-auto">
        <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox" {{ (request()->segment(1) == 'id' ) ? 'checked' : '' }} onchange="toggleLanguage()">
        <label for="language-toggle" class="language-to"></label>
        @if(request()->segment(1) == 'en')
        <span class="on">EN</span>
        <span class="off">ID</span>
        @else
        <span class="off">ID</span>
        <span class="on">EN</span>
        @endif
      </div>
    </div>
  </div>
</header><!-- End Header -->