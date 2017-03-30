<?php
Session_start();
if (isset($_SESSION['admin_user'])){
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

                    <?php
                    /**
                     * Created by IntelliJ IDEA.
                     * User: reday
                     * Date: 22/03/2017
                     * Time: 12:11
                     */

                    // establish connection
                    $mongoClient = new MongoClient();
                    $db = $mongoClient->Products;
                    $collection = $db->catalog;

                    //fetch data
                    $product_name = filter_input(INPUT_POST, 'prod_name', FILTER_SANITIZE_STRING);
                    $product_description = filter_input(INPUT_POST, 'prod_descr', FILTER_SANITIZE_STRING);
                    $product_price = filter_input(INPUT_POST, 'prod_price', FILTER_SANITIZE_NUMBER_INT);
                    $product_stock = filter_input(INPUT_POST, 'prod_stock', FILTER_SANITIZE_NUMBER_INT);
                    $product_edit_name = filter_input(INPUT_POST, 'prod_edit_name');

                    //Save query
                    $query = array('name' => $product_edit_name);

                    //cursor operation
                    $count = $collection -> findOne($query);

                if ($query = $count){
                    //Image Script -------------------------------------------------------

                    //Housten we have a problem
                    $housten = 1;

                    // Setting Directory
                    $target_dir = "images/";

                    //storing target descr in var
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                    //adjusting filename for db stuff
                    $product_name_img_id = "images/" . basename(basename($_FILES["fileToUpload"]["name"]));

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "<h1> Product Successfully Added </h1>";
                        echo "<a href = 'admin_cms.php'><h1>Please Click Here to go back to the CMS</h1></a>";
                        $housten = 1;

                        // Adding Product MongoDB ---------------------------------------------

                        //Housten is a variable that checks wether the upload has been successful or not. It does not execute adding something to the db if it has failed to upload image
                        if ($housten = 1) {

                            //Constructing DB data
                            $product_url = $product_name_img_id;
                            $prod_reg_info = [
                                "name" => $product_name,
                                "description" => $product_description,
                                "image_url" => $product_url,
                                "price" => $product_price,
                                "stock_count" => $product_stock,
                            ];


                            //Insertion Operation
                            $returnVal = $collection->update($query, $prod_reg_info);

                            // Closing Connection
                            $mongoClient->close();
                        }
                        else {
                            echo "<h1> Houston we have a problem! Image upload was unsuccessful!";
                            echo "<a href = 'admin_cms.php'><h1>Please Click Here to go back to the CMS</h1></a>";
                        }
                        // --------------------------------------------------------------------
                    }
                    else {
                        echo "<h1> the upload has been incomplete, product details broken prod added </h1>";
                        echo "<a href = 'admin_cms.php'><h1>Please Click Here to go back to the CMS</h1></a>";
                        $housten = 0;
                    };

                    // --------------------------------------------------------------------



                }
                else{
                    echo "<h1> We were unable to find the selected product </h1>";
                };
                ?>








                    <!-- Vertical Navigation -->

                <td width="240" valign="top" background="images/nav_background.jpg">
                    <center>
                        <span style="color: CornflowerBlue"><b> ------</b></span> <span style="color: CornflowerBlue"><b>R</b></span><span style="color: white"><b>ecommended</b></span> <span style="color: CornflowerBlue"><b>B</b></span><span style="color: white"><b>ikes</b></span> <span style="color: CornflowerBlue"><b>------ </b></span><br><br>


                        <span style="color: white"><b>FEU - Speed Road 2017</b></span><br>
                        <a href="recommended_bike.html"><img src="images/bike.png" height="146" width="230"></a>

                        <br><br>

                        <span style="color: white"><b>CUBE - BMK 2017</b></span><br>
                        <a href="recommended_bike2.html"><img src="images/bike2.png" height="146" width="230"></a>

                        <br><br>

                        <span style="color: white"><b>BULLS - Cross 2017</b></span><br>
                        <a href="recommended_bike3.html"><img src="images/bike3.png" height="146" width="230"</a>


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