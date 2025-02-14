<div class="page-header">

  <div class="container">

    <nav class="page-back">
      <a href="/news/" class="page--back">&larr; Back to all news</a>
    </nav>

    <h1 class="title">{!! $title !!}</h1>
    <div class="post--date">{{ date(get_option( 'date_format' ), strtotime($post->date))   }}</div>

  </div>

</div>
