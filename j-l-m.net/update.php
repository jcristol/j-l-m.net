<?php session_start();
	error_reporting(E_ALL);
	date_default_timezone_set('America/Chicago');
	include 'database.php';
	require '_g.php';
	$type = $_GET['type'];

	if($type == "post") {
		$Post_ = new Post_;
		$Post_->post_film($_POST['title'], $_POST['summary'], $_POST['yt'], $_FILES["rawImg"]["tmp_name"], $_FILES["rawImg"]["name"],
												$_POST['type'], $_POST['d'], $_POST['p'], $_POST['w'], $_POST['dp'], $_POST['pd']);
		//$Global_->update_tags($_POST['tags'], $_POST['oldTags'], $_POST['a_id']);
	}
	elseif($type == "hero_addMain") {
		$Hero_ = new Hero_;
		$Hero_->hero_addMain($_POST['id'], time(), $uid);
	}
	elseif($type == "hero_addSub") {
		$Hero_ = new Hero_;
		$Hero_->hero_addSub($_POST['cat'], $_POST['id'], time(), $uid);
	}
	elseif($type == "hero_deleteMain") {
		$Hero_ = new Hero_;
		$Hero_->hero_deleteMain($_POST['id'], time(), $uid);
	}
	elseif($type == "hero_deleteSub") {
		$Hero_ = new Hero_;
		$Hero_->hero_deleteSub($_POST['cat'], $_POST['id']);
	}
	elseif($type == "user_rank") {
		$User_ = new User_;
		$User_->user_updateRank($_POST['id'], $_POST['rank']);
	}
	elseif($type == "user_updateProfile") {
		$User_ = new User_;
		$User_->user_updateProfile($_POST['email'], $_POST['first'], $_POST['last'], $_POST['tw'], $_POST['uid']);
	}
	elseif($type == "user_updatePassword") {
		$User_ = new User_;
		$User_->user_updatePassword($_POST['password'], $_POST['uid']);
	}
	elseif($type == "user_uploadProfilePicture") {
		$User_ = new User_;
		$User_->user_uploadProfilePicture($_FILES["image-file"]["tmp_name"], $_POST['first'], $_POST['uid']);
	}
	elseif($type == "resetpw") {
		$User_ = new User_;
		$User_->user_resetPw($_POST['email']);
	}
	elseif($type == "post_approve") {
		$Post_ = new Post_;
		$Post_->post_approve($_POST['id']);
	}
	elseif($type == "post_dismiss") {
		$Post_ = new Post_;
		$Post_->post_dismiss($_POST['id']);
	}
	elseif($type == "post_delete") {
		$Post_ = new Post_;
		$Post_->post_delete($_POST['id']);
	}
	elseif($type == "post_undelete") {
		$Post_ = new Post_;
		$Post_->post_undelete($_POST['id']);
	}
?>
