<div class="container min-h-screen container__tablet {{ $wide??false  ? '!max-w-5xl' : '' }}">




  <div class="content">

    @while(have_posts()) @php the_post() @endphp
{!! the_content() !!}
@endwhile
  </div>


</div>
