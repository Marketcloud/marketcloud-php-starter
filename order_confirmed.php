<?php require('header.php'); ?>
<div class="container-fluid slidethankyou shop-container">
			<div class="text_box white centered txt_center">

			</div>
			
			
				<div class="row" style="padding-bottom:50px;">
				<div class="col-lg-10 col-lg-offset-1" class="product">
					<h1>Thank you for your order!</h1>
					<p>You will receive a confirmation email at the email address you provided.</p>


					</div>
				</div>
			
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bower_components/marketcloud-js/dist/marketcloud.min.js"></script>
<script type="text/javascript">
	
	var cart = <?php echo json_encode($cart); ?>;

</script>
<script type="text/javascript" src="/js/shop.js"></script>

<script type="text/javascript">
	
</script>
<?php require('footer.php'); ?>