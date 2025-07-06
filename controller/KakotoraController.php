<?php 
require_once './models/Kakotora.php';
require_once './models/part.php';

class KakotoraController{
    private $kakotora, $part;

    public function __construct(){
        $this->kakotora = new Kakotora();
        $this->part = new part();
    }

    public function index(){
        $filters = [
            'customer' => isset($_GET['customer']) ? (int)$_GET['customer'] : null,
            'part' => isset($_GET['part']) ? (int)$_GET['part'] : null
        ];

        $kakotora = $this->kakotora->all($filters);
        $parts = $this->part->all();
        // $kakotora = $this->kakotora->all();
        include './view/kakotora/index.php';
    }
}

?>