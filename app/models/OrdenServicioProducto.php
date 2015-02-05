<?php
class OrdenServicioProducto extends Eloquent{
	
	protected $table='ordenServicioProducto';
	
	protected $fillable = array('numart','descripcion','cantidad','precio','subtotal','ordenServicio_id','usuarioInsert_id','usuarioEdit_id');
	
	public function ordenServicio()
    {
        return $this->belongsTo('OrdenServicio', 'ordenServicio_id');
    }
	
}
?>