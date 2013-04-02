<?
	class contact
	{
		function index($err = '')
		{
			$page = Bus::call('pages', 'readByCode', array('code'=>'contact'));
	
			$meta = array();
			$meta['title'] = $page['metatitle'];
			$meta['metatitle'] = $page['metatitle'];
			$meta['metadescription'] = $page['leadtext'];
			$meta['metakeywords'] = $page['tags'];
			$meta['links'] = $this->metalinks();	
			
			$t = new layout('contact_index');
					
			$captcha = new Captcha();
			$captcha->code();
			
			$form = new DefContactForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			$form->loadFromArray($request);
			
			$t->assign('page', $page);
			$t->assign('form_image', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display($meta);
		}
	
		function save()
		{
			$form = new DefContactForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{
				$rec = array();
				$rec['email'] = $request['email'];
				$rec['name'] = $request['name'];
				$rec['message'] = nl2br($request['message']);
				$rec['ip'] = $_SERVER['REMOTE_ADDR'];
				$rec['domain'] = $_SERVER['HTTP_HOST'];
				
				$this->mail_contact($rec);
				
				redirect(OBJ, 'thanks');
			}
			else 
			{
				$err_msg = $form->getFirstErrorCode();
				$this->index($err_msg['message']);
				return false;
			}
		}
		
		function thanks()
		{
			$meta['links'] = $this->metalinks();
			$t = new layout('contact_thanks');	
			$t->display($meta);
		}
		
		function mail_contact($info)
		{
			$from = $info['email'];
			$to = $GLOBALS['ADMIN_EMAIL'];
			$to1 = $GLOBALS['SUPPORT_EMAIL'];
			
			$info['site_title'] = tr('contact_site_title');
			$info['site_domain'] = tr('contact_site_domain');
			
			$subj = tr('contact_mail_subj');
			$body = tr('contact_mail_body');
			
			$subj = str_replace_params($info, $subj);
			$body = str_replace_params($info, $body);
			
			Mail::send($to, $subj, $body, $from);
			Mail::send($to1, $subj, $body, $from);
		}
		
		function metalinks()
		{
			$links = array();
			
			$countries = Bus::call('countries', 'getArrayBy', array('by'=>'accommodations', 'special2'=>1));			
			foreach ($countries['data'] as $k=>$v)
			{
				$links['countries'][] = array('title'=>$v['title'], 'metatitle'=>tr('accommodation_title_accommodations').$v['title'], 'url'=>url('accommodation', 'country', array('country'=>$v['code'])));
			}
			
			$regions = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'special2'=>1));
			foreach ($regions['data'] as $k=>$v)
			{
				$links['regions'][] = array('title'=>$v['title'], 'metatitle'=>tr('accommodation_title_accommodations').$v['title'], 'url'=>url('accommodation', 'region', array('region'=>$v['code'], 'country'=>$v['country_code'])));
			}
			
			return $links;
		}
	}
?>