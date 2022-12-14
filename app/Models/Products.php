<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity', 'store_id', 'image'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('orderByName', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('name' , 'asc');
        });
    }

}
