<?php 

class Pages extends Controller{

  public function __construct(){
    echo 'Pages: Contructor loaded<br/>';
  } 

  // default method
  public function index(){
    echo 'Index function loaded<br/>';
    $this->view('hello');
  }

  public function about($id){
    echo "Pages: about function loaded: ${id} ";
  }
}