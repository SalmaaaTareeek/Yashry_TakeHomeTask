<?php
//Importants Vars
$Sub_Total = 0;
$Tax_in_pounds = 0;
$Disscount_Shoes = 0;
$Disscount_Tshirts = 0;
$count = 0;




class Product {
	private $Products ;
	private $Currency ;

	public function __construct($Products , $Currency)
	{
		// This is Like Our small Database
		$this->Products = [
			               ['name'=>'T-shirt' , 'price' => 10.99] ,
		                   ['name' => 'Pants' , 'price' => 14.99],
		                   ['name' => 'Jacket', 'price' => 19.99],
		                   ['name' => 'Shoes' , 'price' => 24.99]
		                  ];
	 	$this->Currency = [
	 		              ['currency_name' => 'USD' , 'shape' => '$'],
	 		              ['currency_name' => 'EGP' , 'shape' => 'e£']
	 		              ];


	}
	public function Compare(&$product_from_main,&$Currency_from_main) //This class For comparing The user entery with our Cart
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


 		//FOR CURRENCY
		foreach ($Currency_from_main as $Curr ) 
		{ 
			if ($Curr == 'USD')
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'USD')
					{
						
		                echo 'Subtotal : ' . $c['shape'] . $Sub_Total;
		                echo '<br/>';
		                echo 'Taxes : ' . $c['shape'] . $Tax_in_pounds;
					}
				}
			}
			/////////
			elseif ($Curr == "EGP")
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'EGP')
					{
						$Sub_Total *= 15.75;
						$Tax_in_pounds *= 15.75;

						
		                echo 'Subtotal : '  . floor($Sub_Total) . $c['shape'];
		                echo '<br/>';
		                echo 'Taxes : ' . floor($Tax_in_pounds) . $c['shape'] ;
		                echo '<br/>';
					}
				}

			}


			
		}
		//END OF CURRENCY


	

		
	}
	//End of First Function
	//Start of Discount Functions
	public function Discount_of_Shoes (&$product_from_main,&$Currency_from_main)
	{
		foreach ($product_from_main as $product) 
		{
			if ($product == "Shoes")
			{
				foreach ($this->Products as $p) 
				{
					if($p['name'] == 'Shoes')
					{
						global $Disscount_Shoes;
						$Disscount_Shoes = $Disscount_Shoes + ($p['price']*(10/100));
						//echo $Disscount_Shoes;
					}
				}
			}

		}
				//FOR CURRENCY
		foreach ($Currency_from_main as $Curr ) 
		{ 
			if ($Curr == 'USD')
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'USD')
					{
					  echo '<br/>';
					  echo 'Discounts:';
					  echo '<br/>';
					  echo str_repeat('&nbsp;', 13);
					  echo '         10% off shoes:' . '-' .$c['shape'] . $Disscount_Shoes;
		              echo '<br/>';
					}
				}
			}
			/////////
			elseif ($Curr == "EGP")
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'EGP')
					{
						$Disscount_Shoes *= 15.75;
						echo '<br/>';
					  	echo 'Discounts:';
					  	echo '<br/>';
					  	echo str_repeat('&nbsp;', 13);
					  	echo '         10% off shoes:' . '-' .$c['shape'] . $Disscount_Shoes;
		              	echo '<br/>';
						

						
					}
				}

			}


			
		}
		//END OF CURRENCY
		
	}
	//End of Shoes Disccount 
	//Start of T-shirt Discount

	public function Discount_of_Tshirts (&$product_from_main,&$Currency_from_main)
	{
		////////////////////////////////
		global $count;
		global $Disscount_Tshirts;
		foreach ($product_from_main as $product) 
		{
			if ($product == "T-shirt")

			{
				//global $count;
				$count ++;
				if ($count == 2)
				{
					foreach ($this->Products as $p) 
				{
					if($p['name'] == 'Jacket')
					{
						//global $Disscount_Tshirts;
						$Disscount_Tshirts = $Disscount_Tshirts + ($p['price']*(50/100));
						//echo $Disscount_Tshirts;
						$count = 0;
					}
				}

				}
				
			}

		}

		foreach ($Currency_from_main as $Curr ) 
		{ 
			if ($Curr == 'USD')
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'USD')
					{
					  // echo '<br/>';
					  // echo 'Discounts:';
					  //echo '<br/>';
					  echo str_repeat('&nbsp;', 13);
					  echo '         50% off jacket:' . '-' .$c['shape'] . $Disscount_Tshirts;
		              echo '<br/>';
					}
				}
			}
			/////////
			elseif ($Curr == "EGP")
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'EGP')
					{
						$Disscount_Tshirts *= 15.75;
						echo '<br/>';
					  	echo 'Discounts:';
					  	echo '<br/>';
					  	echo str_repeat('&nbsp;', 13);
					  	echo '         10% off shoes:' . '-' .$c['shape'] . $Disscount_Tshirts;
		              	echo '<br/>';
						

						
					}
				}

			}


			
		}
		//END OF CURRENCY
		


	}
	//End of Discounf of T-shirts
//Start of Currency 



}


?>