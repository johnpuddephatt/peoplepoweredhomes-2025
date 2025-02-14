<div class="container container__desktop">
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
