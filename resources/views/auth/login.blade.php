@extends('layouts.auth')

@section('content')
    <div>
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
            <div class="relative sm:max-w-sm w-full">
                <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                    <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                        Login
                    </label>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="email">
                                {{ __('global.login_email') }}
                            </label>
                            <input id="email" name="email" type="email"
                                class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 {{ $errors->has('email') ? ' ring ring-red-300' : '' }}"
                                placeholder="{{ __('global.login_email') }}" required autocomplete="email" autofocus
                                value="{{ old('email') }}" />
                            @error('email')
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">
                                {{ __('global.login_password') }}
                            </label>
                            <input id="password" name="password" type="password"
                                class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 {{ $errors->has('password') ? ' ring ring-red-300' : '' }}"
                                placeholder="{{ __('global.login_password') }}" required
                                autocomplete="current-password" />
                            @error('password')
                                <span class="text-red-500">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label class="inline-flex items-center cursor-pointer"><input id="remember" name="remember"
                                    type="checkbox"
                                    class="form-checkbox border-0 rounded text-blue-500 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                    {{ __('global.remember_me') }}
                                </span>
                            </label>
                        </div>
                        <div class="text-center mt-6">
                            <button
                                class="bg-blue-500 w-full py-3 rounded-full text-white shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95">
                                {{ __('global.login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
{{-- <div class="font-sans">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
        <div class="relative sm:max-w-sm w-full">
            <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
            <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                    Login
                </label>
                <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="email">
                                    {{ __('global.login_email') }}
                                </label>
                                <input id="email" name="email" type="email" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 {{ $errors->has('email') ? ' ring ring-red-300' : '' }}" placeholder="{{ __('global.login_email') }}" required autocomplete="email" autofocus value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">
                                    {{ __('global.login_password') }}
                                </label>
                                <input id="password" name="password" type="password" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-full text-center shadow-sm hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 {{ $errors->has('password') ? ' ring ring-red-300' : '' }}" placeholder="{{ __('global.login_password') }}" required autocomplete="current-password" />
                                @error('password')
                                    <span class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="inline-flex items-center cursor-pointer"><input id="remember" name="remember" type="checkbox" class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" {{ old('remember') ? 'checked' : '' }} />
                                    <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                        {{ __('global.remember_me') }}
                                    </span>
                                </label>
                            </div>
                            <div class="text-center mt-6">
                                <button class="bg-blue-500 w-full py-3 rounded-full text-white shadow-sm hover:shadow-inner  transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-95">
                                    {{ __('global.login') }}
                                </button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
    
</div> --}}
