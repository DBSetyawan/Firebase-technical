<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name', 'product_description'
    ];

}
