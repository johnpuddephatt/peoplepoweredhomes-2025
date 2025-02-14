@extends('layouts.app')

@section('content')

<section class="hero is-primary section section--hero section--hero--home">
  <div class="hero-body">
    <div class="container">
      <div class="section--hero--inner">
        <div class="hero-image">
          @include('images.cityscape')
        </div>
        <div class="hero-text">
          <h1 class="title">{{ get_bloginfo('description') }}</h1>
          {{-- <a href="#work" class="button button--hero">Find out how</a> --}}
        </div>
      </div>
    </div>
  </div>
</section>

{{-- <section class="section section--work" id="work">
  <div class="container container__sections">
    <h2 class="title _large">What we do</h2>
    <p class="subtitle has-text-centered">Find out more about our work</p>
    <div class="home__sections">
    @foreach($sections as $section)
      <a href="/section/{{$section->slug}}" class="box home__section">
        <img src="{{ $section->icon }}" />
        <h3>{{ $section->name }}</h3>
        <p>{{ $section->description }}</p>

        <span class="button is-small">Read more</span>
      </a>
    @endforeach
  </div>
</section> --}}


<section class="section section--blog">
  <div class="container">
    <h2 class="title _large has-text-centered">News and updates</h2>
    <p class="subtitle has-text-centered">The latest from People Powered Homes</p>

    <div class="container--blog">
      @foreach($posts as $post)
        <a href="{!! $post->link !!}" class="blog--item box" data-aos="fade-up" data-aos-ratio=".25" data-aos-delay="≤≤ forloop.index | minus: 1 |  times:200 ≥≥">
          <div class="blog--item--image">
            {!! $post->thumbnail !!}
          </div>
          <div class="blog--item--date">{{ date(get_option( 'date_format' ), strtotime($post->post_date))   }}</div>
          <h3 class="blog--item--title">{{ $post->post_title }}</h3>
          <p class="blog--item--excerpt">{!! $post->post_excerpt !!}</p>
          <div class="blog--item--footer">
            <span class="blog--item--button button is-small">Read more</span>
          </div>
        </a>
      @endforeach
    </div>
    <div class="container container__centered">
      <a href="/news/" class="blog--view-all">see all news and updates</a>
    </div>
  </div>
</section>

<section class="section section--about">
  <div class="container container__desktop">
    @include('images.easel')
    <div class="about-text">
      <h3 class="title _large">We are a Community Led Housing consultancy service working across the country.</h3>
      <p>We provide advice and development support to the sector nationwide, and an enabler hub covering West and South Yorkshire.</p>
    </div>
  </div>
</section>

<section class="section section-contact">
  <div class="container container__desktop">

    <h2 class="title has-text-align-center is-size-2">Contact us</h2>

    <script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
    <form method="POST" style="max-width: 480px;" action="https://form.letsdance.agency/57nQPDw4" class="contact-form">
    <input type="text" name="_honey" value="" style="display: none;">
    <input type="hidden" name="_subject" value="Message from leedscommunityhomes.org.uk">
    <div class="field">
      <label class="label">Email</label>
      <div class="control">
        <input class="input" type="email" name="_replyto" placeholder="Your email" required="">
      </div>
    </div>

    <div class="field">
      <label class="label">Name</label>
      <div class="control">
        <input class="input" type="text" name="name" placeholder="Your name" required="">
      </div>
    </div>
    <div class="field">
      <label class="label">Message</label>
      <div class="control">
        <textarea class="textarea" rows="4" name="message" placeholder="Your message" required=""></textarea>
      </div>
    </div>
    <div class="field">
    <div class="g-recaptcha" data-sitekey="6LdNn1AUAAAAAA-VLy7CCzufqQi7EhPyoWQwcHIM"></div>
    </div>

    <div class="field is-grouped">
      <div class="control">
        <button type="submit" class="button is-link is-large">Send</button>
      </div>

    </div>
    </form>


    <script>
    if (document.forms[0] && window.FormData) {

        var message = new Object();
        message.loading = 'Loading...';
        message.success = 'Thank you. Message received!';
        message.failure = 'Whoops! There was a problem sending your message.';

        var form = document.forms[0];
        var formAction = form.getAttribute("action");
        var statusMessage = document.createElement('div');
        statusMessage.className = 'status';

        // Set up the AJAX request
        var request = new XMLHttpRequest();
        request.open('POST', formAction, true);
        request.setRequestHeader('accept', 'application/json');

        // Listen for the form being submitted
        form.addEventListener('submit', function(evt) {

            evt.preventDefault();
          form.insertAdjacentElement('beforeend', statusMessage);

            // Create a new FormData object passing in the form's key value pairs (that was easy!)
            var formData = new FormData(form);

            // Send the formData
            request.send(formData);

            // Watch for changes to request.readyState and update the statusMessage accordingly
            request.onreadystatechange = function () {

            // <4 =  waiting on response from server
            if (request.readyState < 4)
                statusMessage.innerHTML = message.loading;

            // 4 = Response from server has been completely loaded.
            else if (request.readyState === 4) {

                // 200 - 299 = successful
                if (request.status == 200 && request.status < 300)
                    statusMessage.innerHTML = message.success;
                else
                  statusMessage.innerHTML = message.failure;
            }
            }
        });

    }
    </script>
  </div>
</div>
{{-- <section class="section section--newsletter">
  <div class="container container__desktop">
    <img class="newsletter-image" src="@asset('images/hub-announcement.svg')" />
    <div class="newsletter-text">
      <h3 class="title _large">Follow our progress</h3>
      <p>We want to help create 1000 permanently affordable homes. Sign up to our newsletter to stay up to date.</p>
      <form id="mc-embedded-subscribe-form" class="newsletter-signup--form" action="https://*.us9.list-manage.com/subscribe/post?u=93ce5fb1f178a607501f44054&amp;amp;id=5f8363d512" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank" _lpchecked="1">
        <label class="sr-only" for="mce-EMAIL">Email address</label>
        <input class="input" id="mce-EMAIL" type="text" name="EMAIL" placeholder="enter your email address">
        <button class="button is-bordered" id="mc-embedded-subscribe" name="subscribe" type="submit">Subscribe</button>
      </form>
    </div>

  </div>
</section> --}}
{{--
<section class="section section--blog">
  <div class="container">
    <h2 class="title _large has-text-centered">News and updates</h2>
    <p class="subtitle has-text-centered">The latest from Leeds Community Homes</p>

    <div class="container--blog">
      @foreach($posts as $post)
        <a href="{!! $post->link !!}" class="blog--item box" data-aos="fade-up" data-aos-ratio=".25" data-aos-delay="≤≤ forloop.index | minus: 1 |  times:200 ≥≥">
          <div class="blog--item--image">
            {!! $post->thumbnail !!}
          </div>
          <div class="blog--item--date">{{ date(get_option( 'date_format' ), strtotime($post->post_date))   }}</div>
          <h3 class="blog--item--title">{{ $post->post_title }}</h3>
          <p class="blog--item--excerpt">{!! $post->post_excerpt !!}</p>
          <div class="blog--item--footer">
            <span class="blog--item--button button is-small">Read more</span>
          </div>
        </a>
      @endforeach
    </div>
    <div class="container container__centered">
      <a href="/news/" class="blog--view-all">see all news and updates</a>
    </div>
  </div>
</section>

<section class="section section--why">
  <div class="container container__tablet">
    <h2 class="title _large has-text-centered">Why community-led housing matters</h2>
    <div class="container--why">
      <div class="why--item">
        <div class="why--item--icon">
          @include('images.lch-icon-affordability2')
        </div>
        <div class="why--item--text" data-aos="fade-left" data-aos-ratio=".75">
          @include('images.dash-stripe')
          <h3 class="title">Affordability</h3>
          <p>As a Community Land Trust, affordability is what we’re all about – our aim is to create housing that’s affordable now, and for future generations too.</p>
        </div>
      </div>
      <div class="why--item">
        <div class="why--item--icon">
          @include('images.lch-icon-sustainability')
        </div>
        <div class="why--item--text" data-aos="fade-right" data-aos-ratio=".75">
          @include('images.dash-stripe')
          <h3 class="title">Sustainability</h3>
          <p>Building and renovating homes as sustainably as possible is good for the people who live in the homes, good for Leeds, and good for the planet.</p>
        </div>
      </div>
      <div class="why--item">
        <div class="why--item--icon">
          @include('images.lch-icon-creativity')
        </div>
        <div class="why--item--text" data-aos="fade-left" data-aos-ratio=".75">
          @include('images.dash-stripe')
          <h3 class="title">Diversity</h3>
          <p>We work closely with communities to develop homes that are right for them, favouring creativity and innovation over one-size fits all.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--supporters">
  <div class="container">
    <h2 class="title _large has-text-centered">Why people are supporting us</h2>
    <div class="container--supporters">
      <div class="supporters--item" data-aos="fade-up" data-aos-ratio=".25">
        <div class="supporters--item--icon">
          <img src="@asset('images/supporters-helen.jpg')" />
        </div>
        <div class="supporters--item--text">
          <h3 class="supporters--item--title">Helen</h3>
          <p class="supporters--item--quote">This is all about making our money work in Leeds, for Leeds</p>
        </div>
        <a target="_blank" href="https://vimeo.com/193352770" class="supporters--video-button">Watch Helen’s video</a>
      </div>
      <div class="supporters--item" data-aos="fade-up" data-aos-ratio=".25" data-aos-delay="200">
        <div class="supporters--item--icon">
          <img src="@asset('images/supporters-martin.jpg')" />
        </div>
        <div class="supporters--item--text">
          <h3 class="supporters--item--title">Martin</h3>
          <p class="supporters--item--quote">Anything we can do to improve affordablity is a good thing</p>
        </div>
        <a target="_blank" href="https://vimeo.com/193350440" class="supporters--video-button">Watch Martin’s video</a>
      </div>
      <div class="supporters--item" data-aos="fade-up" data-aos-ratio=".25" data-aos-delay="400">
        <div class="supporters--item--icon">
          <img src="@asset('images/supporters-ann.jpg')" />
        </div>
        <div class="supporters--item--text">
          <h3 class="supporters--item--title">Ann</h3>
          <p class="supporters--item--quote">Affordable housing is inaccessible to so many people</p>
        </div>
        <a target="_blank" href="https://vimeo.com/193349572" class="supporters--video-button">Watch Ann’s video</a>
      </div>
    </div>
  </div>
</section>

<section class="section section--progress">
  <div class="container">
    <h2 class="title _large has-text-centered">Our progress so far</h2>
    <div class="container--progress">
      <div class="progress--item">
        <div class="progress--item--figure"><span id="figure-members">282</span></div>
        <div class="progress--item--text">members</div>
      </div>
      <div class="progress--item">
        <div class="progress--item--figure">£<span id="figure-money">360</span>k</div>
        <div class="progress--item--text">raised</div>
      </div>
      <div class="progress--item">
        <div class="progress--item--figure"><span id="figure-homes">16</span></div>
        <div class="progress--item--text">homes planned</div>
      </div>
    </div>
    @include('images.lch-row')
  </div>
</section> --}}

@endsection
