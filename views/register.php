<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<?php
 
// inserting PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Adding the mPDF library
require_once '../vendor/autoload.php';
// inserting mail.php
require '../controller/mail.php';

session_start();
if (isset($_POST['submit'])) {
    // Bind the data into variables

    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];
    $edu_level = $_POST['edu-level'];
    $industry = $_POST['industry'];
    $exp = $_POST['exp'];

    // inserting the db connection 
    
    require_once '../controller/connection.php';
    
    // check for the duplicate email
    $sql = "SELECT * FROM `register` WHERE email ='$email'";
    $sql_check = mysqli_query($connection,$sql);
    $checkrows=mysqli_num_rows($sql_check);

    if ($checkrows>0) {
        echo "Email already in use !!!";
    }else{
        $query = "INSERT INTO 
    `register`(`first-name`, `last-name`, `email`, `phone`, `education`, `edu_level`, `industry`, `exp`)
    VALUES('$firstname','$lastname','$email','$phone','$education','$edu_level','$industry','$exp')";
    
    $result = mysqli_query($connection,$query)or die(mysqli_error($connection));
    echo "New Record Created Successfully !!!";
}


// Get the latest 'ID' from Table 
    $last_id = mysqli_insert_id($connection);
    $get_record = "SELECT `first-name`,`last-name`  FROM `register` WHERE `u_id` = '$last_id' ";
    $record = mysqli_query($connection,$get_record);

     // Fetch the needful data to generate the PDF 
     while ($data = mysqli_fetch_assoc($record)) {
        
        $pdf = "<div style='border:1px solid;width:50%;'>
        <p>Logo</p>
        <h3>Dear ".$data['first-name']." ".$data['last-name']."</h3>
        
        <p>You application was processed. According to your qualifications and skills you are [[ Decision]] for
        the current opportunity at our organization.</p>
        <p>
        Cheers
        Managing Director
        </p>
        </div>";
    

        $mpdf =  new Mpdf\Mpdf();
        $mpdf->WriteHTML($pdf);

        // The watermark content 
        $mpdf->SetWatermarkText('Register Details');
        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha = 0.1;


        //save the file put which location you need folder/filename
        $mpdf->Output("doc.pdf", 'F');
        //out put in browser below output function
        $mpdf->Output();
}


    // PHPmailer with SMTP -> sends the recent record entered 
    $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp1.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = Email;                      
    $mail->Password   = Pass;                               
    $mail->SMTPSecure = tls;         
    $mail->Port       = 587;                                    

    //Recipients
    $mail->setFrom(Email, 'Harshana');
    $mail->addAddress($email);     // Add a recipient
    $mail->addAddress(Email);      
    $mail->addReplyTo(Email);


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Details of the registered user';
    $mail->Body    = 'First name:
     '.$firstname.'Last name:
      '.$lastname.'Email: '.$email.
      'Phone Number: '.$phone.'Education: '.$education.
      'Education Level: '.$edu_level. 'Industry: '.$industry.
      'Working Industry: '.$industry.'Experience: '.$exp;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    // Closing the sql connection:
    mysqli_close($connection);

}

?>
<div class="container">
    <div class="row">
    <div class="col-md-6 col-sm-offset-2">
    <small class="details">* Fields are Mandatory</small><br><br>
        <form action="" method="post">
        <label for="first-name">First Name</label>
        <input type="text" name="first-name" id="first-name" class="form-control"
         placeholder="Enter First Name">

         <label for="last-name">Last Name *</label>
        <input type="text" name="last-name" id="first-name" class="form-control"
         placeholder="Enter Last Name" required>

         <label for="first-name">Email *</label>
        <input type="text" name="email" id="email" class="form-control"
         placeholder="Enter Email" required>

         <label for="first-name">Phone Number</label>
        <input type="text" name="phone" id="phone" class="form-control"
         placeholder="Enter Phone Number">

         <div class="form-group">
        <label for="education">Education *</label>
            <select class="form-control" id="education" name="education" required>
            <option value="Software engineering">Software engineering</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Computer Applications">Computer Applications</option>
            <option value="others">Others</option>
            </select>
    </div>
    <div class="form-group">
        <label for="education">Education Level *</label>
            <select class="form-control" id="edu-level" name="edu-level" required>
            <option value="Post Graduate">Post Graduate</option>
            <option value="Under Graduate">Under Graduate</option>
            <option value="Diploma">Diploma</option>
            <option value="Others">Others</option>
            </select>
    </div>
    <div class="form-group">
        <label for="industry">Working Industry *</label>
            <select class="form-control" id="industry" name="industry" required>
            <option value="Software engineering">Software engineering</option>
            <option value="QA Automation">QA Automation</option>
            <option value="Database administration">Database administration</option>
            <option value="System Administration">System Administration</option>
            <option value="Others">Others</option>
            </select>
    </div>
    <div class="form-group">
        <label for="education">Work Experience *</label>
            <select class="form-control" id="exp" name="exp" required>
            <option value="1">1 Yr</option>
            <option value="2">2 Yrs</option>
            <option value="3">3 Yrs</option>
            <option value="4">4 Yrs</option>
            <option value="5">5 Yrs</option>
            <option value="6">6 Yrs</option>
            <option value="More than 6">More than 6 Yrs</option>
            </select>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    </div>
</div>
<script src="../assets/js/jquery-3.2.1.min.js"></script>    
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>