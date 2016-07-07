<?php
class v extends CI_Controller
{
	public function index()
{
    $this->load->library('email');

$this->email->from('info@alnourahmed.tk', 'Your Name');
$this->email->to('alnour.ahmed@gmail.com');

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');

$this->email->send();

echo $this->email->print_debugger();
}
}
?>