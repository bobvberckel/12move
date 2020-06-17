<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers()
{
	$connection = dbConnect();
	$sql        = "SELECT * FROM `users`";
	$statement  = $connection->query($sql);

	return $statement->fetchAll();
}


function getUsersByEmail($email){
	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `email` = :email";
	$statement  = $connection->prepare($sql);
	$statement->execute(['email' => $email]);

	if ($statement->rowCount() === 1) {
		return $statement->fetch();
	}
	return false;
}

function getUsersById($id){
	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `id` = :id";
	$statement  = $connection->prepare($sql);
	$statement->execute(['id' => $id]);

	if ($statement->rowCount() === 1) {
		return $statement->fetch();
	}
	return false;
}

function getUsersByCode($code){
	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `code` = :code";
	$statement  = $connection->prepare($sql);
	$statement->execute(['code' => $code]);

	if ($statement->rowCount() === 1) {
		return $statement->fetch();
	}
	return false;
}


// function getAllVideos() {
// 	$connection = dbConnect();
// 	$sql        = "SELECT * FROM `videos`";
// 	$statement  = $connection->query( $sql );

// 	return $statement->fetchAll();
// }