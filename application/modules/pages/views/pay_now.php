								
																
<!-- COPY-PASTE THIS CODE ON YOUR HTML FORM WHERE YOU NEED THE PAY NOW BUTTON TO APPEAR.
ENSURE THAT YOU HAVE SET YOUR SUCCESS AND FAILURE PAGES. YOU MAY ALSO SET YOU IPN LISTENER URL
YOU MAY INCLUDE THE LAST 3 OPTIONAL FIELDS BELOW. CHANGE THE Mobicard_Mode TO LIVE WHEN READY TO GO LIVE -->

<form method="post" action="https://www.mobicardsystems.com/paynow">
	
	<!--Required Fields Below-->	
	<input type="hidden" id="Mobicard_MerchantID" name="Mobicard_MerchantID" value="1633"> 
	<input type="hidden" id="Mobicard_API_Key" name="Mobicard_API_Key" value="ZGQ2YjcxNzUzYWZjNDkzM2IyNmQzNjhhM2FjNDQ1YzhlYzFjOWZmNTBlMzZlNSJ9">
	<input type="hidden" id="Mobicard_Payment_Set" name="Mobicard_Payment_Set" value="2"> 
	<input type="hidden" id="Mobicard_Mode" name="Mobicard_Mode" value="TEST">
	<!--input type="hidden" id="Mobicard_Transaction_Reference" name="Mobicard_Transaction_Reference" value="1234567890"--> 	
																		
	<!-- THE FIELDS BELOW ARE OPTIONAL, DEPENDING ON WHETHER THE MERCHANT WANTS THE USER TO INPUT 
	THE DESCRIPTION, AMOUNT AND CURRENCY. IF THE MERCHANT NEEDS TO SEND THESE VALUES, THEN ALL THE THREE MUST BE SENT.
	THE CURRENCY CAN BE EITHER USD OR KES WHILE THE AMOUNT MAY BE AN INTEGER OR WITH UPTO TWO DECIMAL PLACES
	The TEST CARD NUMBER is 4242424242424242 . Use with any date and any 3-digit number for CVV.-->
	
	<!--Optional Fields-->								
	<!--input type="hidden" id="Mobicard_Item_Description" name="Mobicard_Item_Description" value="TRANSACTION DESCRIPTION">
	<input type="hidden" id="Mobicard_Order_Currency" name="Mobicard_Order_Currency" value="USD"> 
	<input type="hidden" id="Mobicard_Order_Amount" name="Mobicard_Order_Amount" value="100"---> 
	
	<!--Extra Optional Fields-->
	<!--input type="hidden" id="Mobicard_First_Name" name="Mobicard_First_Name" value="Test"> 
	<input type="hidden" id="Mobicard_Last_Name" name="Mobicard_Last_Name" value="Client">    
	<input type="hidden" id="Mobicard_Address" name ="Mobicard_Address" value="P.O BOX 36457">
	<input type="hidden" id="Mobicard_Postal_Code" name ="Mobicard_Postal_Code" value="00800"> 
	<input type="hidden" id="Mobicard_Country_Code" name ="Mobicard_Country_Code" value="KE">
	<input type="hidden" id="Mobicard_Email" name ="Mobicard_Email" value="markmathenge@gmail.com"> 
	<input type="hidden" id="Mobicard_Mobile_Number" name ="Mobicard_Mobile_Number" value="+254700123456"--> 
																			
	<button class="btn-lg btn-primary"><img src="https://www.mobicardsystems.com/images/paynow.png" width="130" height="35" /></button>
		
	<!--DONATE BUTTON-->
	<!--button class="btn-lg btn-primary"><img src="https://www.mobicardsystems.com/images/donate.png" width="130" height="35" /></button-->
										
</form>				
								