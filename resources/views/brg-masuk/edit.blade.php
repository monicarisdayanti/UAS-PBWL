@extends('layouts.main')

@section('main-body')
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/barang-masuk">{{ $title }}</a></li>
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
            <form action="/barang-masuk/{{ $dataBrgMasuk->id }}" method="post">
                @method('put')
                @csrf

                <div class="row mb-3">
                    <div class="col">
                        <label for="id_barang" class="form-label">Nama Barang</label>
                        <select name="id_barang" id="id_barang" class="form-select">
                            @foreach ($dataBarang as $rowBarang)
                                @if (old('id_barang', $dataBrgMasuk->id_barang) == $rowBarang->id)
                                    <option value="{{ $rowBarang->id }}" selected>{{ $rowBarang->nama }}</option>
                                @else
                                    <option value="{{ $rowBarang->id }}">{{ $rowBarang->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="jumlah" min="0" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Input jumlah" value="{{ old('jumlah', $dataBrgMasuk->jumlah) }}" required>

                        @error('jumlah')
                            <div class="invalid-feedback" id="jumlah">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Input keterangan">{{ old('keterangan', $dataBrgMasuk->keterangan) }}</textarea>
                    </div>
                </div>
    
                <div class="row mt-5">
                    <div class="col d-flex justify-content-center">
                        <a href="/barang-masuk" class="btn btn-secondary">
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