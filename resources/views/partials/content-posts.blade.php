<div class="container container__desktop">
  <div class="content">
    @foreach($posts as $post)
      <a href="{!! $post->url !!}" class="card card__pages-list-item">
        <div class="card-image">
          {!! $post->thumbnail !!}
        </div>
        <div class="card-content">
          <h3 class="title">{!! $post->post_title !!}</h3>
          <p class="excerpt">{!! $post->excerpt !!}</p>
          <p class="read-more">Read more&nbsp;&rarr;</p>
        </div>
      </a>
    @endforeach
  </div>
</div>
