<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model'); //loading the saved model
	}

	public function index()
	{
	$data['news'] = $this->news_model->get_news();
	$data['title'] = 'News archive';

	$this->load->view('templates/header', $data);
	$this->load->view('news/index', $data);
	$this->load->view('templates/footer');
	}

	public function view($slug)
	{
		$data['news'] = $this->news_model->get_news($slug);
	}
}