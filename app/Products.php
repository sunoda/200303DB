<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['img' , 'type' , 'sort' , 'title' , 'content' , 'price'];

    public function product_types()
    {
        return $this->belongsTo('App\ProductTypes','type');
    }
}
