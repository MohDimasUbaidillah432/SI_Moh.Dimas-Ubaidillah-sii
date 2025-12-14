<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <<< PENTING: Tambahkan ini untuk mengakses user yang sedang login

class AnggotaController extends Controller
{
    // Menampilkan Daftar Anggota (READ)
    public function index()
    {
        // Menggunakan eager loading 'user' untuk menampilkan nama user terkait
        $anggotas = Anggota::with('user')->latest('id_anggota')->paginate(10);
        return view('anggota.index', compact('anggotas'));
    }

    // Menampilkan Form Tambah Anggota (CREATE)
    public function create()
    {
        return view('anggota.create');
    }
    
    public function __construct()
    {
        // Mewajibkan user untuk login untuk mengakses semua fungsi CRUD
        // termasuk 'store' (menyimpan data)
        $this->middleware('auth'); 
    }

    // Menyimpan Anggota Baru (STORE)
    public function store(Request $request)
    {

        // 1. Hapus validasi 'id_user' dari sini
        $request->validate([
            // 'id_user' => 'required|integer|exists:users,id', // BARIS INI DIHAPUS
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|unique:anggotas|max:255',
            'nim' => 'required|string|unique:anggotas|max:20',
        ]);

        // 2. Ambil semua data dari request
        $data = $request->all();
        // 3. Tambahkan ID user yang sedang login ke array data
        $data['id_user'] = Auth::id(); 
        
        Anggota::create($data); // Menggunakan $data yang sudah dimodifikasi

        return redirect()->route('anggota.index')
                         ->with('success', 'Anggota berhasil ditambahkan.');
    }

    // Menampilkan Form Edit Anggota (EDIT)
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
        $this->middleware('auth');
    }

    // Memperbarui Data Anggota (UPDATE)
    public function update(Request $request, Anggota $anggota)
    {
        // 1. Hapus validasi 'id_user' karena nilai ini tidak akan diupdate dari form (atau disembunyikan)
        $request->validate([
            // 'id_user' => 'required|integer|exists:users,id', // BARIS INI DIHAPUS
            'nama_lengkap' => 'required|string|max:255',
            // Pengecualian unik untuk email dan NIM yang sedang diedit
            'email' => 'required|string|email|max:255|unique:anggotas,email,' . $anggota->id_anggota . ',id_anggota',
            'nim' => 'required|string|max:20|unique:anggotas,nim,' . $anggota->id_anggota . ',id_anggota',
        ]);

        // Ambil semua data dari request
        $data = $request->all();

        // JANGAN update id_user di sini, biarkan tetap pada nilai awal
        // Jika perlu diperbarui, Anda harus menambahkan input tersembunyi/khusus di form edit.

        $anggota->update($data);

        return redirect()->route('anggota.index')
                         ->with('success', 'Anggota berhasil diperbarui.');
    }

    // Menghapus Anggota (DELETE/DESTROY)
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')
                         ->with('success', 'Anggota berhasil dihapus.');
    }
}