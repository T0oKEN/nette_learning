<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\nette-blog\app\Presenters/templates/Homepage/default.latte */
final class Template442a5c68a4 extends Latte\Runtime\Template
{
	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['post' => '4'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <h1>Můj blog</h1>

';
		foreach ($posts as $post) /* line 4 */ {
			echo '    <div class="postContainer">
        <div class="post">
            <div class="date">';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($post->created_at, 'F j, Y')) /* line 6 */;
			echo '</div>
            <h2>';
			echo LR\Filters::escapeHtmlText($post->title) /* line 7 */;
			echo '</h2>
            <div>';
			echo LR\Filters::escapeHtmlText(($this->filters->truncate)($post->content, 256)) /* line 8 */;
			echo '</div>
            <h2><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Post:show', [$post->id]));
			echo '">';
			echo LR\Filters::escapeHtmlText($post->title) /* line 9 */;
			echo '</a></h2>
        </div>
    </div>
';

		}

		echo "\n";
		if ($user->isLoggedIn()) /* line 13 */ {
			echo '    <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Edit:create'));
			echo '">Napsat nový příspěvek</a>
';
		}
		echo '    
';
	}
}
