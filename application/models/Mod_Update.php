<?php
	/**
	* 
	*/
	class Mod_Update extends CI_Model
	{
	
		function __construct()
        {
          
            parent::__construct();

            $this->load->database();
            
           // $this->load->library('googleplus');

        }

        function index(){
            
        }
       	function UpdateDrillmasterList($account,$data){
       		 $this->db->where('DM_account',$account);
       		
			     $this->db->update('drillmaster', $data);

			       return true;
       	}

       	function AddDrillmasterList($data){
       		$this->db->insert('drillmaster',$data);
       	}

        // function UpdateAssessTable($assessId,$Array){

        //   $this->db->where('DM_account',$account);
          
        //   $this->db->update('drillmaster', $data);

        //   return true;

        // }

        function  UpdateAssessTable($md5assessId,$data){
            $sitename = $_SESSION['sitename'] ;  
            $this->db->select("assessId");

            $query = $this->db->get_where("assess",Array("site_name" => $sitename));
            $i=0;
            $assessId=0;
            foreach ($query->result_array() as $row)
            {  
               if  ($md5assessId==md5($row['assessId'])){
                    $assessId=$row['assessId'];
                    break;
               }
            }

            $this->db->where('assessId',$assessId);
            $this->db->update('assess', $data);
            
            return true;

        }
   //     	function UpdateDrillmasterPassword($account,$data){
   //     		$this->db->where('DM_account',$account);
			// $this->db->update('drillmaster', $data);

   //     	}
              
    }

?>