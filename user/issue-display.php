<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="problemdescription.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../functions/ajax.js"></script>
	
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['$email']))
		{
			$login=true;
			$email = $_SESSION['$email'];
		}	
		else
		{
			$login=False;
		}
		
		require('../functions/func_in.php');
		if(!isset($_GET['sql'])){
			$sql = "SELECT * FROM issue WHERE 1";
		}
		else{
			$sql = $_GET['sql'];
		}
		$con= mysqli_connect("localhost","root","");
		$selected = mysqli_select_db($con,'hackathon') 
		or die("Could not select examples");
		/*$state = $_GET['state'];
		echo $state;
		require 'getQuery.php';*/
		$result=mysqli_query($con,$sql);
		$no_of_results=mysqli_num_rows($result);
		if($no_of_results == 0)
		{
			?>
				<div class="alert alert-danger">
                    No Results Found.
                </div>
			<?php
		}
		$results_per_page=5;
		while($row= mysqli_fetch_array($result))
		{
			$row=$row['issue_id'].''.$row['title'].''.'<br>';
		}

		//dtermine the number of pages in a page
		$no_of_pages= ceil($no_of_results/$results_per_page);

		//determine the number of results in one page

		if(!isset($_GET['page']))
		{
			$page=1;
		}
		else
		{
			$page=$_GET['page'];
		}

		$start_limit=($page-1)*$results_per_page;

		if($page>1)
		{
			$pre=$page-1;
			//$next=$page+1;
		}
		else
		{
			$pre=1;

		}
		if($page<$no_of_pages)
		{
			$next=$page+1;
		//$next=$page+1;
		}
		else
		{
			$next=$no_of_pages;

		}
		$sql2= $sql." LIMIT ".$start_limit.','.$results_per_page;
		$result=mysqli_query($con,$sql2);
		
		if($result->num_rows==1)
		{
			$row=mysqli_fetch_array($result);
			
			?>
	
			<button type="button" class="btn btn btn-primary btn-lg btn-block btn-social btn-default openall" data-toggle="collapse" data-target="#demo<?php echo $row['issue_id']; ?>">
			<?php echo "<font style='font-size: 1em;'>#".$row["issue_id"]."</font>".$row["title"]; ?>
			</button>
			<br>
			<div id="demo<?php echo $row['issue_id']; ?>" class="panel-collapse  collapse-in body">
				<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >CODE</a> :  <?php echo "#".$row["issue_id"]; ?>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >(Click here to see the description)</a> 	
			<br><hr>
			
			<?php
				
				echo  postedBy($row['issue_id']);
			?>
			<br><hr>
				
			<?php
				$id = $row['issue_id'];
				echo "<b id='code'>STATUS :</b>";
			?>
			<?php 
			    $status = status($row['issue_id']);
			    switch($status){
			    	case 0:
			    		echo "Voting is on";
			    		break;
		    		case 1:
			    		echo "Voting Closed & Solutions are awaited";
			    		break;
			    	case 2:
			    		echo "Solutions are available";
			    		break;
			    	case 3:
			    		echo "Solution approved";
			    		break;
			    	case 4:
			    		echo "Reported Bogus";
			    		break;
			    	case 5:
			    		echo "Reported Duplicate";
			    		break;
			    }
			?>
			<hr>
			<div id=<?php echo $row['issue_id'] ?> >
			<?php
			if($login)
			{
					if(userStatus($email,$row['issue_id'])==true)
					{
						if(status($row['issue_id']) == 0){
							$issueid= $row['issue_id'];
							
							echo "<button style='margin-left: 15px' class='btn btn-primary' onclick='javascript:loadDoc(\"dip.php?issueid=".$issueid."&userid=".getUserId($email)."\",$issueid)'>Upvote</button>";
						}
						else
						{
							echo "Voting is closed!";
						}
					}
					else
					{
						
						echo "You've Successfully upvoted this issue";
					}
					
			}
			else
			{?>
			<?php 
				if(status($row['issue_id']) == 0)
				{
			?>
					<button style='margin-left: 15px' class='btn btn-primary' data-toggle='modal' data-target='#userLogin'  >Upvote</button>
			<?php
				}
			}
			
				
				?>
				</div>
				<?php
				echo $row["solution_count"];
				if($row["solution_count"] >0)
				{

			?><hr>
			
			<div class='panel-body panel-default '>
				<!-- Button trigger modal -->
				<button class='btn btn-primary' data-toggle='modal' data-target='#myModal'>
				See the solution
				</button>
				<!-- Modal -->
				<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								<h4 class='modal-title' id='myModalLabel'> <? echo $row["solution_count"]; ?>Solutions are available</h4>
							</div>
							<div class='modal-body'>
								<?php
									//} 
								$sql1="select solution_url from solution where issue_id=".$row['issue_id']."";
								$result1=mysqli_query($con,$sql1);
								while($row=mysqli_fetch_array($result1))
								{
								echo "<a href=".$row["solution_url"].">".$row["solution_url"]."</a> </br>";
								}
				}
								?>
							</div>
						<!-- /.modal-content -->
						</div>
					<!-- /.modal-dialog -->
					</div>
				<!-- /.modal -->
				</div>
			</div>
			<div class="modal fade" id='myModal<?php echo $id; ?>' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-md " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×</button>
						<h4 class="modal-title" id="myModalLabel">Issue<?php echo " #".$id; ?></h4>
					</div>
					<div class="modal-body">
						<?php 
						
							$sql3="Select * from issue where issue_id='$id'";
							$result3=mysqli_query($con,$sql3);
							$no_of_results=mysqli_num_rows($result3);
							$row= mysqli_fetch_array($result3);
							echo "Code: #".$id;
							echo "<br><br>Title: ".$row['title'];
							echo "<br><br>Description:";
							echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$row['description'];

						?>
					</div>
				</div>
			</div>
		</div>
		
		</div>
		<!--<div class="modal fade" id='confirmation' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-md " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×</button>
						<h4 class="modal-title" id="myModalLabel">PLEASE LOGIN</h4>
					</div>
					<div class="modal-body">
						<?php 
						//echo "<a href='#userLogin'  class='btn btn-primary' data-toggle='modal' data-dismiss='modal'  >Click here to login</a> ";
						?>
					</div>
				</div>
			</div>
			</div>-->

			
	<?php	}
		else
		{
		
		
	?>
	<?php
		if(!isset($_SESSION['district_id'])){
	?>
			<br>
			<div class="alert alert-danger text-center">
				Add state, district and other details to get relevent results!
			</div>
			<div class="alert alert-info text-center">
				Following are the recently added issue from all over India.
			</div>
	<?php
		}
	?>
	

	<div id="problem">
		<?php
		$i = 1;
		
		while($row=mysqli_fetch_array($result))
		{
			require("issue-collapse.php");
				$i++;
			}
		}
		//display links to the pages
		if($no_of_pages > 1 ){
			
		?>
		<div class="container">
			<ul class="pagination">
				<?php echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=1\",\"field\")' class='button'>FIRST</a></li>"; ?>
				<?php echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$pre."\",\"field\")' class='button'><<</a></li>"; ?>

				<?php
					for($page=1;$page<=$no_of_pages;$page++)
					{	
						$url = "issue-display.php?sql=".$sql."&page=".$page."";
						echo "<li><a onclick='javascript:loadDoc(\"".$url."\",\"field\")'>".$page."</a></li>";
					}
					echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$next."\",\"field\")' class='button'>>></a></li>";
					echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$no_of_pages."\",\"field\")' class='button'>LAST</a></li>";
				?>
			</ul>
		</div>
		<?php } ?>
	</div>
<?php
//require "modal.php";

?>
	
</body>
</html>
