<div class="container min-h-screen container__tablet">



  @if($page->thumbnail)
    <div class="page--thumbnail">
      {!! $page->thumbnail !!}
    </div>
  @endif

  <div class="content">

    @while(have_posts()) @php the_post() @endphp
{!! the_content() !!}
@endwhile
  </div>

  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}

</div>
