<?php 
include './config.php';
require_once "include.php" ;
if(isset($_REQUEST['rating'])){
	session_start();
	//echo $_POST['rating']."<br>".$_POST['user_id'];
	$con = mysql_connect($mysqlhostname , $mysqlusername , $password );
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("repo", $con);
	/*save the rating for the project in rates*/
	$query = 'insert into rates values ('.$_SESSION['user_id'].','.$_POST['user_id'].', "'.$_POST['project_id'].'", "'.$_REQUEST['rating'].'" );';
	echo $query.'<br>';
	echo "jesus";
	$result = mysql_query($query);
	if (!$result) {
			die('Invalid query: ' . mysql_error());
	}
	$query = 'select avg(r.rating) as avgrating 
	from rates r where r.project_id = '.$_POST['project_id'].' group by r.project_id';
	echo $query.'<br>';
	$result = mysql_query($query);
	if (!$result) {
			die('Invalid query: ' . mysql_error());
	}
	$rating = mysql_fetch_assoc($result);
	/*update project rating*/
	$query = 'update project 
	set rating = '.$rating['avgrating'].'
	where project_id = '.$_POST['project_id'].' and user_id ='.$_SESSION['user_id'].';';
	
	echo '<br>'.$query.'<br>';
	$result = mysql_query($query);
	if(!$result) {
			die('Invalid query: ' . mysql_error());
	}
	/*update user skill level*/
	$query = 'update user u set skill_level = 
			(select avg(p.rating)
			from project p where p.user_id = '.$_SESSION['user_id'].' group by p.user_id 
		having p.user_id = '.$_SESSION['user_id'].' ) 
		where u.user_id = '.$_SESSION['user_id'].' ; ' ; 
	
	echo $query;
	$result = mysql_query($query);
	if(!$result) {
			die('Invalid query: ' . mysql_error());
	}
	
	mysql_close($con);
	header("Location: ./project.php?user_id=".$_POST['user_id']."&project=".$_POST['project_id']);
}else
	header("Location: ./index.php");
?>
