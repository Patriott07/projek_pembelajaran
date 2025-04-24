<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajar extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "pengajar";
    
    protected $fillable = [
        'name',
        'keahlian',
        'bio',
        'foto',
        'user_id'
    ];

    /**
     * Get the user that owns the Pengajar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // untuk mendapatkan column relasi
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
