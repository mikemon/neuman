<?php
class Carro extends Eloquent{
	protected $table='carros';
	protected $fillable = array('marca','modelo','placas','noSerie','tipoCarro_id','noMotor',
								'polizaSeguros','noEconomico','capacidadTon','inciso','tipoMotor','flotilla_id');
	
	protected $perPage = 8;
	public function registroComprobantePagos($campo='id',$sort='asc'){
        return $this->hasMany('RegistroComprobantePago', 'carro_id')->orderBy($campo, $sort);
    }
	
	public function tipoCarro()
	{
		return $this->belongsTo('TipoCarro','tipoCarro_id');
	}
	public function flotilla()
	{
		return $this->belongsTo('Flotilla','flotilla_id');
	}
	public function datosRendimiento(){
        return $this->hasMany('DatoRendimiento', 'carro_id');
    }
	public function ordenesServicio(){
        return $this->hasMany('OrdenServicio', 'carro_id');
    }
	
	public function asignacionesCarro(){
        return $this->hasMany('AsignacionCarro', 'carro_id')->where('activo', 'true');
    }
	
}
?>	