<?php
    // ALL THE FUNCTION RETURNS QUERY TO DIFFERENT PAGES ON DASHBOARD
    // EXCEPT getInstId() and getUserId() WHICH RETURN inst_id and user_id RESPECTIVELY
    function historyUpvotedByMe(){
        $sql = "SELECT user_id FROM user WHERE user_email = $email";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $sql = "SELECT * FROM issue,issueupvote WHERE issueupvote.user_id = $userid AND issueupvote.issue_id = issue.issue_id";
        return $sql;
    }

    function getInstId($cemail){
        require('dataBaseConn.php');
        $sql = "SELECT inst_id FROM institute WHERE inst_email = '$cemail'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $instid = $row['inst_id'];
        }
        return $instid;
    }

    function historyReportedBogus($cemail){
        $instid = getInstId($cemail);
        $sql = "SELECT * FROM issue, issuebogusupvote WHERE issuebogusupvote.inst_id = $instid AND issuebogusupvote.issue_id = issue.issue_id";
        return $sql;
    }

    function historyReportedDuplicate($cemail){
        require('dataBaseConn.php');
        $instid = getInstId($cemail);
        $sql = "SELECT * FROM issue, issueduplicateupvote WHERE issueduplicateupvote.inst_id = $instid AND issueduplicateupvote.issue_id = issue.issue_id";
        return $sql;
    }

    function historySolutionProvided($cemail){
        require('dataBaseConn.php');
        $instid = getInstId($cemail);
        $sql = "SELECT * FROM issue, solution WHERE solution.inst_id = $instid AND solution.issue_id = issue.issue_id GROUP BY solution.issue_id, solution.inst_id";
        return $sql;
    }

    function getUserId($email){
        require('dataBaseConn.php');
        $sql = "SELECT user_id FROM user WHERE user_email = '$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $userid = $row['user_id'];
        return $userid;
    }
    
    function historyUpvoted($email){
        require('dataBaseConn.php');
        $userId = getUserId($email);
        $sql = "SELECT * FROM issue, issueupvote WHERE issueupvote.user_id = $userId AND issue.issue_id = issueupvote.issue_id";
		return $sql;
    }

    function historyAdded($email){
        require('dataBaseConn.php');
        $userid = getUserId($email);
        $sql = "SELECT * FROM issue WHERE issue.user_id = $userid";
        return $sql;
    }


?>