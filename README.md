[![PayPayl donate button](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XX68BNMVCD7YS "Donate once-off to this project using Paypal")

Bootgrid
===================
Class to create a correct jquery Bootgrid data api response (http://www.jquery-bootgrid.com/)

Example


##Using this class##
- Get one object by calling it's ID
```php
$array = array(
	array('id'=>1, 'sender'=> 'barry@test.nl'),
	array('id'=>2, 'sender'=> 'asdf@test.nl'),
	array('id'=>3, 'sender'=> 'barsdfa23ry@test.nl'),
	array('id'=>4, 'sender'=> '441@test.nl'),
	array('id'=>5, 'sender'=> 'adfdasf@test.nl'),
	array('id'=>6, 'sender'=> 'baasdfrry@test.nl'),
	array('id'=>7, 'sender'=> 'wfasd@test.nl'),
	array('id'=>8, 'sender'=> 'fdds@test.nl'),
	array('id'=>9, 'sender'=> 'assdd@test.nl'),
	array('id'=>10, 'sender'=> 'fff@test.nl'),
	array('id'=>11, 'sender'=> 'ffasdf@test.nl'),
);

$o = new bdBootgrid($array, array('sender'));
$a = $o->fetchByRequest();

echo json_encode($a);
```

##Result##
```json
{"current":1,"rowCount":10,"rows":[{"id":2,"sender":"asdf@test.nl"},{"id":3,"sender":"barsdfa23ry@test.nl"},{"id":4,"sender":"441@test.nl"},{"id":5,"sender":"adfdasf@test.nl"},{"id":6,"sender":"baasdfrry@test.nl"},{"id":7,"sender":"wfasd@test.nl"},{"id":8,"sender":"fdds@test.nl"},{"id":9,"sender":"assdd@test.nl"},{"id":10,"sender":"fff@test.nl"},{"id":11,"sender":"ffasdf@test.nl"}],"total":11}
````

##Buy me a beer##
[![PayPayl donate button](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XX68BNMVCD7YS "Donate once-off to this project using Paypal")