<?php
	class DefSpecialOffersGrid extends Grid
	{
		function DefSpecialOffersGrid($obj)
		{			
			$this->setName('special_offers');
			$this->setPrefix('special_offers_');
			$this->setPageParam('special_offers_page');
			$this->setSortParam('special_offers_sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			$this->setHeader();
			
			$this->addColumn ('code', '', 'column_code', 'text-align:left;', 'width:20%;text-align:left;');
			$this->addColumn ('title', '', 'column_title', 'text-align:left;', 'width:40%;text-align:left;');
			$this->addColumn ('description', '', 'column_description', 'text-align:left;', 'width:40%;text-align:left;');
			$this->addColumn ('delete', '', 'column_delete', 'text-align:center;', 'width:50px;text-align:center;');
			
			$this->addSorting ('title', 'title asc');			
		}
		
		function column_code($row)
		{
			return '<textarea class="text" id="special_offers_code_'.$row['id'].'" name="special_offers['.$row['id'].'][code]" style="height:40px;width:200px;">'.$row['code'].'</textarea>';
		}
		
		function column_title($row)
		{
			return '<textarea class="text" id="special_offers_title_'.$row['id'].'" name="special_offers['.$row['id'].'][title]" style="height:40px;width:250px;">'.$row['title'].'</textarea>';
		}
		
		function column_description($row)
		{
			return '<textarea class="text" id="special_offers_description_'.$row['id'].'" name="special_offers['.$row['id'].'][description]" style="height:40px;width:250px;">'.$row['description'].'</textarea>';
		}
		
		function column_delete($row)
		{
			return 
			'<a href="#" onClick="offerDelete(\''.$row['id'].'\', \''.$row['special_id'].'\'); return false;">x</a>';
		}
		
		function getData()
		{
			$this->data = array();
			$this->records_count = 0;
			$set['special_id'] = $this->obj->id;
			$set['sorting'] = ' special_offers.title asc';
			$response = Bus::call('specials', 'getOffers', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
		
		function setHeader($text = '')
		{
			$text = '';
			
			$text = '<tr class="row1">';
			$text .= '<td class="cell1"><textarea class="text" id="special_offers_code_0" style="height:40px;width:200px;"></textarea></td>';
			$text .= '<td class="cell1"><textarea class="text" id="special_offers_title_0" style="height:40px;width:250px;"></textarea></td>';
			$text .= '<td class="cell1"><textarea class="text" id="special_offers_description_0" style="height:40px;width:250px;"></textarea></td>';
			$text .= '<td class="cell1"><a href="#" onClick="offerSave(\'0\', \''.$this->obj->id.'\'); return false;">+</a></td>';
			$text .= '</tr>';
			
			$this->header = $text;
		}
	}
?>