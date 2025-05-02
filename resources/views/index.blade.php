@extends('layouts.app')

@section('content')
  <svg class="absolute h-0 w-0 overflow-hidden">
    <clipPath id="clip-oval" clipPathUnits="objectBoundingBox">
      <path
        d="
                                                                                                                                        M0.998,1 C0.999,0.974,1,0.948,1,0.921 C1,0.412,0.776,0,0.5,0 S0,0.412,0,0.921 C0,0.948,0.001,0.974,0.002,1 H0.998">
      </path>
    </clipPath>
  </svg>

  <section class="align-stretch section flex flex-col justify-between">
    <div class="">
      <div class="container container_wide">
        <div class="flex flex-col-reverse gap-16 md:flex-row md:items-center md:justify-center md:pt-24">
          <div class="relative order-2 mx-16 md:mx-0 md:basis-1/2">

            <svg xmlns="http://www.w3.org/2000/svg" class="absolute -top-4 left-0 h-36 w-36" viewBox="0 0 83.57 83.57">
              <circle cx="41.79" cy="41.79" r="40.84" fill="#64d7ce" stroke="#000" stroke-linejoin="round"
                stroke-width="1.9" />
            </svg>

            {!! $hero->image !!}

            <svg xmlns="http://www.w3.org/2000/svg" class="absolute -bottom-4 -left-12 w-[calc(100%+6rem)] max-w-none"
              viewBox="0 0 320.49 204.13">
              <defs>
                <style>
                  .dj387dfh3__cls-1 {
                    fill: #fff
                  }

                  .dj387dfh3__cls-1,
                  .dj387dfh3__cls-3 {
                    stroke: #000
                  }

                  .dj387dfh3__cls-1,
                  .dj387dfh3__cls-3,
                  .dj387dfh3__cls-4 {
                    stroke-linecap: round;
                    stroke-linejoin: round;
                    stroke-width: 1.9px
                  }

                  .dj387dfh3__cls-3,
                  .dj387dfh3__cls-4 {
                    fill: none
                  }

                  .dj387dfh3__cls-4 {
                    stroke: #050505
                  }
                </style>
              </defs>
              <path d="M24.02 118.75 24.02 122.15" class="dj387dfh3__cls-3" />
              <path d="M24.02 127.97 24.02 131.36" class="dj387dfh3__cls-3" />
              <path d="M30.33 125.06 26.93 125.06" class="dj387dfh3__cls-3" />
              <path d="M21.11 125.06 17.72 125.06" class="dj387dfh3__cls-3" />
              <path d="M28.37 129.59 25.92 127.14" class="dj387dfh3__cls-3" />
              <path d="M21.83 123.05 19.38 120.6" class="dj387dfh3__cls-3" />
              <path d="M19.38 129.59 21.83 127.14" class="dj387dfh3__cls-3" />
              <path d="M25.92 123.05 28.37 120.6" class="dj387dfh3__cls-3" />
              <path d="M250.58 44.81s3.7-.7 3.8-4.7" class="dj387dfh3__cls-4" />
              <path d="M258.18 44.81s-3.7-.7-3.8-4.7M258.18 44.81s-3.7.7-3.8 4.7" class="dj387dfh3__cls-4" />
              <path d="M250.58 44.81s3.7.7 3.8 4.7" class="dj387dfh3__cls-4" />
              <path d="M158.26 33.21 158.26 36.61" class="dj387dfh3__cls-3" />
              <path d="M158.26 42.43 158.26 45.82" class="dj387dfh3__cls-3" />
              <path d="M164.57 39.52 161.18 39.52" class="dj387dfh3__cls-3" />
              <path d="M155.35 39.52 151.96 39.52" class="dj387dfh3__cls-3" />
              <path d="M162.61 44.05 160.16 41.59" class="dj387dfh3__cls-3" />
              <path d="M156.07 37.51 153.62 35.06" class="dj387dfh3__cls-3" />
              <path d="M153.62 44.05 156.07 41.6" class="dj387dfh3__cls-3" />
              <path d="M160.16 37.51 162.61 35.06" class="dj387dfh3__cls-3" />
              <path
                d="M281.35 85.42h27c0-7.27-4.6-6.87-4.6-6.87 0-12.12-12.61-7.43-12.61-7.43-12.35-21.87-34.53-7.09-34.58 4.52-8.68-9.07-17.52-.95-17.13 4.52-4.63-6.56-13.85-.26-11.31 5.5-8.72-2.26-7.26 6.14-7.26 6.14h27.01"
                class="dj387dfh3__cls-1" />
              <path fill="#fff" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9"
                d="M1.03 192.21s-2.83-30.5 25.38-24.76c.07-15.92 38.98-28.43 45.25 3.08 0 0 29.65-6.9 34.7 21.84l-105.33-.15Z" />
              <path
                d="M214.22 202.97s11.39-48.39 39.59-40.38c.07-22.24 41.05-19.18 37.38 8.33 0 0 23.31-7.91 28.36 32.26l-105.33-.21Z"
                class="dj387dfh3__cls-1" />
              <path
                d="M263.63 203.07s2.02-21.77-18.11-17.68c-.05-11.36-27.82-20.3-32.3 2.2 0 0-21.17-4.93-24.77 15.59l75.18-.11Z"
                class="dj387dfh3__cls-1" />
              <path
                d="M70.76 5.65s3.7-.7 3.8-4.7M78.36 5.65s-3.7-.7-3.8-4.7M78.36 5.65s-3.7.7-3.8 4.7M70.76 5.65s3.7.7 3.8 4.7"
                class="dj387dfh3__cls-4" />
            </svg>

          </div>
          <div class="flex-none md:w-1/2">
            <h1 class="type-xl mb-4">{!! $hero->title !!}</h1>
            <p class="type-md">{!! $hero->content !!}</p>

            @if ($hero->button_url)
              <a href="{!! $hero->button_url !!}" class="button is-bordered mt-8">{!! $hero->button_text ?? 'Find out more' !!}</a>
            @endif
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="section" id="work">

    <div class="container text-center">
      <h2 class="type-lg">What we do</h2>
      <p class="type-md">Find out more about our work</p>
      <div
        class="{{ count($sections) === 4 ? 'xl:grid-cols-4' : 'xl-grid-cols-3' }} mt-6 grid grid-cols-1 gap-8 md:grid-cols-2">
        @foreach ($sections as $section)
          <a href="/section/{{ $section->slug }}" class="rounded bg-white p-6 shadow-xl">

            <img class="mx-auto mb-4 h-auto w-28" src="{{ $section->icon }}" />
            <h3 class="mb-2 text-xl font-black">{{ $section->name }}</h3>
            <p class="mb-6">{{ $section->description }}</p>

            <span class="button is-small !border-primary">Read more</span>
          </a>
        @endforeach
      </div>
  </section>

  {{-- <section class="section">
    <div class="container text-center">
      <h2 class="type-lg">Groups we’ve helped</h2>
      <p class="type-md">See the communities we’re supporting</p>

      <div class="mt-16 grid gap-x-8 md:grid-cols-3">
        @foreach ($groups as $group)
          <a href="/groups/#{{ $group->post_name }}" class="border-b-2 border-b-primary">
            <div class="group--item--image aspect-video bg-primary bg-opacity-20">
              {!! get_the_post_thumbnail($group->ID, 'medium', [
                  'class' => 'w-full aspect-video object-cover',
              ]) !!}
            </div>
            <h3 class="py-2 text-center">{{ $group->post_title }}</h3>
          </a>
        @endforeach

      </div>
  </section> --}}

  <section class="section text-center">
    <div class="container">
      <h2 class="type-lg">News and updates</h2>
      <p class="type-md">The latest from People Powered Homes</p>

      <div class="my-16 flex flex-col gap-8 md:flex-row">
        @foreach ($posts as $post)
          <a href="{!! $post->link !!}"
            class="z-10 flex flex-col overflow-hidden rounded bg-white shadow-xl transition-shadow hover:shadow-2xl md:w-1/3">
            {!! $post->thumbnail !!}
            <div class="flex flex-grow flex-col p-8">

              <div class="mb-2 text-sm font-bold">{{ date(get_option('date_format'), strtotime($post->post_date)) }}
              </div>
              <h3 class="type-md mb-2">{{ $post->post_title }}</h3>
              <p class="mb-6 text-sm">{!! $post->post_excerpt !!}</p>
              <div class="mt-auto text-center">
                <span class="rounded border-2 px-6 py-1 text-sm font-bold">Read more</span>
              </div>
            </div>
          </a>
        @endforeach
      </div>
      <div class="container text-center">
        <a href="/news/" class="font-semibold underline">see all news and updates</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container flex !justify-center gap-12 rounded-3xl bg-primary/30 px-8 py-24">

      <div class="">
        <h2 class="type-lg">Contact us</h2>
        {!! do_shortcode('[contact-form-7 id="9940b5c" title="Contact form 1"]') !!}
      </div>
      <div class="h-96 w-96 overflow-hidden rounded-full border-4 border-black bg-white">
        @include('images.easel')
      </div>
    </div>
  </section>
@endsection
