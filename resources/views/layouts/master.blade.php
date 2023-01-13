<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta property="og:site_name" content="Belinda Laboratories">
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image">

  @hasSection('meta-tags')
    @yield('meta-tags')
  @else
    <meta name="description" content="Здоровье &#8212; вечная ценность ПОДРОБНЕЕ Индивидуальныйподбор продукции НашиПрепараты Полезныестатьи О компании Компания «Belinda laboratories», основанная в 2001, является молодой в мире международной фармацевтики, но успешно и активно развивается, с каждым днем завоевывая доверие и уважение своих партнеров, а также привлекая новых. Главной целью и стратегией компании является разработка новых и эффективных методов лечения различных заболеваний. &hellip; Читать далее «Главная»">
    <meta property="og:description" content="Здоровье &#8212; вечная ценность ПОДРОБНЕЕ Индивидуальныйподбор продукции НашиПрепараты Полезныестатьи О компании Компания «Belinda laboratories», основанная в 2001, является молодой в мире международной фармацевтики, но успешно и активно развивается, с каждым днем завоевывая доверие и уважение своих партнеров, а также привлекая новых. Главной целью и стратегией компании является разработка новых и эффективных методов лечения различных заболеваний. &hellip; Читать далее «Главная»">
    <meta property="og:title" content="Belinda Laboratories" />
    <meta property="og:image" content="{{ asset('favicon/180x180.png') }}">
    <meta name="twitter:title" content="Belinda Laboratories">
    <meta name="twitter:image" content="{{ asset('favicon/180x180.png') }}">
  @endif

  <title>@yield('title') - Belinda Laboratories</title>

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicon/icon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicon/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

  @if (session('editMode'))
    <link rel="stylesheet" href="{{ asset('simditor/simditor.css') }}">
  @endif
  <link rel="stylesheet" href="{{ asset('glide/glide.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body class="{{ $route == 'products.attention' ? 'attention' : '' }} {{ $route == 'carrier.apply' ? 'apply' : '' }}">
  <div class="container">
    @if (session()->has('loggedUser'))
      @include('dashboard.layouts.dashboard')
    @endif
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  @if (session('editMode'))
    <script src="{{ asset('simditor/module.js') }}"></script>
    <script src="{{ asset('simditor/hotkeys.js') }}"></script>
    <script src="{{ asset('simditor/uploader.js') }}"></script>
    <script src="{{ asset('simditor/simditor.js') }}"></script>
    <script src="{{ asset('js/content-manager.js') }}" type="module"></script>
    <script src="{{ asset('js/text-manager.js') }}" type="module"></script>
  @endif
  <script src="{{ asset('pristine/pristine.min.js') }}"></script>
  <script src="{{ asset('glide/glide.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}" type="module"></script>
  @yield('scripts')
  @if (session()->has('loggedUser'))
    <script src="{{ asset('js/admin.js') }}" type="module"></script>
  @endif
</body>

</html>
