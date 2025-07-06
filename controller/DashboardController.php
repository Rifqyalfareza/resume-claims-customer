<?php
require_once './models/Dashboard.php';

class DashboardController
{
    private $dashboard;

    public function __construct()
    {
        $this->dashboard = new Dashboard();
    }

    public function index()
    {
        $allDataClaim = $this->dashboard->getClaim();
        $allDataClaimCustomer = $this->dashboard->getClaimByCustomer();
        $allSourceProblemPerformance = $this->dashboard->getSourceProblemPerformance();
        $years = $this->dashboard->getAvailableYears();
        $months = $this->dashboard->getAvailableMonths();

        $openClaimsTotal = $this->dashboard->getTotalClaimsByStatus('OPEN');
        $closedClaimsTotal = $this->dashboard->getTotalClaimsByStatus('CLOSED');
        $sakanoboryTotal = $this->dashboard->getTotalProgress('sakanobory');
        $AnalysisTotal = $this->dashboard->getTotalProgress('analysis');
        $WaitingTotal = $this->dashboard->getTotalProgress('Waiting');
        $ApprovedTotal = $this->dashboard->getTotalProgress('Approved');

        $year = isset($_GET['year']) && $_GET['year'] !== '' ? (int)$_GET['year'] : '';
        $month = isset($_GET['month']) && $_GET['month'] !== '' ? (int)$_GET['month'] : '';

        require_once './view/dashboard/index.php';
    }
}