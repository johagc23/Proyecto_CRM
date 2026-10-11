<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock'];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_product')
                    ->withPivot('cantidad', 'fecha_asignacion')
                    ->withTimestamps();
    }
}
