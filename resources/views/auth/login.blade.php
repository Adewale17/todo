@extends('includes.auth-layout')
@section('contents')
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card p-4 shadow-sm w-100" style="max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
                <p class="text-center mt-3">Don't have an account? <a href="register.html">Register here</a></p>
            </form>
        </div>
    </div>
@endsection