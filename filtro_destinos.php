<?php

class FiltroDestinos {
    public $nombreHotel;
    public $ciudad;
    public $pais;
    public $fechaViaje;
    public $duracion;

    public function __construct($nombreHotel, $ciudad, $pais, $fechaViaje, $duracion) {
        $this->nombreHotel = $nombreHotel;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->fechaViaje = $fechaViaje;
        $this->duracion = $duracion;
    }
}

// Lista de destinos actualizada con más información
$destinos = [
    new FiltroDestinos("Hotel Cancún Resort", "Cancún", "México", "2024-07-15", "5 días"),
    new FiltroDestinos("New York Grand Hotel", "Nueva York", "EE.UU.", "2024-08-10", "6 días"),
    new FiltroDestinos("Eiffel Luxury Stay", "París", "Francia", "2024-09-20", "7 días"),
    new FiltroDestinos("Rapa Nui Lodge", "Isla de Pascua", "Chile", "2024-10-05", "4 días")
];

// Obtener valores del formulario
$hotelBuscado = isset($_GET['hotel']) ? $_GET['hotel'] : "";
$ciudadBuscada = isset($_GET['ciudad']) ? $_GET['ciudad'] : "";
$paisBuscado = isset($_GET['pais']) ? $_GET['pais'] : "";
$fechaBuscada = isset($_GET['fecha']) ? $_GET['fecha'] : "";
$duracionBuscada = isset($_GET['duracion']) ? $_GET['duracion'] : "";

// Función para filtrar destinos con todos los criterios
function filtrarDestinos($destinos, $hotel, $ciudad, $pais, $fecha, $duracion) {
    $resultados = [];
    foreach ($destinos as $destino) {
        if ((empty($hotel) || stripos(trim($destino->nombreHotel), trim($hotel)) !== false) &&
            (empty($ciudad) || stripos(trim($destino->ciudad), trim($ciudad)) !== false) &&
            (empty($pais) || stripos(trim($destino->pais), trim($pais)) !== false) &&
            (empty($fecha) || $destino->fechaViaje === $fecha) &&
            (empty($duracion) || stripos(trim($destino->duracion), trim($duracion)) !== false)) {
            $resultados[] = $destino;
        }
    }
    return $resultados;
}

// Filtrar los destinos con los valores ingresados
$resultados = filtrarDestinos($destinos, $hotelBuscado, $ciudadBuscada, $paisBuscado, $fechaBuscada, $duracionBuscada);

?>
