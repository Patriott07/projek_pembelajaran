<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vidio extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "vidio";

    protected $fillable = [
        'nama_vidio',
        'url',
        'path',
        'kursus_id',
        'urutan_dalam_playlist',
        'durasi'
    ];

    /**
     * Get the kursus that owns the Vidio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id', 'id');
    }
}
