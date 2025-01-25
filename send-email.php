<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// var_dump($_POST);

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK){
    $imagePath = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $mail = new PHPMailer(true);

        // Get selected options
        if (isset($_POST['options'])) {
            $selectedOptions = $_POST['options']; // This will be an array
            $optionsList = implode(", ", $selectedOptions); // Convert to a string
        } else {
            $optionsList = 'No options selected';
        }

    try {
        // SMTP server configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Set SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kumarmajhikiran987@gmail.com'; // Your Gmail address
        $mail->Password   = 'pokvzppnljtzldhx'; // Your Gmail password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
    
        // Sender and recipient
        $mail->setFrom('kumarmajhikiran987@gmail.com', 'Kiran');
        $mail->addAddress('kumarmajhikiran987@gmail.com', 'Kunu');

        // Attachments
         $mail->addAttachment($imagePath, $imageName);

        //  
    
    
        $name = htmlspecialchars($_POST['name']);
        $rollNo = htmlspecialchars($_POST['rollNo']);
        // $course = htmlspecialchars($_POST['course']);
        $Batch =htmlspecialchars($_POST['batch']);
        $personalEmail = htmlspecialchars($_POST['personalEmail']);
        $officialEmail = htmlspecialchars($_POST['officialEmail']);
        $mobile = htmlspecialchars($_POST['mobile']);
        $whatsapp = htmlspecialchars($_POST['whatsapp']);
        // $yearOfLeaving = htmlspecialchars($_POST['yearOfLeaving']);
        $address = htmlspecialchars($_POST['address']);
        $presentStatus = htmlspecialchars($_POST['presentStatus']);
        // $occupation = htmlspecialchars($_POST['occupation']);
        $companyAddress = htmlspecialchars($_POST['companyAddress']);
        $designation = htmlspecialchars($_POST['designation']);
        $workingPlace = htmlspecialchars($_POST['workingPlace']);
        $areaOfInterest = htmlspecialchars($_POST['areaOfInterest']);
        // $Specialization = htmlspecialchars($_POST['Specialization']);
        // $Specialization =htmlspecialchars($_POST['Specialization']);

    
    
        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Alumini Registration Form';
        // $mail->Body    = 'This is a test email sent using PHPMailer.';
        $mail->Body    = "Name: ".$name."<br>"."Roll no: ".$rollNo."<br>"."Batch: ".$Batch."<br>"."Specialization: ".$optionsList."<br>"."PersonalEmail: ".$personalEmail."<br>"."OfficialEmail: ".$officialEmail."<br>"."Mobile: ".$mobile."<br>"."Whatsapp: ".$whatsapp."<br>"."<br>"."Address: ".$address."<br>"."PresentStatus: ".$presentStatus."<br>"."CompanyAddress: ".$companyAddress."<br>"."Designation: ".$designation."<br>"."WorkingPlace: ".$workingPlace."<br>"."Area of Interest: ".$areaOfInterest."<br>";
    
        $mail->AltBody = 'There is an error in backend';
    
        
    
        // Send email
        $mail->send();
        echo '
        <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="icon" type="image/png" sizes="32x32" href="IMB-FAV-ICON.png">
            <title>Alumini Registration Form</title>
            
            </head>

            <style>
            
            @media only screen and (max-width:1000px){

                    h1{
                    font-size: 1.5rem;
                    }

                    h3{
                     font-size: 1.3rem;
                    }
                    }

                    @media only screen and (max-width:800px){
                    h1{
                    font-size: 1rem;
                    }

                     h3{
                     font-size: 0.8rem;
                    }
                    }

                    @media only screen and (max-width:510px){
                    h1{
                    font-size: 0.9rem;
                    }

                    h3{
                     font-size: 0.7rem;
                    }
                    }
                     @media only screen and (max-width:40px){
                     
                    h1{
                    font-size: 0.7rem;
                    }

                    h3{
                     font-size: 0.5rem;
                    }
                     }

                     @media only screen and (max-width:810px){
                    #submit-btn{

                        font-size:10px;

                    }
                    }

                    #submit-btn:hover{

                    opacity:0.8;

                         }

                #animation {
                display: none;
                }

            </style>

        <body style="width:100%;height:100vh;margin:0;paddong:0;position:relative;display: flex;align-items: center;justify-content: center;background:#7c7c9c">

                <div id="thank" style="padding:2rem 3rem;border-radius: 10px;background-color: whitesmoke;transition-delay: 250ms;text-align:center;display: flex;align-items: center;justify-content: center;flex-direction:column;box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">

                <div id="submit_animation" style="width:10rem"></div>
                <h1 style="font-family: Arial, Helvetica, sans-serif;color:#56547a">THANK YOU FOR REGISTRATION !</h1>
                <h3 style="font-family: Arial, Helvetica, sans-serif;color:#56547a">WE WILL BE IN TOUCH VERY SOON !</h3>

                <button onclick="goBack()" id="submit-btn" style="padding:0.3rem 0.8rem;cursor:pointer;width: 20%;box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;border: none;background-color: #56547a;color: white;border-radius: 5px;">Go Back</button>

                </div>



                <div id="animation" style="width:100%;height:100%;border-radius: 5px;border:1px solid black;position:absolute;z-index-1000;top:50%;left:50%; transform: translate(-50%, -50%);"></div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>

        <script>

        var animation1 = lottie.loadAnimation({
            container: document.getElementById("animation"), 
            renderer: "svg", 
            loop: false,
            autoplay: true,
            path: "animation.json"
        });

                var animation2 = lottie.loadAnimation({
            container: document.getElementById("submit_animation"), 
            renderer: "svg", 
            loop: false,
            autoplay: true,
            path: "submitted.json"
        });

        function goBack() {
            window.history.back();
        }

        </script>

        </body>

        </html>
        
        ';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    

}
else {
    echo 'Please upload a valid image.';
}

}
else {
    echo 'Invalid request method.';
}

?>
