<html>
<head>
<meta charset="utf-8">
<script src ="<?php echo resolveURL("js/jquery-1.9.1.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo resolveURL("css/bootstrap.min.css");?>">
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo resolveURL("js/bootstrap.min.js");?>"></script>
<script type="text/javascript" src="<?php echo resolveURL("js/jquery.form.js"); ?>"></script>
<link href="<?php echo resolveURL("css/non-responsive.css");?>" rel="stylesheet">
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top"> 
	<div style="margin-left:150px;margin-right:150px">
		<nav role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=".">ShoPPy</a>
			</div>
		
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li id="menu_register_client"><a href="<?php echo resolveURL("regis_client.php");?>">Register</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form method="post" class="navbar-form navbar-right" action="<?php echo resolveURL("login.php");?>">
							<div class="form-group">
								<input type="text" class="form-control" name="db_cp_username" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="db_cp_password" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>
	</div>
</div>
<div style="height:60px">
</div>
</body>
</html>
