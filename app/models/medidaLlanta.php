<?php
class MedidaLlanta extends Eloquent{
	protected $table='medidaLlanta';
	protected $fillable = array('descripcion', 'usuarioInsert_id','usuarioEdit_id');
	
	public function llantas() {
		return $this -> hasMany('Llanta', 'medida_id');
	}
}

?>	