{{--
  Template Name: Login
--}}

@extends('layouts.app')

@section('content')
  <div class="container container--wide">
    <div class="card !grid grid-cols-2">
      {{ the_post_thumbnail('4x3_xl', ['class' => 'h-full object-cover']) }}

      <div class="p-16">
        <h2 class="title">{!! $title !!}</h2>

        <div class="bg-teal-100 content mb-6 p-6">

          {!! str_replace(
              '[register]',
              "<a href='" . get_field('registration_page', 'option') . "'>register an account</a>",
              get_field('login_page_message', 'option'),
          ) !!}

        </div>
        <form action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="post">

          <div class="field">
            <label for="user_login" class="label">Username</label>
            <div class="control">
              <input class="input" type="text" name="log" required id="user_login"
                placeholder="Username or Email">
            </div>

            <div class="field mt-4">
              <label for="user_pass" class="label">Password</label>
              <div class="control">
                <input class="input" type="password" required name="pwd" id="user_pass">
              </div>
            </div>

            <input type="hidden" name="redirect_to" value="{{ get_field('redirect_after_login_page', 'option') }}">

            <div class="control mt-4 flex items-center justify-between">
              <a class="underline" href="{{ esc_url(wp_lostpassword_url()) }}">Lost your password?</a>
              <button type="submit" class="button is-link">Log in</button>

            </div>

            <input type="hidden" name="testcookie" value="1">
        </form>
      </div>
    </div>
  @endsection
