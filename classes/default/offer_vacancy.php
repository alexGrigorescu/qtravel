<?
    class offer_vacancy
    {
        function index()
        {   
            $t = new layout('offer_vacancy_index');
            $t->display();
        }

        function menu()
        {   
            $id = intval(request('menu_type'));
            if($id>0){
                $set = array(
                    'id'    => $id,
                    'status'=> intval(request('menu_status'))
                );
                Bus::call('vacancyOfferAdmin', 'update', $set);
            }

            $grid = new DefMenuGrid($this);

            $t = new layout('offer_vacancy_menu');
            $form = new DefMenuForm($this);
            $form->loadFromRequest();
            $t->assign('form_img', $form->getFullImage());
            $t->assign ('grid_img', $grid->get());
            $t->display();
        }

        function home_search()
        {   
            $id = intval(request('home_search_type'));
            if($id>0){
                $set = array(
                    'id'    => $id,
                    'status'=> intval(request('home_search_status'))
                );
                Bus::call('vacancyOfferAdmin', 'update', $set);
            }

            $grid = new DefHomeSearchGrid($this);

            $t = new layout('offer_vacancy_menu');
            $form = new DefHomeSearchForm($this);
            $form->loadFromRequest();
            $t->assign('form_img', $form->getFullImage());
            $t->assign ('grid_img', $grid->get());
            $t->display();
        }

        function home_promotions()
        {   
            $id = intval(request('home_promotions_type'));
            if($id>0){
                $set = array(
                    'id'    => $id,
                    'status'=> intval(request('home_promotions_status'))
                );
                Bus::call('vacancyOfferAdmin', 'update', $set);
            }

            $grid = new DefHomePromotionsGrid($this);

            $t = new layout('offer_vacancy_menu');
            $form = new DefHomePromotionsForm($this);
            $form->loadFromRequest();
            $t->assign('form_img', $form->getFullImage());
            $t->assign ('grid_img', $grid->get());
            $t->display();
        }
        
        function advertising(){
        	$url = Bus::call('pics', 'url', array('type'=>'offer_vacancy_advertising','target_id'=>0));
        	$this->url = $url;
        	$form_pics = new DefAddAdvertisingForm($this);
			$grid_pics = new DefVacancyOfferAdvertising($this);
			
			$t = new layout('offer_vacancy_advertising');
			$t->assign('grid_pics', $grid_pics->get());
			$t->assign('form_pics_header', $form_pics->getHeader());
			$t->assign('form_pics_pic', $form_pics->elements['pic']->getImage());
			$t->assign('delete_pic_url', url(OBJ, 'delete_pic', array(), false));	

            $t->display();
        }
        
     	function advertising_edit($id){
     		$vacancyOfferAdvertisingRow = Bus::call('vacancyOfferAdvertising', 'getArray', array('id'=>$id));
     		$this->info['offers_html_text'] = $vacancyOfferAdvertisingRow['data'][0]['html_text'];
     		$this->info['offers_hid'] = $vacancyOfferAdvertisingRow['data'][0]['offer_id'];
     		$this->info['offers_code_hid'] = $vacancyOfferAdvertisingRow['data'][0]['offer_code'];
     		$this->info['offer_type'] = $vacancyOfferAdvertisingRow['data'][0]['offer_type'];
        	$form_advertising = new DefAdvertisingForm($this);
			$t = new layout('offer_vacancy_advertising_edit');
			$t->assign('form_image', $form_advertising->getFullImage());
			
            $t->display();
        }
        
    	function advertising_delete($id){
			Bus::call('vacancyOfferAdvertising', 'delete', array('id'=>$id));		
    		$this->advertising();
        }
        
    	function advertising_save($id){
    		$offerType = request('vacancy_advertising_offer_type');
    		$offerCode = request('vacancy_advertising_offers_code_hid');
    		$offerId = request('vacancy_advertising_offers_hid');
    		$offerHtmlText = request('vacancy_advertising_offers_html_text');

    		if(intval($id)>0 && intval($offerId)>0 && in_array($offerType,array('accommodations','busses','flights'))){
    			$set = array(
	        		'id'		=>intval($id),
	        		'offer_type'=>trim($offerType),
    				'offer_code'=>trim($offerCode),
    				'offer_id'	=>intval($offerId),
    				'html_text'	=>$offerHtmlText
	        	);
	        	Bus::call('vacancyOfferAdvertising', 'update', $set);
    		}
        	$this->advertising();
        }
        
        function get_offers(){
        	$filterText = strtolower(request ('term'));
			$bus = trim(request ('bus'));
			if(in_array($bus,array('accommodations','busses','flights'))){
				$offersResponse = Bus::call($bus, 'getArray', array('text'=>$filterText,'page'=>0,'page_size'=>20,'special1'=>1,'sorting'=>' id desc'));
				$ajaxOffers = array();
				foreach($offersResponse['data'] as $offer){
					$ajaxOffers[] = array(
						'id' 	=> $offer['id'],
						'label'	=> $offer['code'] . '-' . $offer['id'],
						'value'	=> $offer['code']
					);
				}
			}
			
			echo json_encode($ajaxOffers);
        }
        
        function advertising_change_status($id){
        	if(intval($id)>0){
	        	$data = Bus::call('vacancyOfferAdvertising', 'read', array('id'=>$id));
	        	if(!empty($data)){
		        	$set = array(
		        		'id'	=>$id,
		        		'status'=>1-$data['status']
		        	);
		        	Bus::call('vacancyOfferAdvertising', 'update', $set);
	        	}
        	}
        	$this->advertising();
        }
        
        function upload_pic(){
        	$title = request('pics_pic');
        	if(!empty($title)) {
        		$set = array(
        			'title'		=>mysql_real_escape_string($title),
	        		'status'	=>0,
	        		'added'		=>date('Y-m-d H:i:s'),
	        		'modified'	=>date('Y-m-d H:i:s')
	        	);
	        	Bus::call('vacancyOfferAdvertising', 'insert', $set);
        	}

			$this->advertising();
        }
    }
?>
