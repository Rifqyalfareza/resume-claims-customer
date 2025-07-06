<?php
require_once './config/db.php';

class Resume
{
    private $db;

    public function __construct()
    {
        $this->db = database::connect();
    }
    public function all($filters = [])
    {
        $query = "SELECT *, singkatan, nama_customer, part_name, nama_model, part_number, alamat FROM 
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
    public function create($data)
    {
        $status = "OPEN";
        $proses = "sakanobory";
        $problem = strtoupper($data['problem']);
        $stmt = $this->db->prepare("INSERT INTO resume_claim (id_part_cust, id_source, tanggal, no_claim, 
                                    status, problem, proses, qty_ng, media_file) 
                                    VALUES (?, ?, ?, ?, ?, ?,?,?,?)");
        $stmt->execute([
            $data['id_part_cust'],
            $data['id_source'],
            $data['tanggal'],
            $data['no_claim'],
            $status,
            $problem,
            $proses,
            $data['qty_ng'],
            $data['media_file']
        ]);
    }
    public function updateStatus($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE resume_claim SET proses = ? WHERE id_resume_claim = ?");
        $stmt->execute([$data['proses'], $id]);
    }
    public function createAnalysis($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $proses = $_POST['proses'];
        $proses == 'Waiting' ? $status = "OPEN" : $status = "CLOSED";
        $approved_at = date('Y-m-d H:i:s');

        if($proses == 'Waiting'){
            $stmt = $this->db->prepare("UPDATE resume_claim SET problem=?,occured = ?, lost_inspection = ?, status = ?, proses = ?, pencegahan = ? WHERE id_resume_claim = ?");
            try {
                $stmt->execute([
                    $data['problem'],
                    $data['occured'],
                    $data['lost_inspection'],
                    $status,
                    $data['proses'],
                    $data['pencegahan_file'],
                    $data['id_resume_claim']
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }else{
            $stmt = $this->db->prepare("UPDATE resume_claim SET problem=?,occured = ?, lost_inspection = ?, status = ?, proses = ?, pencegahan = ?, approved_at = ? WHERE id_resume_claim = ?");
            try {
                $stmt->execute([
                    $data['problem'],
                    $data['occured'],
                    $data['lost_inspection'],
                    $status,
                    $data['proses'],
                    $data['pencegahan_file'],
                    $approved_at,
                    $data['id_resume_claim']
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    public function delete($id)
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("SELECT media_file, pencegahan FROM resume_claim WHERE id_resume_claim = ?");
            $stmt->execute([$id]);
            $resume = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$resume) {
                throw new Exception("Resume claim not found.");
            }

            if (!empty($resume['media_file'])) {
                $mediaPath = realpath($resume['media_file']);
                $mediaDir = realpath('media/');
                if ($mediaPath && strpos($mediaPath, $mediaDir) === 0 && file_exists($mediaPath)) {
                    if (!unlink($mediaPath)) {
                        error_log("Failed to delete media file: $mediaPath");
                    }
                } else {
                    error_log("Media file not found or invalid path: $mediaPath");
                }
            }

            if (!empty($resume['pencegahan'])) {
                $pencegahanPath = realpath($resume['pencegahan']);
                $uploadsDir = realpath('uploads/');
                if ($pencegahanPath && strpos($pencegahanPath, $uploadsDir) === 0 && file_exists($pencegahanPath)) {
                    if (!unlink($pencegahanPath)) {
                        error_log("Failed to delete pencegahan file: $pencegahanPath");
                    }
                } else {
                    error_log("Pencegahan file not found or invalid path: $pencegahanPath");
                }
            }

            $stmt = $this->db->prepare("DELETE FROM resume_claim WHERE id_resume_claim = ?");
            $stmt->execute([$id]);

            if ($stmt->rowCount() === 0) {
                throw new Exception("Failed to delete resume claim.");
            }
            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Error deleting resume claim: " . $e->getMessage());
        }
    }
}
