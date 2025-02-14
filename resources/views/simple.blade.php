{{--
  Template Name: Simple
--}}


@extends('layouts.app')

@section('content')
<div class="page-header">
</div>

<div class="card p-16 max-w-2xl mx-auto">
 <h1 class="title">{!! $title !!}</h1>

    <div class="page-header--description">
      @if($page->excerpt ?? false)
        <p class="excerpt">{!! $page->excerpt !!}</p>
      @elseif($page->description ?? false)
          {!! $page->description !!}
      @endif
    </div>

<div class="content">

    @while(have_posts()) @php the_post() @endphp
{!! the_content() !!}
@endwhile
  </div>    </div>
@endsection
