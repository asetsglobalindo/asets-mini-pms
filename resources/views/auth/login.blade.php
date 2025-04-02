@extends('layouts.guest')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md p-6 space-y-6shadow-lg rounded-lg">
            <flux:heading size="xl" class="text-center">Login</flux:heading>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email -->
                <flux:input label="Email" type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required autofocus />

                <!-- Password -->
                <flux:input label="Password" type="password" name="password" placeholder="Masukkan Password" required />

                <!-- Submit Button -->
                <flux:button type="submit" variant="primary" class="w-full mt-4">Login</flux:button>
            </form>

            <!-- Register & Forgot Password Links -->
            {{-- <div class="text-center">
                <flux:text>Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500">Daftar</a></flux:text>
                <br>
                <flux:text><a href="{{ route('password.request') }}" class="text-blue-500">Lupa password?</a></flux:text>
            </div> --}}
        </div>
    </div>
@endsection
