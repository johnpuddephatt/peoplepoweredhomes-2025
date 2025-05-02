@if(count($pages))

  <div class="container container__desktop related-pages {{ $wide??false  ? '!max-w-5xl' : '' }}">
    <div class="related-pages--header">
      <h2 class="title _large">Keep reading</h2>
      <p class="subtitle">More pages in this section</p>
    </div>

    @foreach($pages as $page)
      <a href="{!! $page->link !!}" class="card card__pages-list-item">
        <div class="card-image">
          {!! $page->thumbnail !!}
        </div>
        <div class="card-content">
          <h3 class="title">{!! $page->post_title !!}</h3>
          <p class="excerpt">{!! $page->excerpt !!}</p>
          <p class="read-more">Read more&nbsp;&rarr;</p>
        </div>
      </a>
    @endforeach

  </div>

@endif
