<?php
class save_admin_data extends CI_Controller
{
	/*
	CREATE TABLE donations
(
	doner_id INTEGER ,
	donation_date DATE , 
	details text , 
	#constrains:
	FOREIGN KEY (doner_id) REFERENCES doner(doner_id) ON DELETE CASCADE
);
	*/
	public function save_donation_data()
	{
		$id = $this->input->post("id");
		$info = $this->input->post("info");
		$query = "insert into donations(doner_id , donation_date , details)
		values(? , CURDATE() , ?)";
		$this->db->query($query , array($id , $info));
		echo 'Data has been saved';
	}
}
?>