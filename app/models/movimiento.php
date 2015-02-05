<?php
class Movimiento extends Eloquent {
	protected $connection = 'firebird';
	protected $table = 'MAEMOVCA02';
	protected $fillable = array('NUMMOV', 'SERFOL', 'NUMPAG', 'NUMALM', 'NUMAGT', 'FCAPMOV', 'FDOCMOV', 'LEYMOV', 'PEDMOV', 'DCTMOV', 'AG2MOV', 'PZOMOV', 'NOMMOV', 'IVATMOV', 'IMPMOV', 'IEPSMOV', 'ANTMOV', 'NSORMOV', 'FLGMOV', 'REFMOV', 'NUMEYS', 'NUMFOL', 'APLIMOV', 'NUMUBI', 'NFORDMOV', 'HORAMOV', 'USER_ID', 'SRMOV', 'NUMFLT', 'CVEVEHI', 'CALLEMOV', 'COLMOV', 'POBMOV', 'RFCMOV', 'CURPMOV', 'ESTADOMOV', 'CPMOV', 'FAXMOV', 'TELMOV', 'NUMZETA', 'NUMTICKET', 'NLECTE', 'NLICTE', 'VALE', 'REPLICA', 'NUMALM2', 'ESQUEMA', 'NUMMON', 'TIPO_COMP', 'STSCON');
	protected $perPage = 6;
	public $numalm = null;
	public $apartadoAutomatico = null;
	
	public $nummov=null;
	
	public function terminar($serie, $folio, $coti=0) {
        $numfolviejo = 107393;
        
	}
	public function crearMovimiento(){
		$con = 1;
        //$mov = $this->db->Execute("select NUMMOV from agrega_mov_vacio('M', 52)");
        $sql = "select NUMMOV from agrega_mov_vacio('M', 52)";
		$mov = DB::connection('firebird') -> select($sql);
		echo json_encode($mov);
		
		//if (count($rs) > 0) {
		//	return $rs[0];
		//} else {
			//return false;
		//}
		/*
		while (($mov->fields['NUMMOV'] == 0 and $con <= 20) or ($mov->fields['NUMMOV'] == 'NULL' and $con <= 20)) {
            $mov = $this->db->Execute("select NUMMOV from agrega_mov_vacio('M', 52)");
            $con++;
        }
		*/
	}
	

}
?>