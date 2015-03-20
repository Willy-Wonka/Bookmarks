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
			#rounded-corner
			{	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
				font-size: medium;
				width: 100%;
				text-align: left;
				border-collapse: collapse;}
			#rounded-corner thead th.rounded-company
			{	background: #b9c9fe url('left.png') left -1px no-repeat;}
			#rounded-corner thead th.rounded-q4
			{	background: #b9c9fe url('right.png') right -1px no-repeat;}
			#rounded-corner th
			{	padding: 8px;
				font-weight: normal;
				font-size: medium;
				color: #039;
				background: #b9c9fe;}
			#rounded-corner td
			{	padding: 8px;
				background: #e8edff;
				border-top: 1px solid #fff;
				color: #669;}
			#rounded-corner tfoot td.rounded-foot-left
			{	background: #e8edff url('botleft.png') left bottom no-repeat;}
			#rounded-corner tfoot td.rounded-foot-right
			{	background: #e8edff url('botright.png') right bottom no-repeat;}
			#rounded-corner tbody tr:hover td
			{	background: #d0dafd;}
			a	{	text-decoration: none;
					color: #669;}
		</style>
		<script type="text/javascript" src="time.js" ></script>
		<script type = "text/javascript">
			function NYClock()
			{
				// the today variable contains the current date and time
				var today = new Date();
				
				// display the current date and time
				document.getElementById("time").innerHTML = showTime(today) + " " + 
				showDate(today) + " My Bookmarks";
			}
		</script>
	</head>
	<body onload = "setInterval('NYClock()',1000)">
		<table id="rounded-corner" summary="Bookmarks Table">
			<thead>
				<tr>
					<th scope="col" class="rounded-company">Link</th>
					<th scope="col" class="rounded-q1">Title</th>
					<th scope="col" class="rounded-q2">Comment</th>
					<th scope="col" class="rounded-q3">Tags</th>
					<th scope="col" class="rounded-q4">Datetime</th>
				</tr>
			</thead>
				<tfoot>
				<tr>
					<td colspan="4" class="rounded-foot-left"><em id = "time">
						Bookmarks Upload Successful!</em></td>
					<td class="rounded-foot-right">&nbsp;</td>
				</tr>
			</tfoot>
			<tbody>
				<?php
					// display the bookmarks table
					
					$results = $db->query("select * from bookmarks");
					$results = $results->fetchAll();
					foreach($results as $row)
						echo '<tr><td><a href="'.$row['link'].'" target="_blank">'.
						$row['link'].'</td><td>'.$row['title'].'</td><td>'.$row['comment'].
						'</td><td>'.$row['tags'].'</td><td>'.$row['datetime']. '</td></tr>';
				?>
			</tbody>
		</table>
	</body>
</html>