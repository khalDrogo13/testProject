#this file is used to redirect to either add-issue.php or issue-display.php
<?php

	session_start();
	if(isset($_GET['toOpen']))
	{
		$toOpen = $_GET['toOpen'];
		if($toOpen == "search")
		{
			$_SESSION['toOpen'] = "search.php";
		}
		else
		{
			$_SESSION['toOpen'] = "add-issue.php";
		}
		header("Location: dashboard.php");
	}

?>