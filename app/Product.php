<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'stock',
    ];
    /**
     * @var mixed
     */
    private $name;
    /**
     * @var mixed
     */
    private $stock;
    /**
     * @var mixed
     */
    private $price;
}
