<?php
class Carro extends Eloquent{
	protected $table='carros';
	protected $fillable = array('marca','modelo','placas' ,'numllantas');
	
	public function registroComprobantePagos(){
        return $this->hasMany('registroComprobantePago', 'carro_id');
        // Para declarar una relación uno a muchos se hace uso de la función hasMany().
        // Al igual que hasOne, esta función recibe dos parámetros.
        // El primero es el modelo al cual se desea asociar
        // El segundo es el id con el que se van a relacionar los modelos.
    }
}
?>	