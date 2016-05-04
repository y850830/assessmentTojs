<style type="text/css">
  #abgne_float_ad {
  display: none;
  position: absolute;
}
#abgne_float_ad img {
  border: none;
}
div.bigDiv {
  height: 2px;
}

</style>
<form class="form-horizontal" role="form" action="<?php echo base_url('welcome/AssignDrillmasterUpdate/'.count($TDM_user_name));?>" method="post">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">評和表分配</h1>
                

                <?php
                    if ($Tedit == "read"){
                       echo '<a type="button" class="btn btn-default btn-circle btn-lg"';
                       echo 'href='.base_url('welcome/AssignDillmaster/edit').'>';
                       echo '<i class="fa fa-list"></i></a>';
                    
                       
                    }else if ($Tedit == "edit"){
                      // echo "<a type='button' class='btn btn-danger btn-circle btn-lg' href='".base_url('welcome/AssignDillmaster/read')."'";
                      // echo '><i class="fa fa-times"></i></a>';
                      // echo '<button type="submit" class="btn btn-success btn-circle btn-lg" onclick=""';
                      // // echo 'href='.base_url('welcome/DrillmasterList').'>';
                      //  echo '><i class="fa fa-check"></i></button>';

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
                                      if ($TDM_user_name != 0)
                                  		 for ($i = 0 ; $i < count($TDM_user_name) ; $i++){
                                  		 		echo "<tr>";
                                  		 		echo "<td>".($i+1)."</td>";
                                  		 		echo "<td>".$TDM_user_name[$i]."</td>";
                                  		 		echo "<td>".$TDM_DM_name[$i]."</td>";
                                  		 		echo "</tr>";
                                  		 }
                                  }
                                  else if ($Tedit == "edit"){
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

                                  echo "<div id='abgne_float_ad' style=width:360px;height:670px;'>";
                                  echo "<a type='button' class='btn btn-danger btn-circle btn-lg' href='".base_url('welcome/AssignDillmaster/read')."'";
                                  echo '><i class="fa fa-times"></i></a>';
                                  echo '<button type="submit" class="btn btn-success btn-circle btn-lg" onclick=""';
                                  echo '><i class="fa fa-check"></i></button>';
                                  echo "</div>";
              
                           }
                           
                           ?>
                                   
                            </tbody>
                        </table>
                        <?php
                    if ($Tedit == "read"){
                       echo '<a type="button" class="btn btn-default btn-circle btn-lg"';
                       echo 'href='.base_url('welcome/AssignDillmaster/edit').'>';
                       echo '<i class="fa fa-list"></i></a>';
                    
                      
                       
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





<script type="text/javascript">
// 當網頁載入完
$(window).load(function(){
  var $win = $(window),
    $ad = $('#abgne_float_ad').css('opacity', 0).show(),  // 讓廣告區塊變透明且顯示出來
    _width = $ad.width(),
    _height = $ad.height(),
    _diffY = 20, _diffX = 20, // 距離右及下方邊距
    _moveSpeed = 800; // 移動的速度
 
  // 先把 #abgne_float_ad 移動到定點
  $ad.css({
    top: $(document).height(),
    left: $win.width() - _width - _diffX,
    opacity: 1
  });
 
  // 幫網頁加上 scroll 及 resize 事件
  $win.bind('scroll resize', function(){
    var $this = $(this);
 
    // 控制 #abgne_float_ad 的移動
    $ad.stop().animate({
      top: $this.scrollTop() + $this.height() - _height - _diffY,
      left: $this.scrollLeft() + $this.width() - _width - _diffX
    }, _moveSpeed);
  }).scroll();  // 觸發一次 scroll()
});

</script>