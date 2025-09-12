<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require __DIR__ . '/../vendor/autoload.php';

class Sender
{
    //Create an instance; passing `true` enables exceptions
    private PHPMailer $mail;

    public function __construct()
    {
        //Create an instance; passing `true` enables exceptions
        $this->mail = new PHPMailer(true);

        //Server settings
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'kasomediatrice1407@gmail.com';         //SMTP username
        $this->mail->Password   = 'mkmi dxue srbz dwdh';                  //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //From address
        $this->mail->setFrom('kasomediatrice1407@gmail.com', 'ICS 2.2 Admin');
        $this->mail->isHTML(true);                                        //Set email format to HTML
    }

    //Recipients + Content
    public function sendVerification(string $email, string $username): bool
    {
        try {
            //Recipients
            $this->mail->clearAddresses();                                //clear old recipients if re-using object
            $this->mail->addAddress($email, '');                           //Add a recipient
            //$this->mail->addReplyTo('info@example.com', 'Information');
            //$this->mail->addCC('cc@example.com');
            //$this->mail->addBCC('bcc@example.com');

            //Attachments
            //$this->mail->addAttachment('/var/tmp/file.tar.gz');          //Add attachments
            //$this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');     //Optional name

            //Content
            $this->mail->Subject = 'Welcome to ICS 2.2 !Account verification';
            $this->mail->Body    =
                'Hello ' . htmlspecialchars($username) . ',<br><br>
                 you requested an account on ICS 2.2<br><br>
                 In order to use this account you need to
                 <a href="http://localhost/InternetAppCourse/Submit.php?email=' . urlencode($email) . '">
                     Click here
                 </a> to complete the registration process.<br><br>
                 <br><br>
                 Regards,<br>
                 System Admin<br>
                 ICS 2.2';

            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            //Send the message
            return $this->mail->send();
        } catch (Exception $e) {
            //Handle errors
            throw new Exception("Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}");
        }
    }
}
