<?php
	require_once('Dao.php');
	$dao = new Dao();
	echo $dao->getConnectionStatus();
	$users = $dao->getUserNameList();
	$comments = $dao->getComments();
	var_dump($users);
	var_dump($comments);

	$email = 'email@mail.com';
	$password = 'hellapassword';
	$name = 'fake';

	echo $dao->userExists($email);

	if($dao->userExists($email)) {
	 	echo "You must be an evil Doppelganger. Not added.";
	} else {
	 	if($dao->addUser($email, $password, $name)) {
	 		echo "Good to go!";
	 	} else {
	 		echo "Something is janky. Try again, but with a different email por favor!";
	 	}
	}
