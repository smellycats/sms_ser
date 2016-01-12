<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mtest extends CI_Model
{
    /**
     * Construct a madmin instance
     *
     */
	public function __construct()
	{
		parent::__construct();
	}
	
    /**
     * 查询IP限制
     * 
     * @return object
     */
	public function getInfo()
	{
		return $this->db->get('info');
	}
	
}
?>

