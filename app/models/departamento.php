<?php
class Departamento extends Eloquent{
	
	protected $table='departamento';
	
	protected $fillable = array('descripcion','departamentoDepende_id');
	
	public function departamentoDepende()
	{
		return $this->belongsTo('Departamento','departamentoDepende_id');
	}
}
?>	