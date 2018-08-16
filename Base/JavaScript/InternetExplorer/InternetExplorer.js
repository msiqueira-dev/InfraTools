var selects = document.getElementsByTagName('select');
var ua = window.navigator.userAgent;
var msie = ua.indexOf('MSIE ');
if(msie > 0)
{
	for(var z=0; z<selects.length; z++)
	{
		selects[z].style.height = '28px';
	}
	if(parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))) == 8)
	{
		for(var z=0; z<selects.length; z++)
		{
			selects[z].style.paddingBottom = "4px";
		}
	}
}