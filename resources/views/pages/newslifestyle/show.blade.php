@extends('layouts.master')

@section('title', 'Новости и образ жизни')

@section('content')
  <main class="newslifestyle-show-page">
    <div class="newslifestyle-show">
      <img class="newslifestyle-show__img" src="{{ asset('files/newslifestyles/' . $data['newslifestyle']->img) }}" width="615" height="525">

      <div class="newslifestyle-show__inner">
        <h1 class="newslifestyle-show__title">{{ $data['newslifestyle']->title }}</h1>

        <time
          class="newslifestyle-show__datetime"
          datetime="{{ $data['newslifestyle']->created_at }}">
          {{ $data['newslifestyle']->created_at->format('Y.m.d') }}
        </time>
        <div class="newslifestyle-show__text content">{!! $data['newslifestyle']->description !!}</div>
      </div>
    </div>

    <div class="glide" data-type="carousel-half">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          @foreach ($data['similars'] as $newslifestyle)
            <li class="glide__slide">
              <x-newslifestyle :newslifestyle="$newslifestyle" />
            </li>
          @endforeach
        </ul>
      </div>

      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"></button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"></button>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/newslifestyle.js') }}" type="module"></script>
@endsection
