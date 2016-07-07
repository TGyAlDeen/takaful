<?php
class view_loader extends CI_Controller
{

  /*
  view name is the name of the view to be loaded
  the $data parameter contains the parameters needed by the view to load the page
  */
  public function load_views($pages , $data) //make it to work for arrays
  {
    $this->load->view('include/header' , $data);
    
    $this->load->view("include/top_page" , $data);
    $this->load->view("include/left_corner");
    if(gettype($pages) == 'string')
      $pages = array($pages);
    foreach($pages as $page)
          $this->load->view($page , $data);
    $this->load->view('include/phooter');
    //$this->load->view("include/right_corner");
  }

  public function load_views_without($pages , $data) //load views without left corener
  {
    $this->load->view('include/header' , $data);
    
    $this->load->view("include/top_page" , $data);
    if(gettype($pages) == 'string')
      $pages = array($pages);
    foreach($pages as $page)
          $this->load->view($page , $data);
    $this->load->view('include/phooter');
  }
  
}
?>