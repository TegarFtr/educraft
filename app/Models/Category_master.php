<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_master extends Model
{
    use HasFactory;

    protected $table="categories_masters";

    protected $primaryKey="id";

    protected $fillable=['name','status'];
}
