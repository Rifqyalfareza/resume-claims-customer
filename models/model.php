<?php
include './config/db.php';

class model{
    private $db;

    public function __construct(){
        $this->db = database::connect();
    }
    public function all(){
        $stmt = $this->db->query("SELECT * FROM model ORDER BY id_model DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $stmt = $this->db->query("SELECT * FROM model WHERE id_model = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $nama_model = strtoupper($data['nama_model']);
        $stmt = $this->db->prepare("INSERT INTO model (nama_model) VALUES (?)");
        $stmt->execute([$nama_model]);
    }
    public function update($id, $data){
        $stmt = $this->db->prepare("UPDATE model SET nama_model = ? WHERE id_model = ?");
        $stmt->execute([$data['nama_model'], $id]);
    }
    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM model WHERE id_model = ?");
        $stmt->execute([$id]);
    }
}