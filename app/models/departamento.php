<?php
class Departamento extends Eloquent{	
	protected $table='departamento';	
	protected $fillable = array('descripcion','departamentoDepende_id');	
	protected $perPage = 6;	
	public function departamentoDepende()
	{
		return $this->belongsTo('Departamento','departamentoDepende_id');
	}
	public function Servicios(){
        return $this->hasMany('Servicio', 'departamento_id');
    }
}
?>