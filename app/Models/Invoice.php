<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [

    ];
    /**
     * Por cada factura, solo puede haber un cliente asociado. 
     * Por lo tanto, la relación entre la tabla de clientes y la tabla de facturas
     * es una relación uno a muchos.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
