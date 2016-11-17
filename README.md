# Javascript files includes in footer

1. Create a new file called footer.php in <b>/libraries/joomla/document/html/renderer/</b> directory:

2. In <b>/libraries/joomla/document/document.php</b> add after

	````public $_scripts = array();````<br>
	this<br>
	````public $_footer_scripts = array();````

3. Add method **addFooterScript()** after the **addScript()** method 

	```php
	function addFooterScript($url, $type = "text/javascript", $defer = false, $async = false) {
		$this->_footer_scripts[$url]['mime'] = $type;
		$this->_footer_scripts[$url]['defer'] = $defer;
		$this->_footer_scripts[$url]['async'] = $async;
		return $this;
	 }
	```

4. In index.php in you template folder add just before the </body> tag <br>
	````<jdoc:include type="footer" />````

5. Done!
<br>
Now in layouts inside your template's folder you can use the following code to add javascript files to footer:

	````php
	$doc =& JFactory::getDocument();
	$doc->addFooterScript('JavaScript_File_Path.js');
	````


Nest Step : plugin 
