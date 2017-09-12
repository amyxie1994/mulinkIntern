<?php

include "userManagement.php";



$type=$_POST['type'];
	
switch ($type) {

	case "log_in":
		login_verify();
		break;

	case "register":
		user_Register();
		break;


	case "delete":		
		$user_id = $_POST['user_id'];
		$Message = delete_user($user_id);
		echo json_encode($Message);
		break;

	case "edit":		
		$user_id = $_POST['user_id'];
		$Message = get_userInfo($user_id);
		echo json_encode($Message);
		break;

	case "update":
		$user_id = $_POST['user_id'];
		update_user($user_id);
		break;

	case "list":
		$Message = list_userInfo();
		echo json_encode($Message);
		break;

	case "log_out":
		$Message = log_out();
		echo json_encode($Message);
		break;
	
	default:
		$Message = "Unknown operations!";
		break;
}


function log_out()
{	
	session_start();
	session_destroy();
	return "Log out Successfully!";
}

function user_Register()
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$add_supOrPro = set_checkbox_value('add_supOrPro');
	$add_ReData = set_checkbox_value('add_ReData');
	$vOrS_o_redata = set_checkbox_value('vOrS_o_redata');
	$vOrS_a_redata = set_checkbox_value('vOrS_a_redata');
	$vOrS_o_sudata = set_checkbox_value('vOrS_o_sudata');
	$vOrS_a_sudata = set_checkbox_value('vOrS_a_sudata');

	$userManager = new userManager();

	if($userManager->check_name($username))
	{
		$result = $userManager->add_user($username,$password,$add_supOrPro,$add_ReData,$vOrS_a_sudata,$vOrS_o_sudata,$vOrS_a_redata,$vOrS_o_redata);

		if($result)
			header('Location: ../userInfo.php');
		else
		{
			echo "<script>
			alert('Creater Account failed, Please try again later!');
			window.location.href='../register.php';
			</script>";
		}
	}
	else
	{
		echo "<script>
			alert('username already exists, Please use another one !');
			window.location.href='../register.php';
			</script>";
	}
}

function list_userInfo()
{
	$userManager = new userManager();
    return $userManager->all_userInfo();
}

function login_verify()
{	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$userManager = new userManager();

	if($userManager->verify($username,$password))
	{
		session_start();
		$_SESSION["username"] = $username;
		header('Location: ../index.php');
	}
	else
	{
		echo "<script>
		alert('Authentication Failed, Please try again!');
		window.location.href='../login.html';
		</script>";
	}

}


function get_userInfo($user_id)
{
	$userManager = new userManager();
	return $userManager->get_userInfo($user_id);
}

function delete_user($user_id)
{
	$userManager = new userManager();

	if($userManager->delete_user($user_id))
		return "Delete suer Successfully!";
	else
		return "Failed to delete user!";

}


function update_user($user_id)
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$add_supOrPro = set_checkbox_value('add_supOrPro');
	$add_ReData = set_checkbox_value('add_ReData');
	$vOrS_o_redata = set_checkbox_value('vOrS_o_redata');
	$vOrS_a_redata = set_checkbox_value('vOrS_a_redata');
	$vOrS_o_sudata = set_checkbox_value('vOrS_o_sudata');
	$vOrS_a_sudata = set_checkbox_value('vOrS_a_sudata');

	$userManager = new userManager();
	$result = $userManager->update_user($user_id,$username,$password,$add_supOrPro,$add_ReData,$vOrS_a_sudata,$vOrS_o_sudata,$vOrS_a_redata,$vOrS_o_redata);

	if($result)
		header('Location: ../userInfo.php');
	else
	{
		echo "<script>
		alert('Update user information failed, Please try again later!');
		window.location.href='../userInfo.php';
		</script>";
	}
	
}

function set_checkbox_value($variable)
{

	if( isset($_POST[$variable]) )
	{
      return $_POST[$variable];
	}
	else
		return 0;
}

?>