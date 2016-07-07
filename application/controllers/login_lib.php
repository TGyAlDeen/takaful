<?php
class login_lib extends CI_Controller
/*
this class is used for log in purposes
it will be a library that will be used for this purposes
*/

{
	public function is_login() //check weather the user is logged in or not
	{
		if($this->session->userdata('id') == "")
			return false;
		return true; //will be substiuted by redirecting to the login page
	}
	public function login_redirect() //redirect the user the login page if he did not
	{
		if($this->session->userdata('id') == "")
			{
				header('Location:login?msg=' . $this->config->item('login_first'));
				exit(0);

			}

	}


	/*
	make the first log_in
	return false if the credentails are wrong
	*/

	public function login($email , $password) 
	{
		$hashed_password = $this->hash_pass($password);
		$query = "select id from user where email = ? AND hashed_password = ? LIMIT 1";
		$res = $this->db->query($query , array($email , $hashed_password));
		$res = $res->result_array();
		if(count($res) > 0) //the user is actually at the database
		   {
		   	  $login_info = array("id" => $res[0]['id']);
		   	  $this->session->set_userdata($login_info);
		   	  return true;
		   }
			return false;
	}
	//@not tested
	public function is_allowed($page_array) //check if the user is allowed to see the page
	{
		$id = $this->session->userdata('id');
		$query = "select user_order from user where id = ?";
		$res = $this->db->query($query , $id);
		$res = $result->result_array();
		if(cout($res) < 1)
			return false;
		return in_array($res[0]['user_order'], $page_array);
	}

	public function hash_pass($password)
	{
		//will be used only on the systems that use PHP5
		//return password_hash($password , PASSWORD_BCRYPT , $this->config->item('hash_options'));
		$hash_options = $this->config->item('hash_options');
		$salt = $hash_options['salt'];
		return md5($password); //not good
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function login_order()
	{
		$id = $this->session->userdata('id');
		$query = "select user_order from user where id = ?";
		$res = $this->db->query($query , $id);
		$res = $res->result_array();
		if(count($res) > 0)
		return $res[0]['user_order'];
	    else
	    	return null;
	}

	public function is_admin()
	{
		return $this->login_order() == $this->config->item('admin_order');
	}

}
?>