@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Tambah Anggota Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="id_user" class="form-label">ID User Terkait:</label>
                {{-- Di aplikasi nyata, ini biasanya dropdown yang memuat daftar User --}}
                <input type="number" name="id_user" class="form-control" placeholder="ID User (harus terdaftar di tabel users)" value="{{ old('id_user') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" value="{{ old('nim') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap Anggota" value="{{ old('nama_lengkap') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Email Anggota" value="{{ old('email') }}" required>
            </div>
            
            <div class="col-md-12 text-center mt-3">
                <a class="btn btn-secondary" href="{{ route('anggota.index') }}">Batal</a>
                <button type="submit" class="btn btn-success">Simpan Anggota</button>
            </div>
        </div>
    </form>
</div>
@endsection