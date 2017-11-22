<?php
require_once ("../database/config.php");
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
        $db = substr($url["path"], 1);
        $user = $url["user"];
        $pass = $url["pass"];

        $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

        // Turn on exceptions for debugging. Comment this out for
        // production or make sure to use try-catch statements.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    public function authenticate($email, $password)
    {
        $conn = $this->getConnection();
        $query = "SELECT password, name, id FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
     
        if (($row = $stmt->fetch()))
        {  
        $passDigest = $row['password'];
        	if(password_verify($password, $passDigest)) {
        		return array('name' => $row['name'], 'id' => $row['id']);
        	}
        }
        return false;
    }

    /**
     * Returns the database connection status string.
     */
    public function addUser($email, $password, $name)
    {
        $conn = $this->getConnection();
        $digest = password_hash($password, PASSWORD_DEFAULT);
        if (!$digest)
        {
            throw new Exception("No hashbrowns mayne...");
        }
        $query = "INSERT INTO users (email, password, name) VALUES(:email, :password, :name)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $digest);
        $stmt->bindParam(':name', $name);

        try
        {
            $stmt->execute();
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }

    public function getConnectionStatus()
    {
        $conn = $this->getConnection();
        return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
    }

    public function getUsernameList()
    {
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT name FROM users");
        return $stmt->fetchAll();
    }
    public function userExists($email)
    {
        if ($this->getUser($email))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getUser($email)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getComments()
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM comments");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUserByEmail($email)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function filterPostsByKey($key, $value)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT u.first_name, u.last_name, u.name, p.message, p.posted
							FROM posts AS p JOIN users AS u ON p.user_id = u.id
							WHERE $key = :value");
        $stmt->bindParam(":value", $value);
        $stmt->execute();
        return $stmt;
    }
    public function getPostsJoinUserName()
    {
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
        if ($user)
        {
            $user_id = $user['id'];
            $conn = $this->getConnection();
            $stmt = $conn->prepare("INSERT INTO comments (user_id, message)
									 VALUES (:user_id, :message)");
            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":message", $message);
            $stmt->execute();
        }
        else
        {
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

