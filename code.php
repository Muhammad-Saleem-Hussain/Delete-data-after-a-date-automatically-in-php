<?php
	$con = mysqli_connect("localhost","root","","database"); // connect database
		$select = "select * from database";
		$query = mysqli_query($con,$select);
		while($row = mysqli_fetch_array($query)){
		$last_date = $row['last_date']; // last date of post stored in database
		$today_date = date('j-M-20y'); // current date 
		$datetime1 = date_create($today_date);
		$datetime2 = date_create($last_date);
		$interval = date_diff($datetime1, $datetime2); //difference between dates if answer is negative its mean that date is over and selected data will be deleted
		$day = $interval->format('%R%a'); 
		if($day < intval(0)){ // if date is negative
		$del = "DELETE FROM job WHERE last_date='$last_date'"; // deleting data which has overdate
		$del_query = mysqli_query($con,$del);
					}
}

?>