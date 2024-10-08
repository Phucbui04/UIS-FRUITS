@extends('layouts.master')
@section('title', 'Đăng nhập')

@section('content')
<br><br><br>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
    </div>
    <div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" name="address">
    </div>
    <button type="submit">Register</button>
</form>




@endsection
