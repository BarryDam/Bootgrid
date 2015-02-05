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