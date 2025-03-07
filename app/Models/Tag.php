<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{

    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }
}
