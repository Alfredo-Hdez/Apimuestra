<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fiable = [

    ];
    
    /**
     * Un cliente puede tener muchas facturas asociadas.
     * Por lo tanto, la relación entre la tabla de clientes y la tabla de facturas
     * es una relación uno a muchos.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
     
    }
}
