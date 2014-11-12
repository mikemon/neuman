<?php
class RegistroComprobantePago extends Eloquent{
	protected $table='registroComprobantePago';
	protected $fillable = array('carro_id','operador_id','tipoComprobante_id','descripcion' ,
	'total','usuarioInsert_id','usuarioEdit_id','datoRendimiento_id','fechaComprobante');
	
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
        return $this->hasOne('DatoRendimiento', 'datoRendimiento_id');
    }

}
?>	