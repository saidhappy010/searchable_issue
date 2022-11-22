<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class School extends Model {
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'address',
        'email',

    ];

    protected array $translatable = ['name', 'address'];

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo( City::class, 'city_id', 'id' );
    }

}
