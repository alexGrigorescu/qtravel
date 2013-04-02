<?php
	class DefVacationsGrid extends Grid
	{
		function DefVacationsGrid($obj)
		{			
			$this->setName('vacations');
			$this->setPrefix('vacations_');
			$this->setPageParam('vacations_filter_page');
			$this->setSortParam('sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('select', '', 'column_select');
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('region_title', '');
			$this->addColumn ('country_title', '');
			$this->addColumn ('continent_title', '');
			$this->addColumn ('special1', '', 'column_special1');
			$this->addColumn ('special2', '', 'column_special2');
			$this->addColumn ('specialc', '', 'column_specialc');
			$this->addColumn ('accommodation_type_stars', '', '');
			$this->addColumn ('price_val', '', 'column_price_val');
			$this->addColumn ('price_proc', '', 'column_price_proc');
			$this->addColumn ('delete', '', 'column_delete');
			$this->addColumn ('vacation', '', 'column_vacation');
			
			$this->addSorting ('id', 'id asc');			
		}

		function column_select($row)
		{
			return '<input class="checkbox" type="checkbox" name="vacations2_ids['.$row['id'].']" value="1"/>';
		}
		
		function column_code($row)
		{
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
		}
		
		function column_special1($row)
		{
			return '<a href="' . url(OBJ, 'special1', array('id'=>$row['id'])) . '" >'.tr('vacations_special1_link_'.$row['special1']).'</a>';
		}
		
		function column_special2($row)
		{
			return '<a href="' . url(OBJ, 'special2', array('id'=>$row['id'])) . '" >'.tr('vacations_special2_link_'.$row['special2']).'</a>';
		}
		
		function column_specialc($row)
		{
			return '<a href="' . url(OBJ, 'specialc', array('id'=>$row['id'])) . '" >'.tr('vacations_specialc_link_'.$row['specialc']).'</a>';
		}
		
		function column_price_val($row)
		{
			$str = 
			'
				<input type="text" id="vacations_filter_price_val_'.$row['id'].'" onChange="savePriceVal(\''.$row['id'].'\'); return false;" value="'.$row['price_extrav'].'" style="width:50px; height:18px; font-size:10px;" />
			';
			return $str;
		}
		
		function column_price_proc($row)
		{
			$str = 
			'
				<input type="text" id="vacations_filter_price_proc_'.$row['id'].'" onChange="savePriceProc(\''.$row['id'].'\'); return false;" value="'.$row['price_extrap'].'" style="width:50px; height:18px; font-size:10px;" />
			';
			return $str;
		}
		
		function column_delete($row)
		{
			return '<a href="' . url(OBJ, 'delete', array('id'=>$row['id'])) . '" >'.tr('vacations_delete_link').'</a>';
		}
		
		
		function column_vacation($row)
		{
			$gasit = false;
			$vacations = bus::call ('vacations', 'getArray', array('location_id'=>$row['location_id']));
			
			$specialos = array();
			if ($vacations['count'] > 0)
			{
				foreach ($vacations['data'] as $k=>$v)
				{
					if (strlen(trim($v['specialo'])) > 0)
					{
						$specialos[$v['specialo']] = 1;
					}
					else 
					{
						$specialos['-'] = 1;
					}
				}
			}
			
			$str = 
			'
			<div id="vacations_filter_vacation_container_'.$row['id'].'" style="width:150px;display:block;">
				<a href="#" onClick="generateVacation(\''.$row['id'].'\'); return false;">'.tr('vacations_filter_vacation_link').'</a> 
				<input type="text" id="vacations_filter_vacation_'.$row['id'].'" value="1" style="width:20px; height:18px; font-size:10px;" size="1" maxlen=1>
				<select type="text" id="vacations_filter_cat_'.$row['id'].'" style="width:100px; height:18px; font-size:10px;">					
			';
			foreach ($GLOBALS['ACCOMCAT'] as $k=>$v)
			{
				if (!isset($specialos[$k]))
				{
					$gasit = true;
					$str .= '<option value="'.$k.'">'.$v.'</option>';
				}
				
				
			}
			$str .= 	
			'
				</select>
			</div>
			';
			if ($gasit)
			{
				return $str;
			}
			else 
			{
				return '';
			}
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['region_id'] = $this->obj->region_id;
			$set['continent_id'] = $this->obj->continent_id;
			$set['country_id'] = $this->obj->country_id;
			$set['accommodation_type_id'] = $this->obj->accommodation_type_id;
			$set['special1'] = $this->obj->special1;
			$set['special2'] = $this->obj->special2;
			$set['specialc'] = $this->obj->specialc;
			$set['sorting'] = ' continents.title asc, countries.title asc, regions.title asc, vacations.title asc';
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			
			$response = Bus::call('vacations', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>