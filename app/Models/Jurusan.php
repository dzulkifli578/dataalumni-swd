<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";

    protected $fillable = [
        "nama"
    ];

    public $timestamps = true;

    protected $dates = [
        "created_at",
        "updated_at"
    ];
}
