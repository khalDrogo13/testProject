<!DOCTYPE html>
<html>

    <head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../functions/ajax.js"></script>
    <script src="urlGenerator.js"></script>
    <script src="tabs.js"></script>

    <title>Better India!</title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Social Buttons CSS -->
    <link href="../vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' id='bbp-default-css'  href='style.css' type='text/css'/>
        <link rel='stylesheet' id='bbp-default-css'  href='styleHowTo.css' type='text/css'/>
        <title>How To? Institute</title>
		
				
		<style>
			button.accordion {
				background-color: #eee;
				color: #444;
				cursor: pointer;
				padding: 18px;
				width: 100%;
				border: none;
				text-align: left;
				outline: none;
				font-size: 15px;
				transition: 0.4s;
			}

			button.accordion.active, button.accordion:hover {
				background-color: #ddd; 
			}

			div.panel {
				padding: 0 18px;
				display: none;
				background-color: white;
			}
			h1 { color: #7c795d; font-family: 'Trocchi', serif; font-size: 40px; font-weight: normal; line-height: 48px; margin: 0; }
		</style>
    </head>

    <body>
        <div class="headMain">
            <h1>Institute Guide</h1>
        </div>
		
		<button class="accordion">Report an Issue as Duplicate</button>
		<div class="panel">
		  <p>The institute can mark an issue as a duplicate of another by adding the issue code of the newly added redundant issue. This helps in avoiding redundancies of issues.</p>
		</div>
		
		
		<button class="accordion">Report an Issue as Spam</button>
		<div class="panel">
		  <p>An issue that is found illegitimate by the institute can be marked as spam, in the "Report as Bogus" section.</p>
		</div>

		<button class="accordion">Provide a Solution</button>
		<div class="panel">
		  <p>The institute can provide a solution to a problem by giving the url that links the solution. This solution can be viewed by the users and the institutes.</p>
		</div>
		
		<button class="accordion">Checking User History</button>
		<div class="panel">
		   <p>To simplify the process for the institute, he can view the history for: </p>
		  <ul>
		  <li>  The solutions added by the user. </li>
		  <li>  The issues reported as spam. </li>
		  <li>  The issues reported as duplicate. </li>
		  </ul>
		  <p> This can be done by viewing the 'History' section in the dashboard.</p>
		</div>

		<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].onclick = function(){
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.display === "block") {
					panel.style.display = "none";
				} else {
					panel.style.display = "block";
				}
			}
		}
		</script>
        <!--<div class="index">
            <a href="#deny">Deny an Issue</a>
            <a href="#solution">Provide Solution</a>
            <a href="#add">Add an Issue</a>
            <a href="#profile">Update Profile</a>
            <a href="#history">Check History</a>
        </div>
        <div class="container">
            <div class="head" id="deny">
                Deny an Issue
            </div>
            <div class="text">
                This section will tell user how to search with some images and stuff.
            </div>
            <div class="head" id="solution">
                Provide Solution
            </div>
            <div class="text">
                This section will tell user how to upvote with some images and stuff.
            </div>
            <div class="head" id="add">
                Adding an Issue
            </div>
            <div class="text">
                This section will tell user how to add an Issue with some images and stuff.
            </div>
            <div class="head" id="profile">
                Updating user profile
            </div>
            <div class="text">
                This section will tell user how to update user profile with some images and stuff.
            </div>
            <div class="head" id="history">
                Checking user history
            </div>
            <div class="text">
                This section will tell user how to see user's' previous engagements with some images and stuff.
            </div>
        </div>-->
    </body>

</html>