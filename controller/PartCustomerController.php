<?php 
require_once './models/PartCustomer.php';
require_once './models/part.php';
require_once './models/customer.php';
require_once './models/model.php';

class PartCustomerController{
    private $partCustomer, $part, $customer, $model;

    public function __construct(){
        $this->partCustomer = new PartCustomer(); 
        $this->part = new Part();
        $this->customer = new Customer();
        $this->model = new Model();
    }
    public function index(){
        $partCustomers = $this->partCustomer->all();
        require_once './view/part-customer/index.php';
    }
    public function create(){
        $customers = $this->customer->all();
        $parts = $this->part->all();
        $models = $this->model->all();
        // $partCustomers = $this->partCustomer->all();
        require_once './view/part-customer/create.php';
    }
    public function store(){
        try{
            $this->partCustomer->create($_POST);
            $_SESSION['toast'] = "Successfully added part customer.";
            $_SESSION['toast_type'] = "success";
        }catch(Exception $e){
            $_SESSION['toast'] = "Failed to add part customer.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=part-customer');
    }
    public function delete($id){
        try{
            $this->partCustomer->delete($id);
            $_SESSION['toast'] = "Successfully deleted part customer.";
            $_SESSION['toast_type'] = "success";
        }catch(Exception $e){
            $_SESSION['toast'] = "Failed to delete part customer.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=part-customer');
    }
    public function edit($id){
        $partCustomer = $this->partCustomer->find($id);
        $customers = $this->customer->all();
        $parts = $this->part->all();
        $models = $this->model->all();
        // $partCustomers = $this->partCustomer->all();
        require_once './view/part-customer/edit.php';
    }
    public function update(){
        try{
            $this->partCustomer->update($_GET['id'],$_POST);
            $_SESSION['toast'] = "Successfully updated part customer.";
            $_SESSION['toast_type'] = "success";
        }catch(Exception $e){
            $_SESSION['toast'] = "Failed to update part customer.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=part-customer');
    }
}
?>