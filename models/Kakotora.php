<?php 
require_once './config/db.php';

class Kakotora{
    private $db;

    public function __construct(){
        $this->db = database::connect();
    }

    public function all($filters = []){
        $query = "SELECT *, singkatan, nama_customer, part_name, nama_model, part_number FROM 
              resume_claim 
              JOIN part_customer ON resume_claim.id_part_cust = part_customer.id_part_cust 
              JOIN part ON part_customer.id_part = part.id_part 
              JOIN model ON part_customer.id_model = model.id_model
              JOIN customer ON part_customer.id_customer = customer.id_customer";

        $conditions = [];
        $params = [];

        if (!empty($filters['customer'])) {
            $conditions[] = "customer.id_customer = ?";
            $params[] = $filters['customer'];
        }

        if (!empty($filters['part'])) {
            $conditions[] = "part.id_part = ?";
            $params[] = $filters['part'];
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $query .= " ORDER BY id_resume_claim DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>