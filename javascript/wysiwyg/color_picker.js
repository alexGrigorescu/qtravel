/*** Color Picker Object ***/
var arrColorPickerObjects=[];
function ColorPicker(sName)
{
    this.oName=sName;
    this.oRenderName=sName;

    arrColorPickerObjects.push(this.oName);

    this.onShow=function(){return true;};
    this.onHide=function(){return true;};
    this.pickColor=pickColor;
    this.onPickColor=function(){return true;};
    this.onHideColor=function(){return true;};
    this.show=showColorPicker;
    this.hide=hideColorPicker;
    this.hideAll=hideColorPickerAll;
    this.color;
    this.isActive=false;
    this.align="right";

    this.width = '143px';
    this.width_int = '143';
    this.height = '112px';
    this.td_width = '11px';
    this.td_height = '11px';
    
    this.margin = "6";
    
    this.RENDER=drawColorPicker;
}
    
function drawColorPicker()
{
    var arrColors=[["#800000","#8b4513","#006400","#2f4f4f","#000080","#4b0082","#800080","#000000"],
                ["#ff0000","#daa520","#6b8e23","#708090","#0000cd","#483d8b","#c71585","#696969"],
                ["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"],
                ["#ff6347","#ffd700","#32cd32","#87ceeb","#00bfff","#9370db","#ff69b4","#dcdcdc"],
                ["#ffdab9","#ffffe0","#98fb98","#e0ffff","#87cefa","#e6e6fa","#dda0dd","#ffffff"]]

	var sHTMLColor = '<div class="color_picker" id="dropColor_'+this.oRenderName+'" style="width:'+this.width+'; height:'+this.height+';">';
    
	sHTMLColor += '<table class="colors" cellpadding="0" cellspacing="'+this.margin+'" border="0" unselectable="on">';
	
    for (var i=0; i<arrColors.length; i++)
    {
        sHTMLColor += '<tr>';
        
        for (var j=0; j<arrColors[i].length; j++)
			sHTMLColor += '<td onclick="'+this.oName+'.pickColor(\''+arrColors[i][j]+'\');"' 
										 +'style="background-color:'+arrColors[i][j]+'; width:'+this.td_width+'; height:'+this.td_height+';" unselectable="on">'
                						 +'</td>';
        
    	sHTMLColor += '</tr>';        
    }
    
    sHTMLColor += '</table>';            
    
	sHTMLColor += '<div class="close_button" onclick="'+this.oName+'.onHideColor();'
			   +this.oName+'.hideAll();">x</div>';
			   
    sHTMLColor += '</div>';

    document.write(sHTMLColor);
}
    
function pickColor(color)
{
	this.color = color;
	this.onPickColor();
	this.currColor = color;
	this.hideAll();
}

function showColorPicker(oEl)
{
    this.onShow();
    
    this.hideAll();

    var box=document.getElementById("dropColor_"+this.oRenderName);

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

function hideColorPicker()
{
    this.onHide();

    var box=document.getElementById("dropColor_"+this.oRenderName);
    box.style.display="none";
    this.isActive=false;
}

function hideColorPickerAll()
{
    for(var i=0;i<arrColorPickerObjects.length;i++)
    {
        var box=document.getElementById("dropColor_"+eval(arrColorPickerObjects[i]).oRenderName);
        box.style.display="none";
        eval(arrColorPickerObjects[i]).isActive=false;
    }
}
    
function convertHexToDec(hex)
{
    return parseInt(hex,16);
}
    
function convertDecToHex(dec)
{
    var tmp = parseInt(dec).toString(16);
    if(tmp.length == 1) tmp = ("0" +tmp);
    return tmp;//.toUpperCase();
}
    
function convertDecToHex2(dec)
{
    var tmp = parseInt(dec).toString(16);

    if(tmp.length == 1) tmp = ("00000" +tmp);
    if(tmp.length == 2) tmp = ("0000" +tmp);
    if(tmp.length == 3) tmp = ("000" +tmp);
    if(tmp.length == 4) tmp = ("00" +tmp);
    if(tmp.length == 5) tmp = ("0" +tmp);

    tmp = tmp.substr(4,1) + tmp.substr(5,1) + tmp.substr(2,1) + tmp.substr(3,1) + tmp.substr(0,1) + tmp.substr(1,1)
    return tmp;//.toUpperCase();
}
    
//input color in format rgb(R,G,B)
//ex, return by document.queryCommandValue(forcolor)
function extractRGBColor(col)
{
    var re = /rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)/i;
    if (re.test(col))
    {
        var result = re.exec(col);
        return convertDecToHex(parseInt(result[1])) + 
               convertDecToHex(parseInt(result[2])) + 
               convertDecToHex(parseInt(result[3]));
    }
    return convertDecToHex2(0);
}