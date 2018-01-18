<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Urls_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function save_url($data)
   {
    do {
      $url_code = random_string('alnum', 8); //function to randomly generate the short link of the url
      $this->db->where('url_code = ', $url_code);
      $this->db->from('urls');
      $num = $this->db->count_all_results();
    } while ($num >= 1);

        // Query to check whether url_address already exist or not
            $condition = "url_address like " ."'".$data['url_address']."'";
			$this->db->select('*');
			$this->db->from('urls');
			$this->db->where($condition);
			$this->db->limit(1);
      $query = $this->db->get();
			if ($query->num_rows()== 0) {
			$query = "INSERT INTO `urls` (`url_code`, `url_address`) VALUES (?,?) ";
            $result = $this->db->query($query, array($url_code, $data['url_address']));
			
			}
            
             else {
                
			$query = "UPDATE  `urls` SET `url_code`='$url_code' WHERE url_address LIKE '".$data['url_address']."'";
            $result = $this->db->query($query, array($url_code, $data['url_address']));
			}

    if ($result) {
      return $url_code;
    } else {
      return false;
    }
  }
}