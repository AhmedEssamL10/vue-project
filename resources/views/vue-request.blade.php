@extends('layouts.main')

@section('title', __('request_title'))
@section('description', __('request_description'))
@section('keywords', __('request_keywords'))
@section('og_title', __('request_title'))
@section('og_description', __('request_description'))
@section('og_type', 'website')
@section('twitter_title', __('request_title'))
@section('twitter_description', __('request_description'))

@section('additional_meta')
<!-- Structured Data for Request Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ __('request_title') }}",
  "description": "{{ __('request_description') }}",
  "url": "{{ url()->current() }}",
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "{{ __('home') }}",
        "item": "{{ url('/') }}"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "{{ __('request') }}",
        "item": "{{ url()->current() }}"
      }
    ]
  }
}
</script>
@endsection

@section('content')
    <div id="app" data-user="{{ auth()->check() ? json_encode(auth()->user()) : 'null' }}" data-loginurl="{{ route('auth.login', app()->getLocale()) }}"></div>
    @vite('resources/js/main.js')
@endsection