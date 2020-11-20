<?php


class ContactController extends AbstractController
{

    public function addContact()
    {
        $array = array("firstname" => "", "name" => "", "email" => "", "content" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "contentError" => "", "isSuccess" => false);
        $emailTo = "johnt613@gmail.com";
        if (!empty($_POST)) {
            if(isset($_POST["firstname"]) && isset($_POST["name"])) {
                $array["firstname"] = $_POST["firstname"];
                $array["name"] = $_POST["name"];
                $array["email"] = $_POST["email"];
                $array["content"] = $_POST["content"];
                $array["isSuccess"] = true;
                $emailText = "";

                if (empty($array["firstname"])) {
                    $array["firstnameError"] = "Je veux connaitre ton prénom !";
                    $array["isSuccess"] = false;
                } else {
                    $emailText .= $array["firstname"];
                }

                if (empty($array["name"])) {
                    $array["nameError"] = "Et oui je veux tout savoir. Même ton nom !";
                    $array["isSuccess"] = false;
                } else {
                    $emailText .= $array["name"];
                }

                if (empty($array["email"])) {
                    $array["emailError"] = "T'essaies de me rouler ? C'est pas un email ça  !";
                    $array["isSuccess"] = false;
                } else {
                    $emailText .= $array["email"];
                }

                if (empty($array["content"])) {
                    $array["contentError"] = "Qu'est-ce que tu veux me dire ?";
                    $array["isSuccess"] = false;
                } else {
                    $emailText .= $array["content"];
                }

                if ($array["isSuccess"]) {
                    $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
                    mail($emailTo, "Un message de votre site", $emailText, $headers);
                }

                echo json_encode($array);
                exit();
            }
        }
        $this->renderView("contact_view");
    }
}