<?php
class admin extends CI_Controller
{
	//the autherization code will be added here
	//Alnour
	public function index()
	{
		require_once('login_lib.php');
		$login_obj = new login_lib();
		$login_obj->login_redirect();
		if(! $login_obj->is_admin())
		{
			header('location:profile');
			exit(0);
		}
		$data['title'] = "Admin Page";
		require_once('view_loader.php');
		$v_loader = new view_loader();
		$v_loader->load_views_without('admin' , $data);
	}
}
?>