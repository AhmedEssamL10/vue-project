@extends('layouts.main')

@section('title', __('privacy_title'))
@section('description', __('privacy_description'))
@section('keywords', 'privacy policy, data protection, 3M Services, personal data, سياسة الخصوصية, Datenschutzerklärung')
@section('og_title', __('privacy_title'))
@section('og_description', __('privacy_description'))
@section('og_type', 'website')
@section('twitter_title', __('privacy_title'))
@section('twitter_description', __('privacy_description'))

@section('additional_meta')
<!-- Structured Data for Privacy Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ __('privacy_title') }}",
  "description": "{{ __('privacy_description') }}",
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
        "name": "{{ __('privacyPolicy') }}",
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
        <h1 class="text-3xl font-bold mb-8 text-center">{{ __('privacyPolicy') }}</h1>
        
        <div class="px-4 py-10 space-y-10">

            <!-- Introduction -->
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ __('privacy.intro_title') }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ __('privacy.intro_text') }}</p>
            </div>

            <!-- Controller Info -->
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ __('privacy.controller_title') }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ __('privacy.controller_text') }}</p>
            </div>

            <!-- Data Processing -->
            <div>
                <h2 class="text-2xl font-semibold mb-4">{{ __('privacy.data_processing_title') }}</h2>

                <div class="ps-4 mb-6">
                    <h3 class="text-xl font-medium mb-1">{{ __('privacy.visit_title') }}</h3>
                    <p class="text-gray-700 leading-relaxed">{{ __('privacy.visit_text') }}</p>
                </div>

                <div class="ps-4 mb-6">
                    <h3 class="text-xl font-medium mb-1">{{ __('privacy.contact_title') }}</h3>
                    <p class="text-gray-700 leading-relaxed">{{ __('privacy.contact_text') }}</p>
                </div>

                <div class="ps-4">
                    <h3 class="text-xl font-medium mb-1">{{ __('privacy.contract_title') }}</h3>
                    <p class="text-gray-700 leading-relaxed">{{ __('privacy.contract_text') }}</p>
                </div>
            </div>

            <!-- Cookies -->
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ __('privacy.cookies_title') }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ __('privacy.cookies_text') }}</p>
            </div>

            <!-- Disclosure -->
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ __('privacy.disclosure_title') }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ __('privacy.disclosure_text') }}</p>
            </div>

            <!-- Retention -->
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ __('privacy.retention_title') }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ __('privacy.retention_text') }}</p>
            </div>

            <!-- Rights -->
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ __('privacy.rights_title') }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ __('privacy.rights_text') }}</p>
            </div>

            <!-- Security -->
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ __('privacy.security_title') }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ __('privacy.security_text') }}</p>
            </div>

            <!-- Changes -->
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ __('privacy.changes_title') }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ __('privacy.changes_text') }}</p>
            </div>

            <!-- Contact Info -->
            <!-- <div class="space-y-2">
                <p><span class="font-semibold">{{ __('privacy.contact_phone') }}:</span> +4920334975316</p>
                <p><span class="font-semibold">{{ __('privacy.contact_email') }}:</span> info@3mserv.com</p>
                <p><span class="font-semibold">{{ __('privacy.contact_website') }}:</span> www.3mserv.com</p>
                <p><span class="font-semibold">{{ __('privacy.contact_vat_id') }}:</span> 26607841390</p>
                <p><span class="font-semibold">{{ __('privacy.contact_tax_number') }}:</span> 107/253/53280</p>
            </div> -->

        </div>

    </div>

    </div>
</section>  
@endsection