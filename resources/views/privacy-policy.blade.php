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
        
        <div class="prose prose-lg max-w-none">
            <div class="p-8">
                <h2 class="text-2xl font-semibold mb-6">1. Datenschutz auf einen Blick</h2>
                <p class="mb-4">
                    Der Schutz Ihrer persönlichen Daten ist uns ein wichtiges Anliegen. Diese Datenschutzerklärung 
                    informiert Sie über Art, Umfang und Zweck der Verarbeitung personenbezogener Daten auf unserer Website.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">2. Verantwortliche Stelle</h2>
                <p class="mb-4">
                    Verantwortlich für die Datenverarbeitung auf dieser Website ist:<br>
                    3M Services GmbH<br>
                    Laaker Straße 67<br>
                    47137 Duisburg<br>
                    E-Mail: contact@3mserv.com<br>
                    Telefon: +4915560233302
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">3. Erhebung und Verarbeitung von Daten</h2>
                <p class="mb-4">
                    Wir erheben und verarbeiten personenbezogene Daten nur im notwendigen Umfang und ausschließlich 
                    für die in dieser Datenschutzerklärung genannten Zwecke.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">4. Arten der verarbeiteten Daten</h2>
                <ul class="list-disc pl-6 mb-4">
                    <li>Kontaktdaten (Name, E-Mail, Telefonnummer)</li>
                    <li>Adressdaten für Transportdienstleistungen</li>
                    <li>Zahlungsinformationen</li>
                    <li>Nutzungsdaten unserer Website</li>
                </ul>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">5. Zweck der Datenverarbeitung</h2>
                <p class="mb-4">
                    Ihre Daten werden verarbeitet für:<br>
                    • Die Durchführung von Transportdienstleistungen<br>
                    • Die Kommunikation mit Ihnen<br>
                    • Die Abwicklung von Zahlungen<br>
                    • Die Verbesserung unserer Dienstleistungen
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">6. Ihre Rechte</h2>
                <p class="mb-4">
                    Sie haben das Recht auf:<br>
                    • Auskunft über Ihre gespeicherten Daten<br>
                    • Berichtigung falscher Daten<br>
                    • Löschung Ihrer Daten<br>
                    • Einschränkung der Datenverarbeitung<br>
                    • Datenübertragbarkeit
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">7. Cookies</h2>
                <p class="mb-4">
                    Unsere Website verwendet Cookies, um die Nutzung zu verbessern. Sie können die Verwendung 
                    von Cookies in Ihren Browsereinstellungen anpassen.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">8. Sicherheit</h2>
                <p class="mb-4">
                    Wir setzen technische und organisatorische Sicherheitsmaßnahmen ein, um Ihre Daten gegen 
                    Manipulation, Verlust, Zerstörung oder gegen den Zugriff unberechtigter Personen zu schützen.
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