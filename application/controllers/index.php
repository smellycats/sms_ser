<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Index
 *
 * This is vehicle info rest
 *
 * @package		CodeIgniter
 * @subpackage	Cgs Rest Server
 * @category	Controller
 * @author		Fire
*/


class Index extends CI_Controller
{
	public function __construct()
    {
        // Construct our parent class
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper('my');

        $this->load->config('sms');
        #$this->load->model('Mtest');
    }
    
    /**
     * 默认控制器
     * 
     * @return void
     */
    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $input_data = json_decode(trim(file_get_contents('php://input')), true);


        echo json_encode(array('success'=>true, 'msg'=>'done'));
    }

    /**
     * 默认控制器
     * 
     * @return void
     */
    public function admin()
    {
        $this->load->view('index');
    }

    public function send()
    {
        $this->load->view('smssend');
    }

    public function test()
    {
        $url = 'http://127.0.0.1:5000/token';
        $post_data = array(
            'username' => 'smstest',
            'password' => 'showmethemoney'
        );
        $result = h_send_post($url, json_encode($post_data));

        var_dump(json_decode($result));
    }

    public function test2()
    {
        $input_data = json_decode(trim(file_get_contents('php://input')), true);


        echo json_encode(array('success'=>true, 'msg'=>'done'));
    }

}