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
	
	$username = $_COOKIE["username"];
?>
<!DOCTYPE html>
<html>
	<head>
		<!--
			Seminar 3/4/5/7/8/9/10
			Author:	Chengcheng Wang
			Date:	Feb 3, 2014/Feb 7, 2014/Feb 18, 2014/Mar 7, 2014/Mar 13, 2014/Mar 21, 2014
					/Mar 28, 2014
		-->
		<title>Welcome Back <?php echo $username; ?></title>
		<meta charset = "UTF-8" />
		<style type = "text/css">
			body	{	margin: 0px;
						font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
						font-weight: bold;}
			#left	{	width: 400px;
						height: 100%;
						background-color: #66ccff;
						position: absolute;
						font-size: xx-large;}
			#left li{	margin-left: -40px;
						width: 360px;
						height: 80px;
						line-height: 80px;
						padding: inherit;
						color: white;}
			#left li:hover	{	background-color: #04B210;}
			a		{	text-decoration: none;
						color: white;}
			#signOut{	font-size: large;
						position: absolute;
						top: 10px;
						right: 10px;}
			footer a	{	position: absolute;
							bottom: 0;
							width: 100%;
							text-align: center;
							font-size: large;}
			a:hover	{	color: blue;}
			#right	{	height: 100%;
						left: 400px;
						position: absolute;}
			#tableIframe{	width: 100%;
							height: 100%;
							position: absolute;}
			#addLink{	display: none;
						position: absolute;
						top: 50%;
						margin-top: -165px;
						left: 50%;
						width: 600px;
						height: 330px;
						margin-left: -300px;
						z-index: 999;
						background-color: #66ccff;
						font-weight: normal;
						border: 5px solid black;
						color: white;}
			input[type="text"]
					{	border-style: none;
						background-color: white;
						width: 550px;
						height: 20px;
						margin-left: 25px;
						margin-top: 25px;}
			.addP	{	margin: auto;
						margin-left: 25px;}
			#error	{	margin-left: 25px;
						color: red;}
			#submit	{	position: absolute;
						right: 25px;
						bottom: 24px;
						background-color: transparent;
						border: none;
						cursor: pointer;
						font-size: inherit;
						color: white;
						margin: auto;}
			#submit:hover	{	color: blue;}
			.one:hover	{	font-weight: bold;
							color: blue;}
		</style>
		<script type = "text/javascript">
		function start()
		{
			changeWidth();
			displayTable();
		}
		function changeWidth()
		{
			document.getElementById("right").style.width = window.innerWidth - 400 + 'px';
		}
		function displayTable()
		{
			document.getElementById("tableIframe").src = "displayTable.php";
		}
		function popUpAddLink(errorIndex)
		{
			document.getElementById("crystal").style.display = 'block';
			document.getElementById("addLink").style.display = 'block';
			displayAddLinkError(errorIndex);
		}
		function popAllDown()
		{
			document.getElementById("crystal").style.display = 'none';
			document.getElementById("addLink").style.display = 'none';
		}
		function displayAddLinkError(errorIndex)
		{
			var errorMessage = "";
			switch (errorIndex)
			{
				case 1:
					errorMessage = "Unable to connect the link.";
					break;
				case 2:
					errorMessage = "The link already exists in your bookmarks.";
					break;
			}
			document.getElementById("error").innerHTML = errorMessage;
		}
		</script>
	</head>
	<body onload = "start()" onresize = "changeWidth()">
		<div id = "crystal" style = "height: 100%; widsth: 100%; background-color: white;
					position: absolute; top: 0; z-index: 888; opacity: 0.5; display: none"
					onclick = "popAllDown()">
		</div>
		<div id = "left">
			<ul><a href = "signOut.php" 
				id = "signOut">Sign Out</a>
				<p style = "margin: auto; height: 80px; line-height: 80px; color: white;">
				<?php echo $username; ?></p>
				<li><a href = "#" >Search</a></li>
				<li><a href = "displayTable.php" target = "tableIframe">My Links</a></li>
				<li><a href = "#" onclick = "popUpAddLink()">Add Link</a></li>
				<li><a href = "#" >Network</a></li>
				<li><a href = "#" >Setting</a></li>
			</ul>
			<footer>
				<a href = "http://cs.tru.ca">About Us</a>
			</footer>
		</div>
		
		<div id = "right">
			<iframe name="tableIframe" id='tableIframe' frameborder='0'>
			</iframe>
		</div>
		
		<div id = "addLink">
			<form name = "addLink" action = "table.php" target = "tableIframe" 
			onsubmit = "popAllDown()" method = "post">
				<input type = "text" name = "link" value = "" autofocus>
				<p class = "addP">Add a new link</p>
				<input type = "text" name = "comment">
				<p class = "addP">Comment</p>
				<input type = "text" name = "tags">
				<p class = "addP">Tags</p>
				<input type = "text" name = "date">
				<p class = "addP">Datetime</p>
				<p id = "error"></p>
				<input id = "submit" class = "one" type = "submit" value = "Add link" />
				<a class = "one" href="#" style="font-size: inherit; position: absolute;
				right: 100px;bottom: 25px;margin: auto;" onclick = "popAllDown()">Cancel</a>
			</form>
		</div>
	</body>
</html>