<base target="_self">
<html>
	<head>
		<style>
			{literal}
			table.grid { font-size:10px; width:100%; border: solid 0px #000000; }
			table.grid td.title a { font-weight:bold; color: #ff0000; }
			table.grid td.header { background: url({/literal}{$img_path}{literal}header_bg.gif) 50% 50% #E9E8F2; color: #000; font-weight:bold; font-size:13px; padding: 3px; padding-left: 5px; height:16px; margin-bottom:0px;}
			table.grid td.row0 { }
			table.grid td.row1 { }
			table.grid td.cell0 { padding:5px; font-size:12px; background-color: #f7f7f7; height:20px; color: #000000;}
			table.grid td.cell1 { padding:5px; font-size:12px; background-color: #fefefe; height:20px; color: #000000; }
			table.grid td.norec { background-color: #000000; }
			table.grid td.footer { font-size:13px; background-color: #fefefe; height:25px}
			table.grid td.cell0 A { color: #0096FF; }
			table.grid td.cell1 A { color: #0096FF; }
			{/literal}
		</style>
		<title>Filemanager</title>
		{literal}
		<script type="text/javascript" language="JavaScript">
			function select_file(url, file)
			{
				file = url+file;
				var extension = file.substring(file.lastIndexOf('.')+1, file.length);
				extension = extension.toUpperCase();
				
				var x_html = '';
				switch (extension)
				{
					case 'GIF':
					case 'JPG':
					case 'PNG':
					case 'JPEG':
						x_html = '<img src="'+file+'"/>';
						break;
						
					case 'SWF':
						x_html = '<object ' +
							'classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ' + "\n" +
							'width="100%" ' + "\n" +
							'height="100%" ' + "\n" +
							'codebase="http://active.macromedia.com/flash6/cabs/swflash.cab#version=6.0.0.0">' + "\n" +
							'	<param name="movie" value="'+file+'">' + "\n" +
							'	<param name="quality" value="high">' + "\n" +
							'	<embed src="'+file+'"' + "\n" +
							'		width="100%" ' + "\n" +
							'		height="100%" ' + "\n" +
							'		quality="high" ' + "\n" +
							'		pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">' + "\n" +
							'	</embed>'+ "\n" +
							'</object>';
							break;
							
					case 'WMV':
					case 'AVI':
					case 'MPG':
						x_html = '<embed src="'+file+'" hidden="false" autostart="true" type="video/avi" loop="true"></embed>';
						break;
						
					case 'WMA':
					case 'WAV':
					case 'MID':
						x_html = '<embed src="'+file+'" hidden="false" autostart="true" type="audio/wav" loop="true"></embed>';
						break;
						
					default:
						x_html = 'Not Available';
				}
				
				document.getElementById("x_preview").innerHTML = x_html;
				document.getElementById('x_file').value = file;
			}
			
			var ok_was_selected = 'false';
			function select_file_ok()
			{
				var file_return = document.getElementById('x_file').value;
				if(navigator.appName.indexOf('Microsoft')!=-1)
					window.returnValue = file_return;
				else
					window.opener.setAssetValue(file_return);
				
				ok_was_selected = true;
				self.close();
			}
			
			function select_file_unload()
			{
				if (navigator.appName.indexOf('Microsoft')!=-1)
					if(!ok_was_selected)
						window.returnValue="";
				else
					if(!ok_was_selected)
						window.opener.setAssetValue("");
			}
		</script>
		{/literal}
	</head>
	<body onunload="select_file_unload();" onload="this.focus();">
		<table cellpadding="0" cellspacing="0" border="0" style="height:100%; width:100%;">
		<tr><td id="main_content">
			<table cellpadding="0" cellspacing="0" border="0" style="width:100%; height:100%;">
			<tr>
				<td style="vertical-align:top;">
				<div style="overflow:auto; height:440px;">
					{$grid_img}
				</div>
				</td>
				<td style="padding-left:5px; vertical-align:top; text-align:left; width:300px;">
				<div style="border:solid 5px #d7d7d7; width:300px;"><div id="x_preview" style="text-align:center; overflow:auto; width:300px; height:250px;  background-color:#ffffff; margin:auto;"></div></div>
				<div><input readonly type="text" id="x_file" name="x_file" style="border:solid 1px #d7d7d7; width:310px; border:solid 1px #cfcfcf;"/></div>
				<div style="margin-top:130px; text-align:right;"><input type="button" class="button" value="OK" onclick="select_file_ok();"/></div>
				</td>
			</tr>
			</table>
		</td></tr>
		<tr><td id="bottom_bar">
			
		</td></tr>
		</table>
	</body>
</html>