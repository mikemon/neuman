<?php
class Maealm extends Eloquent {
	protected $connection = 'firebird';
	protected $table = 'MAEALM';
	protected $fillable = array('NUMART', 'NUMART', 'EXUALM', 'EXPALM', 'APAALM', 'PSUALM', 'PREALM', 'REPLICA', 'ASIGALM');
	protected $perPage = 6;
	public $numalm = null;
	public $apartadoAutomatico = null;

	public function Maealm() {
		$result = Configuracion::whereVariable('almacenProductos') -> first();
		if ($result) {
			$this -> numalm = $result -> valor;
		} else {
			echo "No se ha configurado almacenProductos para Ordenes de servivio";
			exit ;
		}

		$result = Configuracion::whereVariable('apartadoAutomatico') -> first();
		if ($result) {
			$this -> apartadoAutomatico = ((strtoupper($result -> valor) == "SI") ? true : false);
		} else {
			echo "No se ha configurado apartadoAutomatico en Ordenes de servivio";
			exit ;
		}
	}

	public function getExistencia($numart) {

		$sql = "select (EXUALM-APAALM) as DISPONIBLE from MAEALM where NUMALM = '$this->numalm' and NUMART = '$numart'";
		$rs = DB::connection('firebird') -> select($sql);
		if (count($rs) > 0) {
			return $rs[0];
		} else {
			return false;
		}
	}

	public function setApartado($numart, $cantidad) {

		$sql = "select apaalm from maealm where numalm = '" . $this -> numalm . "' and numart = '" . $numart . "'";
		$rs = DB::connection('firebird') -> select($sql);
		$rs = $rs[0];

		if ($rs -> APAALM == '') {
			$sql = "update maealm set apaalm = 0 where numalm = '" . $this -> numalm . "' and numart = '" . $numart . "'";
			$rsUpdate = DB::connection('firebird') -> select($sql);
		}

		$sql = "update maealm set apaalm = " . $cantidad . " where numalm = '" . $this -> numalm . "' and numart = '" . $numart . "'";
		$rsApartado = DB::connection('firebird') -> select($sql);
		return true;

	}

}
?>
