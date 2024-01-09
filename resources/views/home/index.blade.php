@extends('layouts.main')

@section('main-body')
@if (session()->has('loginSuccess'))
        {!! session('loginSuccess') !!}
@endif

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="alert alert-success" role="alert">
        <h3>
            Selamat datang, {{ auth()->user()->nama }}!
        </h3>

    </div>
</div>
@endsection