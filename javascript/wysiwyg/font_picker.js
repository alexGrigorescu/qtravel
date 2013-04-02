/*** Font Picker Object ***/
var arrFontPickerObjects=[];
function FontPicker(sName)
{
    this.oName=sName;
    this.oRenderName=sName;

    arrFontPickerObjects.push(this.oName);

    this.onShow=function(){return true;};
    this.onHide=function(){return true;};
    this.pickFont=pickFont;
    this.onPickFont=function(){return true;};
    this.onRemoveFont=function(){return true;};
    this.show=showFontPicker;
    this.hide=hideFontPicker;
    this.hideAll=hideFontPickerAll;
    this.font;
    this.isActive=false;
    this.align="right";

    this.width = '149px';
    this.width_int = '149';
    this.height = '118px';
    
    this.selectStyle="width:141px;";
    
    this.RENDER=drawFontPicker;
}
    
function drawFontPicker()
{
    var arrFontFamilies=["verdana, helvetica, sans-serif", "verdana, times, sans-serif", "arial, helvetica, sans-serif", "georgia, courier, sans-serif"];
    var arrFontStyles=["normal", "italic", "oblique"];
	var arrFontWeights=["normal", "bold", "bolder", "lighter", "100", "200", "300", "400", "500", "600", "700", "800", "900"];
    var arrFontSizes=new Array();
	var j = 0;
    for (var i=8; i<17; i++)
		arrFontSizes[j++] = i+"px";
    
	for (var i=18; i<32; i+=2)
		arrFontSizes[j++] = i+"px";

	var sHTMLFont = '<div class="font_picker" id="dropFont_'+this.oRenderName+'" style="width:'+this.width+'; height:'+this.height+';">';
    sHTMLFont += '<div class="font_parameters">';
    
	sHTMLFont += '<select style="'+this.selectStyle+'" id="'+this.oName+'_font_familly" name="'+this.oName+'_font_familly">';
		for (var i=0; i<arrFontFamilies.length; i++)
			sHTMLFont += '<option '+(this.font.indexOf(arrFontFamilies[i]) != -1 ? 'selected' : '')+' value="'+arrFontFamilies[i]+'">'+arrFontFamilies[i]+'</option>';
	sHTMLFont += '</select>';

	sHTMLFont += '<br/><select style="'+this.selectStyle+'" id="'+this.oName+'_font_style" name="'+this.oName+'_font_style">';
		for (var i=0; i<arrFontStyles.length; i++)
			sHTMLFont += '<option '+(this.font.indexOf(arrFontStyles[i]) != -1 ? 'selected' : '')+' value="'+arrFontStyles[i]+'">'+arrFontStyles[i]+'</option>';
	sHTMLFont += '</select>';

	sHTMLFont += '<br/><select style="'+this.selectStyle+'" id="'+this.oName+'_font_weight" name="'+this.oName+'_font_weight">';
		for (var i=0; i<arrFontWeights.length; i++)
			sHTMLFont += '<option '+(this.font.indexOf(arrFontWeights[i]) != -1 ? 'selected' : '')+' value="'+arrFontWeights[i]+'">'+arrFontWeights[i]+'</option>';
	sHTMLFont += '</select>';

	sHTMLFont += '<br/><select style="'+this.selectStyle+'" id="'+this.oName+'_font_size" name="'+this.oName+'_font_size">';
		for (var i=0; i<arrFontSizes.length; i++)
			sHTMLFont += '<option '+(this.font.indexOf(arrFontSizes[i]) != -1 ? 'selected' : '')+' value="'+arrFontSizes[i]+'">'+arrFontSizes[i]+'</option>';
	sHTMLFont += '</select>';
	
    sHTMLFont += '</div>';
	
	sHTMLFont += '<div class="close_button" onclick="'+this.oName+'.onRemoveFont();'
			   +this.oName+'.hideAll();">x</div>';
	
	sHTMLFont += '<div class="select_button" onclick="'+this.oName+'.pickFont();'
			   +this.oName+'.hideAll();">ok</div>';
	
	sHTMLFont += '</div>';

    document.write(sHTMLFont);
}
    
function pickFont()
{
	var font = document.getElementById(this.oName+'_font_style').value+' '+
			   document.getElementById(this.oName+'_font_weight').value+' '+
			   document.getElementById(this.oName+'_font_size').value+' '+
			   document.getElementById(this.oName+'_font_familly').value;
	
	this.font = font;
	this.onPickFont();
	this.hideAll();
}

function showFontPicker(oEl)
{
    this.onShow();
    
    this.hideAll();

    var box=document.getElementById("dropFont_"+this.oRenderName);

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

function hideFontPicker()
{
    this.onHide();

    var box=document.getElementById("dropFont_"+this.oRenderName);
    box.style.display="none";
    this.isActive=false;
}

function hideFontPickerAll()
{
    for(var i=0;i<arrFontPickerObjects.length;i++)
    {
        var box=document.getElementById("dropFont_"+eval(arrFontPickerObjects[i]).oRenderName);
        box.style.display="none";
        eval(arrFontPickerObjects[i]).isActive=false;
    }
}