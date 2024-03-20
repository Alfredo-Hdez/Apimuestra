<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
*Se crea clase con el nombre de Customer
*Se utiliza el trait HasFactory
*Se define el nombre de la tabla en la base de datos
*Se define los campos que se pueden llenar en la base de datos
*Se define la relación uno a muchos con la tabla de facturas
*/
class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'email',
        'address',
        'city',
        'state',
        'postal_code',
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
