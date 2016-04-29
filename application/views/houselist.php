<form class="form-horizontal" id = "assesstable" role="form" action="<?php echo base_url('welcome/getAssessTable/'); ?>" method="post">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12"> 
                <h1 class="page-header">房子列表</h1>
                <!-- <button type="button" class="btn btn-default btn-circle btn-lg"></button> -->
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
                                    <th>年份</th>
                                    <th>地址</th>
                                    <th>房東</th>
                                    <th>校安人員</th>
                                    <th>審核時間</th>
                                    <th>審核結果</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  

                                    if ($_SESSION['empty']!=1)
                                        
                                    for ($i = 0 ; $i < count($TDM_year) ; $i++){
                        
                                       echo "<tr>";
                                       echo "<td>".$TDM_year[$i]."</td>";
                                       echo "<td><a href='".base_url('welcome/getAssessTable/'.md5($TDM_houseId[$i]))."''>".$TDM_address[$i]."</a></td>";
                                      // echo "<td><a href=javascript:sender(".md5($TDM_houseId[$i]).");>".$TDM_address[$i]."</a></td>";
                                      //  echo "<a href='javascript:alert('Hello World!'"');''>Execute JavaScript</a>";
                                 
                                       echo "<td>".$TDM_username[$i]."</td>";
                                       echo "<td>".$TDM_DM_NAME[$i]."</td>";

                                       $date = new DateTime($TDM_assessTime[$i]);
                                       

                                     	 if ($TDM_update_status[$i] == 0)
                                     	 	echo "<td>尚未評核</td>";
                                     	 else	
                                       	echo "<td>".$date->format('Y-m-d')."</td>";

                                        if ($TDM_assess_status[$i] == 0)
                                            echo "<td><h4><span class='label label-danger'>不合格</span></h4></td>";
                                        else
                                            echo "<td><h4><span class='label label-success'>合格</span></h4></td>";


                                        echo "<input id='adrress' name='adrress' type='hidden' value='".$TDM_address[$i]."'>";
                                       echo "</tr>";
                                    }
                           
                           
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
    <?php 
       
    ?>
    <!-- /.page-wrapper -->
</form>
<script>
    function sender(QQ){

        //console.log(QQ);
    }
</script>