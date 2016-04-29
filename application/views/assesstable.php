<!-- Modal -->
<!-- <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bodymiddle">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 align="center" class="modal-title" id="myModalLabel"><font id="school">虎尾科技大學  </font><font class="address">632雲林縣虎尾鎮文化路64號  <font>租屋評核表</font></font></h4>
            </div>
            <div class="modal-body"> -->

<form class="form-horizontal" role="form" action="<?php echo base_url('welcome/AssessTableUpdate/'.md5($TDM_assessId[0])); ?>" method="post">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
               
                <?php
                    if ($TDM_update_staute[0] == 0){
                        echo "<h1 class='page-header'>".$TDM_address[0]."_評核表 <span class='label label-danger'>尚未審核</span></h1>";
                    }else
                    {
                        echo "<h1 class='page-header'>".$TDM_address[0]."_評核表 <span class='label label-success'>已經審核</span></h1>";
                    }
                ?>
               <!--     <button type="button" class="btn btn-success">修改</button> -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

        
        <table class="table table-striped" align="center" border=1>
            <tr>
                <td align="center" width="2%" rowspan="2">項次</td>
                <td align="center" width="55%" rowspan="2">圖片</td>
                <td align="center" width="10%" rowspan="2">檢查內容</td>
                <td align="center" width="12%" colspan="2">檢查情形</td>
                <!--  <td align="center" rowspan="2">備考</td> -->
            </tr>
            <tr>
                <td align="center" width="6%">是</td>
                <td align="center" width="6%">否</td>
            </tr>
            <?php
                 $context= array(
                     '0' => "建築物具有共同門禁管制出入口且有鎖具",
                     '1' => "建築物內或周邊停車場所設有照明者", 
                     '2' => "滅火器功能是否正常", 
                     '3' => "熱水器裝設是否符合安全要求<br>(依本部99年3月29日函頒推動高級中等以上學校學生賃居服務訪視計畫之附件3學生校外宿舍只用熱水器安全診斷表實施檢核)", 
                     '4' => "有火警警報器或獨立型偵煙偵測器", 
                     '5' => "逃生通道是否通暢，標示是否清楚", 
                     '6' => "學生是否知道逃生通道及逃生要領",  

                 );
                 $item = array(
                     '0' => $TDM_item1[0],
                     '1' => $TDM_item2[0],
                     '2' => $TDM_item3[0],
                     '3' => $TDM_item4[0],
                     '4' => $TDM_item5[0],
                     '5' => $TDM_item6[0],
                     '6' => $TDM_item7[0]

                 );
                 $item_pic = array(
                     '0' => $TDM_item1_pic[0],
                     '1' => $TDM_item2_pic[0],
                     '2' => $TDM_item3_pic[0],
                     '3' => $TDM_item4_pic[0],
                     '4' => $TDM_item5_pic[0],
                     '5' => $TDM_item6_pic[0],
                     '6' => $TDM_item7_pic[0]

                 );
                 for ($i =0 ; $i < 7 ; $i++){
                     echo "<tr>";
                     echo "<td align='center'>".($i+1)."</td>";
                     echo "<td align='center'>".$context[$i]."</td>";
                     //TDM_item1
                      echo "<td align='center'><img src='".$item_pic[$i]."' alt='Smiley face' height='150' width='200'/>"."</td>";
  
                     if ($item[$i] == 1){

                         echo "<td align='center'><input type='radio' id='radio_item".($i+1)."'name='radio_item".($i+1)."' checked='true' value='1'><br></td>";
                         echo "<td align='center'><input type='radio' id='radio_item".($i+1)."'name='radio_item".($i+1)."' value='0'><br></td>";
                     }else{
                         echo "<td align='center'><input type='radio' id='radio_item".($i+1)."'name='radio_item".($i+1)."' value='1'><br></td>";
                         echo "<td align='center'><input type='radio' id='radio_item".($i+1)."'name='radio_item".($i+1)."' checked='true' value='0'><br></td>";
                     }
                     //echo "<div class='collapse' id='pic_item".$i."'><div class='well'>";
                     //echo "<img src='https://s1.yimg.com/bt/api/res/1.2/5QXOTOp1vXO8ZJg805iShA--/YXBwaWQ9eW5ld3NfbGVnbztmaT1pbnNldDtoPTQwMDtpbD1wbGFuZTtxPTc5O3c9NjAw/http://media.zenfs.com/zh_hant_tw/News/bcc/a1001b731b_ljy_20160426_1207.jpg' alt='Smiley face' height='200' width='300'/>"."</div></div>"; 
                     //echo "<td align='center'><input type='text'name='text_item".$i."' class='form-control' value=''></td>";
                     echo "</tr>";
                 }
            ?>

        </table>

        <table class="table table-striped" align="center" border=1>
            <tr>
                <td align="center" width="10%">房東</td>
                <td align="center" width="40%"><input type="text" class="form-control" name="text_username" readonly='true' value="<?php echo $TDM_username[0] ;?>"></td>
                <!--     <td align="center" width="10%">學生</td>
                        <td align="center" width="40%"><input type="text" class="form-control" name="text_item" value=""></td> -->
                <td align="center">學校代表</td>
                <td align="center"><input type="text" class="form-control" name="text_DM" readonly='true' value="<?php echo $TDM_DM_NAME[0]; ?>"></td>
            </tr>
            <tr>

                <!--   <td align="center">陪同人員</td>
                        <td align="center"><input type="text" class="form-control" name="text_item" value=""></td> -->
            </tr>
            <tr>
                <td align="center" colspan="4">評 核 結 果</td>
            </tr>
            <tr>
                <td align="center" colspan="4">
                  

                
                <?php 
                     // if ($TDM_assess_staute[0] == 1 ){
                     //     echo "<td align='center' colspan='2'><input type='radio'  name='radio_judge' value='1' checked='true'>合格</td>";
                     //     echo "<td align='center' colspan='2'><input type='radio'  name='radio_judge' value='0'>不合格</td>";
                     // }else{
                     //     echo "<td align='center' colspan='2'><input type='radio'  name='radio_judge' value='1'>合格</td>";
                     //     echo "<td align='center' colspan='2'><input type='radio'  name='radio_judge' value='0'  checked='true' >不合格</td>";
                     // }
                    if ($TDM_assess_status[0] == 0)
                        echo "<h3><span class='label label-danger'>不合格</span></h3>";
                    else
                        echo "<h3><span class='label label-success'>合格</span></h3>";

                ?>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2" rowspan="2">核發安全逃生認證標章(證號：與編號一致)
                <?php
                        echo  "<textarea cols='30%' rows='5%' name='text_security'>".$TDM_assess_security[0]."</textarea>";
                ?>
                   
                </td>
                <td align="center" colspan="2">建議改善事項：
                <?php
                     echo  "<textarea cols='30%' rows='3%' name='text_content'>".$TDM_assess_content[0]."</textarea>";
                ?>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">複查時間：
                    <?php
                         $date = new DateTime($TDM_assessTime[0]);


                        echo "<input type='date' name='time' placeholder='".$TDM_assessTime[0]."' value='".$date->format('Y-m-d')."'>";
                    ?>
                </td>
            </tr>

        </table>

        <div class="navbar-text navbar-right">
            <button type="submit" class="btn btn-success btn-lg btn-block">儲存</button>
        </div>
         

    </div>
</form>
<script type="text/javascript">


</script>
           <!--  </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">儲存</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div> -->
