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
	$login = false;
	
    $dsn = 'mysql:host=localhost;dbname=F14_COMP_3540_cwang3540';
    try {
        $db = new PDO($dsn, 'username', 'password');  // make a connection to MySQL
    }
	catch (Exception $e) {
		$error_message = $e->getMessage();
		echo "<p>Error message: $error_message</p>";
		exit();
	}
//		check if the user exists and the password is the same
/*	$results = $db->query("select password from users where username='$nameIn'");
	if (!empty($results)){  // the username exists
		$row = $results->fetch();  // fetch the first row
		if ($row['password'] == $pswdIn)
			$login = true;
	}*/
	function isUserValid($username, $password)
	{
		global $db;
		
		// check if the user exists
		$results = $db->query("select * from users where username = '$username'");
		
		// You should use rowCount(), not empty($results) or isset($results)
		if ($results->rowCount() > 0)
		{
//			echo $username.' exits.<br>';
			
			// check if the password is the same
			$results = $db->query("select * from users 
				where username = '$username' and password = '$password'");
			if ($results->rowCount() > 0)
			{
//				echo "$password is valid. <br>";
				return true;
			}
			else
			{	// check if the password is the same using PASSWORD() function in MySQL
				$results = $db->query("select * from users 
					where username = '$username' and password = PASSWORD('$password')");
				if ($results->rowCount() > 0)
				{
//					echo "$password with PASSWORD() is valid. <br>";
					return true;
				}
				else
				{	// check if the password is the same using SHA256 encryption algorithm
	// Let's use "$username$password" as the password to be stored in the DB table
					$hashed_password = hash(SHA256, "$username$password");
					// User $hashed_password
					$results = $db->query("select * from users 
						where username = '$username' and password = '$hashed_password'");
					if ($results->rowCount() > 0)
					{
//						echo "$password with SHA256 is valid. <br>";
						return true;
					}
					else	// finally the password is not correct.
					{
//						echo "$password is invalid. <br>";
						return false;
					}
				}
			}
		}
		else
			return false;
	}
	
	if(!isUserValid($nameIn, $pswdIn))
	{
		$error_message = "Incorrect username or password.";
		include('bookmark.php');
		echo '<script type = "text/javascript">
				popUpSignIn();
			</script>';
	}
	else
	{
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