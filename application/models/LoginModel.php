<?php
	/**
	* 
	*/
	class LoginModel extends CI_Model
	{
	
		function __construct()
        {
          
            parent::__construct();

            $this->load->database();

            /*
                SESSION 初始化及描述
             */
            $_SESSION['empty'] = 0; //判斷搜尋結果是否為空, 1為空 , 0有值
            $_SESSION['name'] =  0; //登入者姓名
            $_SESSION['phone'] = 0; // 登入者手機
            $_SESSION['email'] = 0; // 登入者email
            $_SESSION['authority'] = 0; //登入者權限
            $_SESSION['school'] = 0 ; //登入者學校中文全名
            $_SESSION['sitename'] = 0 ; //登入者學校英文縮寫
           // $this->load->library('googleplus');

        }

        function index(){
            
        }
        public function getUserAdmin($account,$password){  
            $this->db->select("*");  
            $query = $this->db->get_where("administrator",Array("user" => $account, "password" => MD5($password), "authority" => "9" ));  
            if ($query->num_rows() > 0){ //如果數量大於0   
                $_SESSION['name'] = $query->row()->administratorName;
                $_SESSION['phone'] = $query->row()->phone;
                $_SESSION['email'] = $query->row()->email;
                $_SESSION['authority'] = $query->row()->authority;
                $site_id = $query->row()->site_id;

                $this->db->select("*");
                $query2 = $this->db->get_where("sites",Array("site_id" => $site_id));
                $_SESSION['school'] = $query2->row()->site_title;
                $_SESSION['sitename'] = $query2->row()->site_name;// 英文縮寫
                echo $_SESSION['school'];
                return true;

            }else{  
                
                return null;  
            }  
        }  
        public function getUserDrillmaster($account,$password)
        {
            echo "尚未建置";
        }
              
    }

?>