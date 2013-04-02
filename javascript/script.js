var ns4 = (document.layers)? true:false;
var ie4 = (document.all)? true:false;
var ns6 = (document.getElementById && !document.all) ? true: false;
var dragObj = new Object();
dragObj.zIndex = 1;

if (ns6) {
	document.addEventListener("mousemove", mouseMove, true);
}
if (ns4) {
	document.captureEvents(Event.MOUSEMOVE);
	document.mousemove = mouseMove;
}
function mouseMove(e) {
	if (ns4||ns6)	{
		mouse_x = e.pageX;
		mouse_y = e.pageY;
	}
	
	if (ie4) {
		mouse_x = event.x;
		mouse_y = event.y;
	}

	if (ie4) {
		mouse_x += document.documentElement.scrollLeft;
		mouse_y += document.documentElement.scrollTop;
	} else {
		mouse_x += document.body.scrollLeft;
		mouse_y += document.body.scrollTop;
	}

	return true;
}

function dragStart(event, mover, form) 
{
	var el;
	var x, y;
	
	var Obj = document.getElementById(mover);
	if (!Obj) {
		return false;
	}
	
	dragObj.elNode = Obj;
	dragObj.formName = form;
	
	if (ie4) {
		x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
		y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	} else {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
	}
	
	dragObj.cursorStartX = x;
	dragObj.cursorStartY = y;
	dragObj.elStartLeft  = parseInt(dragObj.elNode.style.left, 10);
	dragObj.elStartTop   = parseInt(dragObj.elNode.style.top,  10);

	if (isNaN(dragObj.elStartLeft)) {
		dragObj.elStartLeft = 0;
	}
	if (isNaN(dragObj.elStartTop)) {
		dragObj.elStartTop  = 0;
	}
	
	if (ie4) {
		document.attachEvent("onmousemove", dragGo);
		document.attachEvent("onmouseup",   dragStop);
		window.event.cancelBubble = true;
		window.event.returnValue = false;
	} else {
		document.addEventListener("mousemove", dragGo,   true);
		document.addEventListener("mouseup",   dragStop, true);
		event.preventDefault();
	}
}

function dragStop(event) {
	if (ie4) {
		document.detachEvent("onmousemove", dragGo);
		document.detachEvent("onmouseup",   dragStop);
	} else {
		document.removeEventListener("mousemove", dragGo,   true);
		document.removeEventListener("mouseup",   dragStop, true);
	}
}

function dragGo(event) {
	var x, y;

	if (ie4) {
		x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
		y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	} else {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
	}
	
	dragObj.elNode.style.left = (dragObj.elStartLeft + x - dragObj.cursorStartX) + "px";
	dragObj.elNode.style.top = (dragObj.elStartTop  + y - dragObj.cursorStartY) + "px";
	
	if (ie4) {
		window.event.cancelBubble = true;
		window.event.returnValue = false;
	} else {
		event.preventDefault();
	}
}

function code(source, dest)
{
	var value = $('#'+source).val();
	value = value.toLowerCase();
	value = value.replace(/^\s+|\s+$/g, '');		
	value = value.replace(/\s+/g, '-');		
	value = value.replace(/[^a-z\-]/g, '');
	value = value.replace(/\-+/g, '-');
	if (value[value.length-1] == '-') 
	{
		value = value.substr(0, value.length-1);
	}
	if (value[0] == '-') 
	{
		value = value.substr(1, value.length-1);
	}
	$('#'+dest).val(value);
}