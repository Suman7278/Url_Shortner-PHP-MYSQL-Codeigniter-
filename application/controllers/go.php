<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Go extends CI_Controller {
function __construct() {
        parent::__construct();
            $this->load->helper('string');
        }

public function index() {
    //fetch  url that is already present in the database,if the url is present then the code is updated or else it is inserted
    $url_code=$this->uri->segment(3);
    $condition = "url_code like " . "'$url_code'";
    $this->db->select('*');
    $this->db->from('urls');
    $this->db->where($condition);
    $this->db->limit(1);
    $query= $this->db->get();       
if ($query->num_rows() == 1) {
  
foreach ($query->result() as $row) {
                    $url_address = $row->url_address;
                }
                    echo '<script>window.open("'.$url_address.'","_blank")</script>';
                    $page_data = array('encoded_url'    => false);
                    $this->load->view('shortner',$page_data);

            } 
            
                else 
                {
                    $page_data = array('encoded_url'    => false);
                    $this->load->view('shortner', $page_data);
                
                }
        
    }
}