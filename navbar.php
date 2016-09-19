<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Your Store</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home<span class="sr-only">(current)</span></a></li>
      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php foreach ($categories as $category): ?>
              <li><a href="index.php?category_id=<?php echo $category->id; ?>"><?php echo $category->name; ?></a></li>
            <?php endforeach; ?>
            
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" method="GET" action="index.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="q">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
       <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span><?php echo count($cart->items); ?> Cart<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-cart" role="menu">
            <?php foreach ($cart->items as $item): ?>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="<?php echo $item->images[0]; ?>" style="max-width:50px;" />
                        <span class="item-info">
                            <span><?php echo $item->name; ?></span>
                            <span><?php echo $item->price; ?>$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <?php endforeach; ?>
              
              
              <li class="divider"></li>
              <li><a class="text-center" href="cart.php">View Cart</a></li>
              <li><a class="text-center" href="checkout.php">Checkout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>