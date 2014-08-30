<?php
class RegistroComprobantePago extends Eloquent{
	protected $table='registroComprobantePago';
	protected $fillable = array('carro_id','operador_id','tipoComprobante_id','descripcion' ,'total','datoRendimiento_id');
	
	 public function carro()
    {
        return $this->belongsTo('Carro', 'carro_id');
    }
	public function tipoComprobante()
    {
        return $this->belongsTo('TipoComprobante', 'tipoComprobante_id');
    }
	
	 public function operador()
    {
        return $this->belongsTo('Operador', 'operador_id');
    }
	
	public function datoRendimiento()
    {
        return $this->belongsTo('DatoRendimiento', 'datoRendimiento_id');
    }
}
?>	