<?php 
require_once './config/db.php';

class part{
    private $db;
    public function __construct(){
        $this->db = database::connect();
    }

    public function all(){
        $stmt = $this->db->query("SELECT * FROM part");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $stmt = $this->db->query("SELECT * FROM part WHERE id_part = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $partname = strtoupper($data['part_name']);
        $stmt = $this->db->prepare("INSERT INTO part (part_name) VALUES (?)");
        $stmt->execute([$partname]);
    }
    public function update($id, $data){
        $partname = strtoupper($data['part_name']);
        $stmt = $this->db->prepare("UPDATE part SET part_name = ? WHERE id_part = ?");
        $stmt->execute([$partname, $id]);
    }
    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM part WHERE id_part = ?");
        $stmt->execute([$id]);
    }
}