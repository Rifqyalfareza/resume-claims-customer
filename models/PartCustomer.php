<?php
require_once './config/db.php';

class PartCustomer{
    private $db;
    
    public function __construct()
    {
       $this->db = database::connect(); 
    }
    public function all(){
        $stmt = $this->db->query("SELECT part_customer.id_part_cust, part_customer.part_number as part_number,part.id_part, part.part_name as part, customer.singkatan as customer,customer.nama_customer as customer_name, model.nama_model as model 
                                    FROM part_customer JOIN customer ON part_customer.id_customer = customer.id_customer
                                    JOIN part ON part_customer.id_part = part.id_part
                                    JOIN model ON part_customer.id_model = model.id_model ORDER BY id_part_cust DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $stmt = $this->db->query("SELECT part_customer.id_part_cust, part_customer.part_number as part_number,part.id_part, part.part_name as part_name, customer.singkatan as customer,customer.nama_customer,customer.id_customer, model.id_model,  model.nama_model as model 
                                    FROM part_customer JOIN customer ON part_customer.id_customer = customer.id_customer
                                    JOIN part ON part_customer.id_part = part.id_part
                                    JOIN model ON part_customer.id_model = model.id_model WHERE id_part_cust = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $partNum = strtoupper($data['part_number']);
        $stmt = $this->db->prepare("INSERT INTO part_customer (id_customer, id_part, id_model, part_number ) VALUES (?, ?, ?,?)"); 
        $stmt->execute([$data['id_customer'], $data['id_part'], $data['id_model'], $partNum]); 
    }
    public function update($id, $data){
        $partNum = strtoupper($data['part_number']);
        $stmt = $this->db->prepare("UPDATE part_customer SET id_customer = ?, id_part = ?, id_model = ?, part_number = ? WHERE id_part_cust = ?"); 
        $stmt->execute([$data['id_customer'], $data['id_part'], $data['id_model'], $partNum, $id]); 
    }
    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM part_customer WHERE id_part_cust = ?"); 
        $stmt->execute([$id]);
    }

}
?>