<?php

    require_once('./Models/UserManager.php');
    require_once('./Models/SessionManager.php');


class HomeController
{
    public function homePage()
    {
        $userManager = new UserManager();
        $authentificationManager = new AuthentificationManager();
        $sessionManager = new SessionManager();

        $view = new View;
        return $view->render("Views/admin/home", array(
            
                "users" => $userManager->findAllUsers(),

                $authentificationManager->login(),

                $sessionManager->sessionStart()

            ));
    }

    public function contact()
    {
        
        if(isset($_POST['mailform']))
        {
            if(!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
            {
                $header="MIME-Version: 1.0\r\n";
                $header.='From:"mohamed-bouhleel.com"<mohamed.bouhleel@gmail.com>'."\n";
                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';

                $message='
                <html>
                    <body>
                        <div align="center">
                            <img src=""/>
                            <br />
                            <u>Nom de l\'expéditeur :</u>'.$_POST['name'].'<br />
                            <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
                            <br />
                            '.nl2br($_POST['message']).'
                            <br />
                            <img src=""/>
                        </div>
                    </body>
                </html>
                ';

                mail("mohamed.bouhleel@gmail.com", "CONTACT", $message, $header);
                $msg="Votre message a bien été envoyé !";
            }
            else
            {
                $msg="Tous les champs doivent être complétés !";
            }
        }
        $view = new View;
        return $view->render("Views/visitor/blog/blog", array(),'base.visitor');
            
    }


}