<?php
class Helpers {
    public static function doMessage() {
        $message = 'Hello';
        return $message;
    }
	
		public static function isToday($fecha) {
		$fechaIn = $fecha;//$input['fecha'];
		$fechaActual = date('Y-m-d H:i:s');
		$datetime1 = new DateTime($fechaActual);
		$datetime2 = new DateTime($fechaIn);
		$interval = $datetime1 -> diff($datetime2);

		return (($datetime1 -> format('Y-m-d') == $datetime2 -> format('Y-m-d')) ? true : false);
	}
}