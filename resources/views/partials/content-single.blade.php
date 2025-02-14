<article class="container container__tablet container--post box">
  @if($post->thumbnail)
    <div class="post--thumbnail">
      {!! $post->thumbnail !!}
    </div>
  @endif
  <div class="content">
    {!! $post->content !!}
  </div>
</article>
