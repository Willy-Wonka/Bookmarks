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
//	echo "Sorry, this site is currently updating!";
//	echo 'You are in sign out php!<br>';

	// if signed in, destroy session and sign out
	if (isset($_SESSION) && $_SESSION['admin'] == true)
	{
		// destroy the session variables.
		$_SESSION = array();
		session_destroy();
		// destroy the session cookie
		$name = session_name();  // name of session cookie
		$expire = strtotime('-1 year');
		$params = session_get_cookie_params();
		$path = $params['path'];
		$domain = $params['domain'];
		$secure = $params['secure'];
		$httponly = $params['httponly'];
		setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
	}
	/*
	echo 'display cookies<br>';
	$name = $_COOKIE["username"];
	$pswd = $_COOKIE["password"];
	$admin = $_COOKIE["admin"];
	echo 'get cookies<br>';
	echo "$name and $pswd and $admin<br>";
	$sessionV = $_SESSION["admin"];
	echo "Session: $sessionV<br>";
	
	setcookie('username', '', '-1 year');
	setcookie('password', '', '-1 year');
	setcookie('admin', '', '-1 year');
	echo 'destoried<br>';
	$name = $_COOKIE["username"];
	$pswd = $_COOKIE["password"];
	$admin = $_COOKIE["admin"];
	echo "$name<br>$pswd<br>$admin";
	*/
	echo "<script type = 'text/javascript'>
					window.open('bookmark.php', '_self');
				</script>";
?>
<!DOCTYPE html>
<html>
	<head>
		<!--
			Seminar 10
			Author:	Chengcheng Wang
			Date:	Mar 28, 2014
		-->
		<style type = "text/css">
		</style>
		<script type = "text/javascript">
		/*	function destory()
			{
				document.getElementById("message").innerHTML = 'statred';
				document.cookie = "admin=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
				document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
				document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
				document.getElementById("message").innerHTML = 'finished';
			}*/
		</script>
	</head>
	<body>
	</body>
</html>