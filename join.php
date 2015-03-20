<!--
                    
                                   .. .vr       
                                 qBMBBBMBMY     
                                8BBBBBOBMBMv    
                              iMBMM5vOY:BMBBv        
              .r,             OBM;   .: rBBBBBY     
              vUL             7BB   .;7. LBMMBBM.   
             .@Wwz.           :uvir .i:.iLMOMOBM..  
              vv::r;             iY. ...rv,@arqiao. 
               Li. i:             v:.::::7vOBBMBL.. 
               ,i7: vSUi,         :M7.:.,:u08OP. .  
                 .N2k5u1ju7,..     BMGiiL7   ,i,i.  
                  :rLjFYjvjLY7r::.  ;v  vr... rE8q;.:,, 
                 751jSLXPFu5uU@guohezou.,1vjY2E8@Yizero.    
                 BB:FMu rkM8Eq0PFjF15FZ0Xu15F25uuLuu25Gi.   
               ivSvvXL    :v58ZOGZXF2UUkFSFkU1u125uUJUUZ,   
             :@kevensun.      ,iY20GOXSUXkSuS2F5XXkUX5SEv.  
         .:i0BMBMBBOOBMUi;,        ,;8PkFP5NkPXkFqPEqqkZu.  
       .rqMqBBMOMMBMBBBM .           @kexianli.S11kFSU5q5   
     .7BBOi1L1MM8BBBOMBB..,          8kqS52XkkU1Uqkk1kUEJ   
     .;MBZ;iiMBMBMMOBBBu ,           1OkS1F1X5kPP112F51kU   
       .rPY  OMBMBBBMBB2 ,.          rME5SSSFk1XPqFNkSUPZ,.
              ;;JuBML::r:.:.,,        SZPX0SXSP5kXGNP15UBr.
                  L,    :@huhao.      :MNZqNXqSqXk2E0PSXPE .
              viLBX.,,v8Bj. i:r7:,     2Zkqq0XXSNN0NOXXSXOU 
            :r2. rMBGBMGi .7Y, 1i::i   vO0PMNNSXXEqP@Secbone.
            .i1r. .jkY,    vE. iY....  20Fq0q5X5F1S2F22uuv1M; 
			
-->
<?php
	session_start();
	
	// if already signed in, display welcome
	if (isset($_SESSION) && $_SESSION['admin'] == true)
		echo "<script type = 'text/javascript'>
					window.open('welcome.php', '_self');
				</script>";
	
	$nameIn = $_POST["username"];
	$pswdIn = $_POST["password"];
	$email = $_POST["email"];
	$joinIn = false;
	
    $dsn = 'mysql:host=localhost;dbname=F14_COMP_3540_cwang3540';
    try {
        $db = new PDO($dsn, 'username', 'password');  // make a connection to MySQL
    }
	catch (Exception $e) {
		$error_message = $e->getMessage();
		echo "<p>Error message: $error_message</p>";
		exit();
	}
	
	// check if the user exists
	function userExists($nameIn)
	{
		global $db;
		
		$results = $db->query("select * from users where username = '$nameIn'");
		if ($results->rowCount() > 0)
			return true;
		else
			return false;
	}
	
	// only if the user does not exist in the db table
	if (!userExists($nameIn))
		if($nameIn != '' && $pswdIn != '' && $email != '')
			if(preg_match('/^[0-9a-z]{4,}$/i', $nameIn) == 1)
				if (preg_match("/(?=.*[[:punct:]])(?=.*[[:digit:]])[[:print:]]{6,}/", 
				$pswdIn) == 1)
				if(preg_match('/^.*[@].*$/', $email) == 1)
						$joinIn = true;
					else
						$error_message = "The email should include @ symbol.";
				else
					$error_message = "The password should be minimum 6 letters, digits, 
					or special characters and include at least one special character 
					and one digit.";
			else
				$error_message = "The username should be minimum 4 letters or digits.";
		else
			$error_message = "Please enter username, password and email.";
	else
		$error_message = "$nameIn is not registered because the user already exists.";
		
	if(!$joinIn)
	{
		include('bookmark.php');
		echo '<script type = "text/javascript">
				popUpJoin();
			</script>';
	}
	else
	{
		// hashed password using SHA256 algorithm
		// Let's use "$username$password" as the password to be stored in the DB table
		$hashed_password = hash(SHA256, "$nameIn$pswdIn");
		// insert the user and the hashed password into the db table
		$results = $db->exec("INSERT INTO users (username, password)
								VALUES ('$nameIn', '$hashed_password')");
		//	echo "$username is registered. <br>";
		
		// set cookies
		setcookie('admin', 'already_connected');
		setcookie('username', $nameIn);
		setcookie('password', $pswdIn);
		$_SESSION['admin'] = true;
		
		echo "<script type = 'text/javascript'>
						window.open('welcome.php', '_self');
					</script>";
	}
	exit();
?>
<!DOCTYPE html>
<html>
	<head>
		<!--
			Seminar 9/10
			Author:	Chengcheng Wang
			Date:	Mar 21, 2014/Mar 28, 2014
		-->
		<style type = "text/css">
		</style>
		<script type = "text/javascript">
		</script>
	</head>
	<body>
	</body>
</html>