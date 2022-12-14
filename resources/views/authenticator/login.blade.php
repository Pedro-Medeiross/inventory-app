<x-layout title="Login">
    <div class="container">
        <h1>
            Login
        </h1>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>
        <a href="{{ route('users.register') }}" class="btn btn-secondary mt-1">Register</a>
    </div>
</x-layout>
