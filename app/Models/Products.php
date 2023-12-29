<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'categorys_id',
        'price',
        'description',
        'picture',
    ];


    public function scopeFilter($query, array $filters){
        // dd($filters['search']);
        if($filters['search'] ?? false){
            $query->where('product_name','like','%'.request('search').'%');
        };
    }

}
