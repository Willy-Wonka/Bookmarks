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
//	echo "Sorry, this site is currently updating!<br>";

	// if not signed in, require sign in
	if (!isset($_SESSION) || $_SESSION['admin'] != true)
		echo "<script type = 'text/javascript'>
					window.open('signIn.php', '_self');
				</script>";
				
    $dsn = 'mysql:host=localhost;dbname=F14_COMP_3540_cwang3540';
    try {
        $db = new PDO($dsn, 'username', 'password');  // make a connection to MySQL
    }
	catch (Exception $e) {
		$error_message = $e->getMessage();
		echo "<p>Error message: $error_message</p>";
		exit();
	}
	$link = $_POST['link'];
	$comment = $_POST['comment'];
	$tags = $_POST['tags'];
	$date = $_POST['date'];

	//	check if the link is valid
	$str = file_get_contents($link);
	if ($str != '')
		preg_match("/\<title*\>(.*)\<\/title\>/", $str, $title);
	else
	{
		include('displayTable.php');
		echo '<script type = "text/javascript">
				parent.popUpAddLink(1);
			</script>';
		exit();
	}
	
	//	check if the link exists
	function linkExists($link)
	{
		global $db;
		
		$results = $db->query("select * from bookmarks where link = '$link'");
		if ($results->rowCount() > 0)
			return true;
		else
			return false;
	}
	if(linkExists($link))
	{
		include('displayTable.php');
		echo '<script type = "text/javascript">
				parent.popUpAddLink(2);
			</script>';
		exit();
	}
	
	// insert the new bookmark into the db table
	
	$db->exec("INSERT INTO bookmarks (link, title, comment, tags, datetime) 
	VALUES ('$link','$title[1]','$comment','$tags','$date')");
	/*
	if(mysql_query($addRow, $db))
		echo "Link added successfully!";
	else
		echo "Error inserting link: ".mysql_error();
	*/
	echo '<script type = "text/javascript">
				parent.displayTable();
			</script>';
?>
<!DOCTYPE html>
<html>
	<head>
		<!--
			Seminar 7/9/10
			Author:	Chengcheng Wang
			Date:	Mar 7, 2014/Mar 21, 2014/Mar 28, 2014
		-->
		<style type = "text/css">
		</style>
		<script type = "text/javascript">
		</script>
	</head>
	<body>
	</body>
</html>