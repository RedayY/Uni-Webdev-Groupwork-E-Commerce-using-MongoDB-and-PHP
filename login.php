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
                 * Date: 08/03/2017
                 * Time: 14:07
                 */
                session_start();
                //Login Script Alpha

                //Enabling Connection to DB
                $mongoClient = new MongoClient();
                $db = $mongoClient->Users;
                $collection = $db->UserCustomers;

                //Fetching Data from forms
                $username = filter_input(INPUT_GET, 'log_user', FILTER_SANITIZE_STRING);
                $pw = filter_input(INPUT_GET, 'log_pw', FILTER_SANITIZE_STRING);

                //Creating Query
                $query = array('Username' => $username, 'Password' => $pw);

                //cursor operation
                $count = $collection -> findOne($query);
                $cursor = $collection->findOne($query);


                if(!count($count)) {
                    $msg = "Incorrect Username or Password";
                    echo '<h1> Incorrect username or Password</h1> 
   <a href="login_register.html"><h1>Click here to go back</h1></a>';
                    echo $username , " " , $pw;
                }
                else{
                    $msg = "You're Logged in!";
                    $_SESSION['user'] = $username;

                    foreach ( $cursor as $id => $value )
                    {
                        $_SESSION[$id] = $value;
                    }

                    //debug echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';



                   echo '<script type="text/javascript">
           window.location = "member.php"
     </script>';
                }


                $_SESSION["username"] = $username;
                ?>

                    <br>
                    <br>
                </center>
            </td>
        </tr>
        </tbody>
    </table></center>
</body>
</html>



