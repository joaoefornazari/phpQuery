<?php

	include_once('./html-classes.php');

	# creating a DOM_Element for the h1 header
	$header = new DOM_Element(
		'h1', 
		[],
		"phpQuery"
	);

	# setting style as property
	$header->setProperties(["style", "font-size: 24px; font-family: Noto Sans; color: rgb(200,15,0);"]);

	$p = new DOM_Element(
		'p',
		["style", "font-size: 14px; font-family: Noto Sans; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);"],
		""
	);

	#setting content
	$p->setContent(
		"Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Maecenas eget quam vel massa dapibus sagittis. 
		Curabitur congue tortor vulputate, convallis nunc quis, ultrices leo. 
		In hac habitasse platea dictumst. Pellentesque eget dui maximus, imperdiet augue ut, semper neque. 
		Proin aliquet non turpis sed cursus. In tristique interdum justo nec malesuada.
		Fusce pulvinar luctus ex, in placerat urna luctus at.
		<br><br>
		Abra phpContent.php em um editor para ver como tudo está montado.
		"
	);

	# putting a DOM_Element inside another
	$div = new DOM_Element(
		'div',
		["style", "padding: 5px 3px; margin-top: 15px;"],
		$p->constructHTML()
	);

	# returning it to main page
	if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if ($_REQUEST["req"] == "getHeader") {
      echo $header->constructHTML();
    }

		if($_REQUEST["req"] == "getBody") {
			echo $div->constructHTML();
		}
  }

?>