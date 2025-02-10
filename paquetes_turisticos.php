<?php
class PaqueteTuristico {
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $imagen;
    public $duracion;

    public function __construct($id, $nombre, $descripcion, $precio, $imagen, $duracion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->duracion = $duracion;
    }
}

// Definir los paquetes turísticos
$paquetes = [
    new PaqueteTuristico(1, "Cancún", "Disfruta del Caribe con playas paradisíacas y aguas cristalinas.", 1200, "images/cancun.jpg", "5 días / 4 noches"),
    new PaqueteTuristico(2, "Nueva York", "Explora la Gran Manzana y sus rascacielos impresionantes.", 1500, "images/nueva york.jpg", "6 días / 5 noches"),
    new PaqueteTuristico(3, "París", "Descubre la ciudad del amor junto a tu pareja con su icónica Torre Eiffel.", 1700, "images/paris.jpg", "7 días / 6 noches"),
    new PaqueteTuristico(4, "Rapa Nui", "Explora la misteriosa Isla de Pascua y sus moáis legendarios.", 1400, "images/rapanui.jpg", "5 días / 4 noches")
];
?>
