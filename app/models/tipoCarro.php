<?php
class TipoCarro extends Eloquent {
	protected $table = 'tipoCarro';
	protected $fillable = array('descripcion','layoutChasis', 'usuarioInsert_id', 'usuarioEdit_id','precioCombustible_id');


	
	public function precioCombustible()
	{
		return $this->belongsTo('PrecioCombustible','precioCombustible_id');
	}
}
?>
