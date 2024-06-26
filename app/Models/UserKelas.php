<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKelas extends Model
{
    use HasFactory;

    protected $table="user_kelas";

    protected $primaryKey="id";

    protected $fillable = ['user_id', 'kode_kelas'];
}
