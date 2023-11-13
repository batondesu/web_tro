<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trọ Tốt</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    
    <!-- css -->
    <link rel="stylesheet" href="css/trangchu.css"> 
    <link rel="stylesheet" href="css/header.css"> 

    <!-- js -->
    <script src="js/main.js"> </script>
    <script src="js/home.js"></script>

    <!-- lib owl carousel -->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
</head>
<body>
    <section>
        <?php include "header.php"?>
        
        <div class="banner">
			<div class="owl-carousel owl-theme"></div>
		</div> 

        <script> addList(); </script> 

        <?php include "top_room.php"?>

        <script> addReport(); </script> 
        <script> addFooter(); </script> 

    </section>

</body>
</html>