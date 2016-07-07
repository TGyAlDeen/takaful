<?php
class update extends CI_Controller
{
	public function update_basic_info()
	{
		require_once('login_lib.php');

		$login_obj = new login_lib();
		if(!$login_obj->is_login())
		{
			return;
		}
		else
		{
			/*phone_number varchar(20),
	alternative_phone*/
			$id = $this->session->userdata('id');
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$extra_phone = $this->input->post('extra_phone');
			$query = "update doner set full_name = ? , phone_number = ?  , alternative_phone = ? where doner_id = ?";
			$this->db->query($query , array($name , $phone , $extra_phone  ,  $id));
			echo 'saved';
		}
	}
	public function update_health_info()
	{
		echo $this->input->post("blood_group");
		echo $this->input->post("Birth");
	}
/*

CREATE TABLE health_status
(
	doner_id INTEGER , 
	st_date DATE  , 
	description text , 
	#constrains:
	FOREIGN KEY (doner_id) REFERENCES doner(doner_id) ON DELETE CASCADE
)
*/
	public function status_updater()
	{
		$health_status =  $this->input->post("health_status");
		$id = $this->session->userdata("id");
		$query = "insert into health_status(doner_id , st_date, description)
		values(? , CURRENT_TIMESTAMP , ?)";
		$this->db->query($query , array($id , $health_status));
		echo  'saved';
	}
	public function get_history()
	{
		$query = "select st_date , description from health_status where doner_id = ?";
		$res = $this->db->query($query , $this->session->userdata("id"));
		$res = $res->result_array();
		$res = json_encode($res);
		echo $res;
	}
	
}
?>