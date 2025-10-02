<?php 
//TODO: Maybe doing a constructor Pattern por generating Pubs?
require('class/Client.php');
require('class/Pub.php');
//TODO: Maybe import Table insided Pub only?
require('class/Table.php');


$table1 = new Table(1,3);
$table2 = new Table(2,7);
$table3 = new Table(3,10);
$table4 = new Table(4,4);
$tables = [$table1,$table2,$table3,$table4];

$client = new Client("Pepe");
$pub = new Pub($tables);
$client->reserve($pub);
$client->reserve($pub);

$client->getIn($pub);

