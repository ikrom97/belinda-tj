@extends('layouts.master')

@section('title', 'Карьера')

@section('content')
  <main class="carrier-page">
    <section class="carrier-page__info">
      <div class="sample-wrapper sample-wrapper--dark">
        <div class="content" data-content="carrier-product">{!! $data['carrier-product'] !!}</div>
      </div>
    </section>

    <section class="vacancies">
      <h2 class="vacancies__title sample-title" data-text="carrier-vacancies-title">{{ $data['carrier-vacancies-title'] }}</h2>

      @if ($data['vacancies']->count() == 0)
        <p class="no-vacancy">Текущих вакансий нет, но вы можете отправить нам свое резюме: <a class="no-vacancy__link">hr@belinda.uk.com</a></p>
        <dl data-type="accordion">
          <dt></dt>
        </dl>
      @else
        <dl class="accordion" data-type="accordion">
          @foreach ($data['vacancies'] as $vacancy)
            <dt class="accordion__head accordion__head--hidden">
              <div class="sample-description-term">
                <p class="sample-description-term__title">{{ $vacancy->title }}</p>
                <div class="sample-description-term__subtitle content" style="flex-grow: 1">{!! $vacancy->description !!}</div>
                <button class="sample-description-term__button dropdown-icon">Посмотреть</button>
              </div>
            </dt>
            <dd class="accordion__body">
              <div class="sample-description-definition content">{!! $vacancy->description !!}</div>
              <a class="vacancies__link red-link" href="{{ route('carrier.apply', $vacancy->id) }}">Подать сейчас</a>
            </dd>
          @endforeach
        </dl>
      @endif
    </section>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/carrier.js') }}" type="module"></script>
@endsection
