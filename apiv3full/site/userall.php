<?php
		
			include_once('../config/routeros_api.class.php');			
			include_once('conn.php');	

			$ARRAY = $API->comm("/ip/hotspot/user/print");			
									   								
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
</head>
<body>

        <section class="content">

            <div class="row">
                <div class="col-md-12">
                        <div class="col-md-3"></div>
                    <div class="col-md-8">
                    <div class="box box-solid box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-user" aria-hidden="true"></i> User all</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                
                                    <thead>
                                  
                                        <tr> 
                                            <th>No.</th>  
                                            <th>ชื่อ</th>   
                                            <th>รหัสผ่าน</th>
                                                                            
                                            <th>แพคเกจที่ใช้งาน</th>
                                            <th>วัน/เวลา ที่เพิ่มบัตร</th>
                                            <th>จำนวนบัตร</th>                                            
                                            <th>แก้ไข / พิมพ์</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php
                          $id=$_SESSION['id'];
                          $sql="SELECT * FROM mt_gen WHERE mt_id='".$id."' GROUP BY date";
                          $query=mysql_query($sql); 
                          $no==1;
                          While($result=mysql_fetch_array($query)){ 
                          $no++;
                          echo "<tr>";
                            echo "<td>".$no."</td>";  
                            echo "<td>".$result['user']."</td>";  
                            echo "<td>".$result['pass']."</td>";             
                            echo "<td>".$result['profile']."</td>";
                            echo "<td>".$result['date']."</td>";
                            echo "<td>";
                            $count=mysql_fetch_array(mysql_query("SELECT COUNT(user) as total FROM `mt_gen` WHERE date='".$result['date']."'"));
                            echo $count['total'];
                          echo "</td>";                           
                          //  echo "<td>";
                                                        echo "<td>
                                                            <a href='index.php?opt=user&id=".$result['date']."'><button type=\"button\" class=\"btn btn-success\"><i class=\"fa fa-search\"></i></button></a>
                                                            <a href='print.php?id=".$result['date']."'><button type=\"button\" class=\"btn btn-primary\"><i class=\"fa fa-print\"></i></button></a></td>";

                                                            
                          //  echo "<a href='index.php?opt=user&id=".$result['date']."' title='view'><img src='../img/search.png' width=20px></a>";
                          //  echo "&nbsp;<a href='print.php?id=".$result['date']."' title='Print' target='_blank'><img src='../img/print.png' width=20px></a></td>";                           
                          echo "</tr>";
                          }
                        ?>                                       
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                        <!-- /#page-wrapper -->
                    </div>
                </div>
            </div>
        </div>
	<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
   <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="../dist/js/demo.js"></script>	
	<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>

</html>
