<?php
class OrdenServicio extends Eloquent{
	protected $table='ordenServicio';
	protected $fillable = array('serfol',
  'numfol',
  'numagt',
  'numcte',
  'chasis',
  'cvemov',
  'fventa',
  'fingreso',
  'hora',
  'fsalida',
  'hsalida',
  'torre',
  'fallareportada',
  'estado',
  'observaciones',
  'tipoventa',
  'pass',
  'cveaseguradora',
  'numalm',
  'nummovca',
  'fechatermino',
  'cvearea',
  'cveareaact',
  'edoenvio');
	
	protected $perPage = 8;
	/*
	public function registroComprobantePagos(){
        return $this->hasMany('RegistroComprobantePago', 'carro_id');
        // Para declarar una relación uno a muchos se hace uso de la función hasMany().
        // Al igual que hasOne, esta función recibe dos parámetros.
        // El primero es el modelo al cual se desea asociar
        // El segundo es el id con el que se van a relacionar los modelos.
    }
	*/
	public function carro()
	{
		return $this->belongsTo('Carro','carro_id');
	}
	public function flotilla()
	{
		return $this->belongsTo('Flotilla','flotilla_id');
	}
}
?>	