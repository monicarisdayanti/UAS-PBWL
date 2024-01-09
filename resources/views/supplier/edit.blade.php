@extends('layouts.main')

@section('main-body')
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/supplier">{{ $title }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg>
            Edit Data
        </div>
        <div class="card-body">
            <form action="/supplier/{{ $dataSupplier->id }}" method="post">
                @method('put')
                @csrf

                <div class="row mb-3 mt-5">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Input email" value="{{ old('email', $dataSupplier->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback" id="email">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Input password" value="{{ old('password', $dataSupplier->password) }}" required>
                        @error('password')
                            <div class="invalid-feedback" id="password">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Input nama" value="{{ old('nama', $dataSupplier->nama) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Input alamat">{{ old('alamat', $dataSupplier->alamat) }}</textarea>
                    </div>
                </div>
                <div class="row mb-3 mt-5">
                    <div class="col-md-6">
                        <label for="hp" class="form-label">No HP</label>
                        <input type="text" name="hp" class="form-control" id="hp" placeholder="Input no hp" value="{{ old('hp', $dataSupplier->hp) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="pos" class="form-label">Kode Pos</label>
                        <input type="text" name="pos" class="form-control" id="pos" placeholder="Input kode pos" value="{{ old('pos', $dataSupplier->pos) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="USER" @if (old('role', $dataSupplier->role) == 'USER') {{ 'selected' }} @endif>USER</option>
                            <option value="ADMIN" @if (old('role', $dataSupplier->role) == 'ADMIN') {{ 'selected' }} @endif>ADMIN</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="aktif" class="form-label">Aktif</label>
                        <select name="aktif" id="aktif" class="form-select">
                            <option value="Y" @if (old('aktif', $dataSupplier->aktif) == 'Y') {{ 'selected' }} @endif>Aktif</option>
                            <option value="N" @if (old('aktif', $dataSupplier->aktif) == 'N') {{ 'selected' }} @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
    
                <div class="row mt-5">
                    <div class="col d-flex justify-content-center">
                        <a href="/supplier" class="btn btn-secondary">
                            Back
                        </a>
                        <button type="submit" class="btn btn-success ms-2">Simpan</button>
                        <button type="reset" class="btn btn-primary ms-2">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection