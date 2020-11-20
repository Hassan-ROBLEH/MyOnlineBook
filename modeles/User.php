<?php

/**
 * class User
 * @author "Hassan"
 */
class User
{
    private int $id;
    private string $email;
    private string $password;
    //private string $address;
    private string $firstName;
    private string $lastName;
    private string $createdAt;
    private ?string $editedAt;
    private bool $activated;
    private string $role;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        /**
         * Cryptage du mot de passe en utilisant l'algorithme BCRYPT
         */
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    /*
    /**
     * @return string
     */
    /*
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    /*
    public function setAddress($address)
    {
        $this->address = $address;
    }*/

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string|null
     */
    public function getEditedAt()
    {
        return $this->editedAt;
    }

    /**
     * @param string|null $editedAt
     */
    public function setEditedAt($editedAt)
    {
        $this->editedAt = $editedAt;
    }

    /**
     * @return bool
     */
    public function isActivated()
    {
        return $this->activated;
    }

    /**
     * @param bool $activated
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Stocker un utilisateur dans la BDD
     *
     * @return bool
     */
    public function add(): bool
    {
        $db = new Database();
        return $db->insert(
            "INSERT INTO `user` (email, password, firstName, lastName)
                            VALUES (?, ?, ?, ?)",
            [$this->email, $this->password, $this->firstName, $this->lastName]
        );
    }

    /**
     * Modifier un utilisateur
     * @return bool
     */
    public function edit(): bool
    {
        $db = new Database();
        return $db->edit(
            "UPDATE `user` SET email = ?, password = ?, firstName = ?, lastName = ? WHERE id = ?",
            [$this->email, $this->password, $this->address, $this->firstName, $this->lastName, $this->id]
        );
    }

    /**
     * Supprimer un utilisateur
     *
     * @param int $id
     * @return bool
     */
    public static function delete(int $id): bool
    {
        $db = new Database();
        return $db->delete(
            "DELETE FROM user WHERE id = ?",
            [$id]
        );
    }

    /**
     * Récupération d'un utilisateur par identifiant
     *
     * @param int $id
     * @return User|null
     */
    public static function getById(int $id): ?User
    {
        $db = new Database();
        $result = $db->selectOne(
            "User",
            "SELECT * FROM user WHERE id = ?",
            [$id]
        );
        if($result == false)
            return null;
        return $result;
    }

    /**
     * Récupération d'un utilisateur par adresse email
     *
     * @param string $email
     * @return User|null
     */
    public static function getByEmail(string $email): ?User
    {
        $db = new Database();
        $result = $db->selectOne(
            "User",
            "SELECT * FROM user WHERE email LIKE ?",
            [$email]
        );
        if($result == false)
            return null;
        return $result;
    }

    /**
     * Récupération d'un utilisateur par son prénom
     *
     * @param string $firstName
     * @return User|null
     */
    public static function getByName(string $firstName): ?User
    {
        $db = new Database();

        $result = $db->selectOne(
            "User",
            "SELECT * FROM user WHERE firstName LIKE ?",
            [$firstName]
        );

        if($result == false)
            return null;
        return $result;
    }

    /**
     * Récupération tous les utilisateurs de la BDD
     *
     * @return array
     */
    public static function getAll(): array
    {
        $db = new Database();
        return $db->selectMany(
            "User",
            "SELECT * FROM user"
        );
    }
}