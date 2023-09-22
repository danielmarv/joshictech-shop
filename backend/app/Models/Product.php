<?php
// Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'quantity', 'category', 'image',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
