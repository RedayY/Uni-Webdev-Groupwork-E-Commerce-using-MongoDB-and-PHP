<?php
Session_start();
if (isset($_SESSION['admin_user'])){

$admin_username = $_SESSION['admin_user'];

?>
    <!DOCTYPE html>


    <head>
        <title>Argjentina Bike Sklep</title>
        <link rel="SHORTCUT ICON" href="images/favicon.png" />
        <
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="eng-GB"  />
        <meta http-equiv="Cache-control" content="private"  />
        <meta http-equiv="Pragma" content="no-cache"  />
        <meta http-equiv="expires" content="-1"  />
        <meta name="robots" content="all" />

        <!-- Im so sick of this bullshit inline ccs you have 0 idea please use external css-->
        <style type="text/css">


            <!--
            body,td,th {
                font-family: Arial, Helvetica, sans-serif;
                background-color: #101010;
            }
            .style2 {font-size: 12}
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
                        <strong><i>Admin Control Panel! Welcome </i><?php echo $admin_username ?> !</strong>
                    </center></font><br>

                <p>To Log-out from Admin Menu, please use the user logout.</p>
                </br>
                <p>Options</p>

                <div style ="border: 2px groove aqua;">
                </br>
                <h1>Add Product</h1>
                </br>
                    <table>

                        <form action="add_product.php" method="POST" enctype="multipart/form-data">
                            <tr>
                                <td style="background: #FFFFFF;">Name: </td><td style="background: #FFFFFF;"><input type="text" name="prod_name" required></td>
                            </tr>
                        <tr>
                            <td style="background: #FFFFFF;">Image: </td><td style="background: #FFFFFF;"><input type="file" name="fileToUpload" id="fileToUpload" required></td>

                        <tr>
                            <td style="background: #FFFFFF;">Description: </td><td style="background: #FFFFFF;"><input type="text" name="prod_descr" required></td>
                        </tr>

                        <tr>
                            <td style="background: #FFFFFF;">Prize: </td><td style="background: #FFFFFF;"><input type="number" name="prod_price" required></td>
                        </tr>

                        <tr>
                            <td style="background: #FFFFFF;">Stock-Count: </td><td style="background: #FFFFFF;"><input type="number" name="prod_stock" required></td>
                        </tr>
                        <td style="background: #FFFFFF;"><input type="submit" value="Add Product"></td>
                        </form>

                    </table>


                </div>

            </br>

                <div style ="border: 2px groove aqua;">
                    </br>
                    <h1>Edit Product</h1>
                    </br>
                    <p>Type in the exact product name, then fill in the form to make changes to the Product.</p>
                    <table>

                        <form action="edit_product.php" method="POST" enctype="multipart/form-data">
                        </br>
                            <tr>
                                <td style="background: #FFFFFF;">Name of the Product to change: </td><td style="background: #FFFFFF;"><input type="text" name="prod_edit_name" required></td>
                            </tr>
                        </br>

                            <tr>
                                <td style="background: #FFFFFF;">Name: </td><td style="background: #FFFFFF;"><input type="text" name="prod_name" required></td>
                            </tr>
                            <tr>
                                <td style="background: #FFFFFF;">Image: </td><td style="background: #FFFFFF;"><input type="file" name="fileToUpload" id="fileToUpload" required></td>

                            <tr>
                                <td style="background: #FFFFFF;">Description: </td><td style="background: #FFFFFF;"><input type="text" name="prod_descr" required></td>
                            </tr>

                            <tr>
                                <td style="background: #FFFFFF;">Prize: </td><td style="background: #FFFFFF;"><input type="number" name="prod_price" required></td>
                            </tr>

                            <tr>
                                <td style="background: #FFFFFF;">Stock-Count: </td><td style="background: #FFFFFF;"><input type="number" name="prod_stock" required></td>
                            </tr>
                            <td style="background: #FFFFFF;"><input type="submit" value="Edit Product"></td>
                        </form>

                    </table>


                </div>

                </br>

                <div style ="border: 2px groove aqua;">
                    </br>
                    <h1>View Product</h1>
                    <p>Type in the exact product name to display product!</p>
                    <table>

                        <form action="view_prod.php" method="POST" enctype="multipart/form-data">
                            </br>
                            <tr>
                                <td style="background: #FFFFFF;">Name of the Product to view: </td><td style="background: #FFFFFF;"><input type="text" name="view_prod_name" required></td>
                            </tr>
                            </br>
                            <td style="background: #FFFFFF;"><input type="submit" value="View Product"></td>
                        </form>

                    </table>


                </div>

                </br>

                <div style ="border: 2px groove aqua;">
                    </br>
                    <h1>Current Orders</h1>
                    </br>

                    <?PHP
                    // I am legit sick and tired of inline css please
                    // jacek use external or learn it also most of ur html tags are garbage

                    // establish connection
                    $mongoClient = new MongoClient();
                    $db = $mongoClient->Orders;
                    $collection = $db->Order_req;


                    //Mongo DB Cursor obj
                    $mdbc = $db->Order_req->find();
                    ?>


                    <table style="border: groove 2px darkblue">
                        <tr>
                            <th style="background: #FFFFFF;">Firstname</th>
                            <th style="background: #FFFFFF;">Lastname</th>
                            <th style="background: #FFFFFF;">Address</th>
                            <th style="background: #FFFFFF;">Postcode</th>
                            <th style="background: #FFFFFF;">Products</th>
                            <th style="background: #FFFFFF;">and Quantities</th>
                        </tr>
                            <?php
                                foreach($mdbc as $doc)        {
                                    ?>
                                    <tr>
                                    <td style="background: #FFFFFF;"><?php echo $doc['Firstname']; ?></td>
                                    <td style="background: #FFFFFF;"><?php echo $doc['Lastname']; ?></td>
                                    <td style="background: #FFFFFF;"><?php echo $doc['Address']; ?></td>
                                    <td style="background: #FFFFFF;"><?php echo $doc['Postcode']; ?></td>

                                    <?php
                                    //I stored an object into the array gotta do some fiddeling for output

                                    foreach ($doc{'Order_Items'} as $key => $value) { ?>
                                        <td style="background: #FFFFFF;"><?php echo $key ?> : <?php echo $value?></td>
                                        <?php
                                    }
                                    ?></tr><?php
                                }
                            ?>
                        </tr>
                    </table>

                                    <?php
                                    // Closing Connection
                                    $mongoClient->close();
                                    ?>
                </div>

</td>



                <!-- Vertical Navigation -->

                <td width="240" valign="top" background="images/nav_background.jpg">
                    <center>
                        <span style="color: CornflowerBlue"><b> ------</b></span> <span style="color: CornflowerBlue"><b>R</b></span><span style="color: white"><b>ecommended</b></span> <span style="color: CornflowerBlue"><b>B</b></span><span style="color: white"><b>ikes</b></span> <span style="color: CornflowerBlue"><b>------ </b></span><br><br>

                        <br>
                        <br>
                    </center>
                </td>
            </tr>
            </tbody>
        </table></center>
    </body>
    </html>


<?php

} else {
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

                    <div align="right"><a style="text-decoration:none;" href="index.html"><font
                                color="CornflowerBlue">H</font><font color="white">ome</font> <font color="CornflowerBlue">P</font><font color="white">age</font></a>

            </tr>
            </tfoot>
            <tbody>

            <!-- Horizontal navigation - Left side -->

            <tr>
                <th height="30" colspan="1" background="images/nav_background.jpg">

                    <div align="left"><a style="text-decoration:none;" href="index.html"><font color="CornflowerBlue">H</font><font color="white">ome</font> <font color="CornflowerBlue">P</font><font color="white">age</font></a> -

                        <a style="text-decoration:none;" href="mailto:sobol199@wp.pl"><font color="CornflowerBlue">C</font><font color="white">ontact</font></a> -

                        <a style="text-decoration:none;" href="road_bikes.html"><font color="CornflowerBlue">R</font><font color="white">oad <font color="CornflowerBlue">B</font>ikes</font></a> -

                        <a style="text-decoration:none;"  href="mountain_bikes.html"><font color="CornflowerBlue">M</font><font color="white">ountain <font color="CornflowerBlue">B</font>ikes</font></a> -

                        <a style="text-decoration:none;" href="hybrids.html"><font color="CornflowerBlue">H</font><font color="white">ybrids</font></a></div>

                    <!-- Horizontal navigation - Right side -->

                <th><div align="center"><a style="text-decoration:none;" href="basket.html"><font color="CornflowerBlue">B</font><font color="white">asket</font></a> -

                        <a style="text-decoration:none;" href="login_register.html"><font color="CornflowerBlue">L</font><font color="white">ogin </font><font color="white">/ </font><font color="CornflowerBlue">R</font><font color="white">egister</font></a>

                    </div>
                </th>
            </tr>
            <tr>

                <!-- Body page -->


                <td width="711" valign="top" style="background-color: #FFFFFF" >

                    <font size="+3"><center>
                            <strong><i>Please log in to view</i></strong>
                        </center></font><br>





                    <!-- Vertical Navigation -->

                <td width="240" valign="top" background="images/nav_background.jpg">
                    <center>
                        <span style="color: CornflowerBlue"><b> ------</b></span> <span style="color: CornflowerBlue"><b>R</b></span><span style="color: white"><b>ecommended</b></span> <span style="color: CornflowerBlue"><b>B</b></span><span style="color: white"><b>ikes</b></span> <span style="color: CornflowerBlue"><b>------ </b></span><br><br>

                        <br>
                        <br>
                    </center>
                </td>
            </tr>
            </tbody>
        </table></center>
    </body>
    </html>

    <?php
}

?>