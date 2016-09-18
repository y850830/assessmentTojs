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
        public function getStatistics($status){
            /*
            
            SELECT COUNT( assess_status ) 
            FROM  `view_house` 
            WHERE  `assess_status` =  '1'
            AND  `year` =  '105'
            AND  `school` =  'NFU'
             */
            $year = $_SESSION['years_assesstable'] ;
            $sitename = $_SESSION['sitename'] ;  
            $this->db->select("assess_status");
            if ($status == 0){
                
                $this->db->where(Array("school"=> $sitename ,"year"=>$year,"assess_status"=>0));
                $nonpass = $this->db->count_all_results('view_house');
                return $nonpass;
            }else if ($status == 1){
                $this->db->where(Array("school"=> $sitename ,"year"=>$year,"assess_status"=>1));
                $pass = $this->db->count_all_results('view_house');
                return $pass;
            }

           


        }
        /*
            取得檢視表內容
         */
        public function getHouselist($year){
            $sitename = $_SESSION['sitename'] ;  
            $this->db->select("*");  
            $this->db->where(Array("school" => $sitename, "year" => $year));  
            $this->db->order_by("assessTime", "desc");
            $this->db->from('view_house');
            $query = $this->db->get();
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
            $_SESSION['years_assesstable'] = $year;
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