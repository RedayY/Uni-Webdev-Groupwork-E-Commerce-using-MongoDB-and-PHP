<?php
Session_start();
if (isset($_SESSION['user'])){
$customer = $_SESSION['user'];
$email = $_SESSION['email'];
$age = $_SESSION['age'];
$fname = $_SESSION['Firstname'];
$lname = $_SESSION['Lastname'];
$address = $_SESSION['Address'];
$postcode = $_SESSION['Postcode'];
?><!DOCTYPE html>


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
                        <strong><i>Welcome to Argjentina Bike Sklep </i><?php echo $fname ?> !</strong>
                    </center></font><br>

                    <p> Here is the information we have about you</p>
                    <?php
                    echo $customer , "</br>";
                    echo $email , "</br>";
                    echo $age , "</br>";
                    echo $fname , "</br>";
                    echo $lname , "</br>";
                    echo $address , "</br>";
                    echo $postcode , "</br>";
                    ?>

                <br>

                <div style ="border: 2px groove aqua;">
                    </br>
                    <h1>Previous Orders</h1>
                    </br>

                    <?PHP
                    // I am legit sick and tired of inline css please
                    // jacek use external or learn it also most of ur html tags are garbage

                    // establish connection
                    $mongoClient = new MongoClient();
                    $db = $mongoClient->Orders;
                    $collection = $db->Order_req;

                    //query

                    $query = array("Firstname" => $fname);

                    //Mongo DB Cursor obj
                    $mdbc = $db->Order_req->find($query);
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







            </br>
                <h1>Warning: If you decide to update details you will be automatically logged out and have to log back in</h1>
                </br>

                <form action= "cut_det.php" method="get">
                    Pass: <input type="password" name="password" required>
                    </br>
                    First Name: <input type="text" name="firstname" required>
                    </br>
                    Last Name: <input type="text" name="lastname" required>
                    </br>
                    Address: <input type="text" name="address" required>
                    </br>
                    Postcode: <input type="text" name="postcode" required>
                    </br>
                    Age: <input type="number" name="age" required>
                    </br>
                    <input type="submit">
                </form>
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


