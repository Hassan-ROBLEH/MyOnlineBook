<?php


class CategoryController extends AbstractController
{
    public function list()
    {
        $this->renderView("admin/list_category_view",
            ["categories" => Category::list()]
        );
    }

    public function new()
    {
        $session = new Session();
        $message = null;
        if(isset($_POST["name"]) && !empty($_POST["name"])) {
            $newcat = new Category();
            $newcat->setName($_POST["name"]);
            $newcat->setDescription($_POST["description"]);
            $newcat->setShortUrl($_POST["url"]);
            if(!$newcat->add()) {
                $message = "Erreur est survenue !!!";
            } else {
                $message = "Données enregistrées en base";
            }
        }
        $this->renderView("admin/add_category_view",
             ["message" => $message]
        );
    }

    public function edit()
    {
        $message = null;
        if(isset($_GET["id"])) {
            $id = htmlspecialchars($_GET["id"]);
            if(isset($_POST["name"]) && !empty($_POST["name"])) {
                $editCat = new Category();
                $editCat->setName($_POST["name"]);
                $editCat->setDescription($_POST["description"]);
                $editCat->setShortUrl($_POST["url"]);
                if(!$editCat->edit($id)) {
                    $message = "Erreur est survenue !!!";
                } else {
                    $message = "Données enregistrées en base";
                }
            }
        }
        $this->renderView("admin/edit_category_view",
            [
                "category" => Category::getById($_GET["id"]),
                "message" => $message
            ]
        );
    }

    public function delete()
    {
        if(isset($_GET["id"])) {
            $id = $_GET["id"];

            $deletCat = Category::delete($id);

            $this->redirectTo("index.php?class=category&action=list");
        }
    }




}