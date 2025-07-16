@extends('layouts.main')

@section('title', __('impressum_title'))
@section('description', __('impressum_description'))
@section('keywords', 'impressum, company information, 3M Services, legal information, بيانات النشر, Impressum')
@section('og_title', __('impressum_title'))
@section('og_description', __('impressum_description'))
@section('og_type', 'website')
@section('twitter_title', __('impressum_title'))
@section('twitter_description', __('impressum_description'))

@section('additional_meta')
<!-- Structured Data for Impressum Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "3M Services GmbH",
  "url": "{{ url('/') }}",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Laaker Straße 67",
    "addressLocality": "Duisburg",
    "postalCode": "47137",
    "addressCountry": "DE"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+4915560233302",
    "email": "contact@3mserv.com",
    "contactType": "customer service"
  }
}
</script>

<!-- Structured Data for Impressum Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ __('impressum_title') }}",
  "description": "{{ __('impressum_description') }}",
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
        "name": "{{ __('impressum') }}",
        "item": "{{ url()->current() }}"
      }
    ]
  }
}
</script>
@endsection

@section('content')
<section class="py-8 bg-[#f1f1f1] text-black">
    <div class="container">
        <h1 class="text-3xl font-bold mb-8 text-center">{{ __('impressum') }}</h1>
        
        <div class="px-4 py-10">
          <!-- Contact Info -->
          <div class="space-y-2 mb-6">
            <h2 class="text-2xl font-semibold">{{ __('impressum.contact_title') }}</h2>
            <p><span class="font-semibold">{{ __('impressum.mobile') }}:</span> +4915560233302</p>
            <p><span class="font-semibold">{{ __('impressum.phone') }}:</span> +4920334975316</p>
            <p><span class="font-semibold">{{ __('impressum.email') }}:</span> info@3mserv.com</p>
            <p><span class="font-semibold">{{ __('impressum.website') }}:</span> www.3mserv.com</p>
            <p><span class="font-semibold">{{ __('impressum.vat_id') }}:</span> 26607841390</p>
            <p><span class="font-semibold">{{ __('impressum.tax_number') }}:</span> 107/253/53280</p>
          </div>

          <div class="space-y-2">
            <!-- <h1 class="text-3xl font-bold">{{ __('impressum.title') }}</h1> -->
            <p class="text-gray-700">{{ __('impressum.company') }}</p>
            <p class="text-gray-700">{{ __('impressum.owner') }}</p>
            <p class="text-gray-700">{{ __('impressum.address_line1') }}</p>
            <p class="text-gray-700">{{ __('impressum.address_line2') }}</p>
          </div>
        </div>
    </div>
</section>
@endsection