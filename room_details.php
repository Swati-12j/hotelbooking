<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NS Hotel - ROOM DETAILS</title>

   
    <?php require('inc/links.php') ?>
    <?php 
    if(!isset($_GET['id)'])){
      redirect('rooms.php')  ;

    }
    $data =filteration($_GET);
    $room_res=select("SELECT * FROM `rooms` WHERE `id` =? AND `status`=? AND`removed`=?",[$data[id],1,0],'iii');
     if(mysqli_num_rows($room_res==0)){
        redirect('rooms.php');
     }
     $room_data =mysqli_fetch_assoc($room_res);
    ?>

</head>

<body class="bg-light">


    <?php require('inc/header.php') ?>
    
    
   <div class="container-">
    <div class="row">

    <div class="col-12 my-5 px-4 mb-4">
        <h2 class="fw-bold "><?php echo $room_data['name'] ?></h2>
     <div style="font-size:14px;">
        <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
        <span class="text-secondary"> > </span>
        <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
     </div>
            
        </div>


        <div class="col-lg-7 col-md-12 px-4">
        <div id="roomCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

  <?php  
   $room_img= ROOMS_IMG_PATH."thumbnail.jpg";
       $img_q=mysqli_query($conn,"SELECT * FROM `room_images` WHERE  `room_id`= '$room_data[id]' ");
       if(mysqli_num_rows($img_q)>0){
         $active_class='active';
         while( $img_res=mysqli_fetch_assoc($img_q)){
           echo "<div class='carousel-item active'>
      <img  src='".ROOMS_IMG_PATH.$img_res['image']."' class='d-block w-100 rounded' >
    </div>";
         $active_class='';

       }
    }
       else{
        echo"<div class='carousel-item  $active_class'>
      <img class='d-block w-100' src='$room_img' >
    </div>";
       }


  ?>
    <!-- <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div> -->
  <a class="carousel-control-prev" href="#roomCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#roomCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



        </div>
<!-- <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
<navbar-light></navbar-light><nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
  <div class="container-fluid flex-lg-column align-items-stretch">
    <h4 class="mt-2">FILTERS</h4>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
     <div class="border bg-light p-3 rounded mb-3">
        <h5 class="mb-3" style="font-size:18px;">CHECK AVAILABILITY</h5>
        <label class="form-label" >Check-in</label>
        <input type="date" class="form-control shadow-none mb-3">
        <label class="form-label" >Check-out</label>
        <input type="date" class="form-control shadow-none">
     </div>
     <div class="border bg-light p-3 rounded mb-3">
        <h5 class="mb-3" style="font-size:18px;">FACILITIES</h5>
        <div class="mb-2">
        <input type="checkbox" id="f1"class="form-check-input shadow-none me-1">
        <label class="form-check-label" for="f1" >Facility one</label>
        
        </div>
        <div class="mb-2">
        <input type="checkbox" id="f2"class="form-check-input shadow-none me-1">
        <label class="form-check-label" for="f2" >Facility two</label>
        
        </div>
        <div class="mb-2">
        <input type="checkbox" id="f3"class="form-check-input shadow-none me-1">
        <label class="form-check-label" for="f3" >Facility three</label>
        
        </div>
        <div class="border bg-light p-3 rounded mb-3">
        <h5 class="mb-3" style="font-size:18px;">GUESTS</h5>
        <div class="d-flex">
        <div class="me-3">
        <label class="form-label" >Adults</label>
        <input type="number" class="form-control shadow-none">
        </div>
        <div>
        <label class="form-label" >Children</label>
        <input type="number" class="form-control shadow-none">
        </div>
        </div>
     </div>
     
     </div>
    </div>
  </div>
</nav>
</div>
       -->

       <div class="col-lg-5 col-md-12 px-4">
       <div class="card mb-4 border-0 shadow-sm rounded-3" >
        <div class="card-body">
            <?php
            echo <<<price
               <h4 >$room_data[price] per night</h4>
            price;

             echo <<<rating
                    <div class="mb-3 ">
                           
        
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                           
                        </div>

              rating;
              $fea_q =mysqli_query($conn,"SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id =rfea.features_id WHERE rfea.room_id= '$room_data[id]'");
                      $features_data ="" ;  
                      while($fea_row =mysqli_fetch_assoc($fea_q)){
                            $features_data = "<span class='badge rounded-pill bg-light text-dark  text-wrap me-1 mb-1 '>
                                      $fea_row[name]
                                  </span>";
                                  echo $features_data;
                          }

                     echo<<<features

                     <div class=" mb-3">
                     <h6 class="mb-1">Features</h6>
                     $features_data
                     </div>
                     features;      

              
            ?>
        </div>

    </div>

         </div>
   

              <?php

            //   $room_res=select("SELECT * FROM `rooms` WHERE `status`=? AND`removed`=?",[1,0],'ii');
        //        while($room_data=mysqli_fetch_assoc($room_res)){
        //         //get features of room
        //         $fea_q =mysqli_query($conn,"SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id =rfea.features_id WHERE rfea.room_id= '$room_data[id]'");
        //         $features_data ="" ;  
        //         while($fea_row =mysqli_fetch_assoc($fea_q)){
        //               $features_data = "<span class='badge rounded-pill bg-light text-dark  text-wrap '>
        //                         $fea_row[name]
        //                     </span>";
        //                     echo $features_data;
        //             }
        //        }
        //             //get facilities of room[error in this part]

        //             $fac_q =mysqli_query($conn,"SELECT f.name FROM `facilities` f INNER JOIN  `room_facilities` rfac ON  f.id- rfac.facilities_id WHERE  rfac.room_id='$room_data[id]'");

        //              $facilities_data ="";
        //              while($fac_row =mysqli_fetch_assoc($fac_q)){
        //                 $facilities_data = "<span class='badge rounded-pill bg-light text-dark  text-wrap '>
        //                           $fac_row[name]
        //                       </span>";
        //                       echo $features_data;
        //               }

        //     //get thumbNail of image
        //     $room_thumb= ROOMS_IMG_PATH."thumbnail.jpg";
        //     $thumb_q=mysqli_query($conn,"SELECT * FROM `room_images` WHERE  `room_id`= '$room_data[id]' AND `thumb`='1'");
        //     if(mysqli_num_rows($thumb_q)>0){
        //         $thumb_res=mysqli_fetch_assoc($thumb_q);
        //         $room_thumb=ROOMS_IMG_PATH.$thumb_res['image'];

        //     }
        //     //print room card
        //     echo<<<data


        //     <div class="card mb-4 border-0 shadow" >
        //      <div class="row g-0 p-3 align-items-center">
        //        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        //           <img src="$room_thumb" class="img-fluid rounded" >
        //       </div>
        //            <div class="col-md-5 px-lg-3 px-md-3 px-0">
        //           <h5 class="mb-3">$room_data[name]</h5>
        //          <div class="features" mb-4>
        //                     <h6 class="mb-1">Features</h6>
        //                     $features_data
        //                 </div>
        //                 <div class="facilities mb-3">
        //                     <h6 class="mb-1">Facilities</h6>
        //                    $facilities_data
        //                 </div>

        //                 <div class="guests">
        //                     <h6 class="mb-1">Guests</h6>
        //                     <span class="badge rounded-pill bg-light text-dark  text-wrap ">
        //                         $room_data[adult] Adult
        //                     </span>
        //                     <span class="badge rounded-pill bg-light text-dark  text-wrap ">
        //                         $room_data[children] Children
        //                     </span>
                           
        //                 </div>
        //         </div>
        //       <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
        //      <h6 class="mb-4">$room_data[price] per night</h6>
        //                  <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2 ">Book Now</a>
        //            <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none ">More details</a>
        //              </div>
        //               </div>
        //        </div>
               
             
        //  data;
           

     ?>

<!-- <div class="card mb-4 border-0 shadow" >
             <div class="row g-0 p-3 align-items-center">
     <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
      <img src="images/rooms/1.jpg" class="img-fluid rounded" >
    </div>
    <div class="col-md-5 px-lg-3 px-md-3 px-0">
     <h5 class="mb-3">Simple Room Name</h5>
     <div class="features" mb-4>
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                2 Rooms
                            </span>
                          <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                3 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                LED
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                AC
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                Room Heater
                            </span>
                        </div>

                        <div class="guests">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                5 Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                                4 Children
                            </span>
                           
                        </div>
     </div>
             <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
           <h6 class="mb-4">₹200 per night</h6>
         <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2 ">Book Now</a>
      <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none ">More details</a>
          </div>
           </div>
</div> -->

<!-- 
             </div> 
           </div>
    </div> -->
  

   
    <?php require('inc/footer.php') ?>



  </body>

</html>