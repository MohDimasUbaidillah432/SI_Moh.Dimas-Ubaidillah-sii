<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    
    // Primary Key sesuai skema Anda
    protected $primaryKey = 'id_anggota';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'email',
        'nim',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}