<html>
<head>
<title>Add info</title>
</head>
<body>
<form action="http://192.168.0.100/python.php" method="post">
<b>Verification</b>
<p style="word-spacing: 15">AadharCard_no.:
<input type="text" name="AadharCard_no" size="30" value="" />
</p>
<p>
<input type="submit" name="submit" value="Submit" />
</p>
</form>
<?php
	if(isset($_POST['submit'])){
	$data_missing = array();
    	if(empty($_POST['AadharCard_no'])){
       	// Adds name to array
        	$data_missing[] = 'AadharCard_no';
    		} 
    	else {
        	// Trim white space from the name and store the name
        	$AadharCard_no = trim($_POST['AadharCard_no']);
    	 	}
    	}
    if(empty($data_missing)){
    	require_once('C:\wamp64\www\mysqli_connect.php');
        $query = "SELECT * FROM zest Where AadharCard_no = '$AadharCard_no'";
        $r=mysqli_query($dbc,$query);
        $no=mysqli_num_rows($r);
        if($no=='1'){
        	echo 'Verified';
        }
        else{
        	echo 'Unauthorized';
        }
        
        
    	
    }

?>
</body>
</html>

