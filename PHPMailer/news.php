<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function viewOrder()
	{
		$data = $this->Order_model->getAll();
		$data['data_order'] = $data;

		$this->load->view('news_detail', $data);
	}
}

/* End of file news.php */
/* Location: ./application/controllers/news.php */