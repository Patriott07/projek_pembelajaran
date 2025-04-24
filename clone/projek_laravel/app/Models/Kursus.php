<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kursus extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "kursus";
    
    protected $fillable = [
        'nama_kursus',
        'deskripsi',
        'tanggal',
        'harga',
        'foto',
        'pengajar_id',
        'category_id',
        'like'
    ];

    /**
     * Get the pengajar that owns the Kursus
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
