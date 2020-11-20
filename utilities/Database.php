<?php


class Database
{
    /**
     * @var PDO
     */
    private PDO $cnx;

    public function __construct()
    {
        require_once "config.php";
        try {
            /**
             * Cnx à la BDD
             */

            $this->cnx = new PDO(
                "mysql:host=".DATABASE['host'].";port=".DATABASE['port'].";dbname=".DATABASE['dbname'].";charset=utf8",
                DATABASE['username'],
                DATABASE['password'],
            );

        } catch (PDOException $error) {
            /**
             * Affichage de message d'erreur en cas d'erreur
             */
            echo $error->getMessage();
            exit();
        }
    }

    /**
     * Récupére un seul élément sous format d'objet
     *
     * @param string $class
     * @param string $requete
     * @param array $params
     * @return mixed
     */
    public function selectOne(string $class, string $requete, array $params = [])
    {
        $stmt = $this->cnx->prepare($requete);
        $stmt->execute($params);

        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    /**
     * Récupére plusieurs éléments sous format d'objets dans un tableau
     *
     * @param string $class
     * @param string $requete
     * @param array $params
     * @return array
     */
    public function selectMany(string $class, string $requete, array $params = []): array
    {
        $stmt = $this->cnx->prepare($requete);
        $stmt->execute($params);

        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }


    /**
     * Inserer dans la base de données
     *
     * @param string $requete
     * @param array $params
     * @return bool
     */
    public function insert(string $requete, array $params): bool
    {
        $stmt = $this->cnx->prepare($requete);
        return $stmt->execute($params);
    }

    /**
     * Récupère id de la derniere ligne insérée dans la BDD
     *
     * @return int
     */
    public function getLastId(): int
    {
        return $this->cnx->lastInsertId();
    }

    /**
     * Suppression de la BDD
     *
     * @param string $requete
     * @param array $params
     * @return bool
     */
    public function delete(string $requete, array $params): bool
    {
        $stmt = $this->cnx->prepare($requete);
        return $stmt->execute($params);
    }

    /**
     * Modification dans la base de données
     *
     * @param string $requete
     * @param array $params
     * @return bool
     */
    public function edit(string $requete, array $params): bool
    {
        $stmt = $this->cnx->prepare($requete);
        
        return $stmt->execute($params);

    }


    public function __destruct()
    {
        // TODO: Implement __destruct() method.

        unset($this->cnx);
    }

}