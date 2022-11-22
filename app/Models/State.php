<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class State extends Model {
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
    ];

    protected array $translatable = ['name'];

    public function cities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany( City::class, 'state_id', 'id' );
    }
}
