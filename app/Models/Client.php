<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_empresa',
        'contacto_principal',
        'telefono_whatsapp',
        'zona_geografica',
        'user_id',
        'origin_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'client_product')
                    ->withPivot('cantidad', 'fecha_asignacion')
                    ->withTimestamps();
    }
}
