<?php
/*
 * App core class
 * Creates URL and Loads core controller
 * URL Format: /controller/method/params
 */

class Core {
  protected $currentController = 'Pages'; // default controller if nothing loads
  protected $currentMethod = 'index';
  protected $params = [];
 
  public function __construct(){
    // print_r($this->getUrl());
    $url = $this->getUrl();

    // Get controller: look in controllers folder for first value of url. 
    // Everything routed to index so we set path from inside there to get to app folder
    // gets val in $url[0] so 'post' ie: http://localhost/repo/mvc/post
    // ucwords to capitalise ie Post as controller methods are capitalised
    if(isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0])) . '.php'){ 
      // if exists, set as controller
      $this->currentController = ucwords($url[0]);
      // unset 0 index
      unset($url[0]);

    }

    //require the controller
    require_once('../app/controllers/' . $this->currentController . '.php');

    // instantiate controller ie $pages = new Pages
    $this->currentController = new $this->currentController;

    // check for second part of url
    if(isset($url[1])){
      // check to see if current method exists in controller
      if(method_exists($this->currentController, $url[1])){
        $this->currentMethod = $url[1];
        // unset 1 index
        unset($url[1]);
      }
    }
    // echo $this->currentMethod;

    // get params
    $this->params = $url ? array_values($url) : [];

    // call a callback with array of params
    call_user_func_array([$this->currentController, $this->currentMethod],$this->params);
    
  }
  
  public function getUrl(){
    if(isset($_GET['url'])){ // gets the url
      $url = rtrim($_GET['url'],'/');// strip what you want (/);
      $url = filter_var($url, FILTER_SANITIZE_URL);//prevent chars url should not have 
      $url = explode('/', $url); // break url into array at slashes ie /post/edit/1 (post,edit,1)
      return $url;
    }
  }

}