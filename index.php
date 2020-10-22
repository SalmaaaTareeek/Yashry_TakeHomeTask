<?php
//Importants Vars
$Sub_Total = 0;
$Tax_in_pounds = 0;



class Product {
	private $Products ;
	private $Currency ;

	public function __construct($Products , $Currency)
	{
		$this->Products = [
			               ['name'=>'T-shirt' , 'price' => 10.99] ,
		                   ['name' => 'Pants' , 'price' => 14.99],
		                   ['name' => 'Jacket', 'price' => 19.99],
		                   ['name' => 'Shoes' , 'price' => 24.99]
		                  ];
	 	$this->Currency = ['USD' => '/$' , 'EGP' => 'e '];                   

	}
	public function Compare(&$product_from_main) //This class For comparing The user entery with our Cart
	{
		
		
		foreach ($this->Products as &$product) 
		{
			for ($i = 0 ; $i<count($product_from_main) ; $i++)
			{
				if ($product['name'] == $product_from_main[$i])
				{
					global $Sub_Total;
					$Sub_Total = $Sub_Total + $product['price'];	
				}		

			}
	
		}
		global $Tax_in_pounds ;
		$Tax_in_pounds = $Sub_Total * (14/100);


		echo "Subtotal : $Sub_Total";
		echo '<br/>';
		echo "Taxes : $Tax_in_pounds";
	}
	//End of First Function
	//Start of Counting
	public function Taxes ()
	{

		
		
	}


}


$array_of_products = ['T-shirt','T-shirt','Shoes','Jacket'];
$array_of_currency = ['EGP' , 'USD'];
$x = new Product($array_of_products,$array_of_currency);
echo $x->Compare($array_of_products);






















?>