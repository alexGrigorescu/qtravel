/*** Border Picker Object ***/
var arrBorderPickerObjects=[];
function BorderPicker(sName)
{
    this.oName=sName;
    this.oRenderName=sName;

    arrBorderPickerObjects.push(this.oName);

    this.onShow=function(){return true;};
    this.onHide=function(){return true;};
    this.pickBorder=pickBorder;
    this.onPickBorder=function(){return true;};
    this.onRemoveBorder=function(){return true;};
    this.show=showBorderPicker;
    this.hide=hideBorderPicker;
    this.hideAll=hideBorderPickerAll;
    this.border;
    this.isActive=false;
    this.align="right";

    this.width = '149px';
    this.width_int = '149';
    this.height = '98px';
    
    this.selectStyle="width:141px;";
    
    this.top_txt = 'Top';
    this.right_txt = 'Right';
    this.bottom_txt = 'Bottom';
    this.left_txt = 'Left';
    this.color_pick_txt = 'Pick';
    
    this.RENDER=drawBorderPicker;
}
    
function drawBorderPicker()
{
	var arrStyles = ["none", "solid", "dotted", "dashed", "double", "groove", "ridge", "inset", "outset"];
	
	var arrWeights=new Array();
    for (var i=0; i<10; i++)
		arrWeights[i] = (i+1)+"px";

	var sHTMLBorder = '<div class="border_picker" id="dropBorder_'+this.oRenderName+'" style="width:'+this.width+'; height:'+this.height+';">';
    sHTMLBorder += '<div class="border_parameters">';

	sHTMLBorder += '<select style="'+this.selectStyle+'" id="'+this.oName+'_style" name="'+this.oName+'_style">';
		for (var i=0; i<arrStyles.length; i++)
			sHTMLBorder += '<option '+(this.border.indexOf(arrStyles[i]) != -1 ? 'selected' : '')+' value="'+arrStyles[i]+'">'+arrStyles[i]+'</option>';
	sHTMLBorder += '</select>';
    
	sHTMLBorder += '<br/><select style="'+this.selectStyle+'" id="'+this.oName+'_weight" name="'+this.oName+'_weight">';
		for (var i=0; i<arrWeights.length; i++)
			sHTMLBorder += '<option '+(this.border.indexOf(arrWeights[i]) != -1 ? 'selected' : '')+' value="'+arrWeights[i]+'">'+arrWeights[i]+'</option>';
	sHTMLBorder += '</select>';

	sHTMLBorder += '<input style="padding:0; margin:0; width:75px;" id="'+this.oName+'_color" name="'+this.oName+'_color" type="text" value="'+this.border.substr(this.border.indexOf('#'))+'"/>';
	sHTMLBorder += '<scri'+'pt type="text/ja'+'vascript" lang'+'uage="JavaS'+'cript">'
				   +'var '+this.oName+'_color_picker'+' = new ColorPicker("'+this.oName+'_color_picker'+'");'
	        	   +this.oName+'_color_picker'+'.onPickColor = new Function("document.getElementById(\''+this.oName+'_color'+'\').value='+this.oName+'_color_picker'+'.color;");'
	        	   +this.oName+'_color_picker'+'.RENDER();'
	        	   +'</sc'+'ript>';

	sHTMLBorder += '<input style="height:20px; width:30px;" class="button" id="'+this.oName+'_color_button" name="'+this.oName+'_color_button" type="button" value="'+this.color_pick_txt+'"'
					+'onclick="if ('+this.oName+'_color_picker'+'.isActive) '+this.oName+'_color_picker'+'.hide(); else '+this.oName+'_color_picker'+'.show(this);'
					+'document.getElementById(\'dropColor_'+this.oName+'_color_picker'+'\').style.top=\'70\';'
					+'"/>';
	
    sHTMLBorder += '</div>';
	
	sHTMLBorder += '<div class="close_button" onclick="'+this.oName+'.onRemoveBorder();'
			   +this.oName+'.hideAll();">x</div>';
	
	sHTMLBorder += '<div class="select_button" onclick="'+this.oName+'.pickBorder();'
			   +this.oName+'.hideAll();">ok</div>';
	
	sHTMLBorder += '</div>';

    document.write(sHTMLBorder);
}
    
function pickBorder()
{
	if (document.getElementById(this.oName+'_style').value == 'none')
		var border = 0;
	else
		var border = document.getElementById(this.oName+'_style').value+' '+
			   document.getElementById(this.oName+'_weight').value+' '+
			   document.getElementById(this.oName+'_color').value;
	
	this.border = border;
	this.onPickBorder();
	this.hideAll();
}

function showBorderPicker(oEl)
{
    this.onShow();
    
    this.hideAll();

    var box=document.getElementById("dropBorder_"+this.oRenderName);

    box.style.display="block";
    var nTop=0;
    var nLeft=0;

    oElTmp=oEl;
    while(oElTmp.tagName!="BODY" && oElTmp.tagName!="HTML")
    {
        if(oElTmp.style.top!="")
            nTop+=oElTmp.style.top.substring(1,oElTmp.style.top.length-2)*1;
        else
        	nTop+=oElTmp.offsetTop;

    	oElTmp = oElTmp.offsetParent;
    }

    oElTmp=oEl;
    while(oElTmp.tagName!="BODY" && oElTmp.tagName!="HTML")
    {
        if(oElTmp.style.left!="")
            nLeft+=oElTmp.style.left.substring(1,oElTmp.style.left.length-2)*1;
        else
        	nLeft+=oElTmp.offsetLeft;

        oElTmp=oElTmp.offsetParent;
    }
    
    if(this.align=="left")
        box.style.left=nLeft;
    else
        box.style.left=nLeft-this.width_int+oEl.offsetWidth;
        
    box.style.top=nTop+1+oEl.offsetHeight;
    
    this.isActive=true;
}

function hideBorderPicker()
{
    this.onHide();

    var box=document.getElementById("dropBorder_"+this.oRenderName);
    box.style.display="none";
    this.isActive=false;
}

function hideBorderPickerAll()
{
    for(var i=0;i<arrBorderPickerObjects.length;i++)
    {
        var box=document.getElementById("dropBorder_"+eval(arrBorderPickerObjects[i]).oRenderName);
        box.style.display="none";
        eval(arrBorderPickerObjects[i]).isActive=false;
    }
}