<?php
Session_start();
if(isset($_SESSION['user'])){

    $user_firstname = $_SESSION{'Firstname'};
    $user_lastname = $_SESSION['Lastname'];
    $user_address = $_SESSION['Address'];
    $user_postcode = $_SESSION{'Postcode'};
    $user_username = $_SESSION['user'];

};
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
                            <strong><i>Basket Order Confirmation</i></strong>
                            <p>Please make sure you're logged in to view additional functionality to order</p>
                        </center></font><br>


                    <div align="left"><p style="padding: 10px;"><i><font size="+1"><b><span style="color: CornflowerBlue">Checkout Confirmation</span></b></font></i><br><br>

                    <?php
                    //Fetch submitted Basket Data
                    $prodIDs = $_POST['prodIDs'];

                    //create array to count duplicates
                    $products_split = explode(",", $prodIDs);

                    //Convert JSON string to PHP array
                    $actual_products = array_count_values($products_split);

            //only display when it has content
            if($prodIDs != null){

                    //sweet looking output
                    $prod_cost_summary_array = array();

                    //Output the shopping basket with added quantity
                    foreach ($actual_products as $key => $value){

                    //Connection to DB
                    $mongoClient = new MongoClient();
                    $db = $mongoClient->Products;
                    $collection = $db->catalog;

                    //Save query
                    $query = array('name' => $key);

                    //Mongo DB Cursor obj
                    $mdbc = $db->catalog->findOne($query);


                    ?>

                        <div id="" style="border: 2px groove aqua;">
                            <table>
                                <tr>
                                    <thead><?php echo $key; ?></thead>
                                    <td style="background: #FFFFFF;"><img src="<?php echo $mdbc['image_url'] ?>"width="200" height="100"</td>
                                    <td style="background: #FFFFFF;">Price per Item: <?php echo $mdbc['price'] ?> £</td>
                                    <td style="background: #FFFFFF;">Quantity selected: <?php echo $value ?></td>
                                    <td style="background: #FFFFFF;">Total Cost Per Item:

                                        <?php $cost_per_item = $mdbc['price'] * $value;

                                        echo $cost_per_item;

                                        array_push($prod_cost_summary_array, $cost_per_item);

                                        ?>£</td>

                                </tr>
                            </table>
                        </div>

                        <?php
                        // CLOSES FOR EACH
                        };

                        //total cost calculation
                        $total_bill = array_sum($prod_cost_summary_array);
                        echo "<h1> Total Cost Billed: " . $total_bill . "£";

                        };

            if (isset($_SESSION['user'])) {


                ?>
                </br></br>

                <h1>Delivery Information</h1>
                <?php
                echo "Firstname: " . $user_firstname . "</br>";
                echo "Lastname: " . $user_lastname . "</br>";
                echo "Address: " . $user_address . "</br>";
                echo "Postcode: " . $user_postcode . "</br>";

                //create db data
                $user_order_info = [
                    "Firstname" => $user_firstname,
                    'Lastname' => $user_lastname,
                    "Address" => $user_address,
                    "Postcode" => $user_postcode,
                    "Order Details" => $actual_products
                ];

                ?>

                <!-- submission to other form to add order to db -->
                <form action="submit_order.php" method="POST">
                    <input type="hidden" name="order_details" value ='<?php echo (json_encode($user_order_info));?>'>
                    <input type="submit" value="Confirm Order">
                </form>

                </br>
                </br>

                <?php
            }
                        ?>

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