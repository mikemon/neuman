<?php
class MarcaLlanta extends Eloquent{
	protected $table='marcaLlanta';
	protected $fillable = array('descripcion', 'usuarioInsert_id','usuarioEdit_id');
}

?>	