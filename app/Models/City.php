<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class City extends Model {
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = ['name'];

    protected array $translatable = ['name'];

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo( State::class, 'state_id', 'id' );
    }

    public function schools(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany( School::class, 'city_id', 'id' );
    }
}
