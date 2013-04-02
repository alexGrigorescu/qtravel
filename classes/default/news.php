<?php
	class news
	{
		function index ()
        {
        	$param1 = request ('param1');
        	if ($param1 == 'index') 
        	{
        		$param1 = '';
        	}
        	$page = request ('page');
        	$news = bus::call('news', 'getArray', array('active'=>1, 'thumb'=>0, 'page'=>$page, 'page_size'=>100, 'sorting' => ' news.date desc ', 'text'=>$param1));            		
        	
        	$meta = array();
			
			$pageing = new Pageing($news['count'], $page, 100, 'news', 'index', 'page', 'news_pageing');
			$pageing_html = $pageing->get();
			
			$t = new layout('news_index');
            $t->assign('news', $news['data']);
            $t->assign('news_count', $news['count']);
            $t->assign('pageing', $pageing_html);
            $t->display($meta);
        }
        
        function details()
        {
        	$code = $_REQUEST['code'];
        	$news_item = bus::call('news', 'readByCode', array('active'=>1, 'code'=>$code));
        	
        	$meta = array();
        	$meta['title'] = $meta['metatitle'] = $meta['keywords'] = $news_item['title'];
        	$meta['metadescription'] = $news_item['description'];
        	
        	$t = new layout('news_details');
            $t->assign('news_item', $news_item);
            $t->display($meta);
        }
	}
?>