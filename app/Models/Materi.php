<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table="materies";

    protected $primaryKey="id";

    protected $fillable=['title','deskripsi','category','sampul','file','akses'];
}
