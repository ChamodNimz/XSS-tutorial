<?php 

$text=$_POST['text'];
$toggle=$_POST['toggle'];

if($toggle==0){

    $file = fopen("dataBase","a") or die("unable to open file");
    fwrite($file,$text."<br/>");
    header("Location:index.php?back=1");

}else if($toggle==2){

    unlink("dataBase");
    $file = fopen("dataBase","a") or die("unable to open file");

    //secure
    if(isValid($text)){
        fwrite($file,$text."<br/>");
        header("Location:index.php?back=1");
    }
    else{
        fwrite($file,"<br/>");
        header("Location:index.php?back=1&error='pfff...try again LOL. u can't enter numbers or < or > or  ; or / or \\'");
    }
   
}
else{

    unlink("dataBase");
    $file = fopen("dataBase","a") or die("unable to open file");

    //secure
    $text=secure($text);
    fwrite($file,$text."<br/>");
    header("Location:index.php?back=1");
    
}



function secure($dirtyString){
    return htmlentities($dirtyString,ENT_QUOTES,"UTF-8");
}
function isValid($string){
    $pattern="/^[a-zA-Z\s\-]{3,300}$/";

    if(preg_match($pattern,$string)){
        return true;
    }
    else{
        return false;
    }
}
?>