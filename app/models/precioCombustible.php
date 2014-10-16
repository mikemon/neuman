<?php
class PrecioCombustible extends Eloquent{
	protected $table='precioCombustible';
	protected $fillable = array('descripcion', 'precio','usuarioInsert_id','usuarioEdit_id');
	
	public function tipoCarros() {
		return $this -> hasMany('TipoCarro', 'precioCombustible_id');
	}
	
}
?>	