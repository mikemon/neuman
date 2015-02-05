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
  'fallaReportada',
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
  'edoenvio',
  'carro_id',
  'datoRendimiento_id',
  'usuarioInsert_id',
  'usuarioEdit_id');
	
	protected $perPage = 8;
	
	public function carro()
	{
		return $this->belongsTo('Carro','carro_id');
	}
	public function flotilla()
	{
		return $this->belongsTo('Flotilla','flotilla_id');
	}
	public function servicios(){
		return $this->belongsToMany('Servicio','ordenServicio_servicio','ordenServicio_id','servicio_id')
					->withPivot('id','precio','cantidad','subtotal','observacion');
	}
	public function productos(){
		
		return $this->hasMany('OrdenServicioProducto','ordenServicio_id');	
	}
	
	public function datoRendimiento()
    {
        return $this->hasOne('DatoRendimiento', 'id');
    }
}
?>	