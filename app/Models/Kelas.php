<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table="kelas";

    protected $primaryKey="id";

    protected $fillable = ['name', 'kode_kelas'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($class) {
            $class->kode_kelas = 'CL' . str_pad(Kelas::max('id') + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
