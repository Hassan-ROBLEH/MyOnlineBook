<?php

/**
 * Class Category
 * @author Hassan
 */

class Category
{
    /**
     * l'identifiant de la catégorie
     * @var int
     */
    private int $id;

    /**
     * Nom de la catégorie
     * @var string
     */
    private string $name;

    /**
     * Description de la catégorie
     * @var string
     */
    private string $description;

    /** ShortUrl de la catégorie
     * @var string
     */
    private string $shortUrl;

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
    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }

    /**
     * @param string $shortUrl
     */
    public function setShortUrl(string $shortUrl): void
    {
        $this->shortUrl = $shortUrl;
    }

    /**
     * Insertion d'une catégorie dans la BDD
     *
     * @return bool
     */
    public function add(): bool
    {
        $db = new Database();

        return $db->insert(
            "INSERT INTO category(`name`, description, shortUrl) VALUES (?, ?, ?)",
            [$this->name, $this->description, $this->shortUrl]
        );
    }

    /**
     * Modification d'une catégorie
     *
     * @param int $id
     * @return bool
     */
    public function edit(int $id): bool
    {
        $db = new Database();
        return $db->edit(
            "UPDATE category SET `name` = ?, description = ?, shortUrl = ? WHERE id = ?",
            [$this->name, $this->description, $this->shortUrl, $id]
        );
    }

    /**
     * Récupération d'une seule catégorie par l'identifiant
     *
     * @param int $id
     * @return Category|null
     */

    /**
     * Suppression d'une catégorie
     *
     * @param int $id
     * @return bool
     */
    public static function delete(int $id): bool
    {
        $db = new Database();

        return $db->delete(
            "DELETE FROM category WHERE id =?",
            [$id]
        );
    }

    /**
     * Récupération des toutes les catégories de la BDD
     *
     * @return array
     */
    public static function list(): array
    {
        $db = new Database();

        return $db->selectMany(
            "Category",
            "SELECT * FROM category"
        );
    }

    public static function getById(int $id): ?Category
    {
        $db = new Database();

        $result = $db->selectOne(
            "Category",
            "SELECT * FROM category WHERE id = ?",
            [$id]
        );

        if ($result == false)
            return null;
        return $result;
    }

}