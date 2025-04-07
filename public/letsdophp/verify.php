<?php   
include ('link.php');

if(isset($_GET['user_email']) && isset($_GET['v_token'])){
    $user_email = $_GET['user_email'];
    $v_token = $_GET['v_token'];
    $checkuery = "SELECT * FROM ohio WHERE email = '$user_email' AND v_token = '$v_token'";
    $result = mysqli_query($hamza_12, $checkuery);
    if($result){
        if(mysqli_num_rows($result) > 0){
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['verification'] == 0 ){
                    $updatequery = "UPDATE ohio SET verification = 1 WHERE email = '$user_email'";
                    $fi = mysqli_query($hamza_12, $updatequery);
                    if($fi){
                     echo"<script>
                     alert('your good');
                     window.location.href = 'log.php';
                     </script>";
                    }
                
             else{
                echo"<script>
                alert('don't mess with me');
                window.location.href = 'form.php';
                </script>";
             }
        }
        }
        else{
            echo"<script>
                alert('not found');
                window.location.href = '';
                </script>";
        }
    }
}

?>

