<?php

namespace wskm\helpers;

class Tree
{

	public $data = array();
	public $child = array(-1 => array());
	public $layer = array(0 => 0);
	public $parent = array();
	public $value_field = '';

	function __construct($value = 'root')
	{
		$this->setNode(0, -1, $value);
	}

	function setTree($nodes, $id_field, $parent_field, $value_field)
	{
		$this->value_field = $value_field;
		foreach ($nodes as $node) {
			$this->setNode($node[$id_field], $node[$parent_field], $node);
		}

		$this->setLayer();
	}

	function getOptions($layer = 0, $root = 0, $except = NULL, $space = '&nbsp;&nbsp;&nbsp;', $noSelectText = '')
	{
		$options = array();
		$childs = $this->getChilds($root, $except);

		if ($noSelectText) {
			$options[0] = $noSelectText;
		}

		foreach ($childs as $id) {
			if ($id > 0 && ($layer <= 0 || $this->getLayer($id) <= $layer)) {
				$options[$id] = $this->getLayer($id, $space) . htmlspecialchars($this->getValue($id));
			}
		}
		return $options;
	}

	function setNode($id, $parent, $value)
	{
		$parent = $parent ? $parent : 0;

		$this->data[$id] = $value;
		if (!isset($this->child[$id])) {
			$this->child[$id] = array();
		}

		if (isset($this->child[$parent])) {
			$this->child[$parent][] = $id;
		} else {
			$this->child[$parent] = array($id);
		}

		$this->parent[$id] = $parent;
	}

	private function setLayer($root = 0)
	{
		foreach ($this->child[$root] as $id) {
			$this->layer[$id] = $this->layer[$this->parent[$id]] + 1;
			if ($this->child[$id]) {
				$this->setLayer($id);
			}
		}
	}

	private function getList(&$tree, $root = 0, $except = NULL)
	{
		foreach ($this->child[$root] as $id) {
			if ($id == $except) {
				continue;
			}

			$tree[] = (int) $id;

			if ($this->child[$id]){
				$this->getList($tree, $id, $except);
			}
		}
	}

	function getValue($id)
	{
		return $this->data[$id][$this->value_field];
	}

	function getLayer($id, $space = false)
	{
		return $space ? str_repeat($space, abs($this->layer[$id] - 1)) : $this->layer[$id];
	}

	function getParent($id)
	{
		return $this->parent[$id];
	}

	function getParents($id)
	{
		while ($this->parent[$id] != -1) {
			$id = $parent[$this->layer[$id]] = (int) $this->parent[$id];
		}
		ksort($parent);
		return $parent;
	}

	function getParentList()
	{
		$parents = array();
		foreach (array_keys($this->data) as $key) {
			if ($key > 0) {
				$parents[$key] = $this->getParents($key);
			}
		}
		return $parents;
	}

	function getChildList()
	{
		$childs = array();
		foreach (array_keys($this->data) as $key) {
			//if ($key > 0) {
				$childs[$key] = $this->getChilds($key);
			//}
		}

		return $childs;
	}

	function getChild($id)
	{
		return $this->child[$id];
	}

	function getChilds($id = 0, $except = NULL)
	{
		$child = array($id);
		$this->getList($child, $id, $except);
		unset($child[0]);

		return $child;
	}

	function getArrayList($root = 0, $layer = NULL)
	{
		$data = array();
		foreach ($this->child[$root] as $id) {
			if ($layer && $this->layer[$this->parent[$id]] > $layer - 1) {
				continue;
			}
			$data[] = array('id' => $id, 'value' => $this->getValue($id), 'children' => $this->child[$id] ? $this->getArrayList($id, $layer) : array());
		}
		return $data;
	}

	function getTreeList($root = 0, $layer = 0, $except = null)
	{
		$list = array();
		$curlayer = 0;
		$childs = $this->getChilds($root, $except);
		foreach ($childs as $id) {
			$curlayer = $this->getLayer($id);
			if ($id > 0 && ($layer <= 0 || $curlayer <= $layer)) {
				$list[$id] = $this->data[$id];
				$list[$id]['layer'] = $curlayer;
				$list[$id]['childcount'] = count($this->getChild($id));
			}
		}
		return $list;
	}

}
