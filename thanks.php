<?php
$firstNameErr = $lastNameErr = $emailErr = $phoneNumberErr = $messageErr = "";
$firstName = $lastName = $email = $gender = $phoneNumber = $message = "";
$errorCount = 0;
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function showError($data)
{
    if ($data != "") {
        return $data . "</br>";
    }
}



    if (empty($_POST["user_lastName"])) {
        $nameErr = "Name is required";
        $errorCount ++;
    } else {
        $name = $_POST["user_lastName"];
    }

    if (empty($_POST["user_firstName"])) {
        $nameErr = "Name is required";
        $errorCount ++;
    } else {
        $name = $_POST["user_firstName"];
    }

    if (empty($_POST["user_mail"])) {
        $emailErr = "Email requis";
        $errorCount ++;
    } else {
        $email = test_input($_POST["user_mail"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format de l'email invalide";
            $errorCount ++;
        }
    }

    if (empty($_POST["user_phoneNumber"])) {
        $phoneNumberErr = "Numéro de téléphone requis";
        $errorCount ++;
    } else {
        $phoneNumber = $_POST["user_phoneNumber"];
    }

    if (empty($_POST["user_message"])) {
        $messageErr = "Message requis";
        $errorCount ++;
    } else {
        $message = $_POST["user_message"];
    }



if ($errorCount === 0){

    echo "Merci " . $firstName . " " . $lastName . " " . "de nous avoir contacté à propos de “" . $_POST['sujets'] . "”. </br>
</br>
Un de nos conseiller vous contactera soit à l’adresse " . $email . " ou par téléphone au " . $phoneNumber . " dans les plus brefs délais pour traiter votre demande :</br></br>"

        . $message;
} else if ($errorCount > 0){
    echo showError($firstNameErr);
    echo showError($lastNameErr);
    echo showError($emailErr);
    echo showError($phoneNumberErr);
    echo showError($messageErr);
}
