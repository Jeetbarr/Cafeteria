<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreCliente',
        'rutCliente',
        'cantpedidoCliente',

    ];

    public function servicios(){
        return $this->belongsTo(Servicios::class,'id_servicios');
    }
}
