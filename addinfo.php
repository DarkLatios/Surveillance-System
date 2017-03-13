<html>
<head>
<title>Add Student</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
$data_missing = array();
    if(empty($_POST['UserName'])){
       // Adds name to array
        $data_missing[] = 'UserName';
    } else {
        // Trim white space from the name and store the name
        $UserName = trim($_POST['UserName']);
    }
    if(empty($_POST['AadharCard_no'])){
        // Adds name to array
        $data_missing[] = 'AadharCard_no';
    } else{
        // Trim white space from the name and store the name
        $AadharCard_no = trim($_POST['AadharCard_no']);
    }
    if(empty($_POST['ID_no'])){
       // Adds name to array
       $data_missing[] = 'ID_no';
    } else {
        // Trim white space from the name and store the name
        $ID_no = trim($_POST['ID_no']);
    }
    if(empty($_POST['Phone_no'])){
        // Adds name to array
        $data_missing[] = 'Phone_no';
    } else {
        // Trim white space from the name and store the name
        $Phone_no = trim($_POST['Phone_no']);
    }
    if(empty($_POST['balance'])){
       // Adds name to array
       $data_missing[] = 'balance';
    } else {
       // Trim white space from the name and store the name
        $balance = trim($_POST['balance']);
    }
    if(empty($data_missing)){
        require_once('C:\wamp64\www\mysqli_connect.php');
        $query = "INSERT INTO zest (UserName, AadharCard_no, ID_no,
        Phone_no, balance, Cycle_no,Cyclestatus) VALUES (?, ?, ?, ?, ?, ?,1)";
        $q="SELECT * FROM ZEST";
        $r=mysqli_query($dbc,$q);
        $Cycle_no=mysqli_num_rows($r)+1;
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt,"ssssdd", $UserName, $AadharCard_no, $ID_no, $Phone_no, $balance, $Cycle_no);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'entry Entered';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        } else {
            echo 'Error Occurred<br />';
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }
    } else {
        echo 'You need to enter the following data<br />';
        foreach($data_missing as $missing){
            echo "$missing<br />";
        }         
    }
}
if(isset($_POST['delete'])){
    $data_missing = array();
    if(empty($_POST['AadharCard_no'])){
            // Adds name to array
            $data_missing[] = 'AadharCard_no';
        } else{
            // Trim white space from the name and store the name
            $AadharCard_no = trim($_POST['AadharCard_no']);
    }
    if(empty($data_missing)){
        require_once('C:\wamp64\www\mysqli_connect.php');
        $s="SELECT Cycle_no FROM zest WHERE AadharCard_no=$AadharCard_no";
        $r=mysqli_query($dbc,$s);
        $q="UPDATE zest SET Cycle_no=Cycle_no-1 WHERE Cycle_no>?";
        $st=mysqli_prepare($dbc,$q);
        mysqli_stmt_bind_param($st,"d",$r);
        mysqli_stmt_execute($st);
        $query="DELETE FROM zest WHERE AadharCard_no=?";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt,"s", $AadharCard_no);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'entry deleted';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        } else {
            echo 'Error Occurred<br />';
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }
    }
    else {
        echo 'You need to enter the following data<br />';
        foreach($data_missing as $missing){
            echo "$missing<br />";
        }
    }
}
if(isset($_POST['update'])){
    $data_missing = array();
    if(empty($_POST['UserName'])){
            // Adds name to array
            $data_missing[] = 'UserName';
    } else{
            // Trim white space from the name and store the name
            $UserName = trim($_POST['UserName']);
    }    
    if(empty($_POST['AadharCard_no'])){
        // Adds name to array
        $data_missing[] = 'AadharCard_no';
    } else{
        // Trim white space from the name and store the name
        $AadharCard_no = trim($_POST['AadharCard_no']);
    }
    if(empty($_POST['ID_no'])){
       // Adds name to array
       $data_missing[] = 'ID_no';
    } else {
        // Trim white space from the name and store the name
        $ID_no = trim($_POST['ID_no']);
    }
    if(empty($_POST['Phone_no'])){
        // Adds name to array
        $data_missing[] = 'Phone_no';
    } else {
        // Trim white space from the name and store the name
        $Phone_no = trim($_POST['Phone_no']);
    }
    if(empty($_POST['balance'])){
       // Adds name to array
       $data_missing[] = 'balance';
    } else {
       // Trim white space from the name and store the name
        $balance = trim($_POST['balance']);
    }
    if(empty($data_missing)){
        require_once('C:\wamp64\www\mysqli_connect.php');
        $query="UPDATE zest SET UserName=?, ID_no=?, Phone_no=?, balance=? WHERE AadharCard_no=?";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt,"ssssd", $UserName, $ID_no, $Phone_no, $balance, $AadharCard_no);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'entry updated';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        } else {
            echo 'Error Occurred<br />';
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }
    }
    else {
        echo 'You need to enter the following data<br />';
        foreach($data_missing as $missing){
            echo "$missing<br />";
        }
    }

}
?>
<form action="http://192.168.0.100/addinfo.php" method="post">
<b>Add a New Information</b>
<p style="word-spacing: 50">UserName:
<input type="text" name="UserName" size="15" value="" />
</p>
<p style="word-spacing: 17">AadharCard_no:</t>
<input type="text" name="AadharCard_no" size="10" value="" />
</p>
<p style="word-spacing: 79">ID_no:
<input type="text" name="ID_no" size="20" value="" />
</p>
<p style="word-spacing: 56">Phone_no:
<input type="text" name="Phone_no" size="10" value="" />
</p>
<p style="word-spacing: 71">balance:
<input type="Number" name="balance" size="30" value="" />
</p>
<p>
<input type="submit" name="submit" value="Submit" />
<input type="submit" name="delete" value="delete" />
<input type="submit" name="update" value="update" />
</p>
</form>
</body>
</html>
