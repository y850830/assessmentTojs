<form class="form-horizontal" role="form" action="<?php echo base_url('welcome/AssignDrillmasterUpdate/'.count($TDM_user_name));?>" method="post">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">校安人員管理</h1>
                

                <?php
                    if ($Tedit == "read"){
                       echo '<a type="button" class="btn btn-default btn-circle btn-lg"';
                       echo 'href='.base_url('welcome/AssignDillmaster/edit').'>';
                       echo '<i class="fa fa-list"></i></a>';
                    
                       echo '<a type="button" class="btn btn-primary btn-circle btn-lg" onclick="javascript:Add(this.id);"';
                       //echo 'href='.base_url('welcome/DrillmasterListAdd').'>';
                       echo '>';
                       echo '<i class="fa fa-plus"></i></a>';
                       
                    }else if ($Tedit == "edit"){
                       echo "<a type='button' class='btn btn-danger btn-circle btn-lg' href='".base_url('welcome/AssignDillmaster/read')."'";
                       echo '><i class="fa fa-times"></i></a>';
                       echo '<button type="submit" class="btn btn-success btn-circle btn-lg" onclick=""';
                      // echo 'href='.base_url('welcome/DrillmasterList').'>';
                       echo '><i class="fa fa-check"></i></button>';
                    }
               
               
               ?>
               
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                	<th>序號</th>
                                    <th>房東姓名</th>
                                    <th>負責校安人員</th>
                               
                                    <?php 
                              if ($Tedit == 1)
                                echo "<th>密碼重置</th>";
                              ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                           if ($Tedit == "read"){
                           		 for ($i = 0 ; $i < count($TDM_user_name) ; $i++){
                           		 		echo "<tr>";
                           		 		echo "<td>".($i+1)."</td>";
                           		 		echo "<td>".$TDM_user_name[$i]."</td>";

                           		 			echo "<td>".$TDM_DM_name[$i]."</td>";
                           		 		

                           		 		


                           		 		echo "</tr>";
                           		 }
                              // for ($i = 0 ; $i < count($TDM_account) ; $i++){
                              //    echo "<tr>";
                              //    echo "<td>".$TDM_account[$i]."</td>";
                              //    echo "<td>".$TDM_name[$i]."</td>";
                              //    echo "<td>".$TDM_position[$i]."</td>";
                              //    echo "<td>".$TDM_phone[$i]."</td>";
                              //    echo "<td>".$TDM_adminschool_phone[$i]."</td>";
                              //    echo "<td>".$TDM_email[$i]."</td>";
                              //    if ($TDM_active[$i] == 1)
                              //       echo "<td>啟動中</td>";
                              //    else if($TDM_active[$i] == 0)
                              //       echo "<td>已關閉</td>";
                              //    else 
                              //       echo "<td>訊息錯誤，請聯絡管理員</td>";
                              //    echo "</tr>";
                              // }
                           }else if ($Tedit == "edit"){
                           		 for ($i = 0 ; $i < count($TDM_user_name); $i++){
                           		 		echo "<tr>";
                           		 		echo "<td>".($i+1)."</td>";
                           		 		echo "<td>".$TDM_user_name[$i]."</td>";
                           				echo "<input id='users_".$i."' name='users_".$i."' value='".$TDM_user_Id[$i]."' type='hidden'></input>";
                           		 		echo "<td><select class='form-control' name='selectUser_".$i."'>";

                           		 		echo "<option value='".$TDM_DM_account[$i]."'>".$TDM_DM_name[$i]."</option>";
                           		 		for ($j = 0 ; $j < count($TDM_DM_Assignaccount) ;$j++)
                           		 			if ($TDM_DM_Assignname[$j] != $TDM_DM_name[$i])
                           		 				echo "<option value='".$TDM_DM_Assignaccount[$j]."'>".$TDM_DM_Assignname[$j]."</option>";
                           		 		echo "</td>";


                           		 		echo "</tr>";
                           		 }
                //            		 <select class="form-control" name="selectUser">
            				// 	<option value="0">管理者</option>
            				// 	<option value="1">校安人員</option>
          						// </select>
                              // for ($i = 0 ; $i < count($TDM_account) ; $i++){
                              //    echo "<tr>";
                              //    echo "<td><input name='account_$i'"."type='text'  class='form-control' readonly='true' value='".$TDM_account[$i]."'></input></td>";
                              //   // echo "<td>".$TDM_account[$i]."</td>";
                              //    echo "<td><input name='name_$i'"."type='text' class='form-control' value='".$TDM_name[$i]."' required></input></td>";
                              //    echo "<td><input name='position_$i'"."type='text' class='form-control' value='".$TDM_position[$i]." 'required></input></td>";
                              //    echo "<td><input name='phone_$i'"."type='text' class='form-control' value='".$TDM_phone[$i]."' required></input></td>";
                              //    echo "<td><input name='adminschoolphone_$i'"."type='text' class='form-control' value='".$TDM_adminschool_phone[$i]."' required></input></td>";
                              //    echo "<td><input name='email_$i'"."type='email' class='form-control' value='".$TDM_email[$i]."' required autofocus></input></td>";
                                 
                           
                              //    if ($TDM_active[$i] == 1){
                              //       echo "<td><select class='form-control' name='active_$i'>";
                              //       echo "<option value='1'>啟動中</option>";
                              //       echo "<option value='0'>已關閉</option></select></td>";
                           
                              //    }
                              //    else if($TDM_active[$i] == 0){
                              //       echo "<td><select class='form-control' name='active_$i'>";
                              //       echo "<option value='0'>已關閉</option>";
                              //       echo "<option value='1'>啟動中</option></select></td>";
                              //    }
                              //    else 
                              //       echo "<td>訊息錯誤，請聯絡管理員</td>";
                           
                              //    echo "<td><button type='button' class='btn btn-danger' onclick='Reset(".$TDM_account[$i].");'>重置</button></td>";
                           
                              //    echo "</tr>";
                              // }
                           }
                           
                           ?>
                                    <!--   <tr>
                           <td><input value="49943222"></input></td>
                           <td>YFSun</td>
                           <td>大主教</td>
                           <td>5594</td>
                           <td>0987654321</td>
                           <td>abc@gmail.com</td>
                           <td>啟用中</td>
                           <tr> -->
                            </tbody>
                        </table>
                        <?php
                    if ($Tedit == "read"){
                       echo '<a type="button" class="btn btn-default btn-circle btn-lg"';
                       echo 'href='.base_url('welcome/AssignDillmaster/edit').'>';
                       echo '<i class="fa fa-list"></i></a>';
                    
                       echo '<a type="button" class="btn btn-primary btn-circle btn-lg" onclick="javascript:Add(this.id);"';
                       //echo 'href='.base_url('welcome/DrillmasterListAdd').'>';
                       echo '>';
                       echo '<i class="fa fa-plus"></i></a>';
                       
                    }else if ($Tedit == "edit"){
                       echo "<a type='button' class='btn btn-danger btn-circle btn-lg' href='".base_url('welcome/AssignDillmaster/read')."'";
                       echo '><i class="fa fa-times"></i></a>';
                       echo '<button type="submit" class="btn btn-success btn-circle btn-lg" onclick=""';
                      // echo 'href='.base_url('welcome/DrillmasterList').'>';
                       echo '><i class="fa fa-check"></i></button>';
                    }
               
               
               ?>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.page-wrapper -->
</form>

<form class="form-horizontal" id = "add_drillmaster" role="form" action="<?php echo base_url('welcome/AddDrillmaster');?>" onsubmit="return check(1);" method="post">
    <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">新增校安人員</h4>
                </div>
                <div class="modal-body">
                    帳號 <input class="form-control" id="Add_account" name="Add_account" required> 
                    密碼 <input class="form-control" id="Add_password" name="Add_password" type="password" required> 
                    密碼確認 <input class="form-control" id="Add_password2" name="Add_password2" type="password" required> 
                    姓名<input class="form-control" id = "Add_name" name="Add_name" required> 
                    職稱<input class="form-control" id = "Add_position" name="Add_position" required> 
                    分機<input class="form-control" id = "Add_adminphone" name="Add_adminphone" required> 
                    手機<input class="form-control" id = "Add_phone" name="Add_phone" required > 
                    <label for="Add_email" class="sr-only">Email address</label>
                    email<input class="form-control" id="Add_email" name="Add_email" type="email" required autofocus>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary" >新增</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>
<form class="form-horizontal" role="form" id = "update_drillmaster" action="<?php echo base_url('welcome/UpdateDrillmasterPassword');?>" method="post">
    <div class="modal fade" id="ResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id="editPasswd" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    帳號 <input class="form-control" id="Update_account" name="Update_account" type="text" readonly="true"> 
                    密碼 <input class="form-control" id="Update_password" name="Update_password" type="password"> 
                    密碼確認 <input class="form-control" id="Update_password2" name="Updata_password2" type="password">
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-warning" onclick="ResetDefault();">預設值</button>
                    <button type="button" class="btn btn-success" onclick="check(2);">確認修改</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>


<script type="text/javascript">
   
   
</script>