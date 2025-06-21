@extends('layouts.main')
@section('content')
    {{-- <h1>Hello {{ $user->name }}</h1> --}}
    <div class="p-6 bg-[#E1E1E1]">
        <!-- Main Container -->
        <div class="container mx-auto md:px-4 py-8 max-w-4xl">

            <!-- Page Header -->
            <div class="mb-6">
                <div class="flex flex-col items-start gap-3">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ __('My Profile Page') }}</h1>
                    <a href="{{ route('profile.change-password', app()->getLocale()) }}" class="btn btn-outline text-gray-900 border-gray-900 hover:text-white self-end">{{ __('change_password') }}</a>
                </div>
                {{-- <p class="text-gray-600">Manage your account information</p> --}}
            </div>

            <!-- Common Profile Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b border-gray-200 pb-3">
                    {{ __('personal information') }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name Field -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">{{ __('name') }}</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                            <span class="text-gray-900">
                                {{ auth()->user()->name }}
                            </span>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">{{ __('email') }}</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                            <span class="text-gray-900">
                                {{ auth()->user()->email }}
                            </span>
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">{{ __('phone') }}</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                            <span class="text-gray-900">
                                {{ auth()->user()->phone ?? '01000000000' }}
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">{{ __('Client Type') }}</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                            <span class="text-gray-900">
                                {{ auth()->user()->user_type }}
                            </span>
                        </div>
                    </div>

                    {{-- @if (auth()->user()->user_type === 'worker')
                        <div class="space-y-2 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Availability</label>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                <span class="text-green-700 font-medium">Available</span>
                            </div>
                        </div>
                    @endif --}}
                </div>
            </div>

            <!-- Worker-Specific Sections -->
            {{-- @if (auth()->user()->user_type === 'worker')
                <div class="space-y-6 mb-6">
                    <!-- Previous Jobs Section -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b border-gray-200 pb-3">
                            Previous Jobs
                        </h2>

                        <div class="text-center py-12">
                            <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Coming Soon</h3>
                            <p class="text-gray-600">
                                Your job history will be displayed here once the feature is available
                            </p>
                        </div>
                    </div>
                </div>
            @endif --}}

            <!-- Client-Specific Sections -->
            @if (auth()->user()->user_type === 'client')
                <div class="space-y-6 mb-6">
                    {{-- Your Requests Section --}}
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b border-gray-200 pb-3">
                            {{ __('yourRequests') }}
                        </h2>

                        @if(isset($requests) && count($requests) > 0)
                            @foreach ($requests as $shipRequest)
                                <div class="mb-6 border px-4 pt-4 rounded shadow-sm bg-gray-50">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-3">
                                        {{ __('request') }} #{{ $shipRequest->id }}
                                        {{-- {{ $shipRequest->created_at->format('Y-m-d H:i') }}) --}}
                                    </h3>
                                    <table class="table-auto w-full text-sm text-gray-700">
                                        <tbody>
                                            {{-- @foreach ($shipRequest->toArray() as $key => $value)
                                                <tr class="border-b">
                                                    <td class="py-2 pr-4 font-medium capitalize">
                                                        {{ str_replace('_', ' ', $key) }}</td>
                                                    <td class="py-2">
                                                        @php
                                                            if (is_bool($value)) {
                                                                echo $value ? 'Yes' : 'No';
                                                            } elseif ($value instanceof \Carbon\Carbon) {
                                                                echo $value->format('Y-m-d H:i');
                                                            } else {
                                                                echo $value ?? '—';
                                                            }
                                                        @endphp
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    id
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->id }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('name') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->client_name }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('email') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->client_email }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('phone') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->client_phone }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('requestType') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ __('shippingType') }}
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('totalCost') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->total ?? '0' }} {{ __('euro') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endif
                        
                        @if(isset($factorRequests) && count($factorRequests) > 0)
                            @foreach ($factorRequests as $shipRequest)
                                <div class="mb-6 border px-4 pt-4 rounded shadow-sm bg-gray-50">
                                    <h3 class="text-lg font-semibold text-gray-700 mb-3">
                                        {{ __('request') }} #{{ $shipRequest->id }}
                                        {{-- {{ $shipRequest->created_at->format('Y-m-d H:i') }}) --}}
                                    </h3>
                                    <table class="table-auto w-full text-sm text-gray-700">
                                        <tbody>
                                            {{-- @foreach ($shipRequest->toArray() as $key => $value)
                                                <tr class="border-b">
                                                    <td class="py-2 pr-4 font-medium capitalize">
                                                        {{ str_replace('_', ' ', $key) }}</td>
                                                    <td class="py-2">
                                                        @php
                                                            if (is_bool($value)) {
                                                                echo $value ? 'Yes' : 'No';
                                                            } elseif ($value instanceof \Carbon\Carbon) {
                                                                echo $value->format('Y-m-d H:i');
                                                            } else {
                                                                echo $value ?? '—';
                                                            }
                                                        @endphp
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    id
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->id }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('name') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->client_name }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('email') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->client_email }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('phone') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->client_phone }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('requestType') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ __('WorkerType') }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('noOfWorkers') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->count }}
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="py-2 pr-4 font-medium capitalize">
                                                    {{ __('totalCost') }}
                                                </td>
                                                <td class="py-2">
                                                    {{ $shipRequest->total ?? '0' }} {{ __('euro') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endif
                        
                        @if((!isset($requests) || count($requests) == 0) && (!isset($factorRequests) || count($factorRequests) == 0))
                            <div class="text-center text-black py-2 text-xl">{{ __('noRequests') }}</div>
                        @endif
                    </div>
                </div>



                {{-- <div class="text-center py-12">
                    <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Coming Soon</h3>
                    <p class="text-gray-600">
                        Your service requests and their status will be displayed here once the feature is available
                    </p>
                </div> --}}
        </div>
    </div>
    @endif

    <!-- Action Buttons -->
    {{-- <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors duration-200 font-medium">
                Edit Profile
            </button>
            <button class="bg-gray-200 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-300 transition-colors duration-200 font-medium">
                Account Settings
            </button>
        </div> --}}
    </div>
    </div>
@endsection
