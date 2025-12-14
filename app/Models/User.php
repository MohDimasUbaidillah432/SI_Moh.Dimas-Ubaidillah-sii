<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
// ... use lainnya

class User extends Authenticatable
{
    // ... code lainnya ...

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'id_user', 'id');
    }
}