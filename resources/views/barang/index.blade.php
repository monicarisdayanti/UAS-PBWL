@extends('layouts.main')

@section('main-body')
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/barang">{{ $title }}</a></li>
        <li class="breadcrumb-item active">Index</li>
    </ol>
    
    @if (session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('berhasil') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Barang
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <a href="/barang/create">
                        <button class="btn btn-success">Tambah Data</button>
                    </a>

                </div>
            </div>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nama Supplier</th>
                      <th scope="col">Kode</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Masuk</th>
                      <th scope="col">Keluar</th>
                      <th scope="col">Jumlah Stok</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataBarang as $row)
                    <?php
                        $brg_masuk = App\Models\BrgMasuk::where('id_barang', $row->id)->sum('jumlah');
                        $brg_keluar = App\Models\BrgKeluar::where('id_barang', $row->id)->sum('jumlah');

                        $total = $brg_masuk - $brg_keluar;
                    ?>
                    <tr>
                      <th scope="row">{{ $row->id }}</th>
                      <td>{{ $row->supplier->nama }}</td>
                      <td>{{ $row->kode }}</td>
                      <td>{{ $row->nama }}</td>
                      <td>{{ $brg_masuk }}</td>
                      <td>{{ $brg_keluar }}</td>
                      <td>{{ $total }}</td>
                      <td>{{ $row->keterangan }}</td>
                      <td>
                        <a href="/barang/{{ $row->id }}/edit" class="badge text-bg-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        <form action="/barang/{{ $row->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
        
                            <button type="submit" class="badge text-bg-danger ms-2 border-0" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection