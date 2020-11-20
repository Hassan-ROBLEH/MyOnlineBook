<?php

/**
 * Class Book
 * @author Hassan
 */

class Book
{
    private int $id;
    private string $name;
    private string $description;
    private string $author;
    private string $releaseAt;
    private string $imageUrl;
    private string $fileUrl;
    private int $approved;
    private int $idCategory;
    private int $idClient;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string|null
     */
    public function getReleaseAt(): ?string
    {
        return $this->releaseAt;
    }

    /**
     * @param string|null $releaseAt
     */
    public function setReleaseAt(?string $releaseAt): void
    {
        $this->releaseAt = $releaseAt;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getFileUrl(): string
    {
        return $this->fileUrl;
    }

    /**
     * @param string $fileUrl
     */
    public function setFileUrl(string $fileUrl): void
    {
        $this->fileUrl = $fileUrl;
    }

    /**
     * @return int
     */
    public function getApproved(): int
    {
        return $this->approved;
    }

    /**
     * @param int $approved
     */
    public function setApproved(int $approved): void
    {
        $this->approved = $approved;
    }

    /**
     * @return int
     */
    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    /**
     * @param int $idCategory
     */
    public function setIdCategory(int $idCategory): void
    {
        $this->idCategory = $idCategory;
    }

    /**
     * @return int
     */
    public function getIdClient(): int
    {
        return $this->idClient;
    }

    /**
     * @param int $idClient
     */
    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }


    /**
     * Insertion d'un livre dans la BDD
     *
     * @return bool
     */
    public function add() : bool
    {
        $db = new Database();

        return $db->insert(
            "INSERT INTO book (`name`, description, author, releaseAt, imageUrl, fileUrl, idCategory, idClient) 
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $this->name, $this->description, $this->author,$this->releaseAt, $this->imageUrl, $this->fileUrl, $this->idCategory, $this->idClient
            ]
        );
    }

    /**
     * @param int $id
     * @return bool
     */
    public function edit(int $id) : bool
    {
        $db = new Database();

        return $db->edit(
            "UPDATE book SET `name` = ?, description = ?, author = ?, releaseAt = ?, imageUrl = ?, fileUrl = ?, idCategory = ?  WHERE id = ?",
            [$this->name, $this->description, $this->author, $this->releaseAt, $this->imageUrl, $this->fileUrl, $this->idCategory, $id]
        );
    }

    public function editApproved(int $id): bool
    {
        $db = new Database();

        return $db->edit("UPDATE book SET  approved = ? WHERE id = ?",
            [$this->approved, $id]
        );
    }

    /**
     * Suppression d'un livre
     *
     * @param int $id
     * @return bool
     */
    public static function delete(int $id): bool
    {
        $db = new Database();
        return $db->delete(
            "DELETE FROM book WHERE id = ?",
            [$id]
        );
    }

    /**
     * Récupération d'un livre par l'identifiant
     *
     * @param int $id
     * @return Book|null
     */
    public static function getById(int $id): ?Book
    {
        $db = new Database();
        $result = $db->selectOne(
            "Book",
            "SELECT * FROM book WHERE id = ?",
            [$id]
        );
        if($result == false)
            return null;
        return $result;
    }

    /**
     * Récupération de tous les livres qui ont le nom passé en paramètre
     *
     * @param string $name
     * @return array
     */
    public static function getSearchBooks(string $name): array
    {
        $db = new Database();
        return $db->selectMany(
            "Book",
            "SELECT * FROM book WHERE `name` LIKE ?",
            ["%$name%"]
        );
    }

    /**
     * Récupération de 9 les livres qui vont être afficher dans la page d'accueil
     *
     * @return array
     */
    public static function getListInIndex(): array
    {
        $db = new Database();
        $result = $db->selectMany(
            "Book",
            "SELECT * FROM book WHERE approved = ? ORDER BY releaseAt DESC LIMIT 9",
            [1]
        );
        //dd($result);
        return $result;
    }

    /**
     * Récupération de tous les livres
     *
     * @return array
     */
    public static function getAllBooks(): array
    {
        $db = new Database();
        return $db->selectMany(
            "Book",
            "SELECT * FROM book ORDER BY releaseAt"
        );
    }

    /**
     * Récuperation de tous les livrés approuvé
     *
     * @return array
     */
    public static function getBooks(): array
    {
        $db = new Database();
        return $db->selectMany(
            "Book",
            "SELECT * FROM book WHERE approved = ? ORDER BY name",
            [1]
        );
    }

    /**
     * Récuperation de tous les livrés non approuvé
     *
     * @return array
     */
    public static function getNonApprovedBooks(): array
    {
        $db = new Database();
        return $db->selectMany(
            "Book",
            "SELECT * FROM book WHERE approved = ? ORDER BY name",
            [0]
        );
    }

    /**
     * Récupération de tous les livres qui appartiennent à une catégorie précise
     *
     * @param int $id_category
     * @return array
     */
    public static function getByCategory(int $id_category): array
    {
        $db = new Database();
        return $db->selectMany(
            "Book",
            "SELECT * FROM book WHERE approved = ? AND idCategory = ?",
            [1, $id_category]
        );
    }

    /**
     * Récuperation les livres d'un utilisateur
     *
     * @param int $id_user
     * @return array
     */
    public static function getByUser(int $id_user) : array
    {
        $db = new Database();
        return $db->selectMany(
            "Book",
            "SELECT * FROM book WHERE idClient = ?",
            [$id_user]
        );
    }

    public static function isMail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    
    public static function ajoutImage($file)
    {
        $tab = ["message" => null, "valid" => null, "path" => null];
        if (isset($file) && $file["error"] == 0) {
                $allowed = array("jpg", "jpeg", "gif", "png", "webm");
            $filename = $file["name"];  // => $_FILES["image]["name"]
            $fileSize = $file["size"];

            $targetDir = "assets/images/covers/";
            $target = $targetDir . $filename;

            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if ($fileSize > 10000000) {
                $tab["message"] = "La taille du fichier est supérieure à la limite autorisée ";
                $tab["valid"] = false;
            }

            if (in_array($extension, $allowed)) {
                if (file_exists($target)) {
                    $tab["message"] = $filename . " existe déjà ";
                    $tab["valid"] = false;
                } else {
                    if ($tab["valid"] !== false) {
                        move_uploaded_file($file["tmp_name"], "assets/images/covers/" . basename($file['name']));
                        $tab["path"] = basename($file['name']);
                    }
                }
            } else {
                $tab["message"] = "Veuillez selectionner un format de fichier valide. ";
                $tab["valid"] = false;
            }
        }
       return $tab;
    }

    public static function ajoutPDF()
    {
        $tab = ["message" => null, "valid" => null, "path" => null];
         if(!empty($_FILES)) {
             $fileName = $_FILES["file"]["name"];
             $fileExtension = strrchr($fileName, ".");

             $fileTemporary = $_FILES["file"]["tmp_name"];
             $targetDir = "assets/images/files/";
             $target = $targetDir.$fileName;

             $extensionAllowed = array(".pdf", ".PDF");

             if(in_array($fileExtension, $extensionAllowed)) {
                 if (file_exists($target)) {
                     $tab["message"] = "Le fichier " . $fileName . " existe déjà";
                     $tab["valid"] = false;
                 } else {
                     if($tab["valid"] !== false) {
                         move_uploaded_file($fileTemporary, $targetDir . basename($_FILES["file"]["name"]));
                         $tab["path"] = basename($_FILES["file"]["name"]);
                     }
                 }

             } else {
                 $tab["message"] = "Seuls les fichiers PDF sont autorisés";
                 $tab["valid"] = false;
             }
         }
         return $tab;
    }

    public static function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }


}