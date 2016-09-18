

    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">統計資料</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            通過審核與未通過審核比例
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            數據統計
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                               
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>總共戶數</th>
                                    <th>審核通過</th>
                                    <th>審核不通過</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo ($pass+$nonpass);?></td>
                                    <td><?php echo $pass; ?></td>
                                    <td><?php echo $nonpass; ?></td>


                                </tr>

                            </tbody>

                            </table>

                            <!-- <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<script>
 //Flot Pie Chart
$(function() {

    var data = [{
        label: "通過審核",
        data: <?php echo $pass; ?>
    }, {
        label: "尚未通過審核",
        data:  <?php echo $nonpass; ?>
    // }, {
    //     label: "Series 2",
    //     data: 9
    // }, {
    //     label: "Series 3",
    //     data: 20
    }];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});
</script>
