<!DOCTYPE html>
<html>
	
	<?php include('header.php'); ?>   <!-- INCLUDING THE DESIGN OF THE FORM -->
<!-- This is a small form to make the user enter the products seprated by comma and The user Currency -->
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
	<section class="container grey-text">
		<h4 class="center">Your Bill</h4>

	<form class="white" action="test.php" method="POST">
			<?php
			include ('index.php');  //Including The overall class and function in index.php 
			$array_of_products =array();           //Initaliztion of array of products the we will pass the user variables in it
			$array_of_currency = array();          //Initiallization of array of Currency that we will pass the user variable in it
			$combination_product = 0;              //A variable will take the value from POST REQUEST from the HTML form for user products
			$combination_currency = 0;             //A variable will take the value from POST REQUEST from the HTML form for user Currency
			if(isset($_POST['submit']))            //Estimate wether the submit button is entered or not
			{
				$combination_product = $_POST['products_form'];       //will get the POST Request from the user for Product
				$combination_currency = $_POST['currency_form'];      //will get the POST Request from the user for Currency
				$string1 = $combination_product[0];                   //take the first value of combination_product var, it will be the combination of Products
	    		$string2 = $combination_currency;                     //take the currency as string
	    		$array_of_products = explode(",",$string1);           //splits the products
	    		array_push($array_of_currency, $string2);             //push the currency in the array 
			}
// INIT of The Class and the function
		$x = new Product($array_of_products,$array_of_currency);
		echo $x->Compare($array_of_products,$array_of_currency);
		echo $x->Discount_of_Shoes($array_of_products,$array_of_currency);
		echo $x->Discount_of_Tshirts($array_of_products,$array_of_currency);
		echo $x->Total($array_of_products,$array_of_currency);
?> 
		</form>
	
		
	</section>


</html>



