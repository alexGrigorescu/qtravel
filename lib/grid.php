<?
class Grid
{		
	var $name = 'grid';
	var $prefix = 'grid_';
	var $title = '';
	var $template = 'grid';
	var $class = 'grid';
	var $target_obj = OBJ;
	var $target_met = MET;
	
	
	var $columns = array ();
	var $columns_selected = array ();
	
	var $sortings = array ();
	var $sorting = '';	
	
	
	var $pageing_template = 'pageing';
	
	var $top = '';
	var $bottom = '';
	var $header = '';
	var $footer = '';
	
	var $page_param = 'page';
	var $page_size = 10;
	var $sort_param = 'sort';
	var $row_count = 0;
	

	function Grid($obj)
	{		
		$this->obj = $obj;
		$this->page_size = $GLOBALS['DEFAULT_PAGE_SIZE'];
	}

	function setObj($obj)
	{
		$this->obj = $obj;
	}
	
	function setTargetObj($val)
	{
		$this->target_obj = $val;
	}
	
	function setTargetMet($val)
	{
		$this->target_met = $val;
	}
	
	function setName($name)
	{
		$this->name = $name;
		$this->setPrefix($name.'_');
	}
	
	function setPrefix($value)
	{
		$this->prefix = $value;
	}
	
	function setClass($value)
	{
		$this->class = $value;
	}
	
	function setPage($page)
	{
		$this->page = $page;
	}
	
	function setPageParam($text)
	{
		$this->page_param = $text;
	}
	
	function setSortParam($text)
	{
		$this->sort_param = $text;
	}

	function setPageSize($page_size)
	{
		$this->page_size = $page_size;
	}

	function setPageTemplate($text)
	{
		$this->pageing_template = $text;
	}
	
	function setTemplate($text)
	{
		$this->template = $text;
	}

	function setTitle($text)
	{
		if ($text == 'tr') $text = tr(strtolower($this->prefix.$this->name.'_title'));
		$this->title = $text;
	}

	function setTop($text)
	{
		$this->top = $text;
	}

	function setBottom($text)
	{
		$this->bottom = $text;
	}
	
	function setFooter($text)
	{
		$this->footer = $text;
	}
	
	function setHeader($text)
	{
		$this->header = $text;
	}
	
	function addColumn($field, $label, $call = '', $style = '', $style_header = '', $default = 1)
	{
		if (strlen(trim($label)) == 0) $label = strtolower('header_'.$field);
		$this->columns[$field] = array('field'=>$field, 'label'=>$label, 'call'=>$call, 'style'=>$style, 'style_header'=>$style_header, 'default'=>$default);
	}

	function addSorting($field, $sorting_text)
	{
		if ($this->sorting > ''); else $this->sorting = $sorting_text;
		$this->sortings[$field] = array('field'=>$field, 'sorting_text'=>$sorting_text);
		$a = explode(',', $sorting_text);
		$sorting_text2 = '';
		foreach($a as $v)
		{
			$v = trim($v);
			if (strpos($v, ' desc') > 0)
				$v = substr($v, 0, strpos($v, ' desc')) . ' asc';
			elseif (strrpos($v, ' asc') > 0)
				$v = substr($v, 0, strpos($v, ' asc')) . ' desc';
			else
				$v = $v . ' desc';
				
			if ($sorting_text2 > '') $sorting_text2 .= ', ';
			$sorting_text2 .= $v;
		}
		$this->sortings['-'.$field] = array('field'=>'-'.$field, 'sorting_text'=>$sorting_text2);
	}
	
	function get()
	{
		$t = new SmartyTemplate($this->template);
		$this->getSorting ();
		$this->getData ();
		$this->getPageing ();
		$this->getColumns();
		$this->getValues();
		
		
		$t->assign('data', $this->data);
		$t->assign('columns', $this->columns);
		$t->assign('columns_count', count($this->columns));
		$t->assign('class', $this->class);
		$t->assign('top', $this->top);
		$t->assign('bottom', $this->bottom);
		$t->assign('header', $this->header);
		$t->assign('footer', $this->footer);
		$t->assign('pageing', $this->pageing);
		$s = $t->get();
		return $s;
	}

	function getSorting ()
	{
		$sort = request($this->sort_param);
		if ($sort > '')
			if (isset($this->sortings[$sort])) 
				$this->sorting = $this->sortings[$sort]['sorting_text']; 
	}
	
	function getColumns()
	{
		foreach ($this->columns as $column) 
		{
			if (isset($this->sortings[$column['field']]))
			{
				$vars = array();
				if (request($this->sort_param) == $column['field']) $vars[$this->sort_param] = "-".$column['field'];
				else $vars[$this->sort_param] = $column['field'];
				
				$header = '<a href="'.url(OBJ, MET, $vars).'">'.tr($this->prefix.$column['label']).'</a>';
			}
			else 
			{
				if (strlen(trim($column['label'])) == 0)
				{
					$header = "&nbsp;";
				}
				else 
				{
					$header = tr($this->prefix.$column['label']);
				}
			}
			$this->columns[$column['field']]['header'] = $header;
		}
	}
	
	function getPageing ()
	{
		$p = new pageing ($this->records_count, $this->page, $this->page_size, $this->target_obj, $this->target_met, $this->page_param, $this->pageing_template);
		$this->page = $p->vars['page']; 
		$this->row_count = $this->page*$this->page_size+1;
		$this->pageing = $p->get ();
	}

	function getData ()
	{
		$this->data = array ();
	}
	
	function getValues()
	{
		foreach ($this->data as $k=>$row)
		{
			foreach ($this->columns as $column) 
			{ 
				$value = $this->getValue($column, $row);
				if (strlen(trim($value)) == 0)
				{
					$value = "&nbsp;";
				}
				
				$this->data[$k][$column['field']] = $value; 
			}
		}
	}

	function getValue($column, $v)
	{
		$value = '';
		if (isset($v[$column['field']])) $value = $v[$column['field']];
		//if ($column['call'] > '') $value = call_user_func(array($this, $column['call']), $v);
		if ($column['call'] > '') $value = call_user_func_array(array($this, $column['call']), array('row'=>$v, 'column'=>$column));
		else $value = html($value);
		return $value;
	}
}

class Pageing
{
	function Pageing ($rec_count, $page, $page_size = 0, $obj, $met, $page_param = 'page', $template = 'pageing')
	{
		$this->obj = $obj;
		$this->met = $met;
		$this->template = $template;
		if ($page_size == 0) $page_size = $GLOBALS['DEFAULT_PAGE_SIZE'];
		$page = 0 + $page;
		if ($page >= 0); else $page = 0;
		$page_nr = 5;
		$page_count = ceil($rec_count/$page_size);
		if ($page >= $page_count) $page = $page_count-1;
		if ($page < 0) $page = 0;
		$page_count=ceil($rec_count/$page_size);		
		$page_start = (0 > $page - $page_nr -1 ?0 : $page-$page_nr-1);
		$page_stop = ($page_count > $page + $page_nr ? $page + $page_nr : $page_count);
		$this->vars['page_back'] = $page>0?$page-1:$page;
		$this->vars['page_back_back'] = $page - $page_nr>1?$page - $page_nr:1;
		$this->vars['page_next'] = $page < $page_count ? $page + 1:$page;
		$this->vars['page_next_next'] = $page + $page_nr <= $page_count ? $page + $page_nr : $page_count;
		
		$this->vars['page'] = $page;
		$this->vars['page_size'] = $page_size;
		$this->vars['page_count'] = $page_count;
		
		$this->vars['rec_count'] = $rec_count;
		$this->vars['obj'] = $obj;
		$this->vars['met'] = $met;
		$this->vars['page_param'] = $page_param;
		$pages = array ();
		if ($page_count > 1)
		{
			$k = 0;
			for ($i = $page_start; $i <$page_stop; $i++)
			{
				$pages ['page_'.$k]['value'] = $i;
				$pages ['page_'.$k]['title'] = $i+1;
				$pages ['page_'.$k]['link'] = $this->url($this->obj, $this->met, $i, $this->vars['page_param']);
				$k++;				
			}
		}
		$this->vars['pages'] = $pages;
		$this->urls();
	}
	function get()
	{						
		$str = '';
		$t = new SmartyTemplate ($this->template);
		foreach ($this->vars as $k=>$v)
		{
			$t->assign($k, $v);
		}
		if ($this->vars['page_count'] > 1) return $t->get();
		else return '';
	}

	function url($obj, $met, $page, $page_param)
	{
		$params[$page_param] = $page;
		return url($obj, $met, $params);
	}
	
	function urls()
	{
		$this->vars['links']['page_next'] = $this->url($this->obj, $this->met, $this->vars['page_next'], $this->vars['page_param']);
		$this->vars['links']['page_next_next'] = $this->url($this->obj, $this->met, $this->vars['page_next_next'], $this->vars['page_param']);
		$this->vars['links']['page_back'] = $this->url($this->obj, $this->met, $this->vars['page_back'], $this->vars['page_param']);
		$this->vars['links']['page_back_back'] = $this->url($this->obj, $this->met, $this->vars['page_back_back'], $this->vars['page_param']);
	}
}
?>