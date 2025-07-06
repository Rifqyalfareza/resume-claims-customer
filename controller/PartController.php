<?php 
require_once './models/part.php';

class PartController{
    private $part;

    public function __construct(){
        $this->part = new part();
    }

    public function index(){
        $parts = $this->part->all();
        include './view/part/index.php';
    }
    public function create(){
        include './view/part/create.php';
    }
    public function store($data){
        try{
            $this->part->create($data);
            $_SESSION['toast'] = "Successfully added part.";
            $_SESSION['toast_type'] = "success";
        }catch(Exception $e){
            $_SESSION['toast'] = "Failed to add part.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=part');
    }
    public function edit($id){
        $part = $this->part->find($id);
        include './view/part/edit.php';
    }
    public function update($id,$data){
        try{
            $this->part->update($id,$data);
            $_SESSION['toast'] = "Successfully updated part.";
            $_SESSION['toast_type'] = "success";
        }catch(Exception $e){
            $_SESSION['toast'] = "Failed to update part.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=part');
    }

    public function delete($id){
        try{
            $this->part->delete($id);
            $_SESSION['toast'] = "Successfully deleted part.";
            $_SESSION['toast_type'] = "success";
        }catch(Exception $e){
            $_SESSION['toast'] = "Failed to delete part.";
            $_SESSION['toast_type'] = "error";
        }
        header('Location: ?page=part');
    }
}