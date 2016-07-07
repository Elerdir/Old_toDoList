<?php

/**
 * Created by PhpStorm.
 * User: matej
 * Date: 08/06/16
 * Time: 09:19
 */
class ContactController extends Controller
{
    public function compile($parameters)
    {
        $this->head = array(
            'title' => 'Kontaktní formulář',
            'keywords' => 'kontakt, email, formulář',
            'description' => 'Kontaktní formulář našeho webu.'
        );

        if ($_POST)
        {
            try
            {
                $emailsSender = new EmailsSender();
                $emailsSender->sendWithAntispam($_POST['year'],"admin@adresa.cz", "Email z webu", $_POST['message'], $_POST['email']); //stačí změnit email na ten, co je nastaven na NAS a bude fungovat?
                $this->addMessage('Email byl úspěšně odeslán.');
                $this->redirect('contact');
            }
            catch (UserError $error)
            {
                $this->addMessage($error->getMessage());
            }
        }

        $this->view = 'contact';
    }
}