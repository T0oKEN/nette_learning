<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\nette-blog\app\Presenters/templates/Sign/out.latte */
final class Templatef97f9c6313 extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$ʟ_tmp = $this->global->uiControl->getComponent('signOut');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 1 */;
	}
}
