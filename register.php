<?php

require_once"bootstarp.php";


if (isset($_POST['submit'])) {
    if (!empty($_FILES['photo']['name'])) {

        $file = $_FILES['photo']['tmp_name'];
        $file_parts = explode('.', $_FILES['photo']['name']);
        $extension = end($file_parts);
        $photo = uniqid('photo_', true) .time() . '.' . $extension;
        $destination = 'upload/pic/' .  $photo;

  //die($filename);
        move_uploaded_file($file, $destination);

    }


    if (!empty($_POST['email']) && !empty($_POST['password'])) {





        $name= trim($_POST['name']);
        $gender= $_POST['gender'];
        $email= trim($_POST['email']);
        $password=$_POST['password'];
        $password = password_hash($password, PASSWORD_BCRYPT);

        try{



            $query= 'INSERT INTO customers(name,gender,email,password,photo,email_verification_token) VALUES (:name,:gender,:email,:password,:photo,:email_verification_token)';

            $email_verification_token = sha1(time() . $email . $photo);

            $stmt= $con->prepare($query);
            $stmt-> bindParam(':name', $name);
            $stmt-> bindParam(':gender', $gender);
            $stmt-> bindParam(':email', $email);
            $stmt-> bindParam(':password', $password);
            $stmt-> bindParam(':photo', $photo);
            $stmt-> bindParam(':email_verification_token', $email_verification_token);
            $stmt-> execute();
            $con ->lastInsertId();
             try {
                $mail = new \PHPMailer\PHPMailer\PHPMailer();
                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '516058cc1463ef';                 // SMTP username
                $mail->Password = '76503177314933';                           // SMTP password
                // $mail->SMTPSecure = 'tls';  
                $mail->SMTPSecure = false;
                $mail->SMTPAutoTLS = false;                          // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to
                //Recipients
                $mail->setFrom('no-reply@project.bappy', 'SSB PHP 02');
                $mail->addAddress($email);
                $mail->isHTML();                                  // Set email format to HTML
                $mail->Subject = 'Verify';
                $mail->Body = 'Dear user, please click the following link to activate your account:<br/>
<a href="http://project.bappy/projectcrud/CRUD/activate.php?token=' . $email_verification_token . '">Click Here</a>
                ';
                $mail->send();
            } catch (Exception $e) {
                notification('Registration successful but mail not sent.');
                redirect('login');
            }
            notification('Registration successful.');
            redirect('login');
        } catch (Exception $e) {
            notification($e->getMessage(), 'danger');
            redirect('add');
        }
    } else {
        notification('Please provide all the required information', 'danger');
        redirect('add');
    }
}