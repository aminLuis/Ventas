<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
   

  

   /**
    * Get all of the comments for the cliente
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */

  //Relación de uno a muchos, un cliente puede tener varios detalles de venta
  /* public function detallesVenta(): HasMany
   {
       return $this->hasMany(ventas::class, 'idCliente');
   }*/
}
