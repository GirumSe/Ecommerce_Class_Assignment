<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>


  <main>

    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Contact</span> Us
      </div>
      <p class="nero__text">
      If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.
      </p>
    </div>
  </main>

<div class="col-md-12

<div class="box" >

<div class="box-header" >

<center>

<?php

$get_contact_us = "select * from contact_us";

$run_conatct_us = mysqli_query($con,$get_contact_us);

$row_conatct_us = mysqli_fetch_array($run_conatct_us);

$contact_heading = $row_conatct_us['contact_heading'];

$contact_desc = $row_conatct_us['contact_desc'];

$contact_email = $row_conatct_us['contact_email'];

?>

<h2> <?php echo $contact_heading; ?> </h2>

<p class="text-muted" >
<?php echo $contact_desc; ?>
</p>

</center><!-- center Ends -->

</div><!-- box-header Ends -->

<form action="contact.php" method="post" >

<div class="form-group" >

<label>Name</label>

<input type="text" class="form-control" name="name" required>

</div>

<div class="form-group">

<label>Email</label>

<input type="text" class="form-control" name="email" required>

</div>

<div class="form-group">

<label> Subject </label>

<input type="text" class="form-control" name="subject" required>

</div>

<div class="form-group">

<label> Message </label>

<textarea class="form-control" name="message"> </textarea>

</div>


<div class="form-group">

<label> Select Enquiry Type </label>


<select name="enquiry_type" class="form-control">

<option> Select Enquiry Type </option>

<?php

$get_enquiry_types = "select * from enquiry_types";

$run_enquiry_types = mysqli_query($con,$get_enquiry_types);

while($row_enquiry_types = mysqli_fetch_array($run_enquiry_types)){

$enquiry_title = $row_enquiry_types['enquiry_title'];

echo "<option> $enquiry_title </option>";

}

?>

</select>

</div>


<div class="text-center">

<button type="submit" name="submit" class="btn btn-primary">

<i class="fa fa-user-md"></i> Send Message

</button>

</div>

</form>

<?php

if(isset($_POST['submit'])){

// Admin receives email through this code

$sender_name = $_POST['name'];

$sender_email = $_POST['email'];

$sender_subject = $_POST['subject'];

$sender_message = $_POST['message'];

$enquiry_type = $_POST['enquiry_type'];

$new_message = "

<h1> This Message Has Been Sent By $sender_name </h1>

<p> <b> Sender Email :  </b> <br> $sender_email </p>

<p> <b> Sender Subject :  </b> <br> $sender_subject </p>

<p> <b> Sender Enquiry Type :  </b> <br> $enquiry_type </p>

<p> <b> Sender Message :  </b> <br> $sender_message </p>

";

$headers = "From: $sender_email \r\n";

$headers .= "Content-type: text/html\r\n";

mail($contact_email,$sender_subject,$new_message,$headers);

// Send email to sender through this code

$email = $_POST['email'];

$subject = "Welcome to my website";

$msg = "I shall get you soon, thanks for sending us email";

$from = "sad.ahmed22224@gmail.com";

mail($email,$subject,$msg,$from);

echo "<h2 align='center'>Your message has been sent successfully</h2>";

}


?>

</div>

</div>



</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
