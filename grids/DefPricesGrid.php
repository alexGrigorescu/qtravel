<?php
	class DefPricesGrid extends Grid
	{
	   function DefPricesGrid($obj)
		{
			$this->setName('prices');
			$this->setObj($obj);
			$this->setPageParam('pagep');
			$this->setSortParam('sortp');
			$this->setPage(0);
			$this->setPageSize(1000);
			
			
			$this->addColumn ('date_start', '', 'column_date_start', '', 'width:120px;');
			$this->addColumn ('date_end', '', 'column_date_end', '', 'width:120px;');
			$this->addColumn ('subtype', '', 'column_subtype', 'text-align:left;', 'width:10%;text-align:right;');
			$this->addColumn ('price_double', '', 'column_price', 'text-align:right;', 'width:10%;text-align:right;');
			$this->addColumn ('price_single', '', 'column_price', 'text-align:right;', 'width:10%;text-align:right;');
			$this->addColumn ('price_3adult', '', 'column_price', 'text-align:right;', 'width:10%;text-align:right;');
			$this->addColumn ('price_triple', '', 'column_price', 'text-align:right;', 'width:10%;text-align:right;');
			$this->addColumn ('price_1child', '', 'column_price', 'text-align:right;', 'width:60px;text-align:right;');
			$this->addColumn ('price_2child', '', 'column_price', 'text-align:right;', 'width:60px;text-align:right;');
			$this->addColumn ('price_extra1', '', 'column_price', 'text-align:right;', 'width:60px;text-align:right;');
			$this->addColumn ('price_extra2', '', 'column_price', 'text-align:right;', 'width:60px;text-align:right;');
			$this->addColumn ('price_extra3', '', 'column_price', 'text-align:right;', 'width:60px;text-align:right;');
			$this->addColumn ('delete', '', 'column_delete', '', 'width:12%;');
				
			//$this->addSorting ("date_start", "date_start asc");
		}
		
		function column_date_start($row)
		{
			$d = new Dt($row['date_start'], 'mysql');
			return $d->getDate();
		}
		
		function column_subtype($row)
		{
			return $row['subtype'];
		}
		
		function column_date_end($row)
		{
			$d = new Dt($row['date_end'], 'mysql');
			return $d->getDate();
		}
		
		function column_delete($row)
		{
			return '<a href="#" onClick="priceDelete(\''.$row['id'].'\', \''.$row['target_id'].'\'); return false;">'.tr('link_delete').'</a>';
		}
		
		function column_price($row, $column)
		{
			$field = $column['field'];
			if ($row[$field] == '-1')
			{
				return $row[$field] = '-';
			}
			return $row[$field];
		}
		
		function getData()
		{
			$set = array();
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			if($this->sorting > '')
			{	
				$set['order_by'] = $this->sorting;
			}
			$set['target_id'] = $this->obj->info['id'];
			$set['type'] = $this->obj->type;
			$response = Bus::call('prices', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
			
			$this->setHeader();
		}
		
		function setHeader($text = '')
		{
			$date_start = '';
			$date_end = '';
			$type = '';
			$subtype = '';
			$price_double = '';
			$price_single = '';
			$price_3adult = '';
			$price_triple = '';
			$price_1child = '';
			$price_2child = '';
			$price_extra1 = '';
			$price_extra2 = '';
			$price_extra3 = '';
			if (isset($this->data[$this->records_count-1]))
			{
				$row = $this->data[$this->records_count-1];
				$d = new Dt($row['date_start'], 'mysql');
				$date_start = $d->getDate();
				$d = new Dt($row['date_end'], 'mysql');
				$date_end = $d->getDate();
				$subtype = $row['subtype'];
				$price_double = $this->price_value($row['price_double']);
				$price_single = $this->price_value($row['price_single']);
				$price_3adult = $this->price_value($row['price_3adult']);
				$price_triple = $this->price_value($row['price_triple']);
				$price_1child = $this->price_value($row['price_1child']);
				$price_2child = $this->price_value($row['price_2child']);
				$price_extra1 = $this->price_value($row['price_extra1']);
				$price_extra2 = $this->price_value($row['price_extra2']);
				$price_extra3 = $this->price_value($row['price_extra3']);
			}
			
			
			$text = '';
			
			$text = '<tr>';
			$text .= '<td class="header_form"><input class="dateRange hasDatePicker" type="text" name="prices_date_start" id="prices_date_start" value="'.$date_start.'" style="width:75px;"></td>';
			$text .= '<td class="header_form"><input class="dateRange hasDatePicker" type="text" name="prices_date_end" id="prices_date_end" value="'.$date_end.'" style="width:75px;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_subtype" id="prices_subtype" value="'.$subtype.'" style="text-align:right; width:75px;" ></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_double" id="prices_price_double" value="'.$price_double.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_single" id="prices_price_single" value="'.$price_single.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_3adult" id="prices_price_3adult" value="'.$price_3adult.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_triple" id="prices_price_triple" value="'.$price_triple.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_1child" id="prices_price_1child" value="'.$price_1child.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_2child" id="prices_price_2child" value="'.$price_2child.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_extra1" id="prices_price_extra1" value="'.$price_extra1.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_extra2" id="prices_price_extra2" value="'.$price_extra2.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="text" type="text" name="prices_price_extra3" id="prices_price_extra3" value="'.$price_extra3.'" style="text-align:right;"></td>';
			$text .= '<td class="header_form"><input class="button" type="submit" name="prices_save" id="prices_save" value="'.tr('prices_label_save').'"></td>';
			$text .= '</tr>';
			
			$this->header = $text;
		}
		
		function price_value($value)
		{
			if ($value < 0)
			{
				$value = '-';
			}
			
			return $value;
		}
	}
?>