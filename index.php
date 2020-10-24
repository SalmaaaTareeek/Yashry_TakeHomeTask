<?php
//Importants Vars
$Sub_Total = 0;                           //Global Variable for calculating Sub Total and passes the variable through pages
$Tax_in_pounds = 0;                       //Global Variable for calculating Taxes 14% and passes the variable through pages
$Disscount_Shoes = 0;                     //Global Variable for calculating Disscount of shoes and passes the variable through pages
$Disscount_Tshirts = 0;                   //Global Variable for calculating Discount of two Tshirts and passes the variable through pages
$count = 0;                               //Estimate if the Count of the Tshirts is two the price of jacket will be 50%
$total =0;                                //Estimate the total = subtotal + taxes - Discounts 




class Product {
	private $Products ;                   //an array will carry our Database for the products and prices (multi dimensional array)
	private $Currency ;                   //an array will carry the Currency wether EGP/USD

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Estimate our small database in the constructor 
	public function __construct($Products , $Currency)
	{
		// This is Like Our small Database for Products and Currency
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
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// This Function inputs the array of products as arguement entered by user and the currency and Outputs the subtotal and Taxes
	public function Compare(&$product_from_main,&$Currency_from_main) 
	{
		global $Sub_Total;
		foreach ($this->Products as &$product) 
		{
			for ($i = 0 ; $i<count($product_from_main) ; $i++)
			{
				if ($product['name'] == $product_from_main[$i])
				{
					
					$Sub_Total = $Sub_Total + $product['price'];

				}		

			}
	
		}
		global $Tax_in_pounds ;
		$Tax_in_pounds = $Sub_Total * (14/100);
 		//FOR CURRENCY ESTIMATION AND CALCULATION FOR THE SUBTOTAL AND TAXES
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
						$Sub_Total *= 15.76;
						$Tax_in_pounds *= 15.76;
						$Sub_Total = floor($Sub_Total);
						$Tax_in_pounds = floor($Tax_in_pounds);

						
		                echo 'Subtotal : '  . $Sub_Total . $c['shape'];
		                echo '<br/>';
		                echo 'Taxes : ' . $Tax_in_pounds . $c['shape'] ;
		                echo '<br/>';
		                
					}
				}

			}

		}
		//END OF CURRENCY ESTIMATION FOR SUBTOTAL AND TAXES	
	}
	//End of First Function
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Start of Discount Functions and It estimate if the user wants to buy shoes the Discount will be procceed
	public function Discount_of_Shoes (&$product_from_main,&$Currency_from_main)
	{
		global $Disscount_Shoes;
		foreach ($product_from_main as $product) 
		{
			if ($product == "Shoes")
			{
				foreach ($this->Products as $p) 
				{
					if($p['name'] == 'Shoes')
					{
						
						$Disscount_Shoes = $Disscount_Shoes + ($p['price']*(10/100));
						//echo $Disscount_Shoes;
					}
				}
			}

		}
				//FOR CURRENCY THAT ESTIMATE IF THE CUURENCY IS EGP AND ADDING THE DIIFFERNECE BETWEEN USD AND EGP
		foreach ($Currency_from_main as $Curr ) 
		{ 
			if ($Disscount_Shoes == 0)
			{
				break;
			}

			if ($Curr == "EGP")
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'EGP')
					{
						$Disscount_Shoes *= 15.78;	
					}
				}

			}
			
		}
		//END OF CURRENCY
		
	}
	//End of Shoes Disccount 
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Start of T-shirt Discount and state if the user enters two tshirt the jacket will be discounted to half
	public function Discount_of_Tshirts (&$product_from_main,&$Currency_from_main)
	{
		global $count;
		global $Disscount_Tshirts;
		foreach ($product_from_main as $product) 
		{
			if ($product == "T-shirt")

			{
				$count ++;
				if ($count == 2)
				{
					foreach ($this->Products as $p) 
				{
					if($p['name'] == 'Jacket')
					{
						$Disscount_Tshirts = $Disscount_Tshirts + ($p['price']*(50/100));
						$count = 0;         //Restarting the count after checking there is two tshirts for not over lapping
					}
				}

				}
				
			}

		}

		foreach ($Currency_from_main as $Curr ) 

		{ 
			if ($Disscount_Tshirts == 0)
			{
				break;
			}
			if ($Curr == "EGP")
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'EGP')
					{
						$Disscount_Tshirts *= 15.76;
						
					}
				}
			}

			
		}
		//END OF CURRENCY
		


	}
	//End of Discounf of T-shirts
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Start of Total function the will calculate the total to the user
	public function Total(&$product_from_main,&$Currency_from_main)
	{
		global $Sub_Total;
		global $Tax_in_pounds;
        global $Disscount_Shoes ;
        global $Disscount_Tshirts ;
        global $total;
        $total = $Sub_Total + $Tax_in_pounds - $Disscount_Shoes - $Disscount_Tshirts;
        //FOR CURRENCY
		foreach ($Currency_from_main as $Curr ) 
		{ 
			if ($Curr == 'USD')
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'USD')
					{
						if($Disscount_Tshirts != 0 && $Disscount_Shoes != 0)
						{
							echo 'Discounts:';
					  		echo '<br/>';
					  		echo str_repeat('&nbsp;', 13);
					  		echo '         10% off shoes:' . '-' .$c['shape'] . $Disscount_Shoes;
					  		echo '<br/>';
					  		echo str_repeat('&nbsp;', 13);
					  		echo '         50% off shoes:' . '-' .$c['shape'] . $Disscount_Tshirts ;
		              		echo '<br/>';

						}
						elseif ($Disscount_Tshirts != 0 && $Disscount_Shoes == 0) 
						{
							echo 'Discounts:';
					  		echo '<br/>';
					  		echo str_repeat('&nbsp;', 13);
					  		echo '         50% off shoes:' . '-' .$c['shape'] . $Disscount_Tshirts ;
		              		echo '<br/>';
							
						}
						elseif ($Disscount_Tshirts == 0 && $Disscount_Shoes != 0) 
						{
							echo 'Discounts:';
					  		echo '<br/>';
					  		echo str_repeat('&nbsp;', 13);
					  		echo '         10% off shoes:' . '-' .$c['shape'] . $Disscount_Shoes;
		              		echo '<br/>';
	
						}

						echo 'Total : ' . $c['shape'] . $total;	
		               
					}
				}
			}
			elseif ($Curr == "EGP")
			{
				foreach ($this->Currency as $c) 
				{
					if($c['currency_name'] == 'EGP')
					{
						$Disscount_Tshirts = floor($Disscount_Tshirts);
						$Disscount_Shoes = floor($Disscount_Shoes);
						if($Disscount_Tshirts != 0 && $Disscount_Shoes != 0)
						{
							echo '<br/>';
							echo 'Discounts:';
					  		echo '<br/>';
					  		echo str_repeat('&nbsp;', 13);
					  		echo '         10% off shoes:' . '-' . $Disscount_Shoes .$c['shape'] ;
					  		echo '<br/>';
					  		echo str_repeat('&nbsp;', 13);
					  		echo '         50% off shoes:' . '-'  . $Disscount_Tshirts .$c['shape'];
		              		echo '<br/>';

						}
						elseif ($Disscount_Tshirts != 0 && $Disscount_Shoes == 0) 
						{
							echo '<br/>';
							echo 'Discounts:';
					  		echo '<br/>';
					  		echo str_repeat('&nbsp;', 13);
					  		echo '         50% off shoes:' . '-'  . $Disscount_Tshirts .$c['shape'];
		              		echo '<br/>';
	
						}
						elseif ($Disscount_Tshirts == 0 && $Disscount_Shoes != 0) 
						{

							echo '<br/>';
							echo 'Discounts:';
					  		echo '<br/>';
					  		echo str_repeat('&nbsp;', 13);
					  		echo '         10% off shoes:' . '-'  . $Disscount_Shoes .$c['shape'];
		              		echo '<br/>';

							
						}
						
						$total = floor($total);
		                echo 'Total : '  . $total . $c['shape'];
		                
		               
					}
				}

			}

		}
		//END OF CURRENCY

	}
//End of Total
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

}

?>