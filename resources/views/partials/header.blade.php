
<div class="navbar--wrapper">
  <nav class="navbar navbar__secondary" role="navigation" aria-label="secondary navigation">
    <div class="container !items-center">
      <div class="navbar-brand">
        <a class="navbar-item" href="{{ home_url('/') }}">
          <img width="75" src="{{ get_theme_mod('site_logo') }}" />
          <span>{{ get_bloginfo('name', 'display') }}</span>
        </a>
        <div class="navbar-burger burger" data-target="navMenu-primary">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      @if (has_nav_menu('secondary_navigation'))
      {!! wp_nav_menu($secondary_navigation) !!}
      @endif

      <nav class="navbar-menu _social">

        @if(get_theme_mod('facebook'))
        <a title="Facebook" class="navbar-item social-icon" href="//facebook.com/{{ get_theme_mod('facebook') }}"
          target="_blank">
          @include('images.facebook')
        </a>
        @endif

        @if(get_theme_mod('twitter'))
        <a title="Twitter" class="navbar-item social-icon" href="//twitter.com/{{ get_theme_mod('twitter') }}"
          target="_blank">
          @include('images.twitter')
        </a>
        @endif

        @if(get_theme_mod('youtube'))
        <a title="YouTube" class="navbar-item social-icon" href="{{ get_theme_mod('twitter') }}" target="_blank">
          @include('images.youtube')
        </a>
        @endif

        @if(get_theme_mod('instagram'))
        <a title="Instagram" class="navbar-item social-icon" href="//www.instagram.com/{{ get_theme_mod('instagram') }}"
          target="_blank">
          @include('images.instagram')
        </a>
        @endif

        @if(get_theme_mod('linkedin'))
        <a title="LinkedIn" class="navbar-item social-icon" href="{{ get_theme_mod('linkedin') }}" target="_blank">
          @include('images.linkedin')
        </a>
        @endif

      </nav>
      <div class="ml-8 font-bold lowercase">
      @if(is_user_logged_in())
      
      <a href="{{ wp_logout_url() }}" >Logout</a>
      @else
     
      <a href="{{ get_field('login_page', 'option') }}" >Login</a>
              @endif
              </div>

    </div>

  </nav>

  @if($primary_navigation)
  <nav class="navbar navbar__primary" role="navigation" aria-label="primary navigation">
    <div class="container">
      <div id="navMenu-primary" class="navbar-menu">
        <div class="navbar-start">
          <div class="navbar-item">
            <a class="navbar-link is-arrowless" href="/">
              Home
            </a>
          </div>

          @foreach( $primary_navigation as $section )
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="/section/{{ $section->slug }}/">
              {{$section->name}}
            </a>
            <div class="navbar-dropdown">
              @foreach($section->pages as $page)
              <a class="navbar-item " href="{{$page->url}}">
                {{$page->post_title}}
              </a>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>
        @if (has_nav_menu('secondary_navigation'))
        {!! wp_nav_menu($secondary_navigation) !!}
        @endif
      </div>
    </div>
  </nav>
  @endif

</div>