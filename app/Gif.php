<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gif extends Model
{
    protected $fillable = ['giphy_id', 'local_path'];

    public function images(): HasMany
    {
        return $this->hasMany(GifImage::class);
    }
}
