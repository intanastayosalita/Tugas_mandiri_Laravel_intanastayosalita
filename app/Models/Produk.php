<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $fillable = ['nama_produk', 'deskripsi', 'harga', 'stok','nama_file', 'category_id'];

    //untuk relasi ke category atau nyambung dengan category
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}