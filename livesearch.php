<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("links.xml");

$x=$xmlDoc->getElementsByTagName('link');
//get the q parameter from URL
$q=$_GET["term"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $array = array();
  $len=strlen($q);
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
		$name=$y->item(0)->childNodes->item(0)->nodeValue;
        if (stristr($q, substr($name, 0, $len))) {
			
       $array[] = array (
            'label' => $y->item(0)->childNodes->item(0)->nodeValue,
            'value' => $z->item(0)->childNodes->item(0)->nodeValue,
        );
    }
  }
}
  }

echo json_encode ($array);
?>