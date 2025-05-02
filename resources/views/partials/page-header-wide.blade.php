<div class="page-header-wide">

  <div class="container pt-8  !max-w-6xl">

    @if($page->section ?? false)
      <nav class="page-back">
        <a href="/section/{{$page->section->slug}}" class="page--back">&larr; Back to {{ $page->section->name }}</a>
      </nav>
    @endif

    @if(isset(get_queried_object()->post_type) && get_queried_object()->post_type == 'forum' )
    <nav class="page-back">
            <a href="/forums" class="page--back">&larr; Back to Forums</a>
          </nav>
    @endif

        @if(isset(get_queried_object()->post_type) && get_queried_object()->post_type == 'topic' )
    <nav class="page-back">

            <a href="{{ get_permalink(get_queried_object()->post_parent) }}" class="page--back">&larr; Back to {{ get_the_title(get_queried_object()->post_parent) }}</a>
          </nav>

          
    @endif


  @if($page->thumbnail)
    <div class="page--thumbnail mt-4 mb-8">
      {!! $page->thumbnail !!}
    </div>
  @endif


    @if($page->icon)
      <img class="page--icon" src="{!! $page->icon !!}">
    @endif
    

    <h1 class="title text-4xl font-bold text-center !mb-16">{!! $title !!}</h1>

    <div class="page-header--description">
      @if($page->excerpt ?? false)
        <p class="excerpt">{!! $page->excerpt !!}</p>
      @elseif($page->description ?? false)
           <p class="excerpt"> {!! $page->description !!}</p>
      @elseif(isset(get_queried_object()->post_type) && get_queried_object()->post_type == 'forum' )
  <p class="excerpt"> {{ get_queried_object()->post_content }}  </p>
      @endif
    </div>

  </div>

</div>
