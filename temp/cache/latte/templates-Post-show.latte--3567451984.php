<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\nette-blog\app\Presenters/templates/Post/show.latte */
final class Template3567451984 extends Latte\Runtime\Template
{
	public const Blocks = [
		['content' => 'blockContent', 'title' => 'blockTitle'],
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
			foreach (array_intersect_key(['comment' => '15'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '    <div class="postContainer">
        <p><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Homepage:default'));
		echo '">← zpět na výpis příspěvků</a></p>
        <div class="date">';
		echo LR\Filters::escapeHtmlText(($this->filters->date)($post->created_at, 'F j, Y')) /* line 4 */;
		echo '</div>
';
		$this->renderBlock('title', get_defined_vars()) /* line 5 */;
		echo '        <div class="post">';
		echo LR\Filters::escapeHtmlText($post->content) /* line 6 */;
		echo '</div>
';
		if ($user->IsLoggedIn()) /* line 7 */ {
			echo '        <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Edit:edit', [$post->id]));
			echo '">Upravit příspěvek</a>
';
		}
		echo '
        <h2>Vložte nový přízpěvek</h2>

';
		$ʟ_tmp = $this->global->uiControl->getComponent('commentForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 11 */;

		echo '    </div>

    <div class="comments">
';
		foreach ($comments as $comment) /* line 15 */ {
			echo '            <p><b>';
			$ʟ_tag[0] = '';
			if ($comment->email) /* line 16 */ {
				echo '<';
				echo $ʟ_tmp = ('a');
				$ʟ_tag[0] = '</' . $ʟ_tmp . '>' . $ʟ_tag[0];
				echo ' href="mailto:';
				echo LR\Filters::escapeHtmlAttr($comment->email) /* line 16 */;
				echo '">';
			}
			echo '
                ';
			echo LR\Filters::escapeHtmlText($comment->name) /* line 17 */;
			echo '
            ';
			echo $ʟ_tag[0];
			echo '</b>Napsal:</p>

            <div>';
			echo LR\Filters::escapeHtmlText($comment->content) /* line 20 */;
			echo '</div>
';

		}

		echo '    </div>
';
	}


	/** n:block="title" on line 5 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '        <h1>';
		echo LR\Filters::escapeHtmlText($post->title) /* line 5 */;
		echo '</h1>
';
	}
}
