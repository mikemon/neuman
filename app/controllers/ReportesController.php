<?php

class ReportesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * 
	 * @return Response
	 */

	public function comprobantes() {

		$listFlotilla = Flotilla::orderBy('id', 'asc')->get();

		return View::make('reportes.filtroComprobantes', array('listFlotilla' => $listFlotilla));

	}

	public function reporteComprobantes() {

		$fechaIni = $_POST['fechaComprobanteIni'];
		$fechaFin = $_POST['fechaComprobanteFin'];
		$opcion = trim($_POST['opcion']);
		/*
		 $sql = 'select r.* from  "registroComprobantePago" r
		 inner join carros c on (r.carro_id=c.id and c.flotilla_id=2)
		 where  r."fechaComprobante" between \''.$fechaIni.'\' and \''.$fechaFin.'\'
		 order by r.carro_id asc, r."fechaComprobante" asc';

		 $listaComprobante = DB::select($sql)->get();
		 $listaComprobante = RegistroComprobantePago::whereBetween('fechaComprobante', array($fechaIni, $fechaFin))
		 -> orderBy('carro_id', 'asc')
		 -> orderBy('fechaComprobante', 'asc') -> get();
		 */
		/*
		 $listaComprobante = RegistroComprobantePago::with(array('carro' => function($query) use ($id){
		 $query -> where('id', '=', $id);
		 })) -> get();
		 $cnt = 0;
		 foreach ($listaComprobante as $key => $value) {
		 echo 'Id comprobante :' . @$value -> id . ' Carro: ' . @$value -> carro -> id . ' Flotilla: ' . @$value -> carro -> flotilla_id;
		 echo '<br>';
		 $cnt++;
		 }
		 */
		$id = $_POST['flotilla_id'];
		$aIdCarros = array();
		$flotillaInstance = Flotilla::find($id);

		$cnt = 0;
		foreach ($flotillaInstance->carros as $key => $value) {
			$aIdCarros[] = $value -> id;
			$cnt++;
		}

		$listaComprobante = RegistroComprobantePago::whereIn('carro_id', $aIdCarros) -> whereBetween('fechaComprobante', array($fechaIni, $fechaFin)) -> orderBy('carro_id', 'asc') -> orderBy('fechaComprobante', 'asc') -> get();
		/*
		 $cnt=0;
		 foreach ($listaComprobante as $key => $value) {
		 echo 'Id comprobante :' . @$value -> id . ' Carro: ' . @$value -> carro -> id . ' Flotilla: ' . @$value -> carro -> flotilla_id;
		 echo '<br>';
		 $cnt++;
		 }
		 */
		
		 header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		 header("Content-Disposition: attachment; filename=RegistroDeComprobantes_" . date('d-m-Y') . ".xls");
		 header("Expires: 0");
		 header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		 header("Cache-Control: private", false);
		 
		//$listaComprobante = RegistroComprobantePago::all();
		if ($opcion == "porCarro") {
			return View::make('reportes.comprobantesPorCarro', array('listaComprobantes' => $listaComprobante, 'op' => $opcion));
		} else {
			if ($opcion == "porMes") {
				return View::make('reportes.comprobantesPorMes', array('listaComprobantes' => $listaComprobante, 'op' => $opcion));
			}

		}

	}

}
