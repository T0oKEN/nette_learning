<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class SignPresenter extends Nette\Application\UI\Presenter{
    protected function createComponentSignInForm(): Form{
        $form = new Form;

        $form->addText('username', 'Uživatelské jméno')->setRequired('Vyplňte své uživateské jméno');
        $form->addPassword('password', 'Heslo')->setRequired('Vyplnte Heslo');
        $form->addSubmit('send', 'Přihlásit');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
        
    }

    public function signInFormSucceeded(Form $form, \stdClass $data): void{
        try{
            $this->getUser()->login($data->username, $data->password);
            $this->redirect('Homepage:');
        }catch(Nette\Security\AuthenticationException $e){
            $form->addError('Nesprávné přihlašovací údaje');
        }
    }

    public function actionOut(): void{
        $this->getUser()->logout();
        $this->flashMessage('Odhlášení bylo úspěšné.');
        $this->redirect('Homepage:');
    }
}