<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function slug(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value,
            set: fn ($value) => Str::slug($value),
        );
    }
}
