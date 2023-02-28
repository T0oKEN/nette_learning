<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\nette-blog\app\Presenters/templates/@layout.latte */
final class Templatebb223605de extends Latte\Runtime\Template
{
	public const Blocks = [
		['scripts' => 'blockScripts'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<title>';
		if ($this->hasBlock('title')) /* line 7 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 7 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */;
		echo '/css/style.css">
</head>

<body>
';
		foreach ($flashes as $flash) /* line 12 */ {
			echo '	<div';
			echo ($ʟ_tmp = array_filter(['flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 12 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 12 */;
			echo '</div>
';

		}

		echo '
	<ul class="navig">
		<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Homepage:'));
		echo '">Články</a></li>
';
		if ($user->isLoggedIn()) /* line 16 */ {
			echo '			<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:out'));
			echo '">Odhlásit</a></li>
';
		} else /* line 18 */ {
			echo '			<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:in'));
			echo '">Přihlásit</a></li>
';
		}
		echo '	</ul>

';
		$this->renderBlock('content', [], 'html') /* line 23 */;
		echo "\n";
		$this->renderBlock('scripts', get_defined_vars()) /* line 25 */;
		echo '</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '12'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block scripts} on line 25 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '		<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
';
	}
}
