<?php
echo 
"
<script>
function addLoadEvent(func) 
{
	var oldonload = window.onload;
	if (typeof window.onload != 'function')
	{
		window.onload = func;
	} else 
	{
		window.onload = function () 
		{
			if (oldonload) 
			{
				oldonload();
			}
			func();
		}
	}
}

function FormAsync() 
{
	var mycode;
	mycode = document.createElement('script');
	mycode.type = 'text/javascript';
	mycode.src = '" . $this->Config->DefaultServerJavaScript . "Form/Form.js';
	document.getElementsByTagName('head')[0].appendChild(mycode);
}

function InternetExplorerAsync() 
{
	var mycode;
	mycode = document.createElement('script');
	mycode.type = 'text/javascript';
	mycode.src = '" . $this->Config->DefaultServerJavaScript . "InternetExplorer/InternetExplorer.min.js';
	document.getElementsByTagName('head')[0].appendChild(mycode);
}

function TabsAsync() 
{
	var mycode;
	mycode = document.createElement('script');
	mycode.type = 'text/javascript';
	mycode.src = '" . $this->Config->DefaultServerJavaScript . "Tabs/Tabs.js';
	document.getElementsByTagName('head')[0].appendChild(mycode);
}
";
echo "</script>";
if($this->Page == str_replace("_","", ConfigInfraTools::PAGE_REGISTER)            
    || $this->PageBody == ConfigInfraTools::PAGE_ADMIN_USER_UPDATE 
    || $this->PageBody == ConfigInfraTools::PAGE_ADMIN_USER_REGISTER 
    || $this->PageBody == ConfigInfraTools::PAGE_ACCOUNT_UPDATE)
{
	echo "<script 
	              src='http://maps.googleapis.com/maps/api/js?key=" 
		               . $this->Config->DefaultGoogleMapsApiKey . 
		               "&libraries=places'>
	      </script>";
	echo '<script src="' . $this->Config->DefaultServerJavaScript . 'Google/GoogleMaps.js"></script>';
}
echo '<script>addLoadEvent(FormAsync); addLoadEvent(TabsAsync); addLoadEvent(InternetExplorerAsync);</script>';
?>