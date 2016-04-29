<?php
	/**
	* 
	*/
	class LoadingData extends CI_Model
	{
	
		function __construct()
        {
          
            parent::__construct();

            $this->load->database();
            
        }

        function index(){
            
        }
        public function getDrillmaster(){
        	$sitename = $_SESSION['sitename'] ;  
            $this->db->select("*");  
            $query = $this->db->get_where("drillmaster",Array("site_name" => $sitename));  
            //echo $query->row()->DM_account;
            return $query;
        }

        /*
            取得檢視表內容
         */
        public function getHouselist(){
            $sitename = $_SESSION['sitename'] ;  
            $this->db->select("*");  
            $query = $this->db->get_where("view_house",Array("school" => $sitename));  
            return $query;
        }

        public function getLandlordList(){
            $sitename = $_SESSION['sitename'] ;  
            $this->db->select("*");  
            $this->db->where(Array("site_name" => $sitename));
            $this->db->order_by("user_name", "asc");
            $this->db->from('view_landlord_drillmaster');
            $query = $this->db->get();
            return $query;
        }
        /*
             新增房屋的評核表
         */
        public function CreateHouseAssessInfo($year){
            $sitename = $_SESSION['sitename'] ;  
            $this->db->select("*");  
            $query = $this->db->get_where("house",Array("site_name" => $sitename)); 
            $i = 0 ;
            foreach ($query->result_array() as $row)
            {
                $houseId[$i] = $row['houseId']; 
                $i++;
            }
            
            for ($i=0 ; $i<count($houseId);$i++){ 
                $this->db->insert('assess',Array("site_name" =>$sitename,"houseId" =>$houseId[$i],"year" => $year));
            }
            
        }
        public function getAssessTable($md5houseId){
            $sitename = $_SESSION['sitename'] ;  
            $this->db->select("houseId"); 
            $query = $this->db->get_where("view_house",Array("school" => $sitename));
            $i=0;
            $houseId=0;
            foreach ($query->result_array() as $row)
            {  
               if  ($md5houseId==md5($row['houseId'])){
                    $houseId=$row['houseId'];
                    break;
               }
            }
            $this->db->select("*");  
            $query = $this->db->get_where("view_house",Array("school" => $sitename , "houseId" => $houseId));  
        
            return $query;
        }

        
        public function getAssessHistory(){
            $sitename = $_SESSION['sitename'] ;  
            $this->db->select("*");  
            $query = $this->db->get_where("assess_history",Array("site_name" => $sitename));  
            return $query;
        }
              
    }

?>