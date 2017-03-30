<!DOCTYPE html>






<html>
    <head>
        <title>Home</title>
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
        
        <!-- AJAX -->        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        
        <!-- Jquery -->
        <script src="plugins/jquery-1.10.2.min.js"></script>
        <script src="plugins/jquery.sldr.js"></script>
        
        <!-- Slideshowscript -->
        <script src="plugins/basic.js"></script>
        
        <!-- Slideshow -->
        
<script>
jQuery(document).ready(function ($) {

  $('#checkbox').change(function(){
    setInterval(function () {
        moveRight();
    }, 3000);
  });
  
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
	$('#slider').css({ width: slideWidth, height: slideHeight });
	
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    
</script>
        
    </head>


    <body>
        <!--banner and navigation class-->
        <div class="blended_grid">
            <div class="pageContent">

                <img src="images/banner.jpg" style="width:1000px;height:245px;">

                <!--Navigation tab-->    
                <div id="navigation">
                    <nav>
                        <div class="container">

                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="index.php">  Home  </a></li>
                                <li><a href="shop.html">  Products  </a></li>
                                <li><a href="contact.php"> Contact us </a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <h1>Welcome to Argjentina Bike Sklep!</h1>
				<hr>
				<p>We have the best offers in the UK. Find your next bike in our products page. Check out our range of bikes. If you have any questions please call us or fill the contact form available on the website.</p>
                <hr>
                    <div>
                        <h1>Login Alpha</h1>
                        <form action= "index.php" method="get">
                            Username: <input type="text" name="log_user" required>
                            </br>
                            Password: <input type="password" name="log_pw" required>
                            </br>
                            <input type="submit" value="LOG-IN!">
                            <?php echo $msg ?>
                        </form>
                    </div>

				<!-- Slider -->
                <div id="slider">
                    <a class="control_next">></a>
                    <a class="control_prev"><</a>
                    <ul>
                        <li><img src="images/sale1.jpg" width="1000" height="500"></img></li>
                        <li><img src="images/sale2.jpg" width="1000" height="500"></img></li>
                    </ul>  
                </div>
                <!-- End of Slider -->
                
                <hr>
        
                <H2>
                
                </body>

                </html>