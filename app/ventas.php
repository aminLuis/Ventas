<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    /**
     * Get the cliente associated with the ventas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    //Relación de muchos a uno, una venta sólo puede tener un cliente 
    public function cliente(): HasOne
    {
        return $this->hasOne(cliente::class);
    }
}
