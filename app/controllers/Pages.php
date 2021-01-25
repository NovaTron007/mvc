<?php 

class Pages extends Controller{

  public function __construct(){
    echo 'Pages: Contructor loaded<br/>';
  } 

  // default method
  // get views and pass data to them
  public function index(){
    $data = ["title" => "Welcome"];
    $this->view('pages/index', $data); // get index.php view (extension added in controller.php )
  }

  public function about(){
    $data = ["title" => "About"];
    $this->view('pages/about', $data); // gets about.php view
  }
}