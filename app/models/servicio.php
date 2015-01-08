<?php
class Servicio extends Eloquent{
	
	protected $table='servicio';
	
	protected $fillable = array('descripcion','departamento_id','tipoServicio_id','proveedor_id','codigo');
	
	
	
	public function ordenes(){
		return $this->belongsToMany('OrdenServicio','ordenServicio_servicio')->withPivot('subtotal','observacion');
	}
	
}
?>	