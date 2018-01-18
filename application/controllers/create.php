<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {
function __construct() {
        parent::__construct();
            $this->load->helper('string');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        }

public function index() {
       //form validation
        $this->form_validation->set_rules('url_address', $this->lang->line('create_url_address'), 'required|min_length[1]|max_length[1000]|trim');

if ($this->form_validation->run() == FALSE) {
            // Set initial values for the view
            $page_data = array('encoded_url'    => false);
            $this->load->view('shortner', $page_data);//loading the main view of the web page
           
        } else {
            // Begin to build data to be passed to database
            $data = array(
                'url_address' => $this->input->post('url_address'),
            );

            $this->load->model('Urls_model');
if ($res = $this->Urls_model->save_url($data)) {
                $page_data['encoded_url'] = $res; 
            }

            // Build link which will be displayed to the user
            $page_data['encoded_url'] = base_url() . $res;
            $this->load->view('shortner', $page_data);
     
        }
    }
    
}