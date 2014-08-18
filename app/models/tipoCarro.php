<?php
class TipoCarro extends Eloquent {
	protected $table = 'tipoCarro';
	protected $fillable = array('descripcion','layoutChasis', 'usuarioInsert_id', 'usuarioEdit_id');
}
?>
