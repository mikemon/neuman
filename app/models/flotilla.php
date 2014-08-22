<?php
class Flotilla extends Eloquent{
	protected $table='flotilla';
	protected $fillable = array('nombre','cliente_id','usuarioInsert_id','usuarioEdit_id','activo',);
	 public function cliente()
    {
        return $this->hasMany('Cliente', 'cliente_id');
    }
	
}
?>