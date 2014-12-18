<?php

class ReportesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function comprobantes() {

		return View::make('reportes.filtroComprobantes', array('listaComprobantes' => null));

	}

	public function reporteComprobantes() {

		//echo json_encode($_POST);
		$fechaIni = $_POST['fechaComprobanteIni'];

		$fechaFin = $_POST['fechaComprobanteFin'];
		$opcion = trim($_POST['opcion']);
		$listaComprobante = RegistroComprobantePago::whereBetween('fechaComprobante', array($fechaIni, $fechaFin)) -> orderBy('carro_id', 'asc') -> orderBy('fechaComprobante', 'asc') -> get();
		
		

		
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=RegistroDeComprobantes_" . date('d-m-Y') . ".xls");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false);
		

		//$listaComprobante = RegistroComprobantePago::all();
		
		if ($opcion == "porCarro") {
					return View::make('reportes.comprobantesPorCarro', array('listaComprobantes' => $listaComprobante,'op'=>$opcion));
			
		} else {
			if ($opcion == "porMes") {
				return View::make('reportes.comprobantesPorMes', array('listaComprobantes' => $listaComprobante,'op'=>$opcion));
			
		
			}

		}
		
		
	}

}
