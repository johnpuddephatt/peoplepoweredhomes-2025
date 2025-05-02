{{--
  Template Name: Register
--}}

@php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      global $wpdb, $wp_hasher;

      $username = sanitize_user($_POST['username']);
      $email = sanitize_email($_POST['email']);
      $password = $_POST['password'];
      $role = 'member_pending';

      $errors = [];

      // Validate input
      if (empty($username) || empty($email) || empty($password)) {
          $errors[] = 'All fields are required.';
      }
      if (!is_email($email)) {
          $errors[] = 'Invalid email format.';
      }
      if (username_exists($username)) {
          $errors[] = 'Username already exists.';
      }
      if (email_exists($email)) {
          $errors[] = 'Email is already in use.';
      }

      if (empty($errors)) {
          $user_id = wp_create_user($username, $password, $email);

          if (!is_wp_error($user_id)) {
              $user = new WP_User($user_id);
              $user->set_role($role);

              $admins = get_users(['role' => 'administrator']);

              // Collect email addresses
              $admin_emails = [];
              foreach ($admins as $admin) {
                  $admin_emails[] = $admin->user_email;
              }

              if (!empty($admin_emails)) {
                  $subject = 'New member registration';
                  $message = str_replace(
                      '[user]',
                      '<a href="' . admin_url('user-edit.php?user_id=' . $user->ID) . '">View this user</a>',
                      get_field('new_registration_email', 'option'),
                  );
                  $headers = ['Content-Type: text/html; charset=UTF-8'];
                  wp_mail($admin_emails, $subject, $message, $headers);

                  wp_redirect(get_field('account_pending_page', 'option'));
              }
          } else {
              $errors[] = $user_id->get_error_message();
          }
      }

      // Display errors
  }
@endphp

@extends('layouts.app')

@section('content')

  @include('partials.page-header', ['title' => null])

  <div class="card mx-auto max-w-2xl">

    <div class="p-16">
      <h2 class="title">{{ $title }}</h2>

      <div class="mb-6 bg-primary bg-opacity-20 p-6">
        If you’re a member of a group we’re working with but haven’t created a login yet, <a href="/register"
          class="underline">register an account</a>.
      </div>

      @if (!empty($errors))
        @foreach ($errors as $error)
          <p style="bg-red-700 mb-4 text-white p-4">{{ $error }}</p>
        @endforeach
      @endif

      <form method="post">

        <div class="field">
          <label for="username" class="label">Username</label>
          <div class="control">
            <input class="input" type="text" name="username" required id="username" placeholder="Username">
          </div>
        </div>

        <div class="field">
          <label for="email" class="label">Email</label>
          <div class="control">
            <input class="input" type="text" name="email" required id="email" placeholder="Email">
          </div>
        </div>

        <div class="field">
          <label for="password" class="label">Password</label>
          <div class="control">
            <input class="input" type="password" required name="password" id="password">
          </div>
        </div>

        <div class="control">
          <button type="submit" class="button is-link">Register</button>
        </div>
      </form>

    </div>
  @endsection
