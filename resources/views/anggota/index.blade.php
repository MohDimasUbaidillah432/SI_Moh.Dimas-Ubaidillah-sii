@extends('layouts.app') 

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2>Daftar Anggota UKM POFKIP</h2>
        </div>
        <div class="col-lg-12 text-end">
            <a class="btn btn-success" href="{{ route('anggota.create') }}">Tambah Anggota Baru</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-white bg-dark bg-opacity-75">
            <thead>
                <tr>
                    <th>ID Anggota</th>
                    <th>ID User</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>NIM</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $anggota)
                <tr>
                    <td>{{ $anggota->id_anggota }}</td>
                    <td>
                        {{-- Menampilkan nama user terkait (jika relasi user() sudah diatur) --}}
                        {{ $anggota->user->name ?? 'User ID: ' }} {{ $anggota->id_user }}
                    </td>
                    <td>{{ $anggota->nama_lengkap }}</td>
                    <td>{{ $anggota->email }}</td>
                    <td>{{ $anggota->nim }}</td>
                    <td>
                        <form action="{{ route('anggota.destroy', $anggota->id_anggota) }}" method="POST">

                            <a class="btn btn-primary btn-sm" href="{{ route('anggota.edit', $anggota->id_anggota) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota {{ $anggota->nama_lengkap }}?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {!! $anggotas->links() !!}

</div>
@endsection