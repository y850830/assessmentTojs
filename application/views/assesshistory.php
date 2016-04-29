<form class="form-horizontal" role="form" action="<?php ?>" method="post">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">評和表紀錄</h1>
                <!-- <button type="button" class="btn btn-default btn-circle btn-lg"></button> -->
            	 <?php
                    echo '<button type="button" class="btn btn-primary btn-circle btn-lg"';
                    echo 'onclick="Add(this.id);">';
                    echo '<i class="fa fa-plus"></i></button>';
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
                                    <th>學年度</th>
                                  
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                
                                if ($_SESSION['empty']!=1)
                                {   
                        		      for ($i = 0 ; $i < count($TDM_year) ; $i++){
                        		      	echo "<tr>";
                        		      	echo "<td>".$TDM_year[$i]."</td>";
                        		      	echo "</tr>";
                        		      }
                                }
                              // for ($i = 0 ; $i < count($TDM_year) ; $i++){
                              //    echo "<tr>";
                              //    echo "<td>".$TDM_year[$i]."</td>";
                              //    echo "<td><a href='".base_url('welcome/getAssessTable/'.$TDM_houseId[$i])."''>".$TDM_address[$i]."</a></td>";
                              //    echo "<td>".$TDM_username[$i]."</td>";
                              //    echo "<td>".$TDM_DM_NAME[$i]."</td>";
                               
                              //    echo "<td>".$TDM_assessTime[$i]."</td>";
                                 
                              //    echo "</tr>";
                              // }
                           
                           
                           ?>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.page-wrapper -->
</form>

<form class="form-horizontal" id = "add_drillmaster" role="form" action="<?php echo base_url('welcome/AssessTableCreate/');?>"  method="post">
    <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">新增評核表</h4>
                </div>
                <div class="modal-body">

                <select class="form-control" id="selectYear" name="selectYear">
                        <?php 
                        	
                        	// for ($i=0;$i<count($TDM_year);$i++)
                            
                            // 
                            // 
                            if ($_SESSION['empty']!=1){
                        	   $tmp = count($TDM_year);
                        	   for ($i=$TDM_year[$tmp-1]+1; $i<=108 ; $i++){
                        	   	
                        	   	   echo "<option value='".$i."'>".$i."學年度</option>";
                        	   }
                            }
                            else{
                                 for ($i=104; $i<=108 ; $i++){
                                
                                   echo "<option value='".$i."'>".$i."學年度</option>";
                               }
                           }
                        	

                        ?>
                </select>
                <!--     帳號 <input class="form-control" id="Add_account" name="Add_account" required> 
                    密碼 <input class="form-control" id="Add_password" name="Add_password" type="password" required> 
                    密碼確認 <input class="form-control" id="Add_password2" name="Add_password2" type="password" required> 
                    姓名<input class="form-control" id = "Add_name" name="Add_name" required> 
                    職稱<input class="form-control" id = "Add_position" name="Add_position" required> 
                    分機<input class="form-control" id = "Add_adminphone" name="Add_adminphone" required> 
                    手機<input class="form-control" id = "Add_phone" name="Add_phone" required > 
                    <label for="Add_email" class="sr-only">Email address</label>
                    email<input class="form-control" id="Add_email" name="Add_email" type="email" required autofocus> -->
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

<script type="text/javascript">
	function Add(id) {
        $('#Add').modal('show');
    }
</script>