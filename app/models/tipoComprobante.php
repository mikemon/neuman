<?php
class TipoComprobante extends Eloquent{
	protected $table='tipoComprobante';
	protected $fillable = array('descripcion');
	
	public function registroComprobantesPago(){
        return $this->hasMany('registroComprobantePago', 'carro_id');
    }
}
?>	