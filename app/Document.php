<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Database\Eloquent\Collection<\App\Block> $blocks
 */
class Document extends Model
{
    protected $fillable = [
        'name',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class)
            ->orderBy('position', 'ASC');
    }
}
