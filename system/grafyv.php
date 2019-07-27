<?php
error_reporting(0);
session_start();
  if ($_SESSION['logapp']===true){
?>
<!doctype html>
<html lang="sk">

<head>
<?php 
include ("meta.php");
?>
<?php include("connect.php");
		?>							


<?php 
$zmazat = mysqli_query($con,"DELETE FROM chladenie_kurenie WHERE date(time) < CURDATE() - INTERVAL 8 day") or die(mysqli_error($con));
//CHLADENIE_KURENIE GRAF 24H
$result6 = mysqli_query($con,"SELECT * FROM chladenie_kurenie  WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rows6 = array();
$table6 = array();
$table6['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => 'Chladenie', 'type' => 'number'),
	array('label' => 'Kúrenie', 'type' => 'number')
	);
    foreach($result6 as $r6) {
$cas6 = strtotime($r6['time']);
	$cas6 = date('d.m H:i',$cas6);
        $temp6 = array();
        // The following line will be used to slice the Pie chart
        $temp6[] = array('v' => (string) $cas6);
        $temp6[] = array('v' => (integer) $r6['chladenie']);
		$temp6[] = array('v' => (integer) $r6['vykurovanie']);
        $rows6[] = array('c' => $temp6);
        }
$table6['rows'] = $rows6;
$jsonTable6 = json_encode($table6);




?>

<?php 
//CHLADENIE_KURENIE GRAF 7 DNI
$result8 = mysqli_query($con,"SELECT * FROM chladenie_kurenie  WHERE time >= DATE_SUB(NOW(),INTERVAL 7 DAY)") or die(mysqli_error($con));
$rows8 = array();
$table8 = array();
$table8['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => 'Chladenie', 'type' => 'number'),
	array('label' => 'Kúrenie', 'type' => 'number')
	);
    foreach($result8 as $r8) {
$cas8 = strtotime($r8['time']);
	$cas8 = date('d.m H:i',$cas8);
        $temp8 = array();
        // The following line will be used to slice the Pie chart
        $temp8[] = array('v' => (string) $cas8);
        $temp8[] = array('v' => (integer) $r8['chladenie']);
		$temp8[] = array('v' => (integer) $r8['vykurovanie']);
        $rows8[] = array('c' => $temp8);
        }
$table8['rows'] = $rows8;
$jsonTable8 = json_encode($table8);
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 
	
	<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable6?>);
      var options = {
          title: 'Aktivita chladenia a vykurovania za posledných 24 hodín - 1 min reprezentácia',
		  	  colors: ['blue', 'red'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.AreaChart(document.getElementById('chart_div6'));
      chart.draw(data, options);

    }
    </script>
	
	
	<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable8?>);
      var options = {
          title: 'Aktivita chladenia a vykurovania za posledných 7 dní',
		  	  colors: ['blue', 'red'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.AreaChart(document.getElementById('chart_div8'));
      chart.draw(data, options);

    }
    </script>

</head>
<?php $stranka = "Grafyv";?>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
	
	<?php 
include ("menu.php");
?>	
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
							<div class="panel-body">
										


									<h2>Aktivita kúrenia a chladenia</h2>
								
			
				<div class="col-md-12">
				<div id="chart_div6" style="display: block; width: 100%; height: auto;"></div>
				
				 </div>
				<div class="col-md-12">
				<div id="chart_div8" style="display: block; width: 100%; height: auto;"></div>
				 </div>
			
			
				</div>
								


              </div>
          </div>
								</div>
							</div>
					
						</div>
						
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="https://www.themeineed.com" target="_blank">Smart Home</a></p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
<?php
include ("js_files.php");
?>	
	
</body>

<script>
       setInterval(function(){
 
	 $.get('vykurovanie_chladenie.php', function(data){
        $('#xxx').text(data)
    });
	
	$.get('okruhy.php', function(data){
        $('#xyz').text(data)
    });
},500);   
</script>
</html>
<?php }else{
	header("Location: ../index.php");
	
} ?>
