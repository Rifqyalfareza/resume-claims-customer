<?php
require_once './models/src.php';

class SrcController{
    private $src;
    public function __construct(){
        $this->src = new src();
    }
    public function index(){
        $srcs = $this->src->all();
        include './view/src-prob/index.php';
    }
    public function store($data){
        try{
            $this->src->create($data);
            $_SESSION['toast'] = "Successfully added source problem.";
            $_SESSION['toast_type'] = "success";
        }catch(exception $e){
            $_SESSION['toast'] = "Failed to add source problem.";
            $_SESSION['toast_type'] = "error";
        }
        header('location: ?page=src');
    }
    public function update($id,$data){
        try{
            $this->src->update($id,$data);
            $_SESSION['toast'] = "Successfully updated source problem.";
            $_SESSION['toast_type'] = "success";
        }catch(exception $e){
            $_SESSION['toast'] = "Failed to update source problem.";
            $_SESSION['toast_type'] = "error";
        }
        header('location: ?page=src');
    }
    public function delete($id){
        try{
            $this->src->delete($id);
            $_SESSION['toast'] = "Successfully deleted source problem.";
            $_SESSION['toast_type'] = "success";
        }catch(Exception $e){
            $_SESSION['toast'] = "Failed to delete source problem.";
            $_SESSION['toast_type'] = "error";
        }
        header('location: ?page=src');
    }
}