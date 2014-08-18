<?php
class MarcaLlanta extends Eloquent {
	protected $table = 'marcaLlanta';
	protected $fillable = array('descripcion', 'usuarioInsert_id', 'usuarioEdit_id');
	
	public function llantas() {
		return $this -> hasMany('Llanta', 'marca_id');
	}

}
?>
