<?
	////////////////////////////////////////////////////////////////////////
	$INTERFACE["ObjBugetFirme_Index"]["params"] = array(array("id"),array("perm"=>0));
	////////////////////////////////////////////////////////////////////////	
	class ObjBugetFirme{
		
		function Index ($id){
			
			global $userID;
			
			$t = new Smarty();
			$id = mysql_encode($id);
			
	//		echo $userID ." <- ACESTA ESTE USER ID <br><br>";//acesta este id-ul membrului logat
			
			$firme  = new TableDbFirme();
			$firme = $firme->create_ereader("*");
			$firme = $firme->get_array();
      			
	//		print_r($firme);echo " <- ACESTA ESTE lista de firme din tabela x_firme <br>";
			
			$t->assign("firme",$firme);
			WebOutput($t,"firme","index");
			
		}
		
		function Inregistrare($id){
      
      global $userID;
      
      $arrver['mess'] = $_GET['mess'];
      
      $arrver['numefirma'] = $_GET['numefirma'];
		  $arrver['domeniufirma'] = $_GET['domeniufirma'];
	  	$arrver['emailfirma'] = $_GET['emailfirma'];
      $arrver['urlfirma'] = $_GET['urlfirma'];
      $arrver['judetfirma'] = $_GET['judetfirma'];
      $arrver['localitatefirma'] = $_GET['localitatefirma'];
      $arrver['adresafirma'] = $_GET['adresafirma'];
      $arrver['telfirma'] = $_GET['telfirma'];
      $arrver['faxfirma'] = $_GET['faxfirma'];
			
			$t = new Smarty();
			$id = mysql_encode($id);
			//echo $userID;
			$firme  = new TableDbFirme();
			
			$firme = $firme->create_ereader("*","and ID='{$userID}'","");
			$firme = $firme->get_array();
			
			$select = "SELECTED";
			
			$t->assign("arrver",$arrver);
			$t->assign("select",$select);
			$t->assign("firme",$firme);
			$t->assign("domenii",$GLOBALS[DOMENII_DE_ACTIVITATE_RO]);
			WebOutput($t,"inregistrare","index");
    }
    
		function InregistrareConfirm($id) {
		  global $userID;
			$var_in = $_POST["var_in"];

  			$numefirma = $_POST["numefirma"];
  			$domeniufirma = $_POST["domeniufirma"];
  			$emailfirma = $_POST["emailfirma"];
  			$urlfirma = $_POST["urlfirma"];
  			$judetfirma = $_POST["judetfirma"];
  			$localitatefirma = $_POST["localitatefirma"];
  			$adresafirma = $_POST["adresafirma"];
  			$telfirma = $_POST["telfirma"];
  			$faxfirma = $_POST["faxfirma"];


        $arrver['numefirma'] = $_POST['numefirma'];
			  $arrver['domeniufirma'] = $_POST['domeniufirma'];
		  	$arrver['emailfirma'] = $_POST['emailfirma'];
        $arrver['urlfirma'] = $_POST['urlfirma'];
        $arrver['judetfirma'] = $_POST['judetfirma'];
        $arrver['localitatefirma'] = $_POST['localitatefirma'];
        $arrver['adresafirma'] = $_POST['adresafirma'];
        $arrver['telfirma'] = $_POST['telfirma'];
        $arrver['faxfirma'] = $_POST['faxfirma'];
        
        $vector = array("ID"=>$userID,"DomainID"=>$domeniufirma,"NumeFirma"=>$numefirma,"EmailContacts"=>$emailfirma,
  			"URL"=>$urlfirma,"SIGLA"=>"","Judet"=>$judetfirma,"Localitate"=>$localitatefirma,"Adresa"=>$adresafirma,"Telefon"=>$telfirma,"Fax"=>$faxfirma);

			if ($var_in == "inreg")
			{
  			if (!Verificari::check_field1($vector['NumeFirma']))
        {
          $arrver['numefirma'] = '';
          $arrver['mess'] = 'Numele firmei incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::valid_email($vector['EmailContacts']))
        {
          $arrver['emailfirma'] = '';
          $arrver['mess'] = 'Email incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
  			
  			if (!Verificari::verifURL($vector['URL']))
        {
          $arrver['urlfirma'] = '';
          $arrver['mess'] = 'URL incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
  			
  			if (!Verificari::check_field1($vector['Judet']))
        {
          $arrver['judetfirma'] = '';
          $arrver['mess'] = 'Judet incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::check_field1($vector['Localitate']))
        {
          $arrver['localitatefirma'] = '';
          $arrver['mess'] = 'Localitatea incorecta';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::adresa($vector['Adresa']))
        {
          $arrver['adresafirma'] = '';
          $arrver['mess'] = 'Adresa incorecta';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::isTelefon($vector['Telefon']))
        {
          $arrver['telfirma'] = '';
          $arrver['mess'] = 'Telefon incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::isTelefon($vector['Fax']))
        {
          $arrver['faxfirma'] = '';
          $arrver['mess'] = 'Fax incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
  			
  			$firma  = new TableDbFirme();
  			$firma->insert($vector);
  			
  			$t = new Smarty();
  			
  			$t->assign("var_in",$var_in);
  			WebOutput($t,"confirm_inreg","index");
			}
			else if ($var_in == "edit"){

  			if (!Verificari::check_field1($vector['NumeFirma']))
        {
          $arrver['mess'] = 'Numele firmei incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::valid_email($vector['EmailContacts']))
        {
          $arrver['mess'] = 'Email incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
  			
  			if (!Verificari::verifURL($vector['URL']))
        {
          $arrver['mess'] = 'URL incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
  			
  			if (!Verificari::check_field1($vector['Judet']))
        {
          $arrver['mess'] = 'Judet incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::check_field1($vector['Localitate']))
        {
          $arrver['mess'] = 'Localitatea incorecta';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::adresa($vector['Adresa']))
        {
          $arrver['mess'] = 'Adresa incorecta';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::isTelefon($vector['Telefon']))
        {
          $arrver['mess'] = 'Telefon incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
        if (!Verificari::isTelefon($vector['Fax']))
        {
          $arrver['mess'] = 'Fax incorect';
          redirect(WEBOBJECT,"Inregistrare",$arrver);
        }
        
  			$firma  = new TableDbFirme();
  			$firma->update($vector,$userID);
  			$t = new Smarty();	
  			$t->assign("var_in",$var_in);
  			
  			WebOutput($t,"confirm_inreg","index");
			}
    }
    
    function UploadSigla($id) {
    	global $userID;
			$poza_invalid = $_GET["poza_invalid"];

			$t = new Smarty();
			$id = mysql_encode($id);

			$firme  = new TableDbFirme();	
			$firme = $firme->create_ereader("*","and ID='{$userID}'","");
			$firme = $firme->get_array();
			
			$poza = UPLOAD_FIRME.$firme[0]["SIGLA"];

			$t->assign("firme",$firme);
			$t->assign("poza",$poza);
			$t->assign("poza_invalid",$poza_invalid);
			WebOutput($t,"uploadsigla","index");
    }
    
    function UploadSigla2($id){
      global $userID;
      $t = new Smarty();
	  
      $size = getimagesize ($_FILES["poze"]["tmp_name"]);
      
      if ((($_FILES["poze"]["type"] == "image/gif")
        || ($_FILES["poze"]["type"] == "image/jpeg")
        || ($_FILES["poze"]["type"] == "image/pjpeg")
        || ($_FILES["poze"]["type"] == "image/bmp"))
        && ($_FILES["poze"]["size"] < DIMENSIUNE_B)
        &&($size[0]<=DIMENSIUNE_WIDTH)
        &&($size[1]<=DIMENSIUNE_HEIGHT)) 
        {
          if ($_FILES["poze"]["error"] > 0)
          {
            echo "Return Code: " . $_FILES["poze"]["error"] . "<br />";
          }
          else
          {
            $_FILES["poze"]["name"] = $userID.".".substr($_FILES["poze"]["type"],6);
            $nume0 = $userID.".".substr($_FILES["poze"]["type"],6);

            move_uploaded_file($_FILES["poze"]["tmp_name"],UPLOAD_FIRME . $_FILES["poze"]["name"]);

          }    
          $vector = array("SIGLA"=>$nume0);	
    			$firma  = new TableDbFirme();
    			$firma->update($vector,$userID);
        }
        else
        {
          $poza_invalid = "da";
          $t->assign("poza_invalid",$poza_invalid);
        }
        WebOutput($t,"uploadsigla2","index");
    }
    
    function Cautare($id) {
    	global $userID;
  		$caut = $_GET["caut"];
  			
  		$judet  = new TableDbFirme();
  		$judet = $judet->create_ereader_dist("Judet","","order by Judet asc");
  		$judet = $judet->get_array();
  		
  		$localitate  = new TableDbFirme();
  		$localitate = $localitate->create_ereader_dist("Localitate","","order by Localitate asc");
  		$localitate = $localitate->get_array();
  			
  		$t = new Smarty();
  		$t->assign("caut",$caut);
  		$t->assign("domenii",$GLOBALS[DOMENII_DE_ACTIVITATE_RO]);
  		$t->assign("judet",$judet);
  		$t->assign("localitate",$localitate);
  		WebOutput($t,"cauta","index");
    }
    
    function CautareSimpla($id) {
    	global $userID;
    	$numefirma = $_POST["numefirma"];
    	$numefirmawild = '%'.$numefirma.'%';

    	$firme  = new TableDbFirme();
    	$firme = $firme->create_ereader("*","and NumeFirma like '{$numefirmawild}'","order by NumeFirma asc limit ".LIMITA_CAUTARE);
  		$firme = $firme->get_array();

  		$t = new Smarty();
	   	$t->assign("domenii",$GLOBALS[DOMENII_DE_ACTIVITATE_RO]);
      $t->assign("firme",$firme);
   		WebOutput($t,"cautarez","index");
    }
    
    function CautareAvansata($id) {
    	global $userID;
    	
    	$numefirma = $_POST["numefirma"];
 	  	$domeniufirma = $_POST["domeniufirma"];
  		$emailfirma = $_POST["emailfirma"];
  		$urlfirma = $_POST["urlfirma"];
    	$judetfirma = $_POST["judetfirma"];
  		$localitatefirma = $_POST["localitatefirma"];
  		$adresafirma = $_POST["adresafirma"];
  		$telfirma = $_POST["telfirma"];
  		$faxfirma = $_POST["faxfirma"];	
  		
  		if ($domeniufirma != "")
  		{
  			$qd1 = "(DomainID = '".$domeniufirma."')as rankd,";
  			$qd2 = "rankd desc,";
  		}
  		else
  		{
  			$qd1 = " ";
  			$qd2 = " ";
  		}

  		if ($judetfirma != "")
  		{
  			$qj1 = "(Judet = '".$judetfirma."')as rankj,";
  			$qj2 = "rankj desc,";
  		}
  		else
  		{
  			$qj1 = " ";
  			$qj2 = " ";
  		}

  		if ($localitatefirma != "")
  		{
  			$ql1 = "(Localitate = '".$localitatefirma."')as rankl,";
  			$ql2 = "rankl desc,";
  		}
  		else
  		{
  			$ql1 = " ";
  			$ql2 = " ";
  		}

  		$query = "SELECT *,
  		 (NumeFirma LIKE '%".$numefirma."%')as rankn, ".$qd1." (EmailContacts LIKE '%".$emailfirma."%')as ranke,
  		 (URL LIKE '%".$urlfirma."%')as ranku, ".$qj1." ".$ql1." (Adresa LIKE '%".$adresafirma."%')as ranka,
  		 (Telefon LIKE '%".$telfirma."%')as rankt,
		   (Fax LIKE '%".$faxfirma."%')as rankf
  		 from x_firme order by rankn desc, ".$qd2." ranke desc,
  		 ranku desc, ".$qj2." ".$ql2." ranka desc,
  		 rankt desc,
  		 rankf desc
  		 limit ".LIMITA_CAUTARE;

  		$qq = mysql_query($query);

  		$i=0;
  		while($row = mysql_fetch_array($qq))
  		{
  			if ($qd2 == " ")
  			{
  				$rankd = 0;
  			}
  			else
  			{
  				$rankd = $row['rankd'];
  			}

  			if ($qj2 == " ")
  			{
  				$rankj = 0;
  			}
  			else
  			{
  				$rankj = $row['rankj'];
  			}

  			if ($ql2 == " ")
  			{
  				$rankl = 0;
  			}
  			else
  			{
  				$rankl = $row['rankl'];
  			}

  			$a=array("ID"=>$row['ID'],
  			"DomainID"=>$row['DomainID'],
  			"NumeFirma"=>$row['NumeFirma'],
  			"EmailContacts"=>$row['EmailContacts'],
  			"URL"=>$row['URL'],
  			"SIGLA"=>$row['SIGLA'],
  			"Judet"=>$row['Judet'],
  			"Localitate"=>$row['Localitate'],
  			"Adresa"=>$row['Adresa'],
  			"Telefon"=>$row['Telefon'],
  			"Fax"=>$row['Fax'],
  			"rankn"=>$row['rankn'],
  			"rankd"=>$rankd,
  			"ranke"=>$row['ranke'],
  			"ranku"=>$row['ranku'],
  			"rankj"=>$rankj,
  			"rankl"=>$rankl,
  			"ranka"=>$row['ranka'],
  			"rankt"=>$row['rankt'],
  			"rankf"=>$row['rankf']
  			);
  			$firme[$i] = $a;
  			$i = $i +1;
  		}
  		$t = new Smarty();
  		$t->assign("firme",$firme);
  		WebOutput($t,"cautarez","index");
    }
    
    function DetaliiFirma($id) {
    	global $userID;
  		$caut = $_GET["idfirm"];
  			
  		$t = new Smarty();
  		$firme  = new TableDbFirme();
  		$firme = $firme->create_ereader("*","and ID='{$caut}'","");
  		$firme = $firme->get_array();
  			
  		$produse  = new TableDbShopItems();		
			$produse = $produse->create_ereader("*","and UserID ='{$caut}' and Enabled = 1","");
			$produse = $produse->get_array();	

      $t->assign("UPLOAD_PRODUSE",UPLOAD_PRODUSE);
  		$t->assign("produse",$produse);	
  		$t->assign("UPLOAD_FIRME",UPLOAD_FIRME);
  		$t->assign("firme",$firme);
    	$t->assign("domenii",$GLOBALS[DOMENII_DE_ACTIVITATE_RO]);
     	WebOutput($t,"detaliifirma","index");
    }
    
    function Listare($id) {
      global $userID;
  		$nf = $_POST["numefirma"];
  		$df = $_POST["domeniufirma"];
  		$jf = $_POST["judetfirma"];
  		$lf = $_POST["localitatefirma"];
		
  		session_start();
    		
  		if ($nf != "")
      {
        $numefirma = $nf;
        $_SESSION['numefirma'] = $numefirma;
        
        if ($nf == "AA")
        {
          $numefirma = "";
          $_SESSION['numefirma'] = $numefirma;
        }
      }
      else
      {
        $numefirma = $_SESSION['numefirma'];
      }
    
      if ($df != "")
      {
        $domeniufirma = $df;
        $_SESSION['domeniufirma'] = $domeniufirma;
        
        if ($df == "AA")
        {
          $domeniufirma = "";
          $_SESSION['domeniufirma'] = $domeniufirma;
        }
      }
      else
      {
        $domeniufirma = $_SESSION['domeniufirma'];
      }
		
  		if ($jf != "")
      {
        $judetfirma = $jf;
        $_SESSION['judetfirma'] = $judetfirma;
        
        if ($jf == "AA")
        {
          $judetfirma = "";
          $_SESSION['judetfirma'] = $judetfirma;
        }
      }
      else
      {
        $judetfirma = $_SESSION['judetfirma'];
      }
		
  		if ($lf != "")
      {
        $localitatefirma = $lf;
        $_SESSION['localitatefirma'] = $localitatefirma;
        
        if ($lf == "AA")
        {
          $localitatefirma = "";
          $_SESSION['localitatefirma'] = $localitatefirma;
        }
      }
      else
      {
        $localitatefirma = $_SESSION['localitatefirma'];
      }
		
  		$var_crit = array("numefirma" => $numefirma,
  		"domeniufirma"=>$domeniufirma,
  		"judetfirma"=>$judetfirma,
  		"localitatefirma"=>$localitatefirma);
  
  		$judet  = new TableDbFirme();
  		$judet = $judet->create_ereader_dist("Judet","","order by Judet asc");
  		$judet = $judet->get_array();
  		
  		$localitate  = new TableDbFirme();
  		$localitate = $localitate->create_ereader_dist("Localitate","","order by Localitate asc");
  		$localitate = $localitate->get_array();
	
  		for($i=65; $i<=90; $i++){
  			$alfabet[chr($i)] = chr($i); 
  		}
  		
  		$select = "SELECTED";
  		
  		$criteriu = " ";
  		
  		if ($numefirma != "")
  		{
  			$numefirma = $numefirma."%";
  			$criteriu = $criteriu."and NumeFirma like '{$numefirma}'";
  		}
  		if ($domeniufirma != "")
  		{
  			$criteriu = $criteriu."and DomainID = '{$domeniufirma}'";
  		}
  		if ($judetfirma != "")
  		{
  			$criteriu = $criteriu."and Judet = '{$judetfirma}'";
  		}
  		if ($localitatefirma != "")
  		{
  			$criteriu = $criteriu."and Localitate = '{$localitatefirma}'";
  		}
			
  		$firme  = new TableDbFirme();
  		$firme = $firme->create_ereader("*",$criteriu,"order by NumeFirma asc");
  
  		$firme->page = $_REQUEST["page"];
  		$firme->pagesize = 10;
  		$firme = $firme->get_pagination("get_array","page.html");
  		$firmed = $firme['data'];
  		$firmep = $firme['pagination'];
  
  		$t = new Smarty();

  		$t->assign("firme",$firmed);
  		$t->assign("firmep",$firmep);
  		$t->assign("var_crit",$var_crit);
  		$t->assign("select",$select);
  		$t->assign("alfabet",$alfabet);
  		$t->assign("judet",$judet);
  		$t->assign("localitate",$localitate);
    	$t->assign("domenii",$GLOBALS[DOMENII_DE_ACTIVITATE_RO]);
      WebOutput($t,"listare","index");
    }
    
    function EmailForm($id) {
      global $userID;
      $idfirm = $_GET["idfirm"];      
      $t = new Smarty();
      $t->assign("idfirm",$idfirm);
      WebOutput($t,"emailform","index");
    }
        
    function EmailSend($id) {
      global $userID;
      $idfirm = $_GET["idfirm"]; 
      
      $sender  = new TableDbFirme();	
			$sender = $sender->create_ereader("*","and ID='{$userID}'","");
			$sender = $sender->get_array();
      
      $send = $sender[0]["EmailContacts"];
      $send_firm = $sender[0]["NumeFirma"];
      
      $dest  = new TableDbFirme();	
			$dest = $dest->create_ereader("*","and ID='{$idfirm}'","");
			$dest = $dest->get_array();
      
      $to = $dest[0]["EmailContacts"];
      $subject = $_GET["subiect"];
      $body = $_GET["mesaj"];
      
      $headers = "From: ".$send." - ".$send_firm."\r\n";

      if (mail($to, $subject, $body,$headers))
      {
        $var_email = "send";
      }
      else
      {
        $var_email = "unsend";
      }
      
      $t = new Smarty();
      $t->assign("var_email",$var_email);
      WebOutput($t,"emailsend","index");
    }
    
    function HartaSelect($id) {
      global $userID;
      
      $firme  = new TableDbFirme();		
			$firme = $firme->create_ereader("*","and ID='{$userID}'","");
			$firme = $firme->get_array();
      
      $lat = $firme[0]["Lat"];
      $lon = $firme[0]["Lon"];
      
      
      if ($lat == "")
      {$lat = 44.436722;}
      if ($lon == "")
      {$lon = 26.093903;}

      
      $scriptjava = " <script type=\"text/javascript\">
    	var geocoder = new GClientGeocoder();
      var setLat =".$lat.";
	    var setLon =".$lon.";  

	    function argItems (theArgName) {
		  sArgs = location.search.slice(1).split('&');
    		r = '';
    		for (var i = 0; i < sArgs.length; i++) {
        		if (sArgs[i].slice(0,sArgs[i].indexOf('=')) == theArgName) {
            			r = sArgs[i].slice(sArgs[i].indexOf('=')+1);
            			break;
        		}
    		}
    	return (r.length > 0 ? unescape(r).split(',') : '')
      }
	
	    function placeMarker(setLat, setLon) {
  
  		document.getElementById(\"frmLat\").value = setLat;
  		document.getElementById(\"frmLon\").value = setLon;
  	  
  		var map = new GMap(document.getElementById(\"map\"));
  		
  		map.disableDoubleClickZoom(); 
  		map.addControl(new GLargeMapControl());
  		map.addControl(new GMapTypeControl());
  		map.centerAndZoom(new GPoint(setLon, setLat), 7);
   
    	map.addControl(new GScaleControl()); 
      
      map.addControl(new google.maps.LocalSearch(), new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,20)));
  
  
  		var point = new GPoint(setLon, setLat);
  		var marker = new GMarker(point);
  		map.addOverlay(marker);
  
  		GEvent.addListener(map, 'click', function(overlay, point) {
  			if (overlay) {
  				map.removeOverlay(overlay);
  			} else if (point) {
  				map.recenterOrPanToLatLng(point);
  				var marker = new GMarker(point);
  				map.addOverlay(marker);
          var matchll = /\(([-.\d]*), ([-.\d]*)/.exec( point );
  				if ( matchll ) { 
  					var lat = parseFloat( matchll[1] );
  					var lon = parseFloat( matchll[2] );
  					lat = lat.toFixed(6);
  					lon = lon.toFixed(6);
  					var messageRoboGEO = lat + \";\" + lon + \"\"; 
  				} else { 
  					var message = \"<b>Error extracting info from</b>:\" + point + \"\"; 
  					var messagRoboGEO = message;
  				}
  				document.getElementById(\"frmLat\").value = lat;
  				document.getElementById(\"frmLon\").value = lon;
  			}
  		});
  	}
  
  
  	if (argItems(\"lat\") == '' || argItems(\"lon\") == '') {
  		placeMarker(setLat, setLon);
      } else {
  		var setLat = parseFloat( argItems(\"lat\") );
  		var setLon = parseFloat( argItems(\"lon\") );
  		setLat = setLat.toFixed(6);
  	    setLon = setLon.toFixed(6);
  		placeMarker(setLat, setLon);
      } </script>";    
      
      $t = new Smarty();
      $t->assign("firme",$firme);
      $t->assign("scriptjava",$scriptjava);
      WebOutput($t,"hartaselect","index");
    }
    
    function HartaInsert($id) {
      global $userID;
      $lat = $_POST["lat"]; 
      $lon = $_POST["lon"];
      $var_in = "edit";

  		$vector = array("Lat"=>$lat,"Lon"=>$lon);
      $firma  = new TableDbFirme();
  		$firma->update($vector,$userID);

      $t = new Smarty();
      $t->assign("var_in",$var_in);
      WebOutput($t,"confirm_inreg","index");
    }
    
    function HartaAfisare($id) {
      global $userID;
      $idfirm = $_GET["idfirm"]; 
      
      $firme  = new TableDbFirme();		
			$firme = $firme->create_ereader("*","and ID='{$idfirm}'","");
			$firme = $firme->get_array();
      
      $lat = $firme[0]["Lat"];
      $lon = $firme[0]["Lon"];
      $nume = $firme[0]["NumeFirma"];
          
      $gm = & new EasyGoogleMap();
      $gm->SetMapZoom(10);
      $gm->SetMapWidth(500);
      $gm->SetMapHeight(400);
      $gm->mMapType = TRUE;
      $gm->SetMarkerIconStyle('PIN');
      $gm->SetMarkerIconColor('YOSEMITE');
      $gm->SetMapControl('LARGE_PAN_ZOOM');
      $gm->SetLat($lat);
      $gm->SetLon($lon);
      $gm->SetBubble($nume);

      $t = new Smarty();
      $t->assign("mapholder",$gm->MapHolder());
      $t->assign("init",$gm->InitJs());
      $t->assign("getside",$gm->GetSideClick());
      $t->assign("unload",$gm->UnloadMap());

      WebOutput($t,"hartaafisare","index");
    }
    
    function AddItem($id) {
      global $userID;
      
      $arrver['mess'] = $_GET['mess'];
      $arrver['Name'] = $_GET['Name'];
			$arrver['LeadText'] = $_GET['LeadText'];
			$arrver['Description'] = $_GET['Description'];
	//		$rec['Oras'] = 0;
      $arrver['Price'] = $_GET['Price'];
      $arrver['Link'] = $_GET['Link'];
      
      $firme  = new TableDbFirme();		
			$firme = $firme->create_ereader("*","and ID='{$userID}'","");
			$firme = $firme->get_array();

      $t = new Smarty();
      $t->assign("arrver",$arrver);
      $t->assign("firme",$firme);
      $t->assign("firme",$firme);
      WebOutput($t,"addproduct","index");
    }
    
    function AddItemSave ()
		{
		  global $userID;
			$t = new Smarty();

			//salvare main item
			$titems = new TableDbShopItems();
			$itm = $_POST['rec'];

			$rec = array();
			
			$rec['UserID'] = $GLOBALS['userID'];
			$rec['CategoryID'] = 99999;
			$rec['ItemTypeID'] = 0;	
			$rec['Name'] = $_POST['Name'];
			$rec['LeadText'] = $_POST['LeadText'];
			$rec['Description'] = $_POST['Description'];
	//		$rec['Oras'] = 0;
      $rec['Price'] = $_POST['Price'];
      $rec['Link'] = $_POST['Link'];
      $rec['AddType'] = 0;
			$rec['Enabled'] = 0;
			$rec['Deleted'] = 0;
      
			$rec['CDate'] = Date::MysqlNow();
//		$rec['EDate'] = fnc_date_calc($rec['CDate'],$itm['Days']);

			$rec['Picture'] = 0;
      
      $arrver['Name'] = $_POST['Name'];
			$arrver['LeadText'] = $_POST['LeadText'];
			$arrver['Description'] = $_POST['Description'];
	//		$rec['Oras'] = 0;
      $arrver['Price'] = $_POST['Price'];
      $arrver['Link'] = $_POST['Link'];

/*      if (Verificari::estegol($rec['Name']))
      {
        $arrver['mess'] = 'Complatati numele produsului';
        redirect(WEBOBJECT,"AddItem",$arrver);
      }*/
      
      if (!Verificari::check_field1($rec['Name']))
      {
        $arrver['Name'] = '';
        $arrver['mess'] = 'Numele produsului incorect';
        redirect(WEBOBJECT,"AddItem",$arrver);
      }
      
      if (!Verificari::check_field1($rec['LeadText']))
      {
        $arrver['LeadText'] = '';
        $arrver['mess'] = 'LeadText incorect';
        redirect(WEBOBJECT,"AddItem",$arrver);
      }
      
      if (!Verificari::check_field1($rec['Description']))
      {
        $arrver['Description'] = '';
        $arrver['mess'] = 'Descriere incorecta';
        redirect(WEBOBJECT,"AddItem",$arrver);
      }
      
      if (!Verificari::isNumber($rec['Price']))
      {
        $arrver['Price'] = '';
        $arrver['mess'] = 'Pretul este in cifre';
        redirect(WEBOBJECT,"AddItem",$arrver);
      }

      if (!Verificari::verifURL($rec['Link']))
      {
        $arrver['Link'] = '';
        $arrver['mess'] = 'Link incorect';
        redirect(WEBOBJECT,"AddItem",$arrver);
      }
      
			$id = $titems->save($rec,0);
			//salvare main item
			
	    	//loop true pictures and upload valid ones 
			if ($id >  0)
			{	    	
			    for ($i=0;$i<=3;$i++)
			    {
			    	if ($_FILES["picture".$i] > "")   
			    	{
			    		$up = new FileUpload("picture".$i,"jpg");
			    		$up->Save(UPLOAD_PRODUSE,$id."_".$i);
			    		
						$upd = array();
						$upd['Picture'] = 1;
						$titems->update($upd,$id);			    		
			    	}
			    }
			}

//			redirect(WEBOBJECT,"AddItemThx",array());
      $var_in	= "inreg";
      $t->assign("var_in",$var_in);
			WebOutput($t,"confirm_inreg","index");
	}
	
	  function ListareProdProprii($id) {
      global $userID;
      
      $firme  = new TableDbFirme();		
			$firme = $firme->create_ereader("*","and ID='{$userID}'","");
			$firme = $firme->get_array();

      $produse  = new TableDbShopItems();		
			$produse = $produse->create_ereader("*","and UserID='{$userID}'","order by Name asc");
			$produse = $produse->get_array();
      
      $t = new Smarty();
      $t->assign("firme",$firme);
      $t->assign("produse",$produse);
      WebOutput($t,"listareprodproprii","index");
    }
    
    function DetaliiProdusPropriu($id) {
      global $userID;
      $idprod = $_GET['idprod'];
      
      $produse  = new TableDbShopItems();		
			$produse = $produse->create_ereader("*","and UserID ='{$userID}' and ID='{$idprod}'","");
			$produse = $produse->get_array();
  
      if ($produse[0]["Picture"]==1)
      {
        for ($i=0;$i<3;$i++)
			    {
            list($w, $h) = getimagesize(UPLOAD_PRODUSE.$idprod."_".($i+1).".jpg");
            $dim[2*$i] = $w;
            $dim[(2*$i+1)] = $h;
			    }
      }

      $t = new Smarty();

      $t->assign("UPLOAD_PRODUSE",UPLOAD_PRODUSE);
      $t->assign("produse",$produse);
      $t->assign("dim",$dim);
      WebOutput($t,"detaliiprodproprii","index");
    }
    
    function EditareProdusPropriu($id) {
      global $userID;
      $idprod = $_GET['idprod'];
      $arrver['mess'] = $_GET['mess'];
      
      $produse  = new TableDbShopItems();		
			$produse = $produse->create_ereader("*","and UserID ='{$userID}' and ID='{$idprod}'","");
			$produse = $produse->get_array();

      $t = new Smarty();

      $t->assign("arrver",$arrver);
      $t->assign("produse",$produse);
      WebOutput($t,"editareprodproprii","index");
    }
    
    function EditareProdusPropriu2($id) {
      global $userID;
      $idprod = $_GET['idprod'];
      
      $t = new Smarty();

			//salvare main item
			$titems = new TableDbShopItems();
			$itm = $_POST['rec'];

			$rec = array();
			
//		$rec['UserID'] = $GLOBALS['userID'];
//		$rec['CategoryID'] = 99999;
//		$rec['ItemTypeID'] = 0;	
			$rec['Name'] = $_POST['Name'];
			$rec['LeadText'] = $_POST['LeadText'];
			$rec['Description'] = $_POST['Description'];
//		$rec['Oras'] = 0;
      $rec['Price'] = $_POST['Price'];
      $rec['Link'] = $_POST['Link'];
      $rec['AddType'] = 0;
			$rec['Enabled'] = 0;
			$rec['Deleted'] = 0;
      
			$rec['CDate'] = Date::MysqlNow();
//		$rec['EDate'] = fnc_date_calc($rec['CDate'],$itm['Days']);

//  	$rec['Picture'] = 0;

      $arrver['idprod'] = $idprod;
      if (!Verificari::check_field1($rec['Name']))
      {
        $arrver['mess'] = 'Numele produsului incorect';
        redirect(WEBOBJECT,"EditareProdusPropriu",$arrver);
      }
      
      if (!Verificari::check_field1($rec['LeadText']))
      {
        $arrver['mess'] = 'LeadText incorect';
        redirect(WEBOBJECT,"EditareProdusPropriu",$arrver);
      }
      
      if (!Verificari::check_field1($rec['Description']))
      {
        $arrver['mess'] = 'Descriere incorecta';
        redirect(WEBOBJECT,"EditareProdusPropriu",$arrver);
      }
      
      if (!Verificari::isNumber($rec['Price']))
      {
        $arrver['mess'] = 'Pretul este in cifre';
        redirect(WEBOBJECT,"EditareProdusPropriu",$arrver);
      }

      if (!Verificari::verifURL($rec['Link']))
      {
        $arrver['mess'] = 'Link incorect';
        redirect(WEBOBJECT,"EditareProdusPropriu",$arrver);
      }

      $titems->update($rec,$idprod);

			//salvare main item
			
	    	//loop true pictures and upload valid ones 
		  if ($idprod >  0)
			{	    	
			    for ($i=0;$i<=3;$i++)
			    {
			    	if ($_FILES["picture".$i] > "")   
			    	{
			    		$up = new FileUpload("picture".$i,"jpg");
			    		$up->Save(UPLOAD_PRODUSE,$idprod."_".$i);
			    		
						$upd = array();
						$upd['Picture'] = 1;
						$titems->update($upd,$idprod);			    		
			    	}
			    }
			}

      $var_in	= "edit";
      $t->assign("var_in",$var_in);
			WebOutput($t,"confirm_inreg","index");
      
    }
    
    function StergeProdusPropriu($id) {
      global $userID;
      $idprod = $_GET['idprod'];
      
      $t = new Smarty();

      $titems = new TableDbShopItems();
      
      $titems->delete_where($idprod," and UserID = $userID");
			//salvare main item
			
      $var_in	= "sterge";
      $t->assign("var_in",$var_in);
			WebOutput($t,"confirm_inreg","index");
    }
    
    function DetaliiProdus($id) {
      global $userID;
      $idprod = $_GET['idprod'];
      
      $produse  = new TableDbShopItems();		
			$produse = $produse->create_ereader("*"," and ID='{$idprod}' and Enabled = 1","");
			$produse = $produse->get_array();
  
      if ($produse[0]["Picture"]==1)
      {
        for ($i=0;$i<3;$i++)
			    {
            list($w, $h) = getimagesize(UPLOAD_PRODUSE.$idprod."_".($i+1).".jpg");
            $dim[2*$i] = $w;
            $dim[(2*$i+1)] = $h;
			    }
      }
      $idfirma = $produse[0]['UserID'];
  		$firme  = new TableDbFirme();
  		$firme = $firme->create_ereader("*","and ID='{$idfirma}'","");
  		$firme = $firme->get_array();

      $t = new Smarty();

      $t->assign("firme",$firme);
      $t->assign("UPLOAD_PRODUSE",UPLOAD_PRODUSE);
      $t->assign("produse",$produse);
      $t->assign("dim",$dim);
      WebOutput($t,"detaliiprod","index");
    }
    
    function ListareProdus($id) {
     global $userID;
  		$np = $_POST["numeprodus"];
  		$lt = $_POST["leadtext"];
  		$dp = $_POST["descriereprodus"];
  		$pp1 = $_POST["pretprodus1"];
  		$pp2 = $_POST["pretprodus2"];
		
  		session_start();

      $numeprodus = $np;
      $_SESSION['numeprodus'] = $numeprodus;

      $leadtext = $lt;
      $_SESSION['leadtext'] = $leadtext;
      
      $descriereprodus = $dp;
      $_SESSION['descriereprodus'] = $descriereprodus;
      
      $pretprodus1 = $pp1;
      $_SESSION['pretprodus1'] = $pretprodus1;
      
      $pretprodus2 = $pp2;
      $_SESSION['pretprodus2'] = $pretprodus2;
      
  		$var_crit = array("numeprodus" => $numeprodus,
  		"leadtext"=>$leadtext,
  		"descriereprodus"=>$descriereprodus,
  		"pretprodus1"=>$pretprodus1,
      "pretprodus2"=>$pretprodus2);

  		$criteriu = " and Enabled = '1'";
  		
  		if ($numeprodus != "")
  		{
  			$numeprodus = "%".$numeprodus."%";
  			$criteriu = $criteriu." and Name like '{$numeprodus}'";
  		}
  		if ($leadtext != "")
  		{
  		  $leadtext = "%".$leadtext."%";
  			$leadtext = $criteriu." and LeadText like '{$leadtext}'";
  		}
  		if ($descriereprodus != "")
  		{
  		  $descriereprodus = "%".$descriereprodus."%";
  			$criteriu = $criteriu." and Description like '{$descriereprodus}'";
  		}
  		if ($pretprodus1 != "")
  		{
  			$criteriu = $criteriu." and Price >= '{$pretprodus1}'";
  		}
  		if ($pretprodus2 != "")
  		{
  			$criteriu = $criteriu." and Price <= '{$pretprodus2}'";
  		}
			
      $produse  = new TableDbShopItems();		
			$produse = $produse->create_ereader("*","$criteriu","order by Name ASC");
 
      $produse->page = $_REQUEST["page"];
  		$produse->pagesize = 10;
  		$produse = $produse->get_pagination("get_array","page.html");
  		$prodused = $produse['data'];
  		$produsep = $produse['pagination'];
  
  		$t = new Smarty();
      $t->assign("var_crit",$var_crit);
  		$t->assign("produse",$prodused);
  		$t->assign("produsep",$produsep);
  		$t->assign("UPLOAD_PRODUSE",UPLOAD_PRODUSE);
      WebOutput($t,"listareprodus","index");
    }    
    
}
?>
