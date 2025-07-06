<?php 
require_once './models/customer.php';

class CustomerController{
    private $customer;

    public function __construct(){
        $this->customer = new Customer();
    }
    public function index(){
        $customer = new Customer();
        $customers = $customer->all();
        include './view/customer/index.php';
    }
    public function create(){
        require_once './view/customer/create.php';
    }
    public function store($data){
        try {
            $this->customer->create($data);
            $_SESSION['toast'] = "Successfully added customer.";
            $_SESSION['toast_type'] = "success";
        } catch (Exception $e) {
            $_SESSION['toast'] = "Failed to add customer.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=customer');
    }
    public function edit($id){
        $customer = $this->customer->find($id);
        require_once './view/customer/edit.php';
    }
    public function update($id, $data){
        try{
            $this->customer->update($id, $data);
            $_SESSION['toast'] = "Successfully updated customer.";
            $_SESSION['toast_type'] = "success";
        }catch(Exception $e){
            $_SESSION['toast'] = "Failed to update customer.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=customer');
    }
    public function delete($id){
        try {
            $this->customer->delete($id);
            $_SESSION['toast'] = "Successfully deleted customer.";
            $_SESSION['toast_type'] = "success";
        } catch (Exception $e) {
            $_SESSION['toast'] = "Failed to delete customer.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=customer');
    }
}
?>