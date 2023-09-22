<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name', 'description', 'address', 'contact',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
