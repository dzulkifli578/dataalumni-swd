<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = "akun";

    protected $fillable = [
        "nama_pengguna",
        "nis",
        "kata_sandi",
        "peran"
    ];

    protected $dates = [
        "created_at",
        "updated_at"
    ];

    protected $casts = [
        "peran" => "string"
    ];
}
