   @extends('layouts.main')
   @section('content')
       <form method="POST" action="{{ route('register') }}">
           @csrf

           <div class="bg-[#f2f2f2] py-12 lg:py-20 relative">
               <div class="container">
                   <div class="absolute inset-0 z-0 opacity-40">
                       <div class="absolute top-20 left-10 w-40 h-40 rounded-full bg-client animate-float"></div>
                       <div class="absolute bottom-20 right-10 w-32 h-32 rounded-full bg-worker animate-float"
                           style="animation-delay: 1s;"></div>
                       <div class="absolute top-40 right-40 w-24 h-24 rounded-full bg-client-light animate-float"
                           style="animation-delay: 1.5s;"></div>
                       <div class="absolute bottom-40 left-20 w-36 h-36 rounded-full bg-worker-light animate-float"
                           style="animation-delay: 2s;"></div>
                   </div>
                   <div class="max-w-[600px] mx-auto z-10 relative">
                       <h1
                           class="text-3xl md:text-4xl font-bold mb-6 !leading-normal text-center uppercase bg-gradient-to-r from-client to-worker bg-clip-text text-transparent">
                           {{ __('Register') }}
                       </h1>

                       <form class="flex flex-col gap-8 login_form">
                           <div>
                               <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                   {{ __('First Name') }} </label>
                               <input id="first_name" name="name" placeholder=" {{ __('First Name') }}"
                                   class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                           </div>
                           <!-- Email Input -->
                           <div>
                               <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                   {{ __('Email') }}</label>
                               <input type="email" id="email" name="email" placeholder=" {{ __('Email') }}"
                                   class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                           </div>

                           <!-- Password Input -->
                           <div>
                               <div class="flex justify-between items-center mb-1">
                                   <label for="password" class="block text-sm font-medium text-gray-700">
                                       {{ __('Password') }}</label>
                               </div>
                               <input type="password" id="password" name="password" placeholder=" {{ __('Password') }}"
                                   class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                           </div>

                           <div>
                               <div class="flex justify-between items-center mb-1">
                                   <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                                       {{ __('Confirm Password') }}</label>
                               </div>
                               <input type="password" id="password_confirm" name="password_confirmation"
                                   placeholder=" {{ __('Confirm Password') }} "
                                   class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                           </div>

                           <div>
                               <div class="flex justify-between items-center mb-1">
                                   <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                                       {{ __('User Type') }}</label>
                               </div>
                               <div class="form-control flex gap-8">
                                   <label class="label cursor-pointer">
                                       <input type="radio" name="user_type" value="client"
                                           class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client-dark" />
                                       <span class="label-text text-[#1b1718]">{{ __('Client') }}</span>
                                   </label>
                                   <label class="label cursor-pointer">
                                       <input type="radio" name="user_type" value="worker"
                                           class="radio border !bg-transparent checked:border-worker-dark border-worker-dark checked:before:bg-worker-dark" />
                                       <span class="label-text text-[#1b1718]">{{ __('Worker') }}</span>
                                   </label>
                               </div>
                           </div>

                           <div class="company_form_input hidden">
                               <div class="flex justify-between items-center mb-1">
                                   <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                                       {{ __('Client Type') }} </label>
                               </div>
                               <div class="form-control flex gap-8">
                                   <label class="label cursor-pointer">
                                       <input type="radio" name="type"
                                           class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                                       <span class="label-text text-[#1b1718]">{{ __('Individual') }}</span>
                                   </label>
                                   <label class="label cursor-pointer">
                                       <input type="radio" name="type"
                                           class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                                       <span class="label-text text-[#1b1718]">{{ __('Company') }}</span>
                                   </label>
                               </div>
                           </div>



                           <!-- Login Button -->
                           <button type="submit"
                               class="w-full py-3 px-4 bg-worker-light hover:bg-worker text-white font-medium rounded-lg transition duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.01]">
                               {{ __('Register') }}
                           </button>
                       </form>

                       <!-- Registration Link -->
                       <div class="mt-6 text-center">
                           <p class="text-sm text-gray-600">
                               {{ __('Already have an account?') }}
                               <a href="/login"
                                   class="font-medium link-hover text-orange-500 hover:text-purple-600 transition duration-200">{{ __('Login') }}
                               </a>
                           </p>
                       </div>
                   </div>
               </div>
           </div>
       </form>
   @endsection
