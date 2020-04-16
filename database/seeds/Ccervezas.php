     <?php  

        class cerveza {
        public $nombrecerveza;
        public $estilo;
        public $aspecto;
        public $sabor_aroma;
        public $alcohol;
        public $temp_consumo;
        public $maridaje;
        public $presentacion;
        public $precio;
        public $cantidad;

        public function setNombreCerveza($nombre){
            $this->nombrecerveza = $nombre;
        }

        public function getNombreCerveza(){
            return $this->nombrecerveza;
        }
    }
    ?> 