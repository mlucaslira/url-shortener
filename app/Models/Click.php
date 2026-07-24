<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Click extends Model
{
    use HasFactory;
    /**
     * Campos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'ip',
        'user_agent',
        'referrer',
        'clicked_at',
    ];

    /**
     * Conversão automática de atributos.
     */
    protected function casts(): array
    {
        return [
            'clicked_at' => 'datetime',
        ];
    }

    /**
     * O clique pertence a uma URL encurtada.
     */
    public function shortUrl(): BelongsTo
    {
        return $this->belongsTo(ShortUrl::class);
    }
}