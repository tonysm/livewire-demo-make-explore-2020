<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Block extends Model
{
    protected $fillable = [
        'content',
        'position',
        'version',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
