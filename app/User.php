<?php
/**
 * Class User
 */
class User
{
    /**
     * User's email
     *
     * @var string
     */
    private string $email;

    /**
     * User's password
     *
     * @var string
     */
    private string $password;

    /**
     * User's role
     *
     * @var string
     */
    public string $role = "Registered";

    /**
     * Set user password
     *
     * @param string $password New password
     *
     * @return void No return expected
     */
    public function setPassword(string $password): void {
        if (strlen($password) < 8) {
            throw new Exception("Password must be at least 8 characters long");
        }

        if ($password === "12345678") {
            throw new Exception("Invalid password");
        }

        $this->password = $password;
    }

    /**
     * Set user email
     *
     * @param string $email New email
     *
     * @return void No return expected
     */
    public function setEmail(string $email): void {
        if (!strpos($email, "@")) {
            throw new Exception("Invalid email");
        }

        $this->email = $email;
    }

    /**
     * Get user email
     * 
     * @return string User email 
     */
    public function getEmail() : string {
        return $this->email;
    } 

    /**
     * Get user password
     * 
     * @return string User password
     */
    public function getPassword() : string {
        return $this->password;
    }


    /**
     * User create
     *
     * @param string $email    User email
     * @param string $password User password
     *
     * @return bool True if user was created, false otherwise
     */
    public static function create(string $email, string $password): bool
    {
        include_once "db.php";

        return $conn->query(
            "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'Registered')"
        );
    }
}