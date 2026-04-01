<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    use HasFactory;

    // protected $tabel = categories;

//relasi nama
    protected $fillable = ['name'];
}
