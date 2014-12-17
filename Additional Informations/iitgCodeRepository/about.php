<!DOCTYPE html>
<?php
include './include.php';
session_start();
if(!in_session()) destroy_session();

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel = "stylesheet" href="assets/css/bootstrap.min.css">
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
		padding-left: 60px;
		padding-right: 60px;
	  }
    </style>
	<title>IITG Code Repository</title>
</head>
<body >
	<?php
		menu('about');
	?>

 <div class="hero-unit">
        <h1>Welcome to IITG Source Code Repository!</h1>
		<p>We provide you a platform to share, discuss and critique source codes with programming enthusiasts in IIT Guwahati. </p>
		<h2> About Us </h2>
		<p>Welcome to IIT Guwahati's very own Code Repository, where we people work, share and improve codes and coding projects. </p>
		<h2> Goal </h2>
		<p>Our Goal is simple: Make working on complicated code based projects more productive and simple. When you join the repository, you can upload your codes and projects for other people to use or work upon and also get access to codes and projects undertaken already by people, work simultaneously as a group on projects or suggest improvements, rate the projects .</p>

</div>

	<script src="assets/js/jquery-1.9.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>