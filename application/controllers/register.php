<?php
class register extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'التسجيل'; 
		$this->form_validation->set_message('matches', 'The two passwords are not identical');
	    if ($this->form_validation->run('register') == FALSE) //the login contains the validation data
	    {
	    	$data['err'] = validation_errors();
	    	if($this->is_logged_in()) //this check must be before the first if but due to codeigniter problems it is moved here
		    {
			header('location:profile');
			exit(0);
		    }
	    	$data['name'] = $this->input->post('name');
	    	$data['email'] = $this->input->post('email');
	    	$data['phone'] = $this->input->post('phone');
	    	if($this->is_logged_in())
	    		{
	    			//redirect him to the main page
	    			return;
	    		}
	    	require_once('view_loader.php');
	    	$loader = new view_loader();
		    $loader->load_views('register' , $data);
	    }
	    else
	    {
	    	$this->save_data();
	    	//the save data function redirect the user to the login page
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

	private function save_data()
	{
		require_once("login_lib.php");
		$login_obj = new login_lib();

		//preparing the data
		$full_name = $this->input->post("name");
		$hashed_password = $login_obj->hash_pass($this->input->post("password"));
		$email = $this->input->post("email");
		$gender = $this->input->post("gender");
		$gender = $gender[0];
		$birth_date = $this->input->post("dateOfBirth");
		$blood_group = $this->input->post("blood_group");
		$phone_number = $this->input->post("phone");

		$base_info_query = "insert into user(hashed_password , email)
		values(? , ?)";
		$this->db->query($base_info_query , array($hashed_password , $email));
		$id = $this->db->insert_id();
		$extended_info = "insert into doner
		(doner_id , full_name , gender , phone_number , birth_date , blood_group)
		values
		(? , ? , ? , ? , ? , ?)";
		$this->db->query($extended_info , array(
			$id , $full_name , $gender , $phone_number , $birth_date , $blood_group
			));
		$login_obj->login($email , $this->input->post("password"));
		header('Location: profile');
		exit(0);
	}

	function send_registration_message() //will be implemnted later --.>using email
	{
		
	}
}
?>