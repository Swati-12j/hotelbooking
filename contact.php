<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NS Hotel - CONTACT</title>

   
    <?php require('inc/links.php') ?>

</head>

<body class="bg-light">


    <?php require('inc/header.php') ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"> </div>
            <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Alias magni obcaecati
                temporibus similique assumenda inventore rem soluta unde ad distinctio.
            </p>
        </div>
    
   <div class="container">
    <div class="row">
<div class="col-lg-6 col-md-6 mb-5 px-4">
   <div class="bg-white rounded shadow p-4  ">
   <iframe class="w-100 rounded mb-4"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108704.35790127786!2d74.8701203!3d31.633544149999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391964aa569e7355%3A0xeea2605bee84ef7d!2sAmritsar%2C%20Punjab!5e0!3m2!1sen!2sin!4v1730796499478!5m2!1sen!2sin"
                    height="320px" loading="lazy"></iframe>
  <h5>Address</h5>  
  <a href="https://maps.app.goo.gl/RH9MDNhgQF9MsrUp7" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
  <i class="bi bi-geo-alt-fill"></i> XYZ,jalandhar,Punjab
  </a>
  <h5 class="mt-4">Call us</h5>
                    <a href="tel: +919914964546" class="d-inline-block mb-2 text-decoration-none text-dark"><i
                            class="bi bi-telephone-fill"></i>+919914964546</a>
                    <br>
                    <a href="tel: +919914964546" class="d-inline-block  text-decoration-none text-dark"><i
                            class="bi bi-telephone-fill"></i>+917015063651</a>
                            <h5 class="mt-4">
                                Email
                            </h5>
                            <a href="mailto:swatiolla0001@gmail.com" class="d-inline-block  text-decoration-none text-dark">
                            <i class="bi bi-envelope-fill "></i>  swatiolla0001@gmail.com</a>
                            
                            <h5 class="mt-4">Follow us</h5>
                    <a href="#" class="d-inline-block mb-3 text-dark fs-5 me-2">
                    <i class="bi bi-twitter-x me-1"></i>
                        
                    </a>
                   
                    <a href="#" class="d-inline-block mb-3 text-dark fs-5 me-2">
                    <i class="bi bi-facebook me-1"></i>
                    </a>
                   
                    <a href="#" class="d-inline-block   text-dark fs-5 ">
                    <i class="bi bi-instagram me-1"></i>
                    </a>
   </div>

</div>
<div class="col-lg-6 col-md-6  px-4">
   <div class="bg-white rounded shadow p-4 ">
    <form method="POST">
        <h5>Send a message</h5>
        <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Name</label>
                        <input name= "name" required type="text" class="form-control shadow-none">

         </div>
         <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Email</label>
                        <input name= "email" required type="email" class="form-control shadow-none">

         </div>
         <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Subject</label>
                        <input name= "subject" required  type="text" class="form-control shadow-none">

         </div>
         <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Message</label>
                        <textarea name= "message" required class="form-control" rows="5" style="resize:none;"></textarea>

         </div>
         <button name= "send" type="submit" class="btn btn-white custom-bg mt-3">SEND</button>
    </form>
    
   </div>

</div>

</div>
    </div>
  
<?php  
if(isset($_POST['send'])){
    $frm_data =filteration($_POST);
    $q="INSERT INTO `user_queries`( `name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
    $values=[$frm_data['name'],$frm_data['email'], $frm_data['subject'],$frm_data['message']];
    $res =insert($q,$values,'ssss');
    if($res==1){
        alert('success','Mail sent!');
    }
    else{
        alert('error','Server Down! Try again later.');
    }
}

?>
   
    <?php require('inc/footer.php') ?>



</body>

</html>