@extends('auth.layouts.main')

@section('main-body')

@if (session()->has('pesan'))
        {!! session('pesan') !!}
@endif

<div class="login-page">
    <div class="form">
      <form class="register-form" action="/register" method="post">
        <h3>Register Now</h3>
        <hr>
        @csrf

        <input type="email" placeholder="email" name="email" required/>
        <input type="password" placeholder="password" name="password" required/>
        <input type="text" placeholder="nama" name="nama" required/>
        <textarea name="alamat" placeholder="Isi alamat..."></textarea>
        <input type="text" placeholder="No Hp" name="hp" required/>
        <input type="text" placeholder="Kode Pos" name="pos" required/>

        <button type="submit">create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>

        @error('email')
          <script>alert('Email tidak tersedia!')</script>
        @enderror
      </form>

      <form class="login-form" action="/login" method="post">
        <h3>Login</h3>
        <hr>
        @csrf

        <input type="text" placeholder="email" name="email" required/>
        <input type="password" placeholder="password" name="password" required/>
        <button type="submit">login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>

        
      </form>
    </div>
  </div>

@endsection
