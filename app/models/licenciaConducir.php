<?php
class LicenciaConducir extends Eloquent{
	protected $table='licenciaConducir';
	protected $fillable = array('operador_id','numLicencia','tipo','vigencia','clasificacion','expedienteMedico','usuarioinsert_id','usuarioedit_id');
	
	protected $perPage = 6;
	public function registroComprobantePagos(){
        return $this->hasMany('RegistroComprobantePago', 'licenciaConducir_id');
     }
	
	public function operador()
	{
		return $this->belongsTo('Operador','operador_id');
	}
}
?>	