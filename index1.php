<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include ('../../../Users/nomadliam/Documents/LG/site/lib/autoload.php');

// Fetch the products from the database
$sql = "SELECT * FROM products";
$result = mysql_query($sql, $conn);

$products = array();
while ($row = mysql_fetch_assoc($result)) {
	$products[] = $row;
}
?>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<meta http-equiv="cache-control" content="max-age=200" />
<link href="../../../Users/nomadliam/Documents/LG/site/style.css" media="handheld, screen" rel="stylesheet" type="text/css" />
<title>Clover management tools</title>
</head>
<body>
<div class="mainwrapper">
	<div id="header">
		<div class="right-bg">
			<div id="logo">
				
                
				<p><a href="../../../Users/nomadliam/Documents/LG/site/index.html">
			    <?php include(LG_ROOT . DS . 'templates' . DS . 'header.php'); ?>
				</a></p>
				<p><a href="../../../Users/nomadliam/Documents/LG/site/index.html">			    <img height="50" width="270" alt="logo" src="../../../Users/nomadliam/Documents/LG/site/images/logo.jpg"/></a></p>
			</div>
			<div id="slogan">
				<div class="right-bg">
					<div class="left-bg">
						<img alt="" src="../../../Users/nomadliam/Documents/LG/site/images/slogan.gif" /><br />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="content">
		<div class="min-width">
			<ul id="navmenu">
				<h1>Welcome to Local Greenery</h1>

				<li><a href="../../../Users/nomadliam/Documents/LG/site/home.html" class="button"><img alt="" src="../../../Users/nomadliam/Documents/LG/site/images/home-button.gif" /></a></li>
				<p>                
				<h2>Products:</h2>
				</p>
              <table>
  <?php if (mysql_num_rows($result) > 0): ?>
  <?php foreach ($products as $product): ?>
                <tr>
                  <td>
                    <p>
                    <h3><?php echo $product['name']?></h3>
                      <ul>
                        <li>Dominant Type: <?php echo $product['type']?></li>
                        <li>Weight: <?php echo $product['weight']?></li>
                        <li>Price: <?php echo $product['price']?></li>
                      </ul>
                    </p>
                  </td>
                  <td>
                    <a href="../../../Users/nomadliam/Documents/LG/site/enquire.php?id=<?php echo $product['id']; ?>">Enquire</a>
                  </td>
                </tr>
  <?php endforeach;?>
              </table>
<?php else: ?>
	<p>
	  <h3>No products available. Please try again later.</h3>
	</p>
<?php endif; ?></ul></div>
	</div>
	<div id="footer">
	  <p>
	    <?php include(LG_ROOT . DS . 'templates' . DS . 'footer.php'); ?>
      </p>
	</div>
</div>
</body>
</html>