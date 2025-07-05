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
        
        <div class="prose prose-lg max-w-none">
            <div class="p-8">
                <h2 class="text-2xl font-semibold mb-6">Angaben gemäß § 5 TMG</h2>
                <p class="mb-4">
                    <strong>3M Services GmbH</strong><br>
                    Laaker Straße 67<br>
                    47137 Duisburg<br>
                    Deutschland
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">Vertreten durch</h2>
                <p class="mb-4">
                    Geschäftsführer: [Name des Geschäftsführers]<br>
                    Registergericht: Amtsgericht Duisburg<br>
                    Registernummer: HRB [Nummer]
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">Kontakt</h2>
                <p class="mb-4">
                    Telefon: +4915560233302<br>
                    E-Mail: contact@3mserv.com<br>
                    Website: www.3mserv.com
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">Umsatzsteuer-ID</h2>
                <p class="mb-4">
                    Umsatzsteuer-Identifikationsnummer gemäß § 27 a Umsatzsteuergesetz:<br>
                    DE [USt-IdNr.]
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">Berufsbezeichnung und berufsrechtliche Regelungen</h2>
                <p class="mb-4">
                    Berufsbezeichnung: Transport- und Umzugsdienstleister<br>
                    Zuständige Kammer: [Name der zuständigen Kammer]<br>
                    Verliehen durch: Deutschland
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">Redaktionell verantwortlich</h2>
                <p class="mb-4">
                    [Name des verantwortlichen Redakteurs]<br>
                    3M Services GmbH<br>
                    Laaker Straße 67<br>
                    47137 Duisburg
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">EU-Streitschlichtung</h2>
                <p class="mb-4">
                    Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit: 
                    <a href="https://ec.europa.eu/consumers/odr/" class="text-blue-600 hover:underline">https://ec.europa.eu/consumers/odr/</a>.<br>
                    Unsere E-Mail-Adresse finden Sie oben im Impressum.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8 break-words">Verbraucherstreitbeilegung/Universalschlichtungsstelle</h2>
                <p class="mb-4">
                    Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer 
                    Verbraucherschlichtungsstelle teilzunehmen.
                </p>
                
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        Stand: {{ date('d.m.Y') }}<br>
                        3M Services GmbH<br>
                        Laaker Straße 67<br>
                        47137 Duisburg
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection