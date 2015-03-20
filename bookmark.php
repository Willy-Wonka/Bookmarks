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
//	echo "Sorry, I am currently updating the sites, 
//	some parts of the program may not work!<br>";
	
	// if already signed in, display welcome
	if (isset($_SESSION) && $_SESSION['admin'] == true)
		echo "<script type = 'text/javascript'>
					window.open('welcome.php', '_self');
				</script>";
	
?>
<!DOCTYPE html>
<html>
	<head>
		<!--
			Seminar 2/3/4/8/9/10
			Author:	Chengcheng Wang
			Date:	Jan 26, 2014/Feb 3, 2014/Feb 7, 2014/Mar 13, 2014/Mar 20, 2014
					/Mar 28, 2014
		-->
		<title>Bookmark</title>
		<meta charset = "UTF-8" />
		<meta name = "KEYWORDS" content = "book, mark, bookmark"/>
		<style type = "text/css">
			body	{	margin: 0px;
						font-family: "Helvetica Neue",Arial,sans-serif;
						font-weight: bold;}
			header	{	text-align: right;
						margin-top: 25px;}
			header a	{	margin-right: 30px;}
			#box		{	width: 100%;
							height: 550px;
							background-color: #66ccff;
							position: absolute;
							top: 50%;
							margin-top: -275px;
							z-index: -1;}
			img		{	position: absolute;}
			#signIn, #forgotPassword, #join
					{	display: none;
						position: absolute;
						top: 50%;
						margin-top: -105px;
						left: 50%;
						width: 400px;
						height: 209px;
						margin-left: -200px;
						z-index: 999;
						background-color: white;
						font-weight: normal;
						border: 5px solid black;}
			p		{	font-size: small;
						margin-top: -20px;
						margin-left: 20px;}
			input	{	margin: 20px;}
			input[type="text"], input[type="password"]
					{	border-style: none;
						background-color: rgb(220, 224, 224);
						width: 360px;
						height: 20px;}
			#error	{	position: absolute;
						margin-top: -5px;
						margin-bottom: 0px;
						color: red;}
			#submit	{	position: absolute;
						right: 0;
						bottom: 0;
						background-color: transparent;
						border: none;
						cursor: pointer;}
			footer	{	position: relative;}
			footer a	{	position: fixed;
							bottom: 0;
							width: 100%;
							text-align: center;}
			a		{	text-decoration: none;}
			a:hover	{	color: blue;}
			.one:hover	{	font-weight: bold;
							color: blue;}
		</style>
		<script type = "text/javascript">
			function updatePosition( e )
			{
				var w=window.innerWidth
				|| document.documentElement.clientWidth
				|| document.body.clientWidth;

				var h=window.innerHeight
				|| document.documentElement.clientHeight
				|| document.body.clientHeight;
				
				var ex = document.getElementById("ex");
				var bookmark1 = document.getElementById("bookmark1");
				bookmark1.style.top = e.clientY * 122/h * 3/4 + 'px';
				bookmark1.style.left = e.clientX * (w - 220)/(4*w) + 'px';
				
				var ex = document.getElementById("ex");
				var bookmark2 = document.getElementById("bookmark2");
				bookmark2.style.top = e.clientY * 122/h * 1/4 + 'px';
				bookmark2.style.left = e.clientX * (w - 220)/(2*w) + 'px';
				
				var bookmark3 = document.getElementById("bookmark3");
				bookmark3.style.top = e.clientY * 122/h + 'px';
				bookmark3.style.left = e.clientX * 3*(w - 220)/(4*w) + 'px';
					
				var bookmark4 = document.getElementById("bookmark4");
				bookmark4.style.top = e.clientY * 122/h * 2/4 + 'px';
				bookmark4.style.left = e.clientX * (1 - 220/w) + 'px';
				
//				ex.innerHTML = "X: " + e.clientX + " px, " + "Y: " + e.clientY  
//				+ " px, " + "Window W: " + w + " px, " + "Window H: " + h + " px ";
				
			}
			function popUpSignIn()
			{
				document.getElementById("crystal").style.display = 'block';
				document.getElementById("signIn").style.display = 'block';
			}
			function popAllDown()
			{
				document.getElementById("crystal").style.display = 'none';
				document.getElementById("signIn").style.display = 'none';
				document.getElementById("forgotPassword").style.display = 'none';
				document.getElementById("join").style.display = 'none';
			}
			function popUpForgotPassword()
			{
				document.getElementById("forgotPassword").style.display = 'block';
			}
			function popUpJoin()
			{
				document.getElementById("crystal").style.display = 'block';
				document.getElementById("join").style.display = 'block';
			}
			function validateForm()
			{
				var x = document.forms["signIn"]["username"].value;
				var y = document.forms["signIn"]["password"].value;
				if(x == null || x == "" || y == null || y == "")
				{
					alert("Username or Password must be filled out!");
					return false;
				}
			}
			
			document.onmousemove = updatePosition;
		</script>
	</head>
	<body>
		<header>
			<a href = "#" onclick = "popUpSignIn()">Sign In</a>
			<a href = "#" onclick = "popUpJoin()">Join</a>
		</header>
		<div id = "box">
			<img id = "bookmark1" src = "1.jpg"/>
			<img id = "bookmark2" src = "2.jpg"/>
			<img id = "bookmark3" src = "3.jpg"/>
			<img id = "bookmark4" src = "4.jpg"/>
			<p id = "ex"></p>
		</div>
		<div id = "crystal" style = "height: 100%; width: 100%; background-color: white;
					position: absolute; top: 0; z-index: 888; opacity: 0.5; display: none"
					onclick = "popAllDown()">
		</div>
		<div id = "signIn">
			<form  action = "signIn.php" method = "post"
			onsubmit = "return validateForm()" name = "signIn">
				<input type = "text" name = "username" 
				value = "<?php echo $nameIn; ?>"autofocus>
				<p>Username (or your email address)</p>
				<input type = "password" name = "password" />
				<p>Password</p>
				<?php if(!empty($error_message)){ ?>
					<p id = "error"><?php echo $error_message; ?></p>
				<?php } ?>
				<input id = "submit" class = "one" type = "submit" value = "Sign In" />
				<a class = "one" href="#" style = "font-size: small; position: absolute; 
				margin-top: 30px; margin-left: 20px;" onclick = "popUpForgotPassword()">
				Forgot Password</a>
			</form>
		</div>
		<div id = "forgotPassword">
			<form action = "https://mytru.tru.ca/cp/home/displaylogin" method = "get">
				<input type = "text" name = "usernameOrEmail" autofocus = "">
				<p>Username (or your email address)</p>
				<input id = "submit" class = "one" type = "submit" value = "Submit" />
			</form>
		</div>
		<div id = "join" style = "height: 277px; margin-top: -139px;">
			<form action = "join.php" method = "post">
				<input type = "text" name = "username" 
				value = "<?php echo $nameIn; ?>"autofocus>
				<p>Username (or your email address)</p>
				<input type = "password" name = "password" />
				<p>Password</p>
				<input type = "text" name = "email" />
				<p>Email</p>
				<?php if(!empty($error_message)){ ?>
					<p id = "error"><?php echo $error_message; ?></p>
				<?php } ?>
				<input id = "submit" class = "one" type = "submit" value = "Join" />
			</form>
		</div>
		<footer>
			<a href = "http://cs.tru.ca">About Us</a>
		</footer>
	</body>
</html>