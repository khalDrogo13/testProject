<?php
require '../globalVariables.php';
?>

<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <div>
            <form>

                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control" id="state1" onchange="getDistrict((document.getElementById('state1').value),'district1')">
                    <?php
                        include '../functions/dataBaseConn.php';
                        session_start();
                        if(isset($_SESSION['district_id']))
                        {
                            $get_state = "SELECT * FROM state,district WHERE state.state_id = district.state_id AND district.district_id = ".$_SESSION['district_id']."";
                            $result = $conn->query($get_state);
                            $row = $result->fetch_assoc();
                            $state = $row['state_name'];
                            echo $state;
                    ?>
                            <option selected><?php echo $state; ?></option>
                    <?php
                        }

                        else
                        {

                    ?>
                            <option disabled selected>State</option>
                    <?php
                        }
                    ?>
                        <?php include 'stateList.php'; ?>
                    </select>
                </div>

                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control" id="district1" onfocus="getDistrict((document.getElementById('state1').value),'district1');return false;">             
                    <?php
                        include '../functions/dataBaseConn.php';
                        session_start();
                        if(isset($_SESSION['district_id']))
                        {
                            $get_district = "SELECT * FROM district WHERE district_id = ".$_SESSION['district_id']."";
                            $result = $conn->query($get_state);
                            $row = $result->fetch_assoc();
                            $district = $row['district_name'];
                            echo $district;
                    ?>
                        <option selected><?php echo $district; ?></option>
                    <?php
                        }

                        else
                        {
                            
                    ?>
                            <option disabled selected>District</option>
                    <?php
                        }
                    ?>
                    <?php include 'district_list.php'; ?>
                    </select>
                </div>
                <div class="col-xs-6 col-md-2">
                    <input class="form-control" id="locality" type="text" placeholder="locality (optional)">
                </div>
                <div class="col-xs-6 col-md-2">
                    <input class="form-control" id="pin" type="text" placeholder="pincode (optional)">
                </div>
                <div class="search col-xs-10 col-md-3">
                    <input class="form-control" id="issue" type="text" placeholder="#IssueCode or Keywords" maxlength="<?php echo MAX_CHARACTER_TITLE ?>">
                </div>
                <input class="search btn btn-default" type="submit" value="Search" onclick="foobar();return false;">
            </form>
        </div>
        <script type="text/javascript">
            function foobar()
            {
                var issue =(document.getElementById('issue').value);
                //alert(issue);
                if(isNaN(issue) || (issue.length == 0) && !(issue.includes("#")))        //Return false if an input is a number
                {
                    generateUrl((document.getElementById('state1').value),(document.getElementById('district1').value),(document.getElementById('locality').value),(document.getElementById('pin').value),(document.getElementById('issue').value),'field','dashboard');
                }
                if(issue.includes("#"))
                {
                    //alert("number ahe");
                    if( issue.charAt( 0 ) === '#' )
                    {
                        issue = issue.substring(1);
                        //alert(issue);
                    }
                    loadDoc('searchIssueById.php?issueNumber='+issue+'&district='+(document.getElementById('district1').value),'field');
                }
                
            }
        </script>
    </body>
</html>
