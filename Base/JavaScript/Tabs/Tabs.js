function TabsSelect(DivId)
{
	var tabsDiv = document.getElementById('tabs');
  	for(var x=0; x <tabsDiv.childNodes.length; x++)
  	{
		
		if(tabsDiv.childNodes.item(x).id != null && tabsDiv.childNodes.item(x).tagName != "UL")
		{
			if (tabsDiv.childNodes.item(x).id.indexOf("tabs-") >= 0)
			{
				if(tabsDiv.childNodes.item(x).className != null)
					tabsDiv.childNodes.item(x).className = tabsDiv.childNodes.item(x).className.replace("NotHiddenTab", "HiddenTab");
			}
		}
  	}
	document.getElementById(DivId).className = document.getElementById(DivId).className.replace("HiddenTab", "NotHiddenTab");
}