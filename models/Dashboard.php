<?php
require_once './config/db.php';

class Dashboard
{
    private $db;

    public function __construct()
    {
        $this->db = database::connect();
    }

    public function getClaim($year = null)
    {
        $sql = "
            SELECT 
                YEAR(tanggal) AS tahun,
                MONTH(tanggal) AS bulan,
                no_claim,
                COUNT(*) AS total
            FROM resume_claim
        ";
        $params = [];
        if ($year) {
            $sql .= " WHERE YEAR(tanggal) = :year";
            $params['year'] = $year;
        }
        $sql .= " GROUP BY tahun, bulan, no_claim ORDER BY tahun, bulan";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAvailableYears()
    {
        $sql = "SELECT DISTINCT YEAR(tanggal) AS year FROM resume_claim ORDER BY year DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getAvailableMonths($year = null)
    {
        $sql = "SELECT DISTINCT MONTH(tanggal) AS month FROM resume_claim";
        $params = [];
        if ($year) {
            $sql .= " WHERE YEAR(tanggal) = :year";
            $params['year'] = $year;
        }
        $sql .= " ORDER BY month";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getClaimByCustomer($year = null, $month = null)
    {
        $sql = "
            SELECT 
                YEAR(rs.tanggal) AS tahun,
                MONTH(rs.tanggal) AS bulan,
                c.singkatan AS customer,
                rs.no_claim,
                COUNT(*) AS total
            FROM resume_claim rs
            JOIN part_customer pc ON rs.id_part_cust = pc.id_part_cust
            JOIN customer c ON pc.id_customer = c.id_customer
        ";
        $params = [];
        if ($year || $month) {
            $sql .= " WHERE 1=1";
            if ($year) {
                $sql .= " AND YEAR(rs.tanggal) = :year";
                $params['year'] = $year;
            }
            if ($month) {
                $sql .= " AND MONTH(rs.tanggal) = :month";
                $params['month'] = $month;
            }
        }
        $sql .= " GROUP BY tahun, bulan, c.id_customer, rs.no_claim ORDER BY tahun, bulan, c.singkatan, rs.no_claim";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSourceProblemPerformance($year = null, $month = null)
    {
        $sql = "
            SELECT 
                YEAR(rs.tanggal) AS tahun,
                MONTH(rs.tanggal) AS bulan,
                source_problem,
                COUNT(*) as jumlah
            FROM resume_claim rs 
            JOIN source_problem sp ON rs.id_source = sp.id_source
        ";
        $params = [];
        if ($year || $month) {
            $sql .= " WHERE 1=1";
            if ($year) {
                $sql .= " AND YEAR(rs.tanggal) = :year";
                $params['year'] = $year;
            }
            if ($month) {
                $sql .= " AND MONTH(rs.tanggal) = :month";
                $params['month'] = $month;
            }
        }
        $sql .= " GROUP BY tahun, bulan, source_problem ORDER BY tahun, bulan";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalClaimsByStatus($status){
        $sql = "SELECT status,COUNT(*) AS total FROM resume_claim WHERE status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['status' => $status]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTotalProgress($proses){
        $sql = "SELECT proses,COUNT(*) AS total FROM resume_claim WHERE proses = :proses";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['proses' => $proses]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}