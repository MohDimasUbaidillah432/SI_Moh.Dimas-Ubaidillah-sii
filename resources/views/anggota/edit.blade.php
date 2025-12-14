@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Anggota: {{ $anggota->nama_lengkap }}</h2>

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

    <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="id_user" class="form-label">ID User Terkait:</label>
                <input type="number" name="id_user" value="{{ $anggota->id_user }}" class="form-control" placeholder="ID User" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" name="nim" value="{{ $anggota->nim }}" class="form-control" placeholder="Nomor Induk Mahasiswa" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" value="{{ $anggota->nama_lengkap }}" class="form-control" placeholder="Nama Lengkap Anggota" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" value="{{ $anggota->email }}" class="form-control" placeholder="Email Anggota" required>
            </div>
            
            <div class="col-md-12 text-center mt-3">
                <a class="btn btn-secondary" href="{{ route('anggota.index') }}">Batal</a>
                <button type="submit" class="btn btn-success">Perbarui Anggota</button>
            </div>
        </div>
    </form>
</div>
@endsection