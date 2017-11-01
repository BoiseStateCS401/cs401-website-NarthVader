<?php
require_once("../database/config.php");
class Dao
{
	/**
	 * Creates and returns a PDO connection using the database connection
	 * url specified in the CLEARDB_DATABASE_URL environment variable.
	 */
	private function getConnection()
	{
		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

		$host = $url["host"];
		$db   = substr($url["path"], 1);
		$user = $url["user"];
		$pass = $url["pass"];

		$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

		// Turn on exceptions for debugging. Comment this out for
		// production or make sure to use try-catch statements.
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conn; 
	}
	/**
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}

	public function getUsernameList()
	{
		$conn = $this->getConnection();
		$stmt = $conn->query("SELECT username FROM users");
		return $stmt->fetchAll();
	}
	public function userExists($username)
	{
		if($this->getUser($username)) {
			return true;
		} else {
			return false;
		}
	}
	public function getUser($username)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE username = :uname");
		$stmt->bindParam(":uname", $username);
		$stmt->execute();
		return $stmt->fetch();
	}
	public function filterPostsByKey($key, $value)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT u.first_name, u.last_name, u.username, p.message, p.posted
							FROM posts AS p JOIN users AS u ON p.user_id = u.id
							WHERE $key = :value");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt;
	}
	public function getPostsJoinUserName() {
		$conn = $this->getConnection();
		return $conn->query("SELECT u.first_name, u.last_name, u.username, p.id, p.message, p.posted
						 FROM posts AS p JOIN users AS u ON p.user_id = u.id");
	}
	public function getPosts()
	{
		$conn = $this->getConnection();
		return $conn->query("SELECT * FROM posts");
	}
	public function addPost($username, $message)
	{
		$user = $this->getUser($username); 	
		if($user) {
			$user_id = $user['id'];
			$conn = $this->getConnection();
			$stmt = $conn->prepare("INSERT INTO posts (user_id, message)
									 VALUES (:user_id, :message)");
			$stmt->bindParam(":user_id", $user_id);
			$stmt->bindParam(":message", $message);
			$stmt->execute();
		} else {
			throw new Exception("Invalid user. $username");
		}
	}
	
	public function deletePostById($id)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->rowCount() == 0 ? false : true;
	}
	
	public function deleteUserPostById($userId, $id)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("DELETE FROM posts WHERE user_id = :user_id AND id = :id");
		$stmt->bindParam(":user_id", $userId);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->rowCount() == 0 ? false : true;
	}

	public function updatePost($id, $message)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("UPDATE posts SET message = :message WHERE id = :id");
		$stmt->bindParam(":message", $message);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->rowCount() == 0 ? false : true;
	}
	
	public function updateUserPost($userId, $id, $message)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("UPDATE posts SET message = :message WHERE user_id = :user_id AND id = :id");
		$stmt->bindParam(":message", $message);
		$stmt->bindParam(":user_id", $userId);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->rowCount() == 0 ? false : true;
	}
}
