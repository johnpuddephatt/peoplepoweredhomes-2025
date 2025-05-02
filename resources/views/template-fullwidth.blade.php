{{--
  Template Name: Fullwidth Template
--}}
@extends('layouts.app')

@section('content')
    @include('partials.page-header-wide')
    @include('partials.content-page', ['wide' => true])
    @include('partials.related-pages', ['wide' => true])
@endsection
