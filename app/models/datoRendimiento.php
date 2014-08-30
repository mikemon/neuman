<?php
class DatoRendimiento extends Eloquent{
	protected $table='datoRendimiento';
	protected $fillable = array('kmInicial','kmFinal','litros','odometro','observacion','activo');
}
?>