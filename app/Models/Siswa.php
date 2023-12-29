<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    protected $guarded = [];

    protected $table = 'siswas';

    // Your other model code goes here
}
