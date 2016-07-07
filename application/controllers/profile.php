<?php
class profile extends CI_Controller
{
	//$page_array = array(1,2); //all the users are allowed to see this page
	/*
	//if the user is admin then redirect him to the admin page
	logic of this page:
	check if the user is logged in first
	then show him his information
	all the addition , deletion will be via
	pop up divs and ajax requests
	*/
	public function index()
	{
		require_once('login_lib.php');
		require_once('view_loader.php');

		$login_obj = new login_lib();
		$login_obj->login_redirect();
		if($login_obj->is_admin())
		{
			header('location:admin');
			exit(0);
		}
		$loader_obj = new view_loader();

		$left_links = array
		(
			1 =>'view your profile' 
		   ,2 =>'change your data' 
		  // ,3 =>'change password' ,
		   ,4 => 'update your health status'
		   ,5 => 'update your photo'
		);
		$data['left_links'] = $left_links;
		$data['title'] = 'Profile';

		$loader_obj->load_views('profile' , $data);

	}
}
?>