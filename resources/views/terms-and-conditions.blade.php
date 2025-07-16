@extends('layouts.main')

@section('title', __('terms_title'))
@section('description', __('terms_description'))
@section('keywords', 'terms and conditions, 3M Services, transport services, moving services, الشروط والأحكام, Allgemeine Geschäftsbedingungen')
@section('og_title', __('terms_title'))
@section('og_description', __('terms_description'))
@section('og_type', 'website')
@section('twitter_title', __('terms_title'))
@section('twitter_description', __('terms_description'))

@section('additional_meta')
<!-- Structured Data for Terms Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ __('terms_title') }}",
  "description": "{{ __('terms_description') }}",
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
        "name": "{{ __('termsAndConditions') }}",
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
        <h1 class="text-3xl font-bold mb-8 text-center">{{ __('termsAndConditions') }}</h1>

        <!-- Section 2 -->
        <article class="mb-8">
            <h2 class="text-2xl font-bold mb-4">{{ __('agb_1_title') }}</h2>
            <div class="space-y-6">
                <div>
                    <h2 class="text-xl font-bold mb-2">
                    {{ __('agb_1_1_title') }}
                    </h2>
                    <p class="mb-2 ps-4">
                    {{ __('agb_1_1_intro') }}
                    </p>
                    <ul class="list-disc list-inside space-y-1 ps-4">
                        <li>{{ __('agb_1_1_service_1') }}</li>
                        <li>{{ __('agb_1_1_service_2') }}</li>
                        <li>{{ __('agb_1_1_service_3') }}</li>
                        <li>{{ __('agb_1_1_service_4') }}</li>
                        <li>{{ __('agb_1_1_service_5') }}</li>
                        <li>{{ __('agb_1_1_service_6') }}</li>
                        <li>{{ __('agb_1_1_service_7') }}</li>
                        <li>{{ __('agb_1_1_service_8') }}</li>
                        <li>{{ __('agb_1_1_service_9') }}</li>
                        <li>{{ __('agb_1_1_service_10') }}</li>
                        <li>{{ __('agb_1_1_service_11') }}</li>
                        <li>{{ __('agb_1_1_service_12') }}</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">
                    {{ __('agb_1_2_title') }}
                    </h2>
                    <p class="ps-4">
                    {{ __('agb_1_2_text') }}
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">
                    {{ __('agb_1_3_title') }}
                    </h2>
                    <p class="ps-4">
                    {{ __('agb_1_3_text') }}
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">
                    {{ __('agb_1_4_title') }}
                    </h2>
                    <p class="ps-4">
                    {{ __('agb_1_4_text') }}
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">
                    {{ __('agb_2_title') }}
                    </h2>
                    <ul class="list-decimal list-inside space-y-2 ps-4">
                    <li>
                        {{ __('agb_2_1_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_2_1_a') }}</li>
                        <li>{{ __('agb_2_1_b') }}</li>
                        <li>{{ __('agb_2_1_c') }}</li>
                        </ul>
                    </li>
                    <li>{{ __('agb_2_2') }}</li>
                    <li>{{ __('agb_2_3') }}</li>
                    <li>{{ __('agb_2_4') }}</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">
                    {{ __('agb_3_title') }}
                    </h2>
                    <ul class="list-decimal list-inside space-y-2 ps-4">
                    <li>
                        {{ __('agb_3_1') }}
                    </li>
                    <li>
                        {{ __('agb_3_2_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_3_2_a') }}</li>
                        <li>{{ __('agb_3_2_b') }}</li>
                        <li>{{ __('agb_3_2_c') }}</li>
                        <li>{{ __('agb_3_2_d') }}</li>
                        <li>{{ __('agb_3_2_e') }}</li>
                        <li>{{ __('agb_3_2_f') }}</li>
                        <li>{{ __('agb_3_2_g') }}</li>
                        <li>{{ __('agb_3_2_h') }}</li>
                        <li>{{ __('agb_3_2_i') }}</li>
                        <li>{{ __('agb_3_2_j') }}</li>
                        <li>{{ __('agb_3_2_k') }}</li>
                        </ul>
                    </li>
                    <li>{{ __('agb_3_3') }}</li>
                    <li>{{ __('agb_3_4') }}</li>
                    <li>
                        {{ __('agb_3_5_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_3_5_a') }}</li>
                        <li>{{ __('agb_3_5_b') }}</li>
                        <li>{{ __('agb_3_5_c') }}</li>
                        </ul>
                    </li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">{{ __('agb_4_title') }}</h2>
                    <ul class="list-decimal list-inside space-y-2 ps-4">
                        <li>
                            {{ __('agb_4_1_intro') }}
                            <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                            <li>{{ __('agb_4_1_a') }}</li>
                            <li>{{ __('agb_4_1_b') }}</li>
                            <li>{{ __('agb_4_1_c') }}</li>
                            <li>{{ __('agb_4_1_d') }}</li>
                            <li>{{ __('agb_4_1_e') }}</li>
                            <li>{{ __('agb_4_1_f') }}</li>
                            </ul>
                        </li>
                        <li>
                            {{ __('agb_4_2_intro') }}
                            <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                            <li>{{ __('agb_4_2_a') }}</li>
                            <li>{{ __('agb_4_2_b') }}</li>
                            <li>{{ __('agb_4_2_c') }}</li>
                            <li>{{ __('agb_4_2_d') }}</li>
                            <li>{{ __('agb_4_2_e') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('agb_4_3') }}</li>
                        <li>{{ __('agb_4_4') }}</li>
                        <li>{{ __('agb_4_5') }}</li>
                        <li>{{ __('agb_4_6') }}</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">{{ __('agb_5_title') }}</h2>
                    <ul class="list-decimal list-inside space-y-2 ps-4">
                    <li>
                        {{ __('agb_5_1_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_5_1_a') }}</li>
                        <li>{{ __('agb_5_1_b') }}</li>
                        </ul>
                    </li>
                    <li>
                        {{ __('agb_5_2_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_5_2_a') }}</li>
                        <li>{{ __('agb_5_2_b') }}</li>
                        </ul>
                    </li>
                    <li>{{ __('agb_5_3') }}</li>
                    <li>{{ __('agb_5_4') }}</li>
                    <li>{{ __('agb_5_5') }}</li>
                    <li>{{ __('agb_5_6') }}</li>
                    <li>{{ __('agb_5_7') }}</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">{{ __('agb_6_title') }}</h2>
                    <ul class="list-decimal list-inside space-y-2 ps-4">
                    <li>{{ __('agb_6_1') }}</li>
                    <li>{{ __('agb_6_2') }}</li>
                    <li>
                        {{ __('agb_6_3_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_6_3_a') }}</li>
                        <li>{{ __('agb_6_3_b') }}</li>
                        <li>{{ __('agb_6_3_c') }}</li>
                        <li>{{ __('agb_6_3_d') }}</li>
                        </ul>
                    </li>
                    <li>{{ __('agb_6_4') }}</li>
                    <li>
                        {{ __('agb_6_5_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_6_5_a') }}</li>
                        <li>{{ __('agb_6_5_b') }}</li>
                        <li>{{ __('agb_6_5_c') }}</li>
                        </ul>
                    </li>
                    <li>{{ __('agb_6_6') }}</li>
                    </ul>
                </div>



                <div>
                    <h2 class="text-xl font-bold mb-2">{{ __('agb_7_title') }}</h2>
                    <ul class="list-decimal list-inside space-y-2 ps-4">
                    <li>{{ __('agb_7_1') }}</li>
                    <li>{{ __('agb_7_2') }}</li>
                    <li>{{ __('agb_7_3') }}</li>
                    <li>
                        {{ __('agb_7_4_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_7_4_a') }}</li>
                        <li>{{ __('agb_7_4_b') }}</li>
                        <li>{{ __('agb_7_4_c') }}</li>
                        <li>{{ __('agb_7_4_d') }}</li>
                        <li>{{ __('agb_7_4_e') }}</li>
                        <li>{{ __('agb_7_4_f') }}</li>
                        </ul>
                    </li>
                    <li>
                        {{ __('agb_7_5_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                        <li>{{ __('agb_7_5_a') }}</li>
                        <li>{{ __('agb_7_5_b') }}</li>
                        <li>{{ __('agb_7_5_c') }}</li>
                        <li>{{ __('agb_7_5_d') }}</li>
                        <li>{{ __('agb_7_5_e') }}</li>
                        </ul>
                    </li>
                    <li>{{ __('agb_7_6') }}</li>
                    <li>{{ __('agb_7_7') }}</li>
                    <li>{{ __('agb_7_8') }}</li>
                    <li>{{ __('agb_7_9') }}</li>
                    </ul>
                </div>  
                
                <div>
                    <h2 class="text-xl font-bold mb-2">{{ __('agb_8_title') }}</h2>
                    <ul class="list-decimal list-inside space-y-2 ps-4">
                        <li>
                        {{ __('agb_8_1_intro') }}
                        <br />
                        {{ __('agb_8_1_detail') }}
                        </li>
                        <li>
                        {{ __('agb_8_2_intro') }}
                        <br />
                        {{ __('agb_8_2_detail') }}
                        </li>
                        <li>
                        {{ __('agb_8_3_intro') }}
                        <br />
                        {{ __('agb_8_3_detail') }}
                        </li>
                        <li>
                        {{ __('agb_8_4') }}
                        </li>
                        <li>
                        {{ __('agb_8_5') }}
                        </li>
                        <li>
                        {{ __('agb_8_6_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                            <li>{{ __('agb_8_6_a') }}</li>
                            <li>{{ __('agb_8_6_b') }}</li>
                            <li>{{ __('agb_8_6_c') }}</li>
                            <li>{{ __('agb_8_6_d') }}</li>
                            <li>{{ __('agb_8_6_e') }}</li>
                            <li>{{ __('agb_8_6_f') }}</li>
                            <li>{{ __('agb_8_6_g') }}</li>
                        </ul>
                        </li>
                        <li>
                        {{ __('agb_8_7') }}
                        </li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">{{ __('agb_9_title') }}</h2>
                    <ul class="list-decimal list-inside space-y-2 ps-4">
                        <li>{{ __('agb_9_1') }}</li>
                        <li>{{ __('agb_9_2') }}</li>
                        <li>
                        {{ __('agb_9_3_intro') }}
                        <ul class="list-[lower-alpha] list-inside ms-4 space-y-1 mt-1">
                            <li>{{ __('agb_9_3_a') }}</li>
                            <li>{{ __('agb_9_3_b') }}</li>
                            <li>{{ __('agb_9_3_c') }}</li>
                            <li>{{ __('agb_9_3_d') }}</li>
                            <li>{{ __('agb_9_3_e') }}</li>
                            <li>{{ __('agb_9_3_f') }}</li>
                        </ul>
                        </li>
                        <li>{{ __('agb_9_4') }}</li>
                        <li>{{ __('agb_9_5') }}</li>
                        <li>{{ __('agb_9_6') }}</li>
                        <li>{{ __('agb_9_7') }}</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-2">{{ __('agb_10_title') }}</h2>
                    <ul class="list-decimal list-inside space-y-2 mb-8 ps-4">
                        <li>{{ __('agb_10_1') }}</li>
                        <li>{{ __('agb_10_2') }}</li>
                        <li>{{ __('agb_10_3') }}</li>
                        <li>{{ __('agb_10_4') }}</li>
                    </ul>

                    <h3 class="text-lg font-semibold mt-6 mb-2">{{ __('agb_10_note_title') }}</h3>
                    <ul class="list-disc list-inside space-y-1 ps-4">
                        <li>{{ __('agb_10_note_1') }}</li>
                        <li>{{ __('agb_10_note_2') }}</li>
                        <li>{{ __('agb_10_note_3') }}</li>
                    </ul>
                </div>
                
            </div>
            
        </article>

    </div>
</section>
@endsection