<?php
class Llanta extends Eloquent{
	protected $table='llantas';
	protected $fillable = array('matricula','descripcion','marcaLlanta_id' ,'medidaLlanta_id','status','usuarioInsert_id','usuarioEdit_id',);
	
	public function registroMovimientoLlanta(){
        return $this->hasMany('registroMovimientoLlanta', 'llanta_id');
    }
	public function marca()
	{
		return $this->belongsTo('Marca','marca_id');
	}
	public function medida()
    {
        return $this->belongsTo('Medida', 'medidaLlanta_id');
    }
	
}
?>	