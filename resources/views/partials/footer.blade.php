<footer class="site-footer">


  <div class="container">
    <div class="footer-left">
      @if(get_theme_mod('phonenumber_humans'))
        <h3>Want to talk? Call us on <a href="tel:{{ get_theme_mod('phonenumber_robots')}}">{{ get_theme_mod('phonenumber_humans') }}</a></h3>
      @else
        <h3>At the heart of the Community Led Housing movement</h3>
      @endif
      @if(get_theme_mod('company_info'))
        <p>{{ get_theme_mod('company_info') }}</p>
      @endif
      @if(get_theme_mod('address'))
        <p>Registered Address {{ get_theme_mod('address') }}</p>
      @endif
    </div>
    <nav class="footer-navigation">
      @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu($footer_navigation) !!}
      @endif
    </nav>

  </div>
</footer>

<div class="secondary-footer">
  <div class="container container--footer-logos container--desktop">
    <a href="http://www.thepowertochange.org.uk/" class="footer-logo-link x-wide">
      <img class="footer-logo" src="@asset('images/funders/powertochange.png')">
    </a>
  </div>
</div>
