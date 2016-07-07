<?php
class login extends CI_Controller
{
	public function index()
	{

		$data['title'] = 'تسجيل الدخول'; 
		$data['not_log_msg'] = $this->input->get('msg');
	    if ($this->form_validation->run('login') == FALSE) //the login contains the validation data
	    {
	    	$data['err'] = validation_errors();
	    	if($this->is_logged_in())
	    		{
	    			header('Location: profile');
	    		}
	    	require_once('view_loader.php');
	    	$loader = new view_loader();
		    $loader->load_views('login' , $data);
	    }
	    else
	    {
	    	require_once('login_lib.php');
	        $login_obj = new login_lib();
	    	if($login_obj->login($this->input->post('email') , $this->input->post('password')))
	    	{
	    		if($login_obj->login_order() == $this->config->item('admin_order')) //the user is an admin
	    		  {
	    		  	header('location:admin');
	    		  }
	    		else
	    		   header('Location:profile'); //will be edited later for the manager
				exit(0);
	    	}
	    	else //the user name and password are not correct
	    	{
	    		$data['err'] = $this->config->item('erro_cred');
	    		require_once('view_loader.php');
	    	    $loader = new view_loader();
		        $loader->load_views('login' , $data);
	    	}
	    }
	}
	private function is_logged_in()
	{
		require_once('login_lib.php');
	    $login_obj = new login_lib();
	    if($login_obj->is_login())
	    {
	    	return true;
	    }
	    return false;
	}
}
?>