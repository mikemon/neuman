<?php
class Flotilla extends Eloquent{
	protected $table='flotilla';
	protected $fillable = array('nombre','cliente_id','usuarioInsert_id','usuarioEdit_id','activo',);
	 public function cliente()
    {
        return $this->belongsTo('Cliente', 'cliente_id');
    }
	public function carros(){
        return $this->hasMany('Carro', 'flotilla_id');
     }
	
}
?>