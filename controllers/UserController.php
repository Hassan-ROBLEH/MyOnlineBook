<?php


class UserController extends AbstractController
{
    public function index()
    {
        $session = new Session();

        if(!$session->islogged()) {
            $this->redirectTo("index.php?class=user&action=login");
        }

        $this->renderView("user/dashboard", [
            "user" => User::getById($_SESSION['user']['id'])
        ]);
    }

    public function admin()
    {
        $session = new Session();

        if(!$session->isAdmin()) {
            $this->redirectTo("index.php?class=user&action=login");
        }
        $this->renderView("admin/index_view");
    }

    public function register()
    {
        $msg = null;

        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName'])) {

            if(User::getByEmail(htmlentities($_POST['email'])) instanceof User) {
                $msg = "Vous avez déjà un compte";
            } else {
                $user = new User();
                $user->setEmail(htmlentities($_POST['email']));
                $user->setPassword(htmlentities($_POST['password']));
                $user->setFirstName(htmlentities($_POST['firstName']));
                $user->setLastName(htmlentities($_POST['lastName']));

                $idUser = $user->add();
                if($idUser != false) {
                    // Create the Transport
                    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                        ->setUsername('no.reply9a@gmail.com')
                        ->setPassword('Azerty_12')
                    ;
                    // Create the Mailer using your created Transport
                    $mailer = new Swift_Mailer($transport);
                    // Create a message
                    $message = (new Swift_Message('Valider votre compte'))
                        ->setFrom(['no.reply9a@gmail.com' => 'Admin'])
                        ->setTo([$user->getEmail()])
                        ->setBody(
                            'valide ton compte <a href="https://localhost/mybook/index.php?class=user&action=validate&id='.$idUser.'&key='.md5($user->getEmail()).'>Click ici </a>'
                        );

                    // Send the message
                    $result = $mailer->send($message);
                    //return $result;
                    //$msg = "ok";
                }
            }
        }
        $this->renderView("user/register", [
            "msg" => $msg
        ]);
    }

    /**
     * Méthode login
     */
    public function login()
    {
        $message = null;
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $u = User::getByEmail(htmlentities($_POST['email']));
            if ($u instanceof User) {
                if(password_verify(htmlentities($_POST['password']), $u->getPassword())) {
                    $session = new Session();
                    $session->login($u);

                    if($u->getRole() === "client") {
                        $this->redirectTo("index.php?class=user&action=index");
                    } elseif ($u->getRole() === "admin") {
                        $this->redirectTo("index.php?class=user&action=admin");
                    }
                    exit();

                } else {
                    $message = "Mot de passe incorrect";
                }
            } else {
                $message = "Email inconnu";
            }
        }

        $this->renderView("user/login", [
            "message" => $message,
        ]);
    }

    public function logout()
    {
        $session = new Session();
        $session->logout();

        $this->redirectTo("index.php");
    }

}