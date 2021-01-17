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

    // Get controler: look in controllers for first value of url. 
    // Everything routed to index so we set path from inside there to get to app folder
    // gets val in $url[0] so 'post' ie: http://localhost/repo/mvc/post
    // ucwords to capitalise ie Post as controller methods are capitalised
    if(file_exists('../app/controllers/' . ucwords($url[0])) . '.php'){ 
      // if exists, set as controller
      $this->currentController = ucwords($url[0]);
      // unset 0 index
      unset($url[0]);
    }

    //require the controller
    require_once('../app/controllers/' . $this->currentController . '.php');

    // instantiate controller ie $pages = new Pages
    $this->currentController = new $this->currentController;
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