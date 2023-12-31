<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/header.css">-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous" />

    <style>
        body {
            background-color: #FFFAFA;
        }
        .img-fluid.d-block {
            height: 22vh;
        }

        .card {
            transition: transform 0.3s ease;
            height: 550px;
        }

        .card-text-truncate {
             display: -webkit-box;
            -webkit-line-clamp: 7;
            -webkit-box-orient: vertical;
            overflow-y: auto;
        }
    </style>
</head>

<body>


    <?php include "header.php"?>

    <h3 class="mb-2 text-center" style="background-color:#FFE4B5">Phòng trọ của tôi</h3>


    <div class="container">
    <?php if (isset($_GET['error'])) { ?>
     	<h4><?php echo $_GET['error']; ?></h4>
    <?php } ?>
    <?php if (isset($_GET['success'])) { ?>
        <h4><?php echo $_GET['success']; ?></h4>
    <?php } ?>
    <br>
    </div>


    
    <?php 
        $conn = new mysqli("localhost", "root", "", "room_rent");
        $user_id = $_GET['user_id'];
        $sql = "SELECT r.*,i.image,rr.user_id FROM `room_info` r
                    LEFT JOIN image_vid i
                    ON i.room_id=r.room_id
                    LEFT JOIN rental_room rr
                    ON r.room_id=rr.room_id
                    WHERE rr.user_id=$user_id and r.status2 = 'yes' " ;
        $result = $conn->query($sql);
        
    ?>

    <section id="gallery">
    <div class="container">
        <div class="row">
            <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) { 
                        $link = "";
                        $link .= "chitietphong.php?name=";
                        
                        $link .= $row["room_id"];
                        if (isset($_GET['user_id'])) {
                            $link .= "&user_id=";
                            $link .= $_GET['user_id'];
                        }
                        $image_url = $row["image"];
                        $list_image = [];
                        $dem = 0;

                        $image_url .= " ";
                        $image = "";
                        for ($i = 0 ; $i < strlen($image_url); ++$i) {
                            if ( substr($image, -4) == ".jpg" || ($image_url[$i] == " " && substr($image, -4) != ".jpg") ) {
                                $list_image[++$dem] = $image;
                                $image = "";
                                }
                            else {
                                $image .= $image_url[$i];
                            }
                        }
            ?>
            
            <div class="col-lg-3 mb-3">
                <div class="card">
                        <a href="<?php echo $link ?>" name="<?php echo $row["room_id"] ?>">
                         <img src="<?php echo $list_image[1] ?>" alt=""
                            class="card-img-top img-fluid d-block mx-auto">
                        </a>
                        <div class="card-body">
                            <P style="color:#828282" class="recipe-desc"> <?php echo $row["city"] ?>
                            </P>
                            <h6 style="color:blue" class="card-title" >
                                <a href="<?php echo $link ?>" name="<?php echo $row["room_id"] ?>"><?php echo $row["title"] ?> </a>  
                            </h6>
                            <div class="card-text card-text-truncate mb-3">
                                <p style="color:#828282" class="recipe-desc">Địa chỉ: <?php echo $row["address"]?>, <?php echo $row["district"] ?>, <?php echo $row["ward"] ?>
                                </p>
                                <p class="recipe-desc">Diện tích: <?php echo $row["size"] ?>m²
                                 </p>
                                 <p class="recipe-desc">Giá: <?php echo $row["price"] ?> triệu VND
                                 </p>
                            </div>
                            <a href="<?php echo $link ?>" name="<?php echo $row["room_id"] ?>" class="btn btn-outline-success btn-sm">Read More</a>
                            <a> </a>
                            <a href="admin_browse_trash.php?room_id=<?php echo $row["room_id"]?>&user_id=<?php echo $user_id?>" class="btn btn-outline-success btn-sm fa fa-trash">Xóa</a>
                        </div>
                    </div>
            </div>
            <?php
                    }
                } 
            ?>
        </div>
    </div>
    </section>

</body>

 </html>