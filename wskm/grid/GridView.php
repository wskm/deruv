<?php

namespace wskm\grid;

use yii\helpers\Html;

class GridView extends \yii\grid\GridView
{
	public $showPanel = true;
	public $searchHtml = '';
	public $tableOptions = ['class' => 'table table-hover', 'style' => 'margin-bottom:0' ];
	public $layout = "{items}\n<div class='gridview-footer' >{summary}</div>\n<div class='pull-right'>{pager}</div>";

	public function renderItems()
	{
		$caption = $this->renderCaption();
        $columnGroup = $this->renderColumnGroup();
        $tableHeader = $this->showHeader ? $this->renderTableHeader() : false;
        $tableBody = $this->renderTableBody();
        $tableFooter = $this->showFooter ? $this->renderTableFooter() : false;
        $content = array_filter([
            $caption,
            $columnGroup,
            $tableHeader,
            $tableFooter,
            $tableBody,
        ]);

        $html = Html::tag('table', implode("\n", $content), $this->tableOptions);
		if ($this->showPanel) {
			$html = '<div class="panel panel-success">'.( $this->searchHtml ? '<div class="panel-heading" >'.$this->searchHtml.'</div>' : '').$html.'</div>';
		}
		return $html;
	}

}
