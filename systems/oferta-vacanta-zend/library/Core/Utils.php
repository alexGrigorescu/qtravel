<?php

class Core_Utils extends Zend_Controller_Action_Helper_Abstract
{
	public function getExcerpt($content, $chars) {
		$excerpt = strip_tags($content);
		$text = $excerpt;
		while (isset($excerpt[$chars]) && $excerpt[$chars--] != ' ');
		$excerpt = substr($excerpt, 0, $chars+1);
		if($text != $excerpt) {
			$excerpt .= '...';
		}
		return $excerpt; 
	}
	
	public function numberFormat($val, $decimals = 2){
		if($val == 0){
			return number_format($val, $decimals);
		}
		return trim(strrev(ltrim(strrev(number_format($val, $decimals)), 0)),".");
	}
	
	public function sanitizeTextarea($text, $htmlToText = false){
		if($htmlToText == false){
			return str_replace("<br />", "\r\n", $text);
		}
		$text = strip_tags($text);
		return str_replace("\r\n", "<br />", $text);
		
	}
	
	public function getRegions($json = false){
		$gb = array("London", 
					"Buckinghamshire", 
					"Cambridgeshire", 
					"Cumbria", 
					"Derbyshire", 
					"Devon", 
					"Dorset", 
					"East Sussex", 
					"Essex", 
					"Gloucestershire", 
					"Hampshire", 
					"Hertfordshire", 
					"Kent", 
					"Lancashire", 
					"Leicestershire", 
					"Lincolnshire", 
					"Norfolk County", 
					"North Yorkshire", 
					"Northamptonshire", 
					"Nottinghamshire", 
					"Oxfordshire", 
					"Somerset", 
					"Staffordshire", 
					"Suffolk", 
					"Surrey", 
					"Warwickshire", 
					"West Sussex", 
					"Worcestershire"
		);
		$ro = array("Bucuresti", 
					"Alba", 
					"Arad", 
					"Arges", 
					"Bacau", 
					"Bihor", 
					"Bistrita-Nasaud", 
					"Botosani", 
					"Brasov", 
					"Braila", 
					"Buzau", 
					"Calarasi", 
					"Caras-Severin", 
					"Cluj", 
					"Constanta", 
					"Covasna", 
					"Dambovita", 
					"Dolj", 
					"Galati", 
					"Giurgiu", 
					"Gorj", 
					"Harghita", 
					"Hunedoara", 
					"Ialomita", 
					"Iasi", 
					"Ilfov", 
					"Maramures", 
					"Mehedinti", 
					"Mures", 
					"Neamt", 
					"Olt", 
					"Prahova", 
					"Satu Mare", 
					"Salaj", 
					"Sibiu", 
					"Suceava", 
					"Teleorman", 
					"Timis", 
					"Tulcea", 
					"Vaslui", 
					"Valcea", 
					"Vrancea"
		);
		$array = array($ro, $gb);
		return ($json)? json_encode($array) : $array;
	}
	
	public function getRegion($region, $country){
		$regions = $this->getRegions();
		return $regions[$country][$region];
	}
	
	public function getArrayWorkAreas($workAreas){
		$workAreas = explode('|', $workAreas);
		return array_slice($workAreas, 1, (count($workAreas) - 2));
	}
	
	public function getCompanyStatus($status){
		$statuses = array('Not Activated', 'Activated', 'Registered');
		return $statuses[$status];
	}
	
	public function setNewMessages(){
		$messages = new Application_Model_Message();
		$sesCompany = new Zend_Session_Namespace('user');
        $sesCompany->newMessages = $messages->getNewMessages($sesCompany->company_id);
	}

    public function mapBinaryToArray($binary){
        $bits = array_reverse(str_split(decbin($binary)));
        $array = array();

        foreach($bits as $key => $bit){
            if($bit){
                $array[] = $key;
            }
        }

        return $array;
    }

    public function mapArrayToBinary($array){
        $binary = 0;
        foreach($array as $bit){
            $binary += pow(2, $bit);
        }
        return $binary;
    }
	
}
