<?php
/**
 * User: BalaMG
 * Date: 05-08-2018
 * Time: PM 10:28
 */
function clean($string) {

    $string = str_replace(' ', '', $string); // Replaces all blank spaces.

   //return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars only letters and numbers

  return preg_replace('/[^A-Za-z\-]/', '', $string); // Removes special chars and numbers.
}

if($_POST['action']=="jai"){
    $name1=$_POST['a1'];
    $name2= $_POST['a2'];
    $f1=strtolower($_POST['a1']);
    $f2=strtolower($_POST['a2']);
    $f3=$f1.$f2;
    $cleaner=clean($f3);
    $splitby1=str_split($cleaner,1);
    $unq=array_unique($splitby1);
    $counter=count($unq);
    $values=array('Friends','Lovers','Affection','Marriage','Enemy','Siblings','Sorry no input found');
  function outs($result,$val1,$val2,$imgs){
    echo $val1.' '.'<img src="'.$imgs.'" width="50px"/>'.' '.$val2.'</br></br><u><b>'.$result.'</b></u>';
    //log it
    echo "<script>
$(function(){
	//$('#couple')[0].reset();
    $('#success').modal('show');
	});
</script>";
}
//friends
if (in_array($counter,array(5,14,16,18,21,23))){
    $img='../img/friend.jpg';
    outs($values[0],$name1,$name2,$img);
}
//lovers
elseif(in_array($counter,array(3,10,19))){
    $img='../img/love.jpg';
    outs($values[1],$name1,$name2,$img);
    }
//Affection
 elseif(in_array($counter,array(8,12,13,17))){
     $img='../img/affect.png';
     outs($values[2],$name1,$name2,$img);
    }
//Marriage
elseif(in_array($counter,array(6,11,15,26))){
    $img='../img/mar.png';
    outs($values[3],$name1,$name2,$img);
    }
//Enemy
elseif(in_array($counter,array(2,4,7,9,20,22,24,25))){
    $img='../img/enemy.png';
    outs($values[4],$name1,$name2,$img);
    }
elseif(in_array($counter,array(1))){
    $img='../img/sib.png';
    outs($values[5],$name1,$name2,$img);
}
else{
        echo $values[6];
    }
    //Something to write to txt log
    $log="User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
        "user: ".$name1.PHP_EOL.
        "cursh: ".$name2.PHP_EOL.
        "-------------------------------".PHP_EOL;
//Save string to log, use FILE_APPEND to append.
    file_put_contents('log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
}