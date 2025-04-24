<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "pembayaran";
    
    protected $fillable = [
        'kursus_id',
        'user_id',
        'bukti_bayar',
        'tanggal',
        'metode_bayar',
        'status'
    ];

    /**
     * Get the kursus that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
