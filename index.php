<?php
//Importants Vars
$Sub_Total = 0;


class Product {
	private $Products ;

	public function __construct($Products)
	{
		$this->Products = [
			               ['name'=>'T-shirt' , 'price' => 10.99] ,
		                   ['name' => 'Pants' , 'price' => 14.99],
		                   ['name' => 'Jacket', 'price' => 19.99],
		                   ['name' => 'Shoes' , 'price' => 24.99]
		                  ];
		// $this->Currency = ['USD' => '/$' , 'EGP' => 'e '];                   

	}
	public function Compare(&$product_from_main) //This class For comparing The user entery with our Cart
	{
		
		
		foreach ($this->Products as &$product) {
			for ($i = 0 ; $i<count($product_from_main) ; $i++)
			{
				if ($product['name'] == $product_from_main[$i])
				{
					echo $product['price'];
					echo '<br/>';
				}
				

			}
	
		}
	}
	//End of First Function
	//Start of Counting
	public function Adding_From_Cart(&$product_from_main)
	{
		
		
	}


}


$array_of_products = ['T-shirt','T-shirt','Shoes'];
$x = new Product($array_of_products);
echo $x->Compare($array_of_products);

$y = new Product($array_of_products);
$y->Adding_From_Cart($array_of_products);



















?>