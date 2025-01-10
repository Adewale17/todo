@extends('includes.layout')
@section('content')
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card p-4 shadow-sm w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
                @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                      <!-- Checkbox -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                      </div>
                    </div>

                    <div class="col">
                      <!-- Simple link -->
                      <a href="{{route('password-request')}}">Forgot password?</a>
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
                <p class="text-center mt-3">Don't have an account? <a href="{{route('register')}}">Register here</a></p>
            </form>
        </div>
    </div>
@endsection
