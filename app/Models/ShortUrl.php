<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class ShortUrl extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * Campos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'original_url',
        'short_code',
        'title',
        'description',
        'redirect_delay',
        'expires_at',
        'is_custom',
    ];

    /**
     * Conversão automática de atributos.
     */
    protected function casts(): array
    {
        return [
            'is_custom'      => 'boolean',
            'is_active'      => 'boolean',
            'last_clicked_at'=> 'datetime',
            'expires_at'     => 'datetime',
        ];
    }

    /**
     * A URL pertence a um usuário.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A URL possui vários cliques.
     */
    public function clicks(): HasMany
    {
        return $this->hasMany(Click::class);
    }

    /**
     * Metodo para gerar um código curto aleatório
     */
    public static function generateShortCode(): string
    {
        do {
            $shortCode = Str::random(6);
        } while (
            self::where('short_code', $shortCode)->exists()
        );
        return $shortCode;
    }
}