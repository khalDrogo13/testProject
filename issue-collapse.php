<?php
	require_once('functions/func_in.php');
?>
<button type="button" class="btn btn btn-default btn-lg btn-block btn-social" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
	<?php echo "<font style='font-size: 1em;'>#".$row["issue_id"]."</font>".$row["title"]; ?>
</button>
<br>
<div id="demo<?php echo $i; ?>" class="<?php if($no_of_results == 1) echo"panel-collapse collapse-in body"; else echo "collapse body"; ?>">
	<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >CODE</a> :  <?php echo "#".$row["issue_id"]; ?>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >(Click here to see the description)</a> 	
	<br><hr>
	<b>Location : </b>
	<?php

		$district_issue = $row['district_id'];
		$getdistname = "SELECT * FROM district WHERE district_id = $district_issue";
		$resultdistname = $conn->query($getdistname);
		$arr = $resultdistname->fetch_assoc();
		$distname_issue = $arr['district_name'];
		$state_issue = $arr['state_id'];
		$getstatename = "SELECT * FROM state WHERE state_id = $state_issue";
		$resultstatename = $conn->query($getstatename);
		$arr = $resultstatename->fetch_assoc();
		$statename_issue = $arr['state_name'];
		echo $statename_issue.", ".$distname_issue.", ".$row['locality'].", ".$row['pincode'];
	?>
	<br><hr>
	<?php
		echo  postedBy($row['issue_id']);
	?>
	<br><hr>
	<?php
		$id = $row['issue_id'];
		echo "<b id='code'>Status : </b>";

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
				echo "Repoted Bogus";
				break;
			case 5:
				echo "Repoted Duplicate";
				break;
		}
	?>
	<hr>
	<?php
		if($instlogin){
			require('inst-issue-btns.php');
		}
		else{
			require('user-issue-btns.php');
		}
	?>
</div>