<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans'; // Adjust this if your table name is different

    protected $fillable = [
        'id',
        'judul',
        'penerbit',
        'pengarang',
        'stok_tersisa',
        'last_updated',
        // Add other columns as needed
    ];

    // Add relationships or other model-specific logic here
}

