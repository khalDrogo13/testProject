<!--<?php

	/*include '../functions/dataBaseConn.php';
	function showStatus()
	{
		

		$state_id = 1006;
		$sql = "SELECT *FROM issue WHERE issue_id = .$state_id.";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo "test";
		echo "".$row['upvote_count'];*/
//	}

?>-->


<!doctype html>
<html>
<head>
</head>
<body>
<form>
<input type="submit" name="class" value="click me" onclick="f1()">
</form>
<?php
     define('bogus_threshold',5);
define('upvote_threshold',500);
define('like_threhold',100);

	//show whether voting is closed or not
	function showStatus()
	{
		include '../functions/dataBaseConn.php';

		//$state_id = 1006;
		$sql ="SELECT * FROM issue WHERE issue_id =100000";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		//show and disable upvote button
		
		/*if($row['upvote_count']>=500)
		{
			echo "voting close";
		}
		else
		{
			echo "upvote button";
		}*/
		echo "<br>";
		//see solution button
		if($row['solution_count']>0)
		{
		     echo "solution available";
		}
		else 
		{
			echo "solution Awaited";
		}
	}
	function historyadd($sql)
	{
		include '../functions/dataBaseConn.php';
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
		if($result->num_rows!=0)
		{
    // output data of each row
	
			while($row = $result->fetch_assoc())
				{

					echo $row['title'];
	
				}
		}
		
	}
	function historyUovote($sql)
	{
		
		
		
	}
	function collegeStatus($variable)
	{
		include '../functions/dataBaseConn.php';
		$sql="select * from issuebogusupvote where inst_id=' ' And isuue_id=  ";
		$result = $conn->query($sql);
		if($result==TRUE)
		{
		     return 1;	//status bogus
		}
		$sql="select * from issueduplicateupvoteupvote where inst_id=' ' And isuue_id=  ";
		$result = $conn->query($sql);
		if($result==TRUE)
		{
			return 2;  //status marked duplicate
		}
		
	}
	//show upvote button
	function userStatus($variable,$id)
	{
		include '../functions/dataBaseConn.php';
		$sql="select * from issueupvote where user_id='$variable' AND issue_id='$id ' ";//user session
		$result = $conn->query($sql);
		//$num_rows = mysql_num_rows($result);
		
		$n=mysqli_num_rows (  $result );
		
		if($n>0)
		{
			echo "YOU HAVE ALREADY VOTED FOR THIS ";
			//return 0;//already upvoted
		}
		else
		{
			//return 1;//not upvoted
			echo "<button style='margin-left: 15px' id='$id' class='btn btn-primary' onclick='".upvoteUser($id)."'> $id</button>";
			
		}
		 
  }
		
		
	
		function upvoteUser($id)
		{
			
		
			include '../functions/dataBaseConn.php';
			$sql="update issue set upvote_count=upvote_count+1 where issue_id=$id";
			$result=$conn->query($sql);
			//$row=mysqli_fetch_assoc($result);
			//echo $row['upvote_count'];
			
			
		}
		
		
		
		//posted by
				
		function postedBy($id)
		{
			include '../functions/dataBaseConn.php';
			$sql="select *from issue  inner join user on issue.user_id=user.user_id where issue.issue_id=$id";
			$result=$conn->query($sql);
			$row = $result->fetch_assoc();
			echo"<b> POSTED BY : </b>". $row['fname']. "  ".$row['lname'];
			
		}
	function status($id)
	{
		include '../functions/dataBaseConn.php';
		//$state_id = 1006;
		//$sql =$variable; 

		$sql= "SELECT *FROM issue WHERE issue_id =$id";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row['upvote_count']>=500)
		{
			
			if($row['approved_solution']>0)
			{
				echo "Solution approved";
				//return 1;
			}
			else
				if($row['solution_count']>0)
				
				{
					
					echo "  solutions are available";
					//return 2;
				}
				else
					if($row['duplicate_count']>1)
					{
						echo "Issue marked as duplicte";
						//return 3;
					}
				else
					if($row['bogus_count']>5)
					{
						
						echo "bogus issue";
						//return 4;
					}
				else
					//solution awaited
					echo "Solution awaited";
					//return 0;
			
				
		}
		else
		{
			//return 5;

			echo "voting on";//voting on

		}
	}
	
	//institute
	function addSolution($sql)
	{
		include '../functions/dataBaseConn.php';
		$result = $conn->query($sql);
		$sql1="select * fom solution where 1";
		$result1 = $conn->query($sql1);
		echo "Solution addded";
		
	
	}
	function f()
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from solution where 1";
		$result1 = $conn->query($sql1);
		echo "Solution addded";
		if($result1->num_rows!=0)
		{
    // output data of each row
	
			while($row = $result1->fetch_assoc())
				{
	               $val=$row['solution_id'];
				}
				return $val;
		}

	}?>
	<script>
	document.getElementById('class').innerHTML;
	</script>
<?php	
function f1()
	{
		include '../functions/dataBaseConn.php';
		$sql="select * from  issue where 1";
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
		$name=$_POST['class'];
		if($result->num_rows!=0)
		{
    // output data of each row
	
			while($row = $result->fetch_assoc())
				{
					
					$issue_id1=$row['issue_id'];
				}
				return $issue_id1;
		}
		
	}


	function CountBogus($sql)
	{
		include '../functions/dataBaseConn.php';
		$result = $conn->query($sql);
		//$row = $result->fetch_assoc();
	}
	function ReportedBogus($sql)
	{
		include '../functions/dataBaseConn.php';
		$result = $conn->query($sql);
	    if($result->num_rows!=0)
			{
			while($row = $result->fetch_assoc())
				{
	               $val=$row['title'];
				   echo $val ;
				}
				
		}
		
	}
	function ReportedDuplicateByMe($sql)
	{
			include '../functions/dataBaseConn.php';
		    $result = $conn->query($sql);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
				{
	               $val=$row['title'];
				   $val1=$row['similar_to_issue'];
				   echo $val ."<br>" .$val1;
				}
				
			}
	}
	function proLogin($sql)
	{
		include '../functions/dataBaseConn.php';
		    $result = $conn->query($sql);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
				{
	               $val=$row['inst_name'];
				  // $val1=$row['similar_to_issue'];
				   echo $val ;
				}
				
			}
	}
	function solvedByMe($sql)
	{
		include '../functions/dataBaseConn.php';
		    $result = $conn->query($sql);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
				{
	               $val=$row['inst_name'];
				   $val1=$row['solution_url'];
				  // $val1=$row['similar_to_issue'];
				   echo $val."<br>".$val1; ;
				}
				
			}
	}
	function voteAsDuplicate($sql)
	{
		include '../functions/dataBaseConn.php';
		$sql1="select * from issue where 1";
		    $result = $conn->query($sql1);
			if($result->num_rows!=0)
			{
	
			while($row = $result->fetch_assoc())
				{
	               $val=$row['issue_id'];
				 //  $val1=$row['solution_url'];
				}
			}
			 $result = $conn->query($sql);
	}
	
	
	?>
<?php
//ReportedBogus("select issue.title,issue.issue_id,institute.inst_name  from issue inner join institute inner join issuebogusupvote on issue.issue_id=issuebogusupvote.issue_id and institute.inst_id=issuebogusupvote.inst_id where issue.bogus_count>5");
//ReportedDuplicateByMe("select issue.title,issueduplicateupvote.issue_id,issueduplicateupvote.inst_id,issueduplicateupvote.similar_to_issue,user.user_email from issueduplicateupvote inner join issue inner join user on issue.issue_id=issueduplicateupvote.issue_id and user.user_id=issue.user_id where issue.duplicate_count>0");
//proLogin("SELECT issue.title,institute.inst_name,issue.district_id FROM issue INNER JOIN district INNER JOIN institute ON  district.district_id=issue.district_id and district.district_id=institute.district_id where  institute.inst_email='2015isha.shetty@ves.ac.in' ");//in location of college
//solvedByMe("select solution.solution_url,institute.inst_name,issue.title from solution inner join institute INNER JOIN issue on institute.inst_id=solution.inst_id and issue.issue_id=solution.issue_id WHERE issue.solution_count>0");
//voteAsDuplicate("update issue set duplicate_count=duplicate_count+1 where issue_id=100000");
//AddSolution("insert into solution(solution_id, issue_id, inst_id, solution_url, like_count, added_on) values(,"$row['issue_id']",,"$var");");
?>






</body>
</html>
