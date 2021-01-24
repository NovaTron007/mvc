<?php 

class Pages{

  public function __construct(){
    echo 'Pages: contructor loaded<br/>';
  } 

  // default method
  public function index(){
    echo 'Pages: index function loaded';
  }

  public function about($id){
    echo "Pages: about function loaded: ${id} ";
  }
}