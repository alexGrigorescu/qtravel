/*** Padding Picker Object ***/
var arrPaddingPickerObjects=[];
function PaddingPicker(sName)
{
    this.oName=sName;
    this.oRenderName=sName;

    arrPaddingPickerObjects.push(this.oName);

    this.onShow=function(){return true;};
    this.onHide=function(){return true;};
    this.pickPadding=pickPadding;
    this.onPickPadding=function(){return true;};
    this.onRemovePadding=function(){return true;};
    this.show=showPaddingPicker;
    this.hide=hidePaddingPicker;
    this.hideAll=hidePaddingPickerAll;
    this.padding;
    this.isActive=false;
    this.align="right";

    this.width = '149px';
    this.width_int = '149';
    this.height = '118px';
    
    this.selectStyle="width:95px;";
    
    this.top_txt = 'Top';
    this.right_txt = 'Right';
    this.bottom_txt = 'Bottom';
    this.left_txt = 'Left';
    
    this.RENDER=drawPaddingPicker;
}
    
function drawPaddingPicker()
{
    var arrPaddings=new Array();
	for (var i=0; i<11; i++)
		arrPaddings[i] = i+"px";

	for (var i=12; i<32; i+=2)
		arrPaddings[(10+((i-10)/2))] = i+"px";
		
	var paddings = this.padding.split(' ');
	if (this.padding > ''); else
		paddings[0] = '0px'; 
	
	if (paddings.length == 1)
	{
		paddings[1] = paddings[0];
		paddings[2] = paddings[0];
		paddings[3] = paddings[0];
	}
	
	var sHTMLPadding = '<div class="padding_picker" id="dropPadding_'+this.oRenderName+'" style="width:'+this.width+'; height:'+this.height+';">';
    sHTMLPadding += '<div class="padding_parameters"><table class="padding_boxes" cellpadding="0" cellspacing="0" border="0">';
    
    sHTMLPadding += '<tr><td class="txt">'+this.top_txt+'</td><td>';
	sHTMLPadding += '<select style="'+this.selectStyle+'" id="'+this.oName+'_top" name="'+this.oName+'_top">';
		for (var i=0; i<arrPaddings.length; i++)
			sHTMLPadding += '<option '+((paddings[0] == arrPaddings[i]) ? 'selected' : '')+' value="'+arrPaddings[i]+'">'+arrPaddings[i]+'</option>';
	sHTMLPadding += '</select></td></tr>';

    sHTMLPadding += '<tr><td class="txt">'+this.right_txt+'</td><td>';
	sHTMLPadding += '<select style="'+this.selectStyle+'" id="'+this.oName+'_right" name="'+this.oName+'_right">';
		for (var i=0; i<arrPaddings.length; i++)
			sHTMLPadding += '<option '+((paddings[1] == arrPaddings[i]) ? 'selected' : '')+' value="'+arrPaddings[i]+'">'+arrPaddings[i]+'</option>';
	sHTMLPadding += '</select></td></tr>';

    sHTMLPadding += '<tr><td class="txt">'+this.bottom_txt+'</td><td>';
	sHTMLPadding += '<select style="'+this.selectStyle+'" id="'+this.oName+'_bottom" name="'+this.oName+'_bottom">';
		for (var i=0; i<arrPaddings.length; i++)
			sHTMLPadding += '<option '+((paddings[2] == arrPaddings[i]) ? 'selected' : '')+' value="'+arrPaddings[i]+'">'+arrPaddings[i]+'</option>';
	sHTMLPadding += '</select></td></tr>';

    sHTMLPadding += '<tr><td class="txt">'+this.left_txt+'</td><td>';
	sHTMLPadding += '<select style="'+this.selectStyle+'" id="'+this.oName+'_left" name="'+this.oName+'_left">';
		for (var i=0; i<arrPaddings.length; i++)
			sHTMLPadding += '<option '+((paddings[3] == arrPaddings[i]) ? 'selected' : '')+' value="'+arrPaddings[i]+'">'+arrPaddings[i]+'</option>';
	sHTMLPadding += '</select></td></tr>';
	
    sHTMLPadding += '</table></div>';
	
	sHTMLPadding += '<div class="close_button" onclick="'+this.oName+'.onRemovePadding();'
			   +this.oName+'.hideAll();">x</div>';
	
	sHTMLPadding += '<div class="select_button" onclick="'+this.oName+'.pickPadding();'
			   +this.oName+'.hideAll();">ok</div>';
	
	sHTMLPadding += '</div>';

    document.write(sHTMLPadding);
}
    
function pickPadding()
{
	var padding = document.getElementById(this.oName+'_top').value+' '+
			   document.getElementById(this.oName+'_right').value+' '+
			   document.getElementById(this.oName+'_bottom').value+' '+
			   document.getElementById(this.oName+'_left').value;
	
	this.padding = padding;
	this.onPickPadding();
	this.hideAll();
}

function showPaddingPicker(oEl)
{
    this.onShow();
    
    this.hideAll();

    var box=document.getElementById("dropPadding_"+this.oRenderName);

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

function hidePaddingPicker()
{
    this.onHide();

    var box=document.getElementById("dropPadding_"+this.oRenderName);
    box.style.display="none";
    this.isActive=false;
}

function hidePaddingPickerAll()
{
    for(var i=0;i<arrPaddingPickerObjects.length;i++)
    {
        var box=document.getElementById("dropPadding_"+eval(arrPaddingPickerObjects[i]).oRenderName);
        box.style.display="none";
        eval(arrPaddingPickerObjects[i]).isActive=false;
    }
}