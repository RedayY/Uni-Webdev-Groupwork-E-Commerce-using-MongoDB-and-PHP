<!DOCTYPE html>
<!--
ID: M00531154 (REDAY) |
E-Commerce Website Project
By Jacek and Reday
CONTACT LOG IN BETA
-->

<html>
    <head>
        <title>Contact Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="index.css">
        
         <!-- Bootstrap stuff -->

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </head>
    <body>
<!--banner and navigation class-->
        <div class="blended_grid">


                <img src="images/banner.jpg" style="width:1000px;height:245px;">

                
                <!--Navigation tab-->
                <div id="navigation">
                    <nav>
                        <div class="container">
                            <ul class="nav nav-tabs" role="tablist">
                                <li><a href="index.php">  Home  </a></li>
                                <li><a href="shop.html">  Products  </a></li>
                                <li class="active"><a href="contact.php"> Contact us </a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <!--Contact Form-->
                <div id="contact">	
		<table class="tg">
		<tr>
			<th class="tg-yw4l"><p> Firstname: </p></th>
			<th class="tg-yw4l"><input type="address" id="userEmail"></th>
		</tr>
		<tr>
			<td class="tg-yw4l"><p> Surname: </p></td>
			<td class="tg-yw4l"><input type="address" id="userEmail"></td>
		</tr>
		<tr>
			<td class="tg-yw4l"><p> Address: </p></td>
			<td class="tg-yw4l"><input type="address" id="userEmail"></td>
		</tr>
		<tr>
			<td class="tg-yw4l"><p> E-Mail: </p></td>
			<td class="tg-yw4l"><input type="email" id="userEmail" ></td>
		</tr>
	</table>
                    <input type="submit" onclick="">
                </div>

            </br>

     <form action= "contact.php" method="get">
         Username: <input type="text" name="username" required>
         </br>
         E-Mail: <input type="text" name="email" required>
         </br>
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
         <?php echo $msg;?>
     </form>

                </body>
                </html>