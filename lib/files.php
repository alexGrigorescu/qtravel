<?php
	class upload
	{
		var $size = 0;
		var $original_name = '';
		var $type = '';
		var $ext = '.undefined';
		var $tmp_name = '';
		function upload ($folder, $field)
		{
			$this->folder = $folder;
			$this->field = $field;
			if (isset($_FILES[$field]['tmp_name']))
			{
				$this->tmp_name = element($_FILES[$field]['tmp_name']);
				$this->size =  element($_FILES[$field]['size']);
				$this->original_name =  element($_FILES[$field]['name']);
				$this->type =  element($_FILES[$field]['type']);
				$this->ext = $this->getExt();	
			}
			else 
			{
				
			}
			$this->file_path = $this->folder;
			$this->setValidFiles();	
		}
		
		function getExt()
		{
			if (ereg('^(.*)\.([A-Za-z0-9]+)$', $this->original_name, $rtmp))
			{
				$ext = ".".$rtmp[2];
			}
			else $ext = ".jpg";
			return $ext;
		}
		
		function setValidFiles()
		{
			$this->valid_files = array();
		}
		
		function valid()
		{	
			return in_array($this->type, $this->valid_files);
		}
		
		function uploaded ()
		{
			if (!is_uploaded_file($_FILES[$this->field]['tmp_name'])) 
			{
				return 0;
			}
			return 1;
		}
		
		function exists()
		{			
			if (file_exists($this->file_path)) return 1;
			else return 0;
		}
		
		function getSize()
		{
			return $this->size;
		}
		
		function file_name()
		{
			return $this->original_name;
		}
		
		function save()
		{
			if ($this->valid())
			{
				if(move_uploaded_file($this->tmp_name, $this->file_path.$this->file_name())) 
				{					
					return $this->file_name();				
				}
				else return '';
			}			
			else return '';
		}
		
		function save_as($name)
		{			
			if ($this->valid())
			{		
				if(move_uploaded_file($this->tmp_name, $this->file_path.$name)) 
				{															
					return $name;				
				}
				else 
				{					
					return false;
				}
			}			
			else 
			{
				return false;
			}
		}
		
		function delete($file_name)
		{
			if (file_exists($this->folder.'/'.$file_name))
				@unlink($this->folder.'/'.$file_name);
		}

		function deleteList($fn)
		{
			$b = new  browse ($this->folder);
			return $b->deleteList($fn);
		}
	}
	
	class browse
	{
		var $folder;
		var $extensions;

		function browse($folder, $extensions = '', $url = '')
		{
			$this->url = $url;
			$this->folder = $folder;
			$this->extensions = array ();
			if ($extensions > '') $this->extensions = split(',', $extensions);
		}
		
		function exists ($fn)
		{
			return file_exists($this->folder.'/'.$fn);
		}

		function getFile($fn)
		{		   
			if ($handle = @opendir($this->folder))
				while (false !== ($file = readdir($handle)))
					if (ereg("^$fn\\.([A-Za-z0-9]+)\$", $file, $rtmp))
					{
						if (count($this->extensions) > 0)
						{
							if (in_array('.'.$rtmp[1],  $this->extensions)) return $fn . '.' . $rtmp[1];			
						}
						else return $file;
					}
			return false;
		}
		
		function getExt($fn)
		{
			if (ereg('^(.*)\.([A-Za-z0-9]+)$', $fn, $rtmp))
			{
				$ext = '.'.$rtmp[2];
			}
			else $ext = ".jpg";
			return $ext;
		}
		
		function getFiles($fn = '')
		{
			$list = array();
			if ($handle = opendir($this->folder))
				while (false !== ($file = readdir($handle))) if ($file[0] != '.')
				{
					if ($fn > '' && strtolower($file) != 'thumbs.db')
					{
					   	if (ereg("^$fn(\\([0-9]+\\))?\\.([A-Za-z0-9]+)\$", $file, $rtmp)) $list[] = $file;						
					}
					else $list[] = $file;					
				}
			sort($list);
			return $list;
		}

		function getFolders()
		{
			$list = array();

			if ($handle = opendir($this->folder))
			{
				while (false !== ($file = readdir($handle)))
				{
					if (is_dir($this->folder.'/'.$file) && $file != '.' && $file != '..')
					{
						$list[] = $file;
					}
				}
			}

			sort($list);
			return $list;
		}

		function deleteFile($fn)
		{
			unlink("{$this->folder}/$fn");
		}

		function deleteList($fn)
		{
			$a = $this->getFiles($fn);

			foreach($a as $k=>$v)
			{
				unlink("{$this->folder}/$v");
			}

			return $a;
		}
		
		function deleteFiles()
		{
			$list = array();
			if ($handle = @opendir($this->folder))
			{
				while (false !== ($file = readdir($handle))) 
				{
					if ($file > '' && $file[0] != '.' && $file != '..' && !is_dir($file))
					{
						unlink($this->folder.$file);			
					}
				}
			}
		}
	}
	
	class picture extends browse
	{
		function picture($folder, $extensions = '', $url = '')
		{
        	if (strlen(trim($extensions)) == 0)
        	{
        		$extensions = '.jpg,.JPG,.gif,.GIF';
        	}
        	
        	parent::browse ($folder, $extensions, $url);
        }
        
        function getTag($pic, $mw = 100, $mh = 100, $attrs = '', $create_thumb = 1, $search = 1, $crop = 1, $default_pic = 'default.jpg')
		{
			if (strlen($pic) == 0) $pic = $default_pic;
	        if($search) $pic = $this->getFile($pic);
	        if ($pic)
	        {
					
	        	$th = $this->getThumb ($pic, $mw, $mh, $create_thumb, $crop, $default_pic);
	        	
			    return '<img src="'.$this->url.$th['pic'].'" width="'.$th['w'].'" height="'.$th['h'].'" '.$attrs.'/>';            	        
	        }
	        else return '';
		}
		
		function getThumb ($pic, $mw, $mh , $create_thumb = 1, $crop = 1, $default_pic = 'default.jpg')
		{		
			$thumb = "thumbs/thumb_{$mw}_{$mh}_{$pic}";			
			
			if (!is_dir($this->folder.'thumbs'))
			{
				mkdir($this->folder.'thumbs', 0777);
				chmod($this->folder.'thumbs', 0777);
			}
			
			if (file_exists($this->folder.$thumb))
			{								
				list($w, $h, $type, $attr) = getimagesize($this->folder.$thumb);	
					
			    return array('pic'=>$thumb, 'w'=>$w, 'h'=>$h);				
			}
			if ($crop == 1) 
			{
				$params = array();
				$params['cache_path'] = $this->folder.'thumbs/';
				$params['cache_name'] = "thumb_{$mw}_{$mh}_{$pic}";
				$params['width'] = $mw;
				$params['height'] = $mh;
				$params['file'] = $this->folder.$pic;
				$params['crop'] = true;
				$params['sharpen'] = true;
				$params['default_pic'] = $default_pic;
				
				$response = $this->crop($params);
				return array('pic'=>$thumb, 'w'=>$response['width'], 'h'=>$response['height']);
			}
			else 
			{
				$create = false;
				$type = '';
				if (eregi("\.(jpg|jpeg)$",$pic)) 
				{
					$create = @imagecreatefromjpeg($this->folder.$pic);
					$type = 'jpg';
				}
				
				if (eregi("\.(gif)$",$pic)) 
				{
					$create = @imagecreatefromgif($this->folder.$pic);
					$type = 'gif';
				}
			   
			    $nw = $mw;
			    $nh = $mh;
			    if ($create)
			    {		        
			    	$w = imagesx($create);
			        $h = imagesy($create);
			
			        if ($w < $mw && $h < $mh)
			        {
				        $mw = $w;
				        $mh = $h;	
			        }
			        $rw = ($w / $mw);
			        $rh = ($h / $mh);
			        $r = ($rw > $rh) ? $rw : $rh;
			        $nw = ceil($w / $r);
			        $nh = ceil($h / $r);
			        
					
					if (!$create_thumb) return array('pic'=>$pic, 'w'=>$nw, 'h'=>$nh);
					
					$def = @imagecreatetruecolor($nw, $nh);
			        
			        if (!$def)
			        {
			            $def = imagecreate($nw, $nh);
			            imagecopyresized($def, $create, 0, 0, 0, 0, $nw, $nh, $w, $h);
			        }
			        else imagecopyresampled($def, $create, 0, 0, 0, 0, $nw, $nh, $w, $h);		        
			        
			        
			        if ($create_thumb) 
			        {
			        	if (file_exists($this->folder.$thumb)) 
			        	{
			        		unlink ($this->folder.$thumb);		        		
			        	}
			        	
			        	if ($type == 'jpg')
			        	{
			        		imagejpeg($def, $this->folder.$thumb, 100);
			        	}
			        	else
			        	{
			        		imagegif($def, $this->folder.$thumb);
			        	}
			        }
			    }
			    else $thumb = $pic;
				
			    $th = array('pic'=>$thumb, 'w'=>$nw, 'h'=>$nh);		    
			    return $th;
			}
		}
		
		function crop($params)
		{
			$_CONFIG['cache_path'] = $params['cache_path'];
			$_CONFIG['cache_name'] = $params['cache_name'];
			$_CONFIG['types'] = array('','.gif','.jpg','.png');
			
			if (empty($params['extrapolate'])) $params['extrapolate'] = true;
			if (empty($params['width']) AND empty($params['height']) 
			    AND empty($params['longside']) AND empty($params['shortside'])) $params['width'] = 100;
			
			
			if  (!file_exists($params['file']))
			{	$default_pic = empty($params['default_pic'])?'default.jpg':$params['default_pic'];
				$params['file'] = USR_PATH."default/".$default_pic;
			}
			
			$temp = getimagesize($params['file']);
		
			$_SRC['file']		= $params['file'];
			$_SRC['width']		= $temp[0];
			$_SRC['height']		= $temp[1];
			$_SRC['type']		= $temp[2]; // 1=GIF, 2=JPG, 3=PNG, SWF=4
			$_SRC['string']		= $temp[3];
			$_SRC['filename'] 	= basename($params['file']);
			
		
		    if ($_SRC['width'] >= $_SRC['height']) 
		    {
		        $_SRC['format'] = 'landscape';
		    } 
		    else 
		    {
		        $_SRC['format'] = 'portrait';
		    }
		
			if (is_numeric($params['width']) AND empty($params['height']))
			{
				$_DST['width']	= $params['width'];
				$_DST['height']	= round($params['width']/($_SRC['width']/$_SRC['height']));
			}
			elseif (is_numeric($params['height']) AND empty($params['width']))
			{
				$_DST['height']	= $params['height'];
				$_DST['width']	= round($params['height']/($_SRC['height']/$_SRC['width']));
			}
			elseif (is_numeric($params['width']) AND is_numeric($params['height']))
			{
				$_DST['width']	= $params['width'];
				$_DST['height']	= $params['height'];
			}
			elseif (is_numeric($params['longside']) AND empty($params['shortside']))
		    {
		        if ($_SRC['format'] == 'portrait') 
		        {
		            $_DST['height']	= $params['longside'];
		            $_DST['width']	= round($params['longside']/($_SRC['height']/$_SRC['width']));
		        }
		        else
		        {
		            $_DST['width']	= $params['longside'];
		            $_DST['height']	= round($params['longside']/($_SRC['width']/$_SRC['height']));
		        }
		    }
			elseif (is_numeric($params['shortside']))
		    {
		        if ($_SRC['format'] == 'portrait') 
		        {
		            $_DST['width']	= $params['shortside'];
		            $_DST['height']	= round($params['shortside']/($_SRC['width']/$_SRC['height']));
		        }
		        else
		        {
		            $_DST['height']	= $params['shortside'];
		            $_DST['width']	= round($params['shortside']/($_SRC['height']/$_SRC['width']));
		        }
		    }
		
			if ($params['extrapolate'] == 'false' && $_DST['height'] > $_SRC['height'] && $_DST['width'] > $_SRC['width'])
			{
				$_DST['width'] = $_SRC['width'];
				$_DST['height'] = $_SRC['height'];
			}
				
			if (!empty($params['type'])) $_DST['type']	= $params['type'];
			else $_DST['type']	= $_SRC['type'];
		
			$_DST['file'] = $_CONFIG['cache_path'].$_CONFIG['cache_name'];
		
			if ($_SRC['type'] == 1)	$_SRC['image'] = imagecreatefromgif($_SRC['file']);
			if ($_SRC['type'] == 2)	$_SRC['image'] = imagecreatefromjpeg($_SRC['file']);
			if ($_SRC['type'] == 3)	$_SRC['image'] = imagecreatefrompng($_SRC['file']);
		
			if(isset($params['crop']) && $params['crop'] != false)
			{							
				if($_SRC['height'] < $_SRC['width'])
				{
					$ratio = (double)($_SRC['height'] / $_DST['height']);
					$cpyWidth = round($_DST['width'] * $ratio);
					if ($cpyWidth > $_SRC['width'])
					{           		
						$ratio = (double)($_SRC['width'] / $_DST['width']);
						$cpyWidth = $_SRC['width'];
						$cpyHeight = round($_DST['height'] * $ratio);
						$off_w = 0;
						$off_h = round(($_SRC['height'] - $cpyHeight) / 2);                              
						$_SRC['height'] = $cpyHeight;
					}
					else
						{           		
						$cpyHeight = $_SRC['height'];
						$off_w = round(($_SRC['width'] - $cpyWidth) / 2);
						$off_h = 0;               
						$_SRC['width']= $cpyWidth;
						}
					}
				else
					{
					$ratio = (double)($_SRC['width'] / $_DST['width']);
					$cpyHeight = round($_DST['height'] * $ratio);
					if ($cpyHeight > $_SRC['height'])
						{
						$ratio = (double)($_SRC['height'] / $_DST['height']);
						$cpyHeight = $_SRC['height'];
						$cpyWidth = round($_DST['width'] * $ratio);
						$off_w = round(($_SRC['width'] - $cpyWidth) / 2);
						$off_h = 0;               
						$_SRC['width']= $cpyWidth;               
						}
					else
						{
						$cpyWidth = $_SRC['width'];
						$off_w = 0;
						$off_h = round(($_SRC['height'] - $cpyHeight) / 2);               
						$_SRC['height'] = $cpyHeight;               
						}
					}		
				}
		
			$_DST['image'] = imagecreatetruecolor($_DST['width'], $_DST['height']);
			imagecopyresampled($_DST['image'], $_SRC['image'], 0, 0, $off_w, $off_h, $_DST['width'], $_DST['height'], $_SRC['width'], $_SRC['height']);
			if (isset($params['sharpen']) && $params['sharpen'] != false) $_DST['image'] = $this->UnsharpMask($_DST['image'],80,.5,3);
		
			if ($_DST['type'] == 1)
			{
				imagetruecolortopalette($_DST['image'], false, 256);
				imagegif($_DST['image'], $_DST['file']);
			}
			if ($_DST['type'] == 2)
			{
				if (empty($params['quality'])) $params['quality'] = 80;
				imagejpeg($_DST['image'], $_DST['file'],$params['quality']);
			}
			if ($_DST['type'] == 3)
			{
				imagepng($_DST['image'], $_DST['file']);
			}
			
			imagedestroy($_DST['image']);
			imagedestroy($_SRC['image']);
		
			return $_DST;
		}
		
		function UnsharpMask($img, $amount, $radius, $threshold)
		{
			// Attempt to calibrate the parameters to Photoshop:
			if ($amount > 500) $amount = 500;
			$amount = $amount * 0.016;
			if ($radius > 50) $radius = 50;
			$radius = $radius * 2;
			if ($threshold > 255) $threshold = 255;
	
			$radius = abs(round($radius)); 	// Only integers make sense.
			if ($radius == 0) {	return $img; imagedestroy($img); break;	}
			$w = imagesx($img); $h = imagesy($img);
			$imgCanvas = $img;
			$imgCanvas2 = $img;
			$imgBlur = imagecreatetruecolor($w, $h);
	
			// Gaussian blur matrix:
			//	1	2	1		
			//	2	4	2		
			//	1	2	1		
	
			// Move copies of the image around one pixel at the time and merge them with weight
			// according to the matrix. The same matrix is simply repeated for higher radii.
			for ($i = 0; $i < $radius; $i++)
				{
				imagecopy      ($imgBlur, $imgCanvas, 0, 0, 1, 1, $w - 1, $h - 1); // up left
				imagecopymerge ($imgBlur, $imgCanvas, 1, 1, 0, 0, $w, $h, 50); // down right
				imagecopymerge ($imgBlur, $imgCanvas, 0, 1, 1, 0, $w - 1, $h, 33.33333); // down left
				imagecopymerge ($imgBlur, $imgCanvas, 1, 0, 0, 1, $w, $h - 1, 25); // up right
				imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 1, 0, $w - 1, $h, 33.33333); // left
				imagecopymerge ($imgBlur, $imgCanvas, 1, 0, 0, 0, $w, $h, 25); // right
				imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 0, 1, $w, $h - 1, 20 ); // up
				imagecopymerge ($imgBlur, $imgCanvas, 0, 1, 0, 0, $w, $h, 16.666667); // down
				imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 0, 0, $w, $h, 50); // center
				}
			$imgCanvas = $imgBlur;	
				
			// Calculate the difference between the blurred pixels and the original
			// and set the pixels
			for ($x = 0; $x < $w; $x++)
				{ // each row
				for ($y = 0; $y < $h; $y++)
					{ // each pixel
					$rgbOrig = ImageColorAt($imgCanvas2, $x, $y);
					$rOrig = (($rgbOrig >> 16) & 0xFF);
					$gOrig = (($rgbOrig >> 8) & 0xFF);
					$bOrig = ($rgbOrig & 0xFF);
					$rgbBlur = ImageColorAt($imgCanvas, $x, $y);
					$rBlur = (($rgbBlur >> 16) & 0xFF);
					$gBlur = (($rgbBlur >> 8) & 0xFF);
					$bBlur = ($rgbBlur & 0xFF);
	
					// When the masked pixels differ less from the original
					// than the threshold specifies, they are set to their original value.
					$rNew = (abs($rOrig - $rBlur) >= $threshold) ? max(0, min(255, ($amount * ($rOrig - $rBlur)) + $rOrig)) : $rOrig;
					$gNew = (abs($gOrig - $gBlur) >= $threshold) ? max(0, min(255, ($amount * ($gOrig - $gBlur)) + $gOrig)) : $gOrig;
					$bNew = (abs($bOrig - $bBlur) >= $threshold) ? max(0, min(255, ($amount * ($bOrig - $bBlur)) + $bOrig)) : $bOrig;
					
					if (($rOrig != $rNew) || ($gOrig != $gNew) || ($bOrig != $bNew))
						{
		    			$pixCol = ImageColorAllocate($img, $rNew, $gNew, $bNew);
		    			ImageSetPixel($img, $x, $y, $pixCol);
						}
					}
				}
			return $img;
		}
		
		function getFiles($fn = '')
        {
            $list = array();
            if ($handle = opendir($this->folder))
                while (false !== ($file = readdir($handle))) if ($file[0] != '.')
                {
                	if (ereg('^(.*)\.([A-Za-z0-9]+)$', $file, $rtmp)) 
                   	{
                   		if (count($this->extensions) > 0)
                		{
                        	if (in_array('.'.$rtmp[2],  $this->extensions)) $list[] = $file;         
                		}
                   		else 
                   		{
                   			$list[] = $file;
                   		}
                   	}                	
                }
            sort($list);
            return $list;
        }
        
        function getSize($fn)
        {
        	if (file_exists($this->folder.$fn))
			{								
				$size = getimagesize($this->folder.$fn);
				return array('w'=>$size[0], 'h'=>$size[1], 'type'=>$size['mime']);				
			}
			else 
			{
				return array();
			}
        }
	}
	
	class picture_upload extends upload 
	{
		var $width = 0;
		var $height = 0;
		function setValidFiles()
		{
			$this->valid_files = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
		}

		function validateSize($mw, $mh, $ms) 
		{
			$s = $this->size;
			if(list($this->width, $this->height, $t, $a) = @getimagesize($this->tmp_name))
				if($this->width < $mw && $this->height < $mh && $s < $ms) return 1;							
			return 0;			
		}
		
		function getSize($fn)
		{
			if (file_exists($this->folder.$fn))
			{								
				$size = getimagesize($this->folder.$fn);
				$size['ext'] = $this->getExt();
				return array('w'=>$size[0], 'h'=>$size[1], 'ext'=>$size['ext'], 'size'=>$this->size);				
			}
			else 
			{
				return array();
			}
		}
	}
	
	class document_upload extends upload 
	{
		function setValidFiles()
		{
			$this->valid_files = array('image/gif', 'image/jpeg', 'image/pjpeg', 'application/msword', 'text/plain', 'application/pdf');
		}

		function validateSize($ms) 
		{
			$s = $this->size;
			if($s < $ms) return 1;							
			return 0;			
		}
		
		function getSize($fn)
		{
			if (file_exists($this->folder.$fn))
			{								
				$size = getimagesize($this->folder.$fn);
				$size['ext'] = $this->getExt();
				return array('ext'=>$size['ext'], 'size'=>$this->size);				
			}
			else 
			{
				return array();
			}
		}
	}
?>