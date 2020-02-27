<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $position
 * @property string $version
 * @property string $content
 * @property \App\Document $document
 */
class Block extends Model
{
    protected $fillable = [
        'content',
        'position',
        'version',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
