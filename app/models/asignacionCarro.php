<?php
class AsignacionCarro extends Eloquent{
	protected $table='asignacionCarro';
	protected $fillable = array('carro_id','operador_id','usuarioInsert_id','usuarioEdit_id','activo',);
	 public function carro()
    {
        return $this->belongsTo('Carro', 'carro_id');
    }
	 public function operador()
    {
        return $this->belongsTo('Operador', 'operador_id');
    }
	
}
?>