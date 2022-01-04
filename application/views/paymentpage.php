<html>
  <head>
  	 <title>Payment Page</title>
  	 <style>
  	 	.mybox{
  	 		    border: 2px solid #061c5a;
			    padding: 30px;
			    width: 116px;
			    margin-bottom: 30px;
			    background-image: linear-gradient(
			 45deg
			, #bc1212, orange);
  	 	}
  	 	.btn-lg{
  	 		cursor: pointer;
		    width: 180px;
		    height: 34px;
		    color: #dfd3d3;
		    background-color: red;
		    border: transparent;
  	 	}
  	 </style>
  </head>
  <body>
  	  <h2>Make Payment</h2>
  	 
  	  <div class="mybox">
  	  <h4 style="color: #fff;font-size: 28px;">Rs <?php echo $amount;  ?></h4>
  	  </div>
      <h2 style="color:red;">OrderId: <?php echo $orderid;  ?> </h2>
    <form method="post" action="<?php echo FORMURL;  ?>testpage/onlinepayment">
      <input type="text" id="ORDER_ID" name="ORDER_ID" value="<?php echo $orderid;  ?>">
      <input type="text" id="CUST_ID" name="CUST_ID" value="<?php echo $customerid;  ?>">
      <input type="text" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="<?php echo $industrytype;  ?>">
      <input type="text"  id="CHANNEL_ID" name="CHANNEL_ID" value="<?php echo $channel;   ?>">
      <input type="text" class="form-control" id="TXN_AMOUNT" name="TXN_AMOUNT" autocomplete="off" tabindex="5" value="<?php echo $amount;  ?>">
      <input type="submit" name="submit" value="Make Payment" class="btn btn-success btn-lg ">
    	
    </form>
  </body>
</html>