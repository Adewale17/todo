@extends('includes.layout')
@section('content')
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card p-4 shadow-sm w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4">Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" >
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
                </div>
                <button type="submit" class="btn btn-primary w-100" name="submit">Register</button>
                <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </form>
        </div>
    </div>
@endsection
