<?php
class DatoRendimiento extends Eloquent {
	protected $table = 'datoRendimiento';
	protected $fillable = array('kmInicial', 'kmFinal', 'litros', 'odometro', 'observacion', 'activo', 'carro_id');
	
	public function carro() {
		$this -> belongsTo('Carro', 'carro_id');
	}

}
?>