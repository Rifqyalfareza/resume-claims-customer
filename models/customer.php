<?php 
include './config/db.php';

class Customer{
    private $db;

    public function __construct(){
        $this->db = database::connect();
    }
    public function all(){
        $stmt = $this->db->query("SELECT * FROM customer ORDER BY id_customer DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $stmt = $this->db->query("SELECT * FROM customer WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $customer = strtoupper($data['nama_customer']);
        $singkatan = strtoupper($data['singkatan']);
        $alamat = strtoupper($data['alamat']);
        $stmt = $this->db->prepare("INSERT INTO customer (nama_customer, singkatan, alamat) VALUES (?, ?, ?)");
        $stmt->execute([$customer, $singkatan, $alamat]);
    }
    public function update($id, $data){
        $customer = strtoupper($data['nama_customer']);
        $singkatan = strtoupper($data['singkatan']);
        $alamat = strtoupper($data['alamat']);
        $stmt = $this->db->prepare("UPDATE customer SET nama_customer = ?, singkatan = ?, alamat = ? WHERE id_customer = ?");
        $stmt->execute([$customer, $singkatan, $alamat, $id]);
    }
    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM customer WHERE id_customer = ?");
        $stmt->execute([$id]);
    }
}

?>