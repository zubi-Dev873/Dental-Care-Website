<?php

session_start();
$con = mysqli_connect("localhost","root","","dental");

if(isset($_POST['save_select']))
{
    $doctor   = $_POST ['doctor'];
    $services = $_POST ['services'];
    $username = $_POST ['username'];
    $email    = $_POST ['email'];
    $date     = $_POST ['date'];
    $time     = $_POST ['time'];

    $query = "INSERT INTO  patient_data (Doctor,services,username,email,date,time) VALUES ('$services', '$doctor', '$username', '$email', '$date', '$time')";
    $query_run = mysqli_query($con , $query);

    if($query_run){
        $_SESSION['status'] = "Booked Successfully";
        
        header("location: appointment.php");

    }
    else{
        $_SESSION['status'] = " not inserted";
        
        header("location: appointment.php");
    } 

} 

if(isset($_POST['contact_submit']))
{
                    $name     = $_POST ['name'] ;  
                    $email    = $_POST ['email'] ;
                    $subject  = $_POST ['subject'] ;
                    $message  = $_POST ['message'] ;

                    $query = "INSERT INTO  patient_contact (name,email,subject,message) VALUES ('$name', '$email', '$subject', '$message')";
                    $query_run = mysqli_query($con , $query);         


                    if($query_run){
                        $_SESSION['status'] = "We Will Contact You Back Soon!";
                        
                        header("location: contact.php");
                
                    }
                    else{
                        $_SESSION['status'] = " not inserted";
                        
                        header("location: contact.php");
                    } 


}
if(isset($_POST['email_submit']))

{
    $email     = $_POST ['email'] ; 

    $query = "INSERT INTO patient_email (email) VALUES ('$email')";
    $query_run = mysqli_query($con , $query);

    if($query_run){
        $_SESSION['emailstatus'] = "For Signing UP !";
        
        header("location: index.php");

    }
    else{
        $_SESSION['emailstatus'] = " not inserted";
        
        header("location: index.php");
    } 
}

?>