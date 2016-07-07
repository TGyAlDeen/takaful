<?php
class load_admin_data extends CI_Controller
{
	public function index()
	{
		$health = "";
		$doner = "";
		$search_type = $this->input->post('search_type');
		$search_query = $this->input->post('search_query');

		$age_from = $this->input->post('age_from');
		$age_to = $this->input->post("age_to");
		$last_donation_date = $this->input->post('last_donation_date');


		$this->load->helper('string');
		$search_query = strip_quotes($search_query);
		$query_filter = $this->filter($search_type); //to get mysql statement for enabling queries
		$db_query = "select *from doners_data where $query_filter
		AND blood_group IS NOT NULL #blood_group is null for admins
		AND age > ? 
		AND age < ?
		ORDER BY doner_id , donation_date , st_date DESC";
		$res = $this->db->query($db_query , array("%$search_query%" , $age_from , $age_to));
		$res = $res->result_array();
		require_once('global_functions.php');
		$res = merg($res , 'doner_id');
		$res = only_first($res);
		$data['doners'] = $res;
		return $this->load->view("admin_part/data" , $data , "true");
	}
	

	private function get_doners_data()
	{
		$query = "select doner_id , full_name , gender , phone_number , alternative_phone , birth_date , blood_group
		          from doner";
		$res = $this->db->query($query);
		$res = $res->result_array();
		return $res;
	}

	public function get_doner_data()
	//add donations data to complete the image
	{
		$id = $this->input->post("id");
		$query = "select * from doners_data where doner_id = ?";
		$res = $this->db->query($query , $id);
		$res = $res->result_array();
		$res = $res[0];
		echo json_encode($res);
	}

	public function get_admin_data()
	{
		//$query - 
	}
	private function filter($type)
	{
		$str_res = '';
		switch ($type) {
			case '1': //search by name
				$str_res = "full_name like ?";
				break;
			case '2':
			    $str_res = "description like ?";
				break;
			case '3':
			    $str_res = "blood_group like ?";
			default:
			break;
		}
		return $str_res;
	}
}

function pre_process($query) //will be edited so that the search will give the best possible results
{
	return $query;
}
?>