<?php
/* Base controller loads models and views */
class Controller{

  //allows us to load models
  public function model($model){

    // require model file
    require_once '../app/models/' . $model . '.php';

    // instantiate model
    return new $model();
  }

  // load view, and pass data to view
  public function view($view, $data=[]){

    // check for view file
    if(file_exists('../app/views/'. $view . '.php')){
      require_once( '../app/views/'. $view . '.php'); // gets the view ie index.php
    } else{
      // view does not exist
      die('View does not exist');
    }

  }

}