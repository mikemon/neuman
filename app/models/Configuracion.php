<?php
class Configuracion extends Eloquent{
	protected $table='config';
	protected $fillable = array('variable','valor');
	protected $perPage = 6;
	
}
?>	