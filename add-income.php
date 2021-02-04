<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
  	$userid=$_SESSION['detsuid'];
    $dateincome=$_POST['dateincome'];
    $remark=$_POST['remark'];
	$incomeamount=$_POST['incomeamount'];
	$type = $_POST['optradio'];
    $query=mysqli_query($con, "insert into tbleincome(UserId,IncomeDate,IncomeAmount,Remark,Type_Income) value('$userid','$dateincome','$incomeamount','$remark','$type')");

if($query){
echo "<script>alert('Income has been added');</script>";
echo "<script>window.location.href='manage-income.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}
  
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Analysis || Add Income</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Income</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Income</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
                            echo $msg;
                        }  ?> </p>
						<div class="col-md-12">
							
							<form role="form" method="post" action="">
								<div class="form-group">
									<label>Date of Income</label>
									<input class="form-control" type="date" value="" name="dateincome" required="true">
								</div>

                                <div class="form-group">
									<label>Income Amount</label>
									<input class="form-control" type="text" value="" required="true" name="incomeamount">
								</div>

								<div class="form-group">
									<label>Remark</label>
									<input type="text" class="form-control" name="remark" value="" required="true">
								</div>
								
								<label class="radio-inline">
								<input  type="radio" name="optradio" checked value="Job Salary"/>Job Salary
								</label>
								<label class="radio-inline">
								<input  type="radio" name="optradio" value="StockMarket"/>StockMarket
								</label>
								<label class="radio-inline">
								<input  type="radio" name="optradio" value="Lend Loan Money"/>Lend Loan Money
								</label>
								<label class="radio-inline">
								<input type="radio" name="optradio" value="Other"/>Other
								</label>
								  <br><br>

								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">Add</button>
								</div>
								
								
								</div>
								
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php }  ?>
