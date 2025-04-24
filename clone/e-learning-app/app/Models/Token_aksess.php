<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Token_aksess extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "token_pembayaran";
    
    protected $fillable = [
        'kursus_id',
        'user_id',
        'status'
    ];
}
