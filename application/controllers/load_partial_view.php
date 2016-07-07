<?php
class load_partial_view extends CI_Controller
{
	public function profile_viewer()
	{

		//login information will be added later

		$info = $this->get_user_basic_information();
		$data['info'] = $info;
		if($info['image'] != null)
		   $data['img'] = $info['image'];
		$data['name'] = $info['full_name'];
		$data['title'] = $data['name'] . ' profile';
		$gender = $this->config->item('gender');
		$data['gender'] = $gender[$info['gender']];
		$data['phone'] = $info['phone_number'];
		$data['extra_phone'] = $info['alternative_phone'];
		$data['blood_group'] = $info['blood_group'];
		$data['birth_date'] = $info['birth_date'];
		echo $this->load->view("part/profile", $data , "true");
	}

	public function eidt_data()
	{
		$data = $this->set_data_var();
		echo $this->load->view("part/edit" , $data , "true");
	}
	public function load_settings()
	{
		$data = array();
		echo $this->load->view("part/settings" , $data , "true");
	}

	public function photo_updater()
	{
		$data = array();
		echo $this->load->view("part/photo_updater" , $data , "true");
	}

	public function status_updater()
	{
		$data = array();
		echo $this->load->view("part/status_updater" , $data , "true");
	}
	private function get_user_basic_information()
	{
		$user_id = $this->session->userdata('id');
		$get_data = "select * from doner where doner_id = ?";
		$res = $this->db->query($get_data , $user_id);
		$res = $res->result_array();
		return $res[0];
	}

	private function set_data_var()
	{
		$info = $this->get_user_basic_information();
		$data['info'] = $info;
		if($info['image'] != null)
		   $data['img'] = $info['image'];
		$data['name'] = $info['full_name'];
		$data['title'] = $data['name'] . ' profile';
		$gender = $this->config->item('gender');
		$data['gender'] = $gender[$info['gender']];
		$data['phone'] = $info['phone_number'];
		$data['extra_phone'] = $info['alternative_phone'];
		$data['blood_group'] = $info['blood_group'];
		$data['birth_date'] = $info['birth_date'];
		return $data;
	}


}
?>