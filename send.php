<?php
session_start();
$session = $_SESSION['name'];
$to = "salonsissi.uzh@gmail.com";
//$to = "ehlysht@gmail.com";
$subject = 'Замовлення';
$header = "From:sissi@mail.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

if ($_POST['fullName'] == ''){
    $lastn = $_POST['ulname'];
    $firstn = $_POST['ufname'];
    $emailn = $_POST['uemail'];
    $cityn = $_POST['ucity'];
    $phonen = $_POST['utel'];
    $delyvery = $_POST['udelyvery'];
    $import['text'] = implode("\n", (array) $_POST['eitems']);
    $subject = "Заказ с сайта от ";
    $subject .= $lastn;
    $subject .= $firstn;
    $howToSend = $_POST['radio-group'];
    if ($_POST['submited'] == 'так'){
        $needCall = $_POST['submited'];
    }else{
        $needCall = 'Ні';
    }
    $message = "Адрес електронної пошти: " . $emailn . "<br>";
    $message .= "Ім'я: " . $lastn . "<br>";
    $message .= "Прізвище: " . $firstn . "<br>";
    $message .= "Місто: " . $cityn . "<br>";
    $message .= "Відділення нової пошти: " . $delyvery . "<br>";
    $message .= "Номер телефону: " . $phonen . "<br>";
    $message .= "Список замовлених товарів: <br>";
    $message .= "<div style='color: red;'>" . $import['text'] . "<br></div>";
    $message .= "Tелефонувати для підтвердження замовлення? " . $needCall . "<br>";
    $message .= "Варіант оплати: " . $howToSend . "<br>";
    if (mail($to, $subject, $message ,$header))
    { 
        require_once 'connector.php'; // подключаем скрипт
    	
    	$link = mysqli_connect($host, $user, $password, $database) 
    	            or die("Ошибка " . mysqli_error($link)); 
            mysqli_set_charset($link, 'utf8');
    	    $query ="DELETE FROM usercart WHERE userid = '$session'";
    	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    	 	
    	    mysqli_close($link);
    header('Location: http://sissi.salon/thankyou.php');
    } else {
        
    }
}else if($_POST['fullName'] == 'OneClick'){
    $subject .= " В один клік";
    $lastn = $_POST['ulname'];
    $phonen = $_POST['utel'];
    $import['text'] = implode("\n", (array) $_POST['eitems']);
    
    $message = "Ім'я: " . $lastn . "<br>";
    $message .= "Номер телефону: " . $phonen . "<br>";
    $message .= "<div style='color: red;'>" . $import['text'] . "<br></div>";
    if (mail($to, $subject, $message ,$header))
    { 
        require_once 'connector.php'; // подключаем скрипт
    	
    	$link = mysqli_connect($host, $user, $password, $database) 
    	            or die("Ошибка " . mysqli_error($link)); 
            mysqli_set_charset($link, 'utf8');
    	    $query ="DELETE FROM usercart WHERE userid = '$session'";
    	    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    	 	
    	    mysqli_close($link);
    header('Location: http://sissi.salon/thankyou.php');
    }
}
echo $_POST['name'];
?>