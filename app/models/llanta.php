<?php
class Llanta extends Eloquent{
	protected $table='llantas';
	protected $fillable = array('matricula','descripcion','marcaLlanta_id' ,'medidaLlanta_id','status','usuarioInsert_id','usuarioEdit_id',);
	
	public function registroMovimientoLlanta(){
        return $this->hasMany('registroMovimientoLlanta', 'llanta_id');
        // Para declarar una relación uno a muchos se hace uso de la función hasMany().
        // Al igual que hasOne, esta función recibe dos parámetros.
        // El primero es el modelo al cual se desea asociar
        // El segundo es el id con el que se van a relacionar los modelos.
    }
}
?>	