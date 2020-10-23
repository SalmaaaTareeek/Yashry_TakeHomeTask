<?php

include ('index.php');

$array_of_products = ['T-shirt','T-shirt','Shoes'];
$array_of_currency = ['EGP'];
$x = new Product($array_of_products,$array_of_currency);
echo $x->Compare($array_of_products,$array_of_currency);
echo $x->Discount_of_Shoes($array_of_products,$array_of_currency);
echo $x->Discount_of_Tshirts($array_of_products,$array_of_currency);
echo $x->Total($array_of_products,$array_of_currency);






?> 



