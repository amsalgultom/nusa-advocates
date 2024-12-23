@extends('layouts.auth')
@section('title', 'Nusa-Advocates | 404')

@section('content')
<main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>The page you are looking for doesn't exist.</h2>
        <a class="btn" href="{{ route('home', ['lang' => app()->getLocale()]) }}">Back to home</a>
      </section>

    </div>
  </main><!-- End #main -->
@endsection