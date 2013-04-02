<?
	function js_value_encode($s)
	{
		return
				str_replace("\n", '\n',
				str_replace("\r\n", '\n',
				str_replace("\"", "\\\"",
				str_replace("'", "\\'",
				str_replace("\\","\\\\",
				$s)))));
	}

	class Form
	{
		var $obj = null;
		var $name = 'form';
		var $prefix = 'form_';
		var $prefix_lang = 'form_';
		var $method = 'POST';
		var $class = 'form';
		
		var $target_object = 'main';
		var $target_method = 'save';
		var $target_params;
		
		var $elements = array();
		
		var $save_label = '';
		var $cancel_label = '';
		var $extra_js = '';
		var $show_help = 1;
		var $errors = array();
		
		function Form($obj)
		{
			$this->obj = $obj;
		}
		
		function setObj($obj)
		{
			$this->obj = $obj;
		}
		
		function setName($name)
		{
			$this->name = $name;
			$this->prefix = $name.'_';
			$this->prefix_lang = $name.'_';
		}
		
		function setTargetObject($target_object)
		{
			$this->target_object = $target_object;
		}
		
		function setTargetMethod($target_method)
		{
			$this->target_method = $target_method;
		}
		
		function setTargetParams($target_params)
		{
			$this->target_params = $target_params;
		}
		
		function setClass($value)
		{
			$this->class = $value;
		}
		
		function setPrefix($prefix)
		{
			$this->prefix = $prefix;
			$this->prefix_lang = $prefix;
			foreach($this->elements as $i=>$v) $this->elements[$i]->prefix = $prefix;
		}
		
		function setPrefixLang($prefix)
		{
			$this->prefix_lang = $prefix;
		}
		
		function setMethod($method)
		{
			$this->method = $method;
		}

		function addElement($element)
		{
			if (isset($this->elements[$element->name]) && $this->elements[$element->name]) die("\n\nElement ".$element->name.' is duplicated.');
			$element->setPrefix ($this->prefix);
			$element->setPrefixLang ($this->prefix_lang);
			$element->setLabel ('label_'.$element->name);
			$element->setForm ($this->name);
			$this->elements[$element->name] = &$element;
		}
		
		function addForm(&$form)
		{
			foreach($form->elements as $k=>$v)
			{
				$this->addElement($v);
			}
		}

		function setDefault()
		{
			foreach($this->elements as $i=>$v)
			{
				$this->elements[$i]->value = $this->elements[$i]->default_value;
			}
		}

		function loadFromRequest()
		{
			foreach($this->elements as $i=>$v)
			{
				$this->elements[$i]->value = request($this->prefix . $this->elements[$i]->name);
			}
		}

		function loadFromRequestArray($a)
		{
			foreach($this->elements as $i=>$v)
			{
				if (isset($a[$this->prefix . $this->elements[$i]->name]))
				$this->elements[$i]->value = $a[$this->prefix . $this->elements[$i]->name];
			}
		}

		function saveToArray()
		{
			$a = array();
			foreach($this->elements as $k=>$element)
			{
				$class = strtolower(get_class($element));
				if ($class != 'formelementbutton' && $class != 'formelementsubmit' && $class != 'formelementheader' && $class != 'formelementupload' && !($class == 'formelementstatictext'))
				{
					$a[$element->name] = $element->value;
				}
			}
			return $a;
		}

		function loadFromArray($a)
		{
			if (!is_array($a)) 
			{
				return false;
			}

			foreach ($a as $k => $v)
			{
				if (isset($this->elements[$k]) && $this->elements[$k])
				{
					$this->elements[$k]->value = $v;
				}
			}
			return true;
		}

		function getErrors()
		{
			$this->errors = array();
			foreach($this->elements as $field=>$element)
			{
				if (count($element->rules) > 0)
				{
					foreach ($element->rules as $rule_name=>$rule)
					{
						if (!$this->phpValidate($element->value, $rule_name, $rule['rule_param']))
						{
							$this->errors[$field.'_'.$rule_name] = $element->prefix.$rule['message'];
						}
					}
				}
			}
			
			return $this->errors;		
		}
		
		function getFirstErrorCode()
		{
			foreach($this->elements as $field=>$element)
			{
				if (count($element->rules) > 0)
				{
					foreach ($element->rules as $rule_name=>$rule)
					{
						if (!$this->phpValidate($element->value, $rule_name, $rule['rule_param']))
						{
							return array('message'=>$element->prefix.$rule['message'], 'field'=>$element->prefix.$field);
						}
					}
				}
			}
			
			return array();
		}
		
		function isValid()
		{
			foreach($this->elements as $field=>$element)
			{
				if (count($element->rules) > 0)
				{
					foreach ($element->rules as $rule_name=>$rule)
					{
						if (!$this->phpValidate($element->value, $rule_name, $rule['rule_param']))
						{
							return false;
						}
					}
				}
			}
			
			return true;
		}
		
		function phpValidate ($value, $rule, $rule_parameter = '')
		{
			if (($rule == 'regexp') || ($rule == 'regex') || ($rule == 'ereg')) if (!preg_match($rule_parameter, $value)) return false;
			if (($rule == 'equal')) if($rule_parameter != $value) return false;;
			
			if (($rule == 'required') || ($rule == 'req')) if ($value === '') return false;
			
			if (($rule == 'integer' ) || ($rule == 'int' ))  if (!preg_match('/^([\-\+]?\d*)?$/', $value)) return false;
			if (($rule == 'float' ))  if (!preg_match('/^([\-\+]?\d*(\.\d+)?)?$/', $value)) return false; 
			
			if (($rule == 'min' ))  if (!($value === '') && !(($value) >= $rule_parameter)) return false;
			if (($rule == 'min_'))  if (!($value === '') && !(($value) > $rule_parameter)) return  false;
			
			if (($rule == 'max' ))  if (!($value === '') && !(($value) <= $rule_parameter)) return  false;
			if (($rule == 'max_'))  if (!($value === '') && !(($value) < $rule_parameter)) return  false;
			
			if (($rule == 'len'))  if (strlen(trim($value)) > $rule_parameter) return false;
			
			if (($rule == 'mail') || ($rule == 'email')) if(!preg_match ("/^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $value)) return  false;
			
			if (($rule == 'code')) if(!preg_match ("/^([a-z0-9-]+)$/", $value)) return  false;
			
			if ($rule == 'date') $rule = 'date_'.$GLOBALS['DEFAULT_DATE_FORMAT'];
			
			if ($rule == 'date_ee' || $rule == 'date_we' || $rule == 'date_date_we') if(!preg_match ("/^((3[01]|[1-9]|0[1-9]|[12]\d)[\/\-\\\.]([1-9]|0[1-9]|1[012])[\/\-\\\.]\d{4})?$/", $value))  return  false;
			if ($rule == 'date_us') if(!preg_match ("/^(([1-9]|0[1-9]|1[012])[\/\-\\\.](3[01]|[1-9]|0[1-9]|[12]\d)[\/\-\\\.]\d{4})?$/", $value))  return  false;
			if ($rule == 'date_mysql') if(!preg_match ("/^(\d{4}[\-\/\\\.]([1-9]|0[1-9]|1[012])[\-\/\\\.](3[01]|[1-9]|0[1-9]|[12]\d))?$/", $value))  return  false;
			
			if ($rule == 'phone') if(!preg_match ("/^(\(\+?[0-9 ]{2,}\))?([0-9 ]{4,})$/", $value)) return  false;
			
			return true;
		}

		function getContent($template = 'form')
		{
			$s = '';
			$elements = array();
 
			foreach ($this->elements as $k => $v)
			{
				$elements[$k] = array();
				$elements[$k]['type'] = strtolower(get_class($v));
				$elements[$k]['label'] = tr($v->prefix_lang.$v->label);
				$elements[$k]['help'] = $v->getHelp();
				$elements[$k]['show_help'] = $v->show_help;
				$elements[$k]['image'] = $v->GetImage();
				$elements[$k]['tab'] = $v->tab;
			}
			
			$t = new SmartyTemplate('form');
			$t->assign('elements', $elements);
			$s = $t->get();
			return $s;
		}
		
		function getHeader()
		{
			$s = '';
			$s .= '<form action="/'.INDEX.'" method="'.$this->method.'" name="'.$this->name.'" id="'.$this->name.'" enctype="multipart/form-data">'.NL;
			$s .= '<div>'.getHiddenFields($this->target_object, $this->target_method, $this->target_params).'</div>'.NL;
			
			return $s;
		}
		
		function getFooter()
		{
			$s = '';
			$s .= '<div class="footer">';
			foreach ($this->elements as $k => $v)
			{
				if (strtolower(get_class($v)) == 'formelementbutton' || strtolower(get_class($v)) == 'formelementsubmit')
				{
					$s .= $v->GetImage();
				}
			}
			$s .= '</div>';
			
			return $s;				
		}
		
		function getFormImage()
		{
			$a = array();
			$a['form_header'] = $this->getHeader();
			$a['form_content'] = $this->getContent();
			$a['form_footer'] = $this->getFooter();
			
			return $a;
		}
		
		function getFullImage()
		{
			$s = '';
			$s .= $this->getHeader();
			$s .= '<div class="'.$this->class.'">'.NL;
			$s .= $this->getContent();
			$s .= $this->getFooter();
			$s .= '<div class="clearer"><span></span></div></div>'.NL;
			$s .= '</form>'.NL;
			return $s;
		}
		
		function addSaveButton()
		{
			$e = new FormElementSubmit('save');
			$e->setClass('button_save');
			$this->addElement($e);
		}	 
	}
	
	

	class FormElement
	{
		var $name;
		var $label;
		var $value = '';
		var $default_value = '';
		var $rules = array();
		var $help_code = '';
		var $help_text = '';
		var $class = '';
		var $style = '';
		var $onEvent = '';
		var $form = 'form';
		var $prefix = 'form_';
		var $prefix_lang = 'form_';
		var $show_help = 1;
		var $tab = '';
		
		function FormElement($name, $default_value = false)
		{
			$this->name = $name;
			$this->value = $this->default_value = $default_value;
		}
		
		function setHelpCode($value = '')
		{
			if (strlen(trim($value)) == 0)
			{
				$this->help_code = 'help_'.$this->name;
			}
			else
			{
				$this->help_code = $value;
			}
			
		}
		
		function setShowHelp($value = 1)
		{
			$this->show_help = $value;
		}
		
		function setHelpText($value = '')
		{
			$this->help_text = $value;
		}
		
		function getHelp()
		{
			if (strlen(trim($this->help_code)) == 0)
			{
				return $this->help_text;
			}
			else 
			{
				return tr($this->prefix_lang.$this->help_code);
			}
		}
		
		function setClass($value = 'text')
		{
			$this->class = $value;
		}
		
		function setLabel($value = '')
		{
			$this->label = $value;
		}
		
		function setForm($value = '')
		{
			$this->form = $value;
		}
		
		function setOnEvent($value = '')
		{
			$this->onEvent .= $value;
		}
		
		function setReadOnly($value = '')
		{
			$this->readonly .= $value;
		}
		
		function setPrefix($value = '')
		{
			$this->prefix = $value;
		}
		
		function setPrefixLang($value = '')
		{
			$this->prefix_lang = $value;
		}
		
		function setTab($value = '')
		{
			$this->tab = $value;
		}
		
		function getImage()
		{
			return "";
		}

		function addRule($rule, $rule_param = '', $message = '')
		{
			if (strlen(trim($message)) == 0)
			{
				$message = 'js_'.$this->name.'_'.$rule;
			}
			
			$this->rules[$rule] = array('rule'=>$rule, 'rule_param'=>$rule_param, 'message'=>$message);
		}
	}

	class FormElementText extends FormElement
	{
		var $readonly;

		function FormElementText($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'text';
		}
		
		function setMultiRow($value = true)
		{
			$this->multirow = $value;
		}

		function getImage()
		{
			return '<input '.$this->onEvent.' '.$this->readonly.' class="'.$this->class.'" style="'.$this->style.'" type="text" name="'.html($this->prefix.$this->name).'" id="'.html($this->prefix.$this->name).'" value="'.html($this->value).'" />';
		}
	}
	
	class FormElementChoose extends FormElement
	{
		var $readonly;

		function FormElementChoose($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'text';
		}
		
		function setMultiRow($value = true)
		{
			$this->multirow = $value;
		}

		function getImage()
		{
			return '<table cellpadding="0" cellspacing="0"><tr><td><input '.$this->onEvent.' '.$this->readonly.' class="'.$this->class.'" style="'.$this->style.'" type="text" name="'.html($this->prefix.$this->name).'" id="'.html($this->prefix.$this->name).'" value="'.html($this->value).'" /></td><td style="padding-left:5px;"><input class="choose" type="button" value="..." onClick="document.getElementById(\'div_'.html($this->prefix.$this->name).'\').style.display=\'block\';"/></td></tr></table>';
		}
	}
	
	class FormElementWysiwyg extends FormElement
	{
		var $edit_url = '';
		function FormElementWysiwyg($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'text';
		}
		
		function getImage()
		{
			return '<textarea '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" id="'.html($this->prefix.$this->name).'" name="'.html($this->prefix.$this->name).'">'.html($this->value).'</textarea><script>var '.html($this->prefix.$this->name).'_wysiwyg = new InnovaEditor("'.html($this->prefix.$this->name).'_wysiwyg");'.html($this->prefix.$this->name).'_wysiwyg.cmdAssetManager="modalDialogShow(\''.$this->edit_url.'\',800,480);";'.html($this->prefix.$this->name).'_wysiwyg.REPLACE("'.html($this->prefix.$this->name).'");</script><br/>';
		}
		
		function setEditUrl($value)
		{
			$this->edit_url = $value;
		}
	}
	
	class FormElementWymeditor extends FormElement
	{
		var $edit_url = '';
		function FormElementWymeditor($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'wymeditor';
		}
		
		function getImage()
		{
			return '<div class="div_'.$this->class.'"><textarea '.$this->onEvent.' class="'.$this->class.'" style="display:none;'.$this->style.'" id="'.html($this->prefix.$this->name).'" name="'.html($this->prefix.$this->name).'"></textarea></div>';
		}
		
		function setEditUrl($value)
		{
			$this->edit_url = $value;
		}
	}
	
	class FormElementTextarea extends FormElement
	{
		function FormElementTextarea($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'text';
		}
		
		function getImage()
		{
			return '<textarea '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" name="'.html($this->prefix.$this->name).'">'.html($this->value).'</textarea>';
		}
	}
	
	class FormElementCode extends FormElement
	{
		var $style_img = '';
		var $class_img = 'code';
		function FormElementCode($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'text';
		}
		
		function setClassImg($value)
		{
			$this->class_img = $value;
		}
		
		function setStyleImg($value)
		{
			$this->style_img = $value;
		}
		
		function jsGetValue()
		{
			return "the_value = f.elements['{$this->prefix}{$this->name}'].value";
		}

		function getImage()
		{
			return 
			'<input '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" type="text" name="'.html($this->prefix.$this->name).'" value="'.html($this->value).'" /><br/><img src="image.php" class="'.$this->class_img.'" '.$this->style_img.'/>';
		}
	}
	
	class FormElementHidden extends FormElement
	{
		var $multirow;

		function FormElementHidden($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'text';
		}
				
		function getImage()
		{
			return '<input  type="hidden" name="'.html($this->prefix.$this->name).'"  id="'.html($this->prefix.$this->name).'" value="'.html($this->value).'" />';
		}
	}

	class FormElementDate extends FormElement
	{
		function FormElementDate($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'text';
		}

		function jsGetValue()
		{
			return "the_value = f.elements['{$this->prefix}{$this->name}'].value;";
		}

		function getImage()
		{
			return '<input '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" type="text" name="'.html($this->prefix.$this->name).'" value="'.html($this->value).'" />';
		}
	}

	class FormElementPassword extends FormElementText
	{
		function FormElementPassword($name, $default_value = false)
		{
			parent::FormElementText($name, $default_value);
			$this->class = 'text';
		}

		function getImage()
		{
			return '<input '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" type="password" name="'.html($this->prefix.$this->name).'" value="'.html($this->value).'" />';
		}
	}
	
	class FormElementCheckBoxList extends FormElement
	{
		var $value_on = '1';
		var $value_off = '0';
		var $text_label = '';

		function FormElementCheckBoxList($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'checkboxlist';
		}

		function getImage()
		{
			$s = '<div class="checkboxlist">';
			$i = 0;
			foreach($this->options as $k=>$v)
			{
				$i++;
				$chk = (is_array($this->value) && in_array($k, $this->value)) ? 'checked="checked"' : '';
				$s .= '<div class="checkboxitem"><input type="checkbox" name="'.html($this->prefix.$this->name).'[]" value="'.html($k).'" '.$chk.'/><span class="label">'.html(tr($this->prefix.'label_'.$this->name.'_'.$k)).'</span></div>';
			}
			$s .= '</div>';
			return $s;
		}
	}

	class FormElementCheckBox extends FormElement
	{
		var $value_on = '1';
		var $value_off = '0';
		var $text_label = '';

		function FormElementCheckBox($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'checkbox';
		}

		function jsGetValue()
		{
			return "the_value = f.elements['{$this->prefix}{$this->name}'].checked ? 1 : 0";
		}

		function getImage()
		{
			return '<input '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" type="checkbox" name="'.html($this->prefix.$this->name).'" value="'.html($this->value_on).'" '.(($this->value == $this->value_on)? ' checked="1"' : '').' />'.$this->text_label;
		}
	}

	class FormElementComboBox extends FormElement
	{
		var $options = array();
		var $empty_option = false;
		var $empty_option_text = '';

		function FormElementComboBox($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'combobox';
		}

		function jsGetValue()
		{
			return "the_value = f.elements['{$this->prefix}{$this->name}'].options[f.elements['{$this->prefix}{$this->name}'].selectedIndex].value";
		}

		function enableEmptyOption($text = '')
		{
			$this->empty_option = true;
			$this->empty_option_text = $text;
		}

		function getOptions($consider_empty_option = true)
		{		   
			$s = '';
			if ($consider_empty_option)
			{
				if ($this->empty_option)
					$s .= '<option value="">'.html($this->empty_option_text).'</option>' . "\n";
			}
			foreach ($this->options as $k => $v)
			{
				$sel = '';
				$k = (String)$k;
				$this->value = (String)$this->value;
				if ($k === $this->value) 
					$sel = ' selected="1"';					
				$s .= '<option value="'.html($k).'"'.$sel.'>'.html($v).'</option>' . "\n";
			}
			return $s;
		}

		function getImage()
		{
			$s = '';
			$s .=  "\n" . '<select '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" id="'.html($this->prefix.$this->name).'" name="'.html($this->prefix.$this->name).'">' . "\n";
			$s .= $this->getOptions();
			$s .= '</select>' . "\n";
			return $s;
		}
	}
	
	class FormElementTree extends FormElement
	{
		var $options = array();
		var $empty_option = false;
		var $empty_option_text = '';

		function FormElementTree($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'combobox';
		}

		function jsGetValue()
		{
			return "the_value = f.elements['{$this->prefix}{$this->name}'].options[f.elements['{$this->prefix}{$this->name}'].selectedIndex].value";
		}

		function enableEmptyOption($text = '')
		{
			$this->empty_option = true;
			$this->empty_option_text = $text;
		}

		function getOptions($consider_empty_option = true)
		{		   
			$s = '';
			if ($consider_empty_option)
			{
				if ($this->empty_option)
					$s .= '<option value="0" class="option0">'.html($this->empty_option_text).'</option>' . "\n";
			}
			foreach ($this->options as $k => $v)
			{
				$sel = '';
				$k = (String)$k;
				$this->value = (String)$this->value;
				if ($k === $this->value) 
					$sel = ' selected="1"';					
				$s .= '<option value="'.html($k).'"'.$sel.' class="option'.$v['level'].'">'.html($v['label']).'</option>' . "\n";
			}
			return $s;
		}

		function getImage()
		{
			$s = '';
			$s .=  "\n" . '<select '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" name="'.html($this->prefix.$this->name).'">' . "\n";
			$s .= $this->getOptions();
			$s .= '</select>' . "\n";
			return $s;
		}
	}

	class FormElementRadioGroup extends FormElement
	{
		var $options = array();
		var $empty_option = false;
		var $separator = "\n";
		
		function FormElementRadioGroup($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'radio';
		   
		}

		function jsGetValue()
		{
			$s = "
				the_value = null;
				for (var i = 0; i < f.elements.length; i++)
				{
					var e = f.elements[i];
					if (e.name == '{$this->prefix}{$this->name}') if (e.checked)
					{
						the_value = e.value;
						break;
					}
				}
			";
			return $s;
		}

		function getImage()
		{
			$s = '';
			$s .=  "\n";
			$i = 0;
			foreach ($this->options as $k => $v)
			{
				$sel = '';
				$radio_id = $this->prefix.$this->name.(++$i);
				if ($k == $this->value) $sel = ' checked="1"';
				$s .= '<input '.$this->onEvent.' type="radio" name="'.$this->prefix.$this->name.'" value="'.html($k).'" '.$sel.' id="'.$radio_id.'"/><label for="'.$radio_id.'">'.html($v).'</label>'.$this->separator.'' . "\n";
			}
			$s .= "\n";
			return $s;
		}
	}

	class FormElementMultiSelect extends FormElement
	{
		var $options = array();

		function FormElementMultiSelect($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'multiselect';
		}

		function jsGetValue()
		{
			$s = "
				the_value = new Array();
				for (var i = 0; i < f.elements['{$this->prefix}{$this->name}'].options.length; i++)
				{
					var op = f.elements['{$this->prefix}{$this->name}'].options[i];
					if (op.checked)
					{
						the_value[the_value.length] = op.value;
					}
				}
			";
			return $s;
		}

		function getOptions()
		{
			$s = '';
			foreach ($this->options as $k => $v)
			{
				$sel = '';
				if (is_array($this->value))
					{ if (in_array($k, $this->value)) $sel = ' selected="1"'; }
				else
					{ if ($k == $this->value) $sel = ' selected="1"'; }

				$v2 = html(trim($v));
				$s .= '<option value="'.html($k).'"'.$sel.'>'.$v2.'</option>' . "\n";
			}
			return $s;
		}

		function getImage()
		{
			$s = '';
			$s .=  "\n" . '<select '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" multiple="1" name="'.html($this->prefix.$this->name).'[]">' . "\n";
			$s .= $this->getOptions();
			$s .= '</select>' . "\n";
			return $s;
		}
	}

	class FormElementUpload extends FormElement
	{

		function FormElementText($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'upload';
		}

		function jsGetValue()
		{
			return "the_value = f.elements['{$this->prefix}{$this->name}'].value;";
		}

		function getImage()
		{
			return '<input '.$this->onEvent.' class="'.$this->class.'" style="'.$this->style.'" type="file" name="'.html($this->prefix.$this->name).'" />';
		}
	}

	class FormElementHeader extends FormElement
	{
		function FormElementHeader($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
		}

		function jsGetValue()
		{
			return "the_value = '';";
		}

		function getImage()
		{
			return '';
		}
	}
	
	class FormElementStaticText extends FormElement
	{
		var $allow_html = false;

		function FormElementStaticText($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'static';
		}

		function setMultiRow($value = true)
		{
			$this->multirow = $value;
		}

		function getImage()
		{
			if (!$this->allow_html) $this->value = html($this->value);
			return '<div class="'.$this->class.'" style="'.$this->style.'">' . $this->value  . '</div>';
		}
	}
	
	class FormElementButton extends FormElement
	{
		var $onClick = '';
		function FormElementButton($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'button';
		}
		
		function onClick($value)
		{
			$this->onClick = $value;
		}
				
		function getImage()
		{
			$onClick = '';
			if (strlen(trim($this->onClick)) > 0)
			{
				$onClick = 'onClick="'.$this->onClick.'"';
			}
			return '<input  type="button" class="'.$this->class.'" id="'.html($this->prefix.$this->name).'" value="'.html(tr($this->prefix_lang.$this->label)).'" '.$onClick.'/>';
		}
	}
	
	class FormElementSubmit extends FormElement
	{
		var $onClick = '';
		function FormElementSubmit($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'submit';
		}
				
		function getImage()
		{
			$onClick = '';
			if (strlen(trim($this->onClick)) > 0)
			{
				$onClick = 'onClick="'.$this->onClick.'"';
			}
			return '<input  type="submit" class="'.$this->class.'" id="'.html($this->prefix.$this->name).'" value="'.html(tr($this->prefix_lang.$this->label)).'" '.$onClick.'/>';
		}
	}
	
	class FormElementTab extends FormElement
	{
		function FormElementTab($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'tab-page';
		}
				
		function getImage()
		{
			return '<div class="'.$this->class.'" id="'.html($this->prefix.$this->name).'"/><h2 class="tab">'.html(tr($this->prefix.$this->label)).'</h2>';
		}
	}
	
	class FormElementTabPane extends FormElement
	{
		function FormElementTabPane($name, $default_value = false)
		{
			parent::FormElement($name, $default_value);
			$this->class = 'tab-pane';
		}
				
		function getImage()
		{
			return '<div class="'.$this->class.'" id="'.html($this->prefix.$this->name).'" />';
		}
	}
?>
