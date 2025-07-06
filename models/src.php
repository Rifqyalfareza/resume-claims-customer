<?php 
require_once './config/db.php';

class src{
    private $db;
    public function __construct(){
        $this->db = database::connect();
    }

    public function all(){
        $stmt = $this->db->query("SELECT * FROM source_problem ORDER BY id_source DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $stmt = $this->db->query("SELECT * FROM source_problem WHERE id_source = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $srcname = strtoupper($data['source_problem']);
        $stmt = $this->db->prepare("INSERT INTO source_problem (source_problem) VALUES (?)");
        $stmt->execute([$srcname]);
    }
    public function update($id, $data){
        $srcname = strtoupper($data['source_problem']);
        $stmt = $this->db->prepare("UPDATE source_problem SET source_problem = ? WHERE id_source = ?");
        $stmt->execute([$srcname, $id]);
    }
    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM source_problem WHERE id_source = ?");
        $stmt->execute([$id]);
    }
}