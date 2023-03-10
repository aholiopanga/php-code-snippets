<!DOCTYPE HTML>
<html>
<head>
<style>
</style>
</head>
<body>

<?php
$nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
if($_SERVER["REQUEST_METHOD"] =="POST") {
	if(empty($_POST["name"])){
		$nameErr = "Name is required";
	}
	else {
		$name = test_input($POST["name"]);
		//to check if name only contains letters and whitespaces
		if(!preg_match("/^[a-zA-Z]*$/",$name)){
			$nameErr="Onlyletters and whitespaces allowed";
		}
	}
	if(empty($_POST["email"])){
		$emailErr="Email is required";
	}
	else{
		$email=test_input($_POST["email"]);
		//check if email address is well formed
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$emailErr="	Invalid email format";
		}
	}
	if(empty($_POST["website"])){
		$website="";
		
	}
	else{
		$website=test_input($_POST["website"]);
		//check if url address syntax if valid(also allows dashes in the url)
		if(!preg_match("/\b(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]/",$website)){
			$websiteErr="Invalid url";
		}
		
	}
	if(empty($_POST["comment"])){
		$comment="";
	}
	else{
		$comment=test_input($_POST["comment"]);
		
	}
	if(empty($_POST["gender"])){
		$genderErr="Gender is required";
	}
	else{
		$gender=test_input($_POST["gender"]);
	}
}


function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	}
?>


<h2>PHP Form Validation Example</h2>
<p><span class= "Error">*required field</span></p>
<form method="post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">


Name:<input type="text"name="name"value="<?php echo $name;?>">
<span class="error">*<?php echo $nameErr;?></span>
<br><br>


Email:<input type="text"name="email"value="<?php echo $email;?>">
<span class="error">*<?php echo $emailErr;?></span>
<br><br>

Website:<input type="text"name="website"value="<?php echo $website;?>">
<span class="error">*<?php echo $websiteErr;?></span>
<br><br>

Comment:<textarea name = "comment" rows="5"columns="40"></textarea>
<br><br>

<input type="radio"name="gender"<?php if(isset($gender)&&$gender=="female")echo"checked";?>value="female">Female
<input type="radio"name="gender"<?php if(isset($gender)&&$gender=="male")echo"checked";?>value="male">Male
<input type="radio"name="gender"<?php if(isset($gender)&&$gender=="other")echo"checked";?>value="other">Other
<span class="error">*<?php echo $genderErr;?></span>
<br><br>
<input type="Submit"name="Submit"value="Submit">
</form>



<?php
echo"<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
echo "<br>";
echo $website;
echo "<br>";
echo $gender;
echo "<br>";
?>
</body>
</html>





