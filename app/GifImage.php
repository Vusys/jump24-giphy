<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GifImage extends Model
{
    protected $fillable = ['type', 'url', 'file_name'];

    public function gif(): BelongsTo
    {
        return $this->belongsTo(Gif::class);
    }
}
