<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
        
        parent::__construct();
        $this->load->helper('url');
        @session_start();
    }
	public function index()
	{
		/*
		判斷是否登入，若尚未登入則跳轉至登入頁面，已經登入則顯示管理介面
		 */ 
		if(isset($_SESSION["LoginStatus"])== null){ 

			$this->load->view('login');

		}else{
			//echo  $_SESSION["name"];
			$this->load->view('header');
			$this->load->view('navbar');
		//	$this->load->view('welcome_message');
			$this->load->view('footer');

		}
		//echo $_SESSION["user"];
	 
	}

	/*
		評核表房子清單，已經有指定的負責校安人員才顯示。
		Resource from view_house
	 */
	public function HouseList(){

		$this->load->model('LoadingData');
		$houselist = $this->LoadingData->getHouselist();
		$i =0;

		foreach ($houselist->result_array() as $row)
        {
        	$TDM_year[$i] = $row['year'];
        	$TDM_houseId[$i] = $row['houseId'];
        	$TDM_address[$i] = $row['address'];
        	$TDM_username[$i] = $row['username'];
        	$TDM_DM_NAME[$i] = $row['DM_NAME'];
        	$TDM_school[$i] = $row['school'];
        	$TDM_assessTime[$i] = $row['assessTime'];
        	$TDM_update_status[$i] = $row['update_status'];
        	$TDM_assess_status[$i] = $row['assess_status'];
        	$i++;
        }
		$this->load->view('header');
		$this->load->view('navbar');

		if ($i!=0){
			$this->load->view('houselist',array(
				"TDM_year" => $TDM_year,
				"TDM_houseId" => $TDM_houseId,
				"TDM_address" => $TDM_address,
				"TDM_username" => $TDM_username,
				"TDM_DM_NAME" => $TDM_DM_NAME,
				"TDM_school" => $TDM_school,
				"TDM_assessTime" => $TDM_assessTime,
				"TDM_update_status" => $TDM_update_status,
				"TDM_assess_status" => $TDM_assess_status
			));
			$_SESSION['empty'] = 0; 
		}
		else{
			$_SESSION['empty'] = 1; 
			$this->load->view('houselist');
		}

		
		$this->load->view('footer');
	}


	/*
		更新評和表資料
		input : assessId
	 */
	public function AssessTableUpdate($md5assessId){

		function aa($checkt){
			if ($checkt == 1) return 1;
			else if ($checkt == 0) return 0;
			else return false;
		}
		$items1=$this->input->post('radio_item1');
		$items2=$this->input->post('radio_item2');
		$items3=$this->input->post('radio_item3');
		$items4=$this->input->post('radio_item4');
		$items5=$this->input->post('radio_item5');
		$items6=$this->input->post('radio_item6');
		$items7=$this->input->post('radio_item7');
		$check = 0 ;
		if (aa($items1) == 1)$check++;
		if (aa($items2) == 1)$check++;
		if (aa($items3) == 1)$check++;
		if (aa($items4) == 1)$check++;
		if (aa($items5) == 1)$check++;
		if (aa($items6) == 1)$check++;
		if (aa($items7) == 1)$check++;
		$assess_status=0;
		// 檢查是否七項指標的通過檢測，
		// 通過 $assess_status = 1
		// 不通過 $assess_status = 0 
		if ($check == 7) 
			$assess_status = 1;
		else
			$assess_status = 0; 

		$data = array(
			'item1' =>$this->input->post('radio_item1'),
			'item2' =>$this->input->post('radio_item2'),
			'item3' =>$this->input->post('radio_item3'),
			'item4' =>$this->input->post('radio_item4'),
			'item5' =>$this->input->post('radio_item5'),
			'item6' =>$this->input->post('radio_item6'),
			'item7' =>$this->input->post('radio_item7'),
			//'assess_status' =>$this->input->post('radio_judge'),
			'assess_status' => $assess_status,
			'assessTime' =>$this->input->post('time'),
			'assess_content' =>$this->input->post('text_content'),
			'assess_security' =>$this->input->post('text_security'),
			'update_status' => "1"
		);
		$this->load->model('Mod_Update');
     	$this->Mod_Update->UpdateAssessTable($md5assessId,$data);
     	header('Location:' .base_url('welcome/HouseList'));

	}

	/*
		該房子的評核表，
		Input : houseId
		Output : year, address, username, assess_stautes, update_stautes, DM_NAME, school,
		and item[7], item_pic[7], assessTime
		Resource from view_house
	 */
	public function getAssessTable($md5houseId){
		
     	$this->load->model('LoadingData');
     	$getAccessTable = $this->LoadingData->getAssessTable($md5houseId);
     	$i =0;
		foreach ($getAccessTable->result_array() as $row)
        {
        	$TDM_assessId[$i] = $row['assessId'];
        	$TDM_year[$i] = $row['year'];
        	$TDM_address[$i] = $row['address'];
        	$TDM_username[$i] = $row['username'];
        	$TDM_assess_status[$i] = $row['assess_status'];
        	$TDM_update_status[$i] = $row['update_status'];
        	$TDM_DM_NAME[$i] = $row['DM_NAME'];
        	$TDM_school[$i] = $row['school'];
        	$TDM_item1[$i] = $row['item1'];
        	$TDM_item2[$i] = $row['item2'];
        	$TDM_item3[$i] = $row['item3'];
        	$TDM_item4[$i] = $row['item4'];
        	$TDM_item5[$i] = $row['item5'];
        	$TDM_item6[$i] = $row['item6'];
        	$TDM_item7[$i] = $row['item7'];
        	$TDM_item1_pic[$i] = $row['item1_pic'];
			$TDM_item2_pic[$i] = $row['item2_pic'];
			$TDM_item3_pic[$i] = $row['item3_pic'];
			$TDM_item4_pic[$i] = $row['item4_pic'];
			$TDM_item5_pic[$i] = $row['item5_pic'];
			$TDM_item6_pic[$i] = $row['item6_pic'];
			$TDM_item7_pic[$i] = $row['item7_pic'];

			$TDM_assess_content[$i] = $row['assess_content'];
			$TDM_assess_security[$i] = $row['assess_security'];

        	$TDM_assessTime[$i] = $row['assessTime'];
        }

     	$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('assesstable',array(
			"TDM_assessId" => $TDM_assessId,
			"TDM_year" => $TDM_year,
			"TDM_address" => $TDM_address,
			"TDM_username" => $TDM_username,
			"TDM_assess_status" => $TDM_assess_status,
			"TDM_update_staute" => $TDM_update_status,
			"TDM_DM_NAME" => $TDM_DM_NAME,
			"TDM_school" => $TDM_school,
			"TDM_item1" => $TDM_item1,
			"TDM_item2" => $TDM_item2,
			"TDM_item3" => $TDM_item3,
			"TDM_item4" => $TDM_item4,
			"TDM_item5" => $TDM_item5,
			"TDM_item6" => $TDM_item6,
			"TDM_item7" => $TDM_item7,
			"TDM_item1_pic" => $TDM_item1_pic,
			"TDM_item2_pic" => $TDM_item2_pic,
			"TDM_item3_pic" => $TDM_item3_pic,
			"TDM_item4_pic" => $TDM_item4_pic,
			"TDM_item5_pic" => $TDM_item5_pic,
			"TDM_item6_pic" => $TDM_item6_pic,
			"TDM_item7_pic" => $TDM_item7_pic,
			"TDM_assess_content" => $TDM_assess_content,
			"TDM_assess_security" => $TDM_assess_security,
			"TDM_assessTime" => $TDM_assessTime

		));
		$this->load->view('footer');


		

	}
	/*
		評核記錄表
	*/
	public function AssessTableHistory(){

		$this->load->model('LoadingData');
		$assessyear = $this->LoadingData->getAssessHistory();
		$i = 0;
		foreach ($assessyear->result_array() as $row)
        {
        	$TDM_year[$i] = $row['year'];
        	$i++;
        }

		$this->load->view('header');
		$this->load->view('navbar');
		if ($i!=0)
			$this->load->view('assesshistory',array(
			"TDM_year" => $TDM_year
			));
		else
			$this->load->view('assesshistory');
		$this->load->view('footer');

	}


	/*
		新增評和表
	*/
	public function AssessTableCreate(){
		$year = $this->input->post('selectYear');
		$this->load->model('LoadingData');
		$this->LoadingData->CreateHouseAssessInfo($year);
		sleep(3000);
		header('Location:' .base_url('welcome/AssessTableHistory'));
	}


	/*
		指定教官管理房東
	 */
	public function AssignDillmaster($edit){
		$this->load->model('LoadingData');
		$LandlordList = $this->LoadingData->getLandlordList();
		$i =0;
		foreach ($LandlordList->result_array() as $row)
        {
			$TDM_user_name[$i] = $row['user_name'];
			$TDM_user_Id[$i] = $row['user_Id'];
			if (($row['DM_name'] == NULL) || ($row['DM_account']== NULL))
			{
				$TDM_DM_name[$i] = "未指定校安人員";
				$TDM_DM_account[$i] = "0";
			}else{
				$TDM_DM_name[$i] = $row['DM_name'];
				$TDM_DM_account[$i] = $row['DM_account'];
			}
			$i++;
		}

		$DrillmasterList = $this->LoadingData->getDrillmaster();
		$i =0;
		foreach ($DrillmasterList->result_array() as $row)
        {
        	if ($row['active'] != 0){
				$TDM_DM_Assignaccount[$i] = $row['DM_account'];
				$TDM_DM_Assignname[$i] = $row['DM_name'];
				$i++;
			}
		}

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('assigndrillmaster',array(
			"Tedit" => $edit,
			"TDM_user_name" => $TDM_user_name,
			"TDM_user_Id" => $TDM_user_Id,
			"TDM_DM_name" => $TDM_DM_name,
			"TDM_DM_account"=>$TDM_DM_account,
			"TDM_DM_Assignaccount" =>$TDM_DM_Assignaccount,
			"TDM_DM_Assignname" => $TDM_DM_Assignname,
		));
		$this->load->view('footer');
	}
	public function AssignDrillmasterUpdate($tmp){
		$this->load->model('LoadingData');
		$query = $this->LoadingData->getDrillmaster();
		$i = 0;
		foreach ($query->result_array() as $row)
        {
   
        	$DM_Id[$i] = $row['DM_Id'];
        	$DM_account[$i] = $row['DM_account'];
        	$i++;
		}
		for ($i = 0 ; $i < $tmp ; $i++){
			$user_Id = $this->input->post('users_'.$i);
			$selectDrillmaster = $this->input->post('selectUser_'.$i);
			$select_DM_Id = 0 ;
			for ($j=0;$j<count($DM_account);$j++){
				if ($DM_account[$j] == $selectDrillmaster){
					$select_DM_Id = $DM_Id[$j];
					break;
				}
			}



			$this->load->model('Mod_Update');
     		$this->Mod_Update->UpdateAssignDillmaster($select_DM_Id, $user_Id);
		}
		header('Location:' .base_url('welcome/AssignDillmaster/read'));
	}


	/*
		校安人員管理
	 */
	public function DrillmasterList($edit){ // 列出所以教官名單
		$this->load->model('LoadingData');
		$drillmasterlist = $this->LoadingData->getDrillmaster();
		$i =0;
		foreach ($drillmasterlist->result_array() as $row)
        {
			$TDM_account[$i] = $row['DM_account'];
			$TDM_name[$i] = $row['DM_name'];
			$TDM_position[$i] = $row['position'];
			$TDM_phone[$i] = $row['phone'];
			$TDM_adminschool_phone[$i] = $row['adminschool_phone'];
			$TDM_email[$i] = $row['email'];
			$TDM_active[$i] = $row['active'];
			$i++;
		}
		$this->load->view('header');
		$this->load->view('navbar');

		if ($i==0)
		{
			$TDM_account = "0";
			$TDM_name = "0";
			$TDM_position ="0";
			$TDM_phone = "0";
			$TDM_adminschool_phone = "0";
			$TDM_email ="0";
			$TDM_active="0";
		}
		$this->load->view('drillmasterlist',array(
			"Tedit" => $edit,
			"TDM_account" => $TDM_account,
			"TDM_name" => $TDM_name,
			"TDM_position" => $TDM_position,
			"TDM_phone" => $TDM_phone,
			"TDM_adminschool_phone" => $TDM_adminschool_phone,
			"TDM_email" => $TDM_email,
			"TDM_active" => $TDM_active
		));
		$this->load->view('footer');
		
	}


	/*
		校安人員管理
		編輯
	 */
	// public function DrillmasterListEdit(){

	// 	$this->load->view('header');
	// 	$this->load->view('navbar');

	// 	$this->load->model('LoadingData');
	// 	$drillmasterlist = $this->LoadingData->getDrillmaster();
	// 	$i = 0;
	// 	foreach ($drillmasterlist->result_array() as $row)
 //        {
	// 		$TDM_account[$i] = $row['DM_account'];
	// 		$TDM_name[$i] = $row['DM_name'];
	// 		$TDM_position[$i] = $row['position'];
	// 		$TDM_phone[$i] = $row['phone'];
	// 		$TDM_adminschool_phone[$i] = $row['adminschool_phone'];
	// 		$TDM_email[$i] = $row['email'];
	// 		$TDM_active[$i] = $row['active'];
	// 		$i++;
	// 	}

		
	// 	$this->load->view('drillmasterList',array(
	// 		"Tedit" => $edit,//傳送是否編輯狀態
	// 		"TDM_account" => $TDM_account,
	// 		"TDM_name" => $TDM_name,
	// 		"TDM_position" => $TDM_position,
	// 		"TDM_phone" => $TDM_phone,
	// 		"TDM_adminschool_phone" => $TDM_adminschool_phone,
	// 		"TDM_email" => $TDM_email,
	// 		"TDM_active" => $TDM_active
	// 	));

	// 	$this->load->view('footer');
	// }

	/*
		校安人員管理
		更新上傳
	 */
	public function UpdateDrillmaster($tmp){
		for ($i = 0 ; $i<$tmp; $i++){
			//echo "UpdateDrillmaster";
			$account = $this->input->post('account_'.$i);
			
			$data = array(
     			'DM_name' =>  $this->input->post('name_'.$i),
     			'position' =>  $this->input->post('position_'.$i),
     			'phone' =>  $this->input->post('phone_'.$i),
     			'adminschool_phone' =>  $this->input->post('adminschoolphone_'.$i),
     			'email' =>  $this->input->post('email_'.$i),
     			'active' =>  $this->input->post('active_'.$i)
     		);
     		//echo $this->input->post('position_'.$i);
     	//echo $this->input->post('position_'.$i);
			//echo  $this->input->post('active_'.$i);
			$this->load->model('Mod_Update');
     		$this->Mod_Update->UpdateDrillmasterList($account, $data);
		}
		header('Location:' .base_url('welcome/DrillmasterList/read'));
	}
	/*
		校安人員管理
		密碼更新
	 */
	public function UpdateDrillmasterPassword(){
		$account = $this->input->post('Update_account');
		$data = array(
     		'DM_password' => MD5($this->input->post('Updata_password2'))
     		//'DM_password' => $this->input->post('Updata_password2')
     	);
     	$this->load->model('Mod_Update');
     	$this->Mod_Update->UpdateDrillmasterList($account, $data);
     	header('Location:' .base_url('welcome/DrillmasterList/read'));
	}
	/*
		校安人員管理
		新增校安人員
	 */
	public function AddDrillmaster(){
			$data = array(
				'DM_account' =>$this->input->post('Add_account'),
				'DM_password' =>MD5($this->input->post('Add_password2')),
				'DM_name' =>$this->input->post('Add_name'),
				'position' =>$this->input->post('Add_position'),
				'adminschool_phone' =>$this->input->post('Add_adminphone'),
				'phone' =>$this->input->post('Add_phone'),
				'email' =>$this->input->post('Add_email'),
				'site_name' => $_SESSION['sitename']
			);
		$this->load->model('Mod_Update');
     	$this->Mod_Update->AddDrillmasterList($data);
     	header('Location:' .base_url('welcome/DrillmasterList'));
	}
	
}
