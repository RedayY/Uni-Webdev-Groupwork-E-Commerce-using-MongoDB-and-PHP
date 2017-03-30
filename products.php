<?php
Session_start();

?>

<!DOCTYPE html>


<head>
    <title>Argjentina Bike Sklep</title>
    <link rel="SHORTCUT ICON" href="images/favicon.png" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="eng-GB"  />
    <meta http-equiv="Cache-control" content="private"  />
    <meta http-equiv="Pragma" content="no-cache"  />
    <meta http-equiv="expires" content="-1"  />
    <meta name="robots" content="all" />
    <script src="yunowork.js"></script>
    <style type="text/css">


        <!--
        body,td,th {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #101010;
        }
        .style2 {font-size: 12px;}
        .style3 {
            font-size: 10px;
            font-style: italic;
        }
        -->
    </style></head>

<body>

<!-- Banner settings -->

<center><table width="951" border="1">
        <thead>
        <tr>
            <th height="202" colspan="2" rules="all" background="images/logo.png"></th>
        </tr>
        </thead>
        <tfoot>
        <tr>

            <!-- Footer settings - Left side -->

            <th height="100" colspan="2" background="images/footer.png" >

                <div align="left"> <font color="white">Powered by</font> <font color="CornflowerBlue">R</font><font color="white">eday</font></a></div>

                <div align="left"> <font color="white">Theme by</font> <font color="CornflowerBlue">J</font><font color="white">acek</font></a></div><br><br>

                <!-- Footer settings - Right side -->

                <div align="right"><a style="text-decoration:none;" href="backdoor.html"><font
                                color="CornflowerBlue">A</font><font color="white">dmin</font> <font color="CornflowerBlue">P</font><font color="white">anel</font></a>

        </tr>
        </tfoot>
        <tbody>

        <!-- Horizontal navigation - Left side -->

        <tr>
            <th height="30" colspan="1" background="images/nav_background.jpg">

                <div align="left"><a style="text-decoration:none;" href="index.php"><font color="CornflowerBlue">H</font><font color="white">ome</font></a> -

                    <a style="text-decoration:none;" href="mailto:sobol199@wp.pl"><font color="CornflowerBlue">C</font><font color="white">ontact</font></a> -

                    <a style="text-decoration:none;"  href="Products.php"><font color="CornflowerBlue">P</font><font color="white">roducts <font color="CornflowerBlue">B</font>ikes</font></a> -


                    <!-- Horizontal navigation - Right side -->

            <th><div align="center"><a style="text-decoration:none;" href="basket.html"><font color="CornflowerBlue">B</font><font color="white">asket</font></a> -

                    <a style="text-decoration:none;" href="login_register.html"><font color="CornflowerBlue">L</font><font color="white">ogin </font><font color="white">/ </font><font color="CornflowerBlue">R</font><font color="white">egister</font></a>
                    - <a style="text-decoration:none;" href="logout.php"><font color="CornflowerBlue">L</font><font color="white">ogout</font></a>
                </div>
            </th>
        </tr>
        <tr>


            <!-- Body page -->


            <td width="711" valign="top" style="background-color: #FFFFFF" >

                <font size="+3"><center>
                        <strong><i>Products</i></strong>
                    </center></font><br>
                </br>
                </br>

                <!-- Sorting Filter -->
                <a href="filter_prod_price_decreasing.php">Click me to Filter Products by Price Decreasing</a></br>
                <a href="filter_prod_price_increasing.php">Click me to Filter Products by Price Increasing</a></br>
                <a href="filter_prod_stock.php">Click me to Filter Products by Stock</a></br>




                <?php


                //Connection to DB
                $mongoClient = new MongoClient();
                $db = $mongoClient->Products;
                $collection = $db->catalog;

                //Mongo DB Cursor obj
                $mdbc = $db->catalog->find();
                ?>
  <div align="left"><p style="padding: 10px;"><i><font size="+1"><b><span style="color: CornflowerBlue">Our bikes</span></b></font></i><br><br>

                    <!-- Product Loop Script Alpha -->

          <?php
          //creating array

          //starting loop
          foreach($mdbc as $doc)        {
          ?>
          <!-- Generated Content using Jaceks Layout HTML-->
          <strong><?php echo $doc['name'] ?></strong><br>
          <img src="<?php echo $doc['image_url'] ?>" height="316" width="500"><br>

          <strong>Stock: <?php echo $doc['stock_count'] ?></strong><br><br>

          <strong>About this product</strong>
      <p><?php echo $doc['description'] ?></p><br><br>

      <strong>Delivery</strong> - Fast and Free<br><br>

      <strong>Price</strong> - £<?php echo $doc['price'] ?><br><br>

      <!-- Basket Form -->
      <?php

      //only displays button if user is logged in
      if (isset($_SESSION['user'])) {

          //button config
          echo '<button onclick=\'addToBasket("' . $doc["_id"] . '", "' . $doc["name"] . '")\'>';
          echo 'Add Product to Basket</button></br>';
          echo '</br></br>';
       //closes displays button bit if user is logged in
      }


      //closes product display loop
      }


      ?>
  </br>
  </br>



</td>
      <!-- Vertical Navigation -->

            <td width="240" valign="top" background="images/nav_background.jpg">
                <center>
                    <span style="color: CornflowerBlue"><b></b></span> <span style="color: CornflowerBlue"><b>B</b></span><span style="color: white"><b>asket</b></span>
                    <br>
                    <br>
                    <div id="basketDiv" style="color: CornflowerBlue">
                </center>
            </td>
        </tr>
        </tbody>
    </table></center>
</body>
</html>
