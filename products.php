<?php require('header.php'); ?>
<?php
	$products = Marketcloud\Products::get($_GET);
	$products = $products->body->data;
	$categories = Marketcloud\Categories::get();
	$categories = $categories->body->data;
	$brands = Marketcloud\Brands::get();
	$brands = $brands->body->data;
?>
<div class="container-fluid">

        <div class="row">

            <div class=" col-xs-12 col-md-3 sidenav">

                    <div class="row">
                        <div class="col-xs-6 col-sm-12 col-lg-12">
                            
                            <div class="group">
                                <div class="group-title">Categories</div>
                                <?php for ($i=0; $i< count($categories);$i++) { ?>
                                    <div class="group-item">
                                        <a href="index.php?category_id=<?php echo $categories[$i]->id; ?>" ><?php echo $categories[$i]->name; ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-12">
                             <div class="group">

                                <div class="group-title">Brands</div>
                                <?php for ($i=0; $i< count($brands);$i++) { ?>
                                    <div  class="group-item"><a href="index.php?brand_id=<?php echo $brands[$i]->id; ?>"><?php echo $brands[$i]->name; ?></a></div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                
                
                
                
                   
                
            </div>

            <div class="col-md-9 col-xs-12 ">

          
                <div class="row">

                <?php for ($i=0; $i<count($products);$i++) { ?>
                    <div class="col-sm-4 col-lg-4 col-md-4 col-xs-12">
                        <a class="product" href="product.php?id=<?php echo $products[$i]->id; ?>">
                           <?php if ($products[$i]->images) { ?>
                             <div class="image" style="background-image:url(<?php echo $products[$i]->images[0] ?>)">
                             </div>
                            <?php } else {?>
                             <div class="image" style="background-image:url(https://placeholdit.imgix.net/~text?txtsize=33&txt=200%C3%97200&w=600&h=600)">
                                </div>  
                           
                            <?php } ?>

                            <div class="info row">
                                    <div class="col-xs-8 name"><?php echo $products[$i]->name ?></div>
                                    <div class="col-xs-4 text-right">€ <?php echo $products[$i]->price ?></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                

              

                </div>

            </div>

        </div>

    </div>
<script type="text/javascript">
	
var cart = <?php echo json_encode($cart); ?>;
</script>
<?php require("footer.php"); ?>