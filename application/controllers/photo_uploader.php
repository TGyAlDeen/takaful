<?php

class photo_uploader extends CI_Controller {

	function index()
	{

	}

	public function do_upload()
	{
		$config['upload_path'] = 'images/profile';
		echo $config['upload_path'];
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$error['title'] = 'upload profile pic';
			require_once('view_loader.php');
			$loader = new view_loader();
			//$this->load->view('part/photo_updater', $error);
			$loader->load_views('part/photo_updater', $error);
		}
		else
		{
			$img_data = $this->upload->data();
			$data = array('upload_data' => $img_data);
			$this->db_save_img($img_data['file_name']);
			header("location:".base_url('index.php/profile'));
		}
	}

	private function db_save_img($file_name) 
	//delete the last image first
	//we will save only the image name
	{
		$this->load->helper('file');
		$id = $this->session->userdata("id");
		$old_img = "select image from doner where doner_id = ?";
		$res = $this->db->query($old_img , $id);
		$res = $res->result_array();
		if(count($res) > 0)
		{
			$res = $res[0];
			if($res['image'] != null)
			{
				unlink('images/profile/' . $res['image']);
			}
		}
		$query = "update doner set image = ? where doner_id = ?";
		$this->db->query($query , array($file_name , $id));
	}
}
?>