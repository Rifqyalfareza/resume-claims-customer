<?php 
require_once 'controller/CustomerController.php';
require_once 'controller/PartController.php';
require_once 'controller/ModelController.php';
require_once 'controller/SrcController.php';
require_once 'controller/PartCustomerController.php';
require_once 'controller/ResumeController.php';
require_once 'controller/DashboardController.php';
require_once 'controller/KakotoraController.php';

$kakotoraController = new KakotoraController();
$dashboardController = new DashboardController();
$resumeController = new ResumeController();
$partCustomerController = new PartCustomerController();
$srcController = new SrcController();
$customerController = new CustomerController();
$partController = new PartController();
$modelController = new ModelController();

$page = $_GET['page'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($page) {
    case 'customer':
        switch($action){
            case 'index' : $customerController->index(); break;
            case 'create' : $customerController->create(); break;
            case 'store' : $customerController->store($_POST); break;
            case 'edit' : $customerController->edit($id); break;
            case 'update' : $customerController->update($id, $_POST); break;
            case 'delete' : $customerController->delete($id); break;
        }
        break;
    case 'part':
        switch($action){
            case 'index' : $partController->index(); break;
            case 'create' : $partController->create(); break;
            case 'store' : $partController->store($_POST); break;
            case 'edit' : $partController->edit($id); break;
            case 'update' : $partController->update($id, $_POST); break;
            case 'delete' : $partController->delete($id); break;
        }
        break;
    case 'model':
        switch($action){
            case 'index' : $modelController->index(); break;
            case 'create' : $modelController->create(); break;
            case 'store' : $modelController->store($_POST); break;
            // case 'edit' : $modelController->edit($id); break;
            case 'update' : $modelController->update($id, $_POST); break;
            case 'delete' : $modelController->delete($id); break;
        }
        break;
    case'src':
        switch($action){
            case 'index' : $srcController->index(); break;
            case 'store' : $srcController->store($_POST); break;
            case 'update' : $srcController->update($id, $_POST); break;
            case 'delete' : $srcController->delete($id); break;
        }
        break;
    case'part-customer':
        switch($action){
            case 'index' : $partCustomerController->index(); break;
            case 'create' : $partCustomerController->create(); break;
            case 'edit' : $partCustomerController->edit($id); break;
            case 'store' : $partCustomerController->store($_POST); break;
            case 'update' : $partCustomerController->update($id, $_POST); break;
            case 'delete' : $partCustomerController->delete($id); break;
        }
        break;
    case 'resume':
        switch($action){
            case 'index' : $resumeController->index(); break;
            case 'create' : $resumeController->create(); break;
            case 'store' : $resumeController->store($_POST); break;
            case 'storeAnalysis' : $resumeController->storeAnalysis(); break;
            case 'updateStatus' : $resumeController->updateStatus(); break;
            case 'delete' : $resumeController->delete($id); break;
        }
        break;
    case 'kakotora' :
        switch ($action) {
            case 'index': $kakotoraController->index(); break;
        }
        break;
    case 'dashboard':
        switch ($action) {
            case 'index': $dashboardController->index(); break;
        }
        break;
    default:
        break;

}