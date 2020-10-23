<?php

include ('index.php');

$array_of_products =array();
$array_of_currency = array();
$combination_product = 0;
$combination_currency = 0;


	if(isset($_POST['submit']))
	{
		// echo $_POST['currency'] . '<br />';
		

		$combination_product = $_POST['products_form'];
		$combination_currency = $_POST['currency_form'];
		$string1 = $combination_product[0];
	    $string2 = $combination_currency;
	    $array_of_products = explode(",",$string1);
	    array_push($array_of_currency, $string2);
	}

$x = new Product($array_of_products,$array_of_currency);
echo $x->Compare($array_of_products,$array_of_currency);
echo $x->Discount_of_Shoes($array_of_products,$array_of_currency);
echo $x->Discount_of_Tshirts($array_of_products,$array_of_currency);
echo $x->Total($array_of_products,$array_of_currency);






?> 





<!DOCTYPE html>
<html>
	
	<?php include('header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Product and Your Currency</h4>
		<form class="white" action="test.php" method="POST">
			<label>Products (comma separated)</label>
			<input type="text" name="products_form[]">
			<label>Currency</label>
			<input type="text" name="currency_form">
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>


</html>



