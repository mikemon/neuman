<?php
class Cliente extends Eloquent{
	protected $table='cliente';
	protected $fillable = array('numcte','nomcte','dircte','colcte','pobcte','estado','pais','telcte','agtcte','lcrcte',
'avacte','bajcte','obscte','pzocte','dipcte','cobcte','rfccte','flgcte','lprcte','feccte','blzcte','ctacte','iepcte',
'razcte','mailcte','webcte','curpcte','ufacte','sercte','isracte','retacte','isrbcte','retbcte','cancte','faxcte',
'fanicte','muncte','nlecte','nlicte','cpcte','dispcte','numtipo','numruta','puncte','monecte','replica','de1cte',
'de2cte','de4cte','de5cte','saldo','pwdweb','nomcte2','dircte2','usuarioInsert_id','usuarioEdit_id','activo');

public function flotillas(){
        return $this->hasMany('Flotilla', 'cliente_id');
     }

}
?>