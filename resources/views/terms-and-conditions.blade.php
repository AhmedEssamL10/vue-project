@extends('layouts.main')

@section('content')
<section class="py-8 bg-[#f1f1f1] text-black">
    <div class="container">
        <h1 class="text-3xl font-bold mb-8 text-center">{{ __('termsAndConditions') }}</h1>
        
        <div class="prose prose-lg">
            <div class=p-8">
                <h2 class="text-2xl font-semibold mb-6">1. Allgemeine Bestimmungen</h2>
                <p class="mb-4">
                    Diese Allgemeinen Geschäftsbedingungen gelten für alle Dienstleistungen der 3M Services GmbH. 
                    Durch die Nutzung unserer Dienstleistungen akzeptieren Sie diese Bedingungen vollständig.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">2. Dienstleistungen</h2>
                <p class="mb-4">
                    3M Services bietet Transport- und Umzugsdienstleistungen für Privatpersonen und Unternehmen an. 
                    Unsere Dienstleistungen umfassen den Transport von Möbeln, Hausrat und anderen Gegenständen.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">3. Buchung und Bezahlung</h2>
                <p class="mb-4">
                    Buchungen können über unsere Website oder telefonisch erfolgen. Die Bezahlung erfolgt nach 
                    Abschluss der Dienstleistung. Wir akzeptieren Barzahlung, Überweisung und Kartenzahlung.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">4. Haftung</h2>
                <p class="mb-4">
                    Wir haften für Schäden, die durch grobe Fahrlässigkeit oder Vorsatz unseres Personals entstehen. 
                    Die Haftung ist auf den Wert der transportierten Gegenstände begrenzt.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">5. Stornierung</h2>
                <p class="mb-4">
                    Stornierungen müssen mindestens 24 Stunden vor dem vereinbarten Termin erfolgen. 
                    Bei späteren Stornierungen können Stornierungsgebühren anfallen.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">6. Datenschutz</h2>
                <p class="mb-4">
                    Die Erhebung und Verarbeitung Ihrer personenbezogenen Daten erfolgt gemäß unserer 
                    Datenschutzerklärung und den geltenden Datenschutzgesetzen.
                </p>
                
                <h2 class="text-2xl font-semibold mb-6 mt-8">7. Schlussbestimmungen</h2>
                <p class="mb-4">
                    Diese Bedingungen können jederzeit geändert werden. Änderungen werden auf unserer Website 
                    veröffentlicht und gelten ab dem Zeitpunkt der Veröffentlichung.
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