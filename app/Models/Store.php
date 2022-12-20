<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'description', 'address', 'image'];

    public function products()
    {
        return $this->hasMany(Products::class, 'store_id');
    }

    protected static function booted()
    {
     self::addGlobalScope('orderByName', function (Builder $queryBuilder) {
         $queryBuilder->orderBy('name' , 'asc');
     });
    }

}
