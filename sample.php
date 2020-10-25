<?php
include ('index.php');
$array_of_products = ['T-shirt' , 'T-shirt' , 'Shoes' , 'Jacket'];    //User Entery of Products
$array_of_currency = ['USD'];                                         //User Entery of currency
$sample1 = new Product($array_of_products,$array_of_currency);
		echo $sample1->Compare($array_of_products,$array_of_currency);
		echo $sample1->Discount_of_Shoes($array_of_products,$array_of_currency);
		echo $sample1->Discount_of_Tshirts($array_of_products,$array_of_currency);
		echo $sample1->Total($array_of_products,$array_of_currency);




?>