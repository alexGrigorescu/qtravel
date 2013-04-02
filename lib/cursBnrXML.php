<?php    
     class cursBnrXML
     {
         /**
         * xml document
         * @var string
         */
         var $xmlDocument = "";
         
         
         /**
         * exchange date
         * BNR date format is Y-m-d
         * @var string
         */
         var $date = "";
         
         
         /**
         * currency
         * @var associative array
         */
         var $currency = array();
         
         var $url = "http://www.bnr.ro/nbrfxrates.xml";
         /**
         * cursBnrXML class constructor
         *
         * @access        public
         * @param         $url        string
         * @return        void
         */
        function cursBnrXML()
        {	
			set_time_limit(0);
			$ch = curl_init();
			$useragent = "Googlebot/2.1 (http://www.googlebot.com/bot.html)";
			curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $this->url);
			$this->xmlDocument = curl_exec($ch);
			curl_close($ch);

            $this->parseXMLDocument();
        }
         
        /**
         * parseXMLDocument method
         *
         * @access        public
         * @return         void
         */
        function parseXMLDocument()
        {
             $p = xml_parser_create();
             
             xml_parse_into_struct($p, $this->xmlDocument, $xml);
             foreach ($xml as $xmlLine){
             	if(array_key_exists('attributes', $xmlLine) && array_key_exists('CURRENCY', $xmlLine['attributes'])){
             		 $this->currency[]=array("name"=>$xmlLine['attributes']['CURRENCY'], "value"=>$xmlLine['value']);
             	}
             }
        }
        
        /**
         * getCurs method
         * 
         * get current exchange rate: example getCurs("USD")
         * 
         * @access        public
         * @return         double
         */
        function getCurs($currency)
        {
            foreach($this->currency as $line)
            {
                if($line["name"]==$currency)
                {
                    return $line["value"];
                }
            }
            
            return 0;
        }
     }
?> 