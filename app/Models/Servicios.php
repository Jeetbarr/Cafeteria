<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicios extends Model
{
    use HasFactory;
    protected $fillable = [
        'ventaServicio',
        'precioServicio',
        'fotoServicio',
    ];
    public function clientes(){
        return $this->HasMany(Clientes::class, 'id');
    }


}
