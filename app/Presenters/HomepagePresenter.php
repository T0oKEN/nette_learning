<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Model\PostFacade;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(private PostFacade $facade){

    }

    public function renderDefault(): void{
        $this->template->posts = $this->facade
            ->getPublicArticles()
            ->limit(5);
    }
}