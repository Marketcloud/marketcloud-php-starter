<?php
include('bootstrap_shop.php');
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<title>Your store</title>
		<!-- Bootstrap -->
		<link href="/public/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/public/css/style.css" media="all">

		
		
	</head>
	<body style="height:100%;margin-top:100px;">
		<?php include("navbar.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/public/components/marketcloud-js/dist/marketcloud.min.js"></script>
<script type="text/javascript">
	marketcloud.public = "<?php echo getenv("MARKETCLOUD_PUBLIC_KEY"); ?>";
</script>
