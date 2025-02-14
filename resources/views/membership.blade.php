{{--
  Template Name: Membership
--}}
@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    @include('partials.content-page')
    @include('partials.related-pages')

    <script>
      "use strict";

      function mailchimp() {

        var form = document.forms[0]; // Get url for mailchimp
        var success = document.querySelector('.success-message');

        var url = form.action.replace('/post?', '/post-json?'); // Add form data to object

        var data = '';
        var inputs = form.querySelectorAll('#form input');

        for (var i = 0; i < inputs.length; i++) {
          data += '&' + inputs[i].name + '=' + encodeURIComponent(inputs[i].value);
        }

        var textareas = form.querySelectorAll('#form textarea');

        for (var i = 0; i < textareas.length; i++) {
          data += '&' + textareas[i].name + '=' + encodeURIComponent(textareas[i].value);
        }

        var selects = form.querySelectorAll('#form select');

        for (var i = 0; i < selects.length; i++) {
          data += '&' + selects[i].name + '=' + encodeURIComponent(selects[i].value);
        } // Create & add post script to the DOM


        var script = document.createElement('script');
        script.src = url + data;
        document.body.appendChild(script); // Callback function

        setTimeout(()=>{
          form.classList.add('is-hidden');
          success.classList.remove('is-hidden');
        }, 1500);

      }

      let submit = document.querySelector('input[type="submit"]');
      submit.addEventListener('click',(e)=>{
        e.preventDefault();
        mailchimp();
      });


      let membership_type_input = document.querySelector('#mce-membertype');
      let organisation_name_field = document.querySelector('.field__org_name');

      membership_type_input.addEventListener('change', ()=>{
        organisation_name_field.classList.toggle('is-hidden');
      });
    </script>
@endsection
