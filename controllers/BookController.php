<?php


class BookController extends AbstractController
{
    public function getbycategory()
    {
        $this->renderView(
            "book_by_category_view",
            [
                "books" => Book::getByCategory($_GET['id']),
                "category" => Category::getById($_GET['id'])
            ]
        );
    }

    public function show()
    {
        $this->renderView(
            "book_view",
            [
                "book" => Book::getById($_GET['id'])
            ]
        );
    }

    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    public function addBook()
    {
        $session = new Session();
        //$message = null;
        $alert = [];

        if(!empty($_POST)) {
            if (isset($_POST["name"]) && isset($_POST["author"]) && isset($_POST["description"]) && isset($_POST["date"]) && isset($_POST["category"]) ) {
                if(!empty($_POST["name"]) && !empty($_POST["author"]) && !empty($_POST["description"]) && !empty($_POST["date"]) && !empty($_POST["category"])) {

                    $pathImage = Book::ajoutImage($_FILES["image"]);
                    $alert["error"] = $pathImage["message"];

                    $pathPDF = Book::ajoutPDF();
                    $alert["error"] = $pathPDF["message"];

                    if ($pathImage["valid"] !== false) {
                        $addBook = new Book();
                        $addBook->setName($this->testInput($_POST["name"]));
                        $addBook->setAuthor($this->testInput($_POST["author"]));
                        $addBook->setIdCategory($this->testInput($_POST["category"]));
                        $addBook->setReleaseAt($this->testInput($_POST["date"]));
                        $addBook->setDescription($this->testInput($_POST["description"]));
                        $addBook->setImageUrl($this->testInput($pathImage["path"]));
                        $addBook->setFileUrl($this->testInput($pathPDF["path"]));
                        $addBook->setIdClient($this->testInput($_SESSION["user"]["id"]));

                        if (!$addBook->add()) {
                            $alert["error"] = "Erreur est survenue !!! ";
                        } else {
                            $alert["success"] = " Le livre a bien été ajouté ";
                        }
                    }
                } else {
                    $alert["error"] =  "Vous devez remplir tous les champs !";
                }
            }
        }
        $this->renderView("user/addbook", [
            //"message" => $message,
            "alert" => $alert
        ]);
    }


    public function search()
    {
        $this->renderView(
            "list_view",
            [
                "search_book" => Book::getSearchBooks($_POST['search'])
            ]
        );
    }

    public function allBooks() {

        $this->renderView("admin/list_book_view",
            [
                "all_books" => Book::getAllBooks()
            ]
        );
    }

    public function bookByApproved() {
        $this->renderView("admin/list_book_view",
            [
                "all_books" => Book::getBooks()
            ]
        );
    }

    public function bookByNonApproved() {
        $this->renderView("admin/list_book_view",
            [
                "all_books" => Book::getNonApprovedBooks()
            ]
        );
    }

    public function newBook() {
        $session = new Session();
        $message = null;
        if(isset($_POST["name"]) && isset($_POST["author"])) {

            $pathImage = Book::ajoutImage($_FILES["image"]);
            $message = $pathImage["message"];

            $filePDF = Book::ajoutPDF();
            $message = $filePDF["message"];

            if ($pathImage["valid"] !== false && $filePDF["valid"] !== false) {
                $newBook = new Book();
                $newBook->setName($this->testInput($_POST["name"]));
                $newBook->setAuthor($this->testInput($_POST["author"]));
                $newBook->setReleaseAt($this->testInput($_POST["date"]));
                $newBook->setIdCategory($this->testInput($_POST["category"]));
                $newBook->setDescription($this->testInput($_POST["description"]));
                $newBook->setImageUrl($this->testInput($pathImage["path"]));
                $newBook->setFileUrl($this->testInput($filePDF["path"]));
                $newBook->setIdClient($_SESSION["user"]["id"]);

                if(!$newBook->add()) {
                    $message = "Erreur : Impossible d'executer la requête";
                } else {
                    $message = "Le livre a bien été ajouté ";
                }
            }
        }
        $this->renderView("admin/add_book_view",
            [
                "message" => $message,
            ]
        );
    }

    public function editBook() {
        $message = null;
        if(isset($_GET["id"])) {
            $id = htmlspecialchars($_GET["id"]);

            if(isset($_POST["name"]) && !empty($_POST["name"])) {

                $book = Book::getById($id);

                $imageActuelle = $book->getImageUrl();
                $fileImage = $_FILES["image"];
                $pathImage = Book::ajoutImage($fileImage);
                $message = $pathImage["message"];

                $filePDFActuel = $book->getFileUrl();
                $pathPDF = Book::ajoutPDF();
                //dump($filePDFActuel);
                $message = $pathPDF["message"];

                if ($pathImage["valid"] !== false) {
                    $editBook = new Book();
                    $editBook->setName($this->testInput($_POST["name"]));
                    $editBook->setAuthor($this->testInput($_POST["author"]));
                    $editBook->setDescription($this->testInput($_POST["description"]));
                    $editBook->setReleaseAt($this->testInput($_POST["date"]));

                    if($fileImage["size"] > 0) {
                        unlink("assets/images/covers/".$imageActuelle);
                        $editBook->setImageUrl($this->testInput($pathImage["path"]));
                    } else {
                        $editBook->setImageUrl($imageActuelle);
                    }

                    if(!empty($pathPDF["path"]) && $pathPDF["valid"] !== false) {
                        unlink("assets/images/files/".$filePDFActuel);
                        $editBook->setFileUrl($this->testInput($pathPDF["path"]));
                    } else {
                        $editBook->setFileUrl($filePDFActuel);
                    }
                    $editBook->setIdCategory($_POST["category"]);
                    if (!$editBook->edit($id)) {
                       $message = "Erreur : Impossible d'executer la requête";
                    } else {
                        $message = "Données modifiées en base";
                    }
                }
            }
        }

        $this->renderView("admin/edit_book_view",
            [
                "b" => Book::getById($_GET["id"]),
                "c" => Category::getById(Book::getById($_GET["id"])->getIdCategory()),
                "message" => $message
            ]
        );
    }

    public function delete() {
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            $deleteBook = Book::delete($id);
        }
        $this->redirectTo("index.php?class=book&action=allbooks");
    }

    public function editApprove() {
        $message = null;
        if (isset($_GET["approved"]) && isset($_GET["id"])) {
            $approved = $_GET["approved"];
            $id = $_GET["id"];

            $editApprove = new Book();
            $editApprove->setApproved($approved);

            if(!$editApprove->editApproved($id)) {
                $message = "Une erreur est survenue !!!";
            } else {
                $this->redirectTo("index.php?class=book&action=allbooks");
            }
        }

        $this->renderView("admin/list_book_view");
    }


}