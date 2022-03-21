<?php
session_start();
	require_once 'connector.php';
	$link = mysqli_connect($host, $user, $password, $database) 
		        or die("Ошибка " . mysqli_error($link));
    mysqli_set_charset($link, 'utf8');
    $session = $_SESSION['name'];
	$itemid = $_POST['useritem'];
	$page = $_POST['frompage'];
	$frompage = $_POST['fromsubpage'];
	$userqty = $_POST['userqty'];
	$usercolor = $_POST['usercolor'];
	$usercoloHex = $_POST['usercolorHex'];
	$userLinks = $_POST['userLinks'];
	$usercolorCheck = $usercoloHex . '/' . $usercolor . '|' . $userLinks;
    $query = "SELECT * FROM usercart WHERE EXISTS (SELECT * FROM usercart WHERE id LIKE $itemid AND color1 LIKE '$usercolorCheck' AND userid LIKE '$session')";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	mysqli_set_charset($link, 'utf8');
	 if($result)
    {
    	while ($row = mysqli_fetch_row($result)) {
    	    $checker = $row[0];
    	}       
    }
    if  ($checker == 0){
        $query = "SELECT * FROM usercart WHERE id LIKE $itemid AND userid LIKE '$session'";
    	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    	mysqli_set_charset($link, 'utf8');
    	 if($result)
        {       
            $row = mysqli_num_rows($result);
    	    $checker = $row;   
        }
        if ($checker == 0){
            $query ="INSERT INTO usercart (id, name, used, price, link, type, manufname, color1, color2, color3, color4, longdescr, longused, userid, userqty)
    			SELECT id, name, used, price, link, type, manufname, '$usercolorCheck', '1', color3, color4, longdescr, longused, '$session', '$userqty' FROM items WHERE id = '$itemid'";
    		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    		mysqli_set_charset($link, 'utf8');
        }else{
            $itemNumber = $checker + 1;
            $query ="INSERT INTO usercart (id, name, used, price, link, type, manufname, color1, color2, color3, color4, longdescr, longused, userid, userqty)
    			SELECT id, name, used, price, link, type, manufname, '$usercolorCheck', $itemNumber, color3, color4, longdescr, longused, '$session', '$userqty' FROM items WHERE id = '$itemid'";
    		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    		mysqli_set_charset($link, 'utf8');
        }
    }else{
        $query = "SELECT userqty FROM usercart WHERE id LIKE $itemid AND color1 LIKE '$usercolorCheck' AND userid LIKE '$session'";
    	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    	mysqli_set_charset($link, 'utf8');
    if($result)
    {       
        $row = mysqli_fetch_row($result);
	    $checker = $row[0];   
    }
        $newQtyItem = $checker + 1;
        $query ="UPDATE usercart SET userqty = $newQtyItem WHERE id = $itemid AND color1 = '$usercolorCheck' AND userid = '$session'";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		mysqli_set_charset($link, 'utf8');
    }
    // закрываем подключение
    mysqli_close($link);
    if ($_POST['whenBtn'] == ''){
        echo "<form method='POST' action='description.php' class='rediForm'><input type='hidden' name='toDoId' value='" . $_POST['toDoId'] . "'><input type='hidden' name='forCrubs' value='" . $_POST['forCrubs'] . "'><input type='hidden' name='toDoSite' value='" .$_POST['toDoSite'] . "'/></form>";
        echo "<script>document.getElementsByClassName('rediForm')[0].submit();</script>";
    }else if ($_POST['toDoSite'] == '../index.php'){
        header('Location: http://sissi.salon/' . $_POST['toDoSite'] . '#populars');
    }else{
        header('Location: http://sissi.salon/' . $_POST['toDoSite']);
    }
    
?>


