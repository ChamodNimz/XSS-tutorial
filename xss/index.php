<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>XSS demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    
</head>
<body class="p-4">

<h1 class="text-info display-4 p-3">Welcome to XSS demonstration</h1>
<hr class="my-2">
<br>
<form action="save.php" method="post">

<div class="container">
<div class="row">
    <div class="col-md-2"><label for="" class=" text-dark">Enter input here</label></div>
    <div class="col-md-5"><input type="text" name="text" class="form-control shadow-lg"></div>  
    <div class="col-md-5"></div>
    <div class="col-md-12">

    <ul style="list-style:none;" class="mt-3 ">
        <li class="text-info"><input  type="radio" value="0" name="toggle" required> Not-secure</li>
        <li class="text-info"><input type="radio" value="1" name="toggle" required> Secure - using htmlentities</li>
        <li class="text-info"><input type="radio" value="2" name="toggle" required> Secure - using regex</li>
    </ul>

    </div>
</div>
<button type="submit" class="btn btn-info mt-3 shadow-lg">Submit</button>
</div>

    





</form>

<div class="card p-2 m-5 shadow-lg">
    <div class="card-body">
    <?php
    if(isset($_GET['back'])){
        $file=fopen("dataBase","r") or die("unable to open file");
        $data=fread($file,filesize("dataBase"));

        echo"<br/><div class='display-4 text-dark'>Your input is :</div><br/><br/> <span class='lead'>".$data."</span>";
        fclose($file);

        if(isset($_GET["error"])){
            echo $_GET['error'];
        }
    }
?>
<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <div class="card p-4">
            <h6 class="text-dark">Developed by -  Chamod Nimsara</h6>
            <div class="row">
                <div class="col-md-6">
                <a href="https://www.youtube.com/channel/UCgMQJF8KT-CxBKkZEAOhsnQ">
                <div class="card mt-3 p-2 rounded-5 text-light text-center" style="height:58px;width:150px;background-color:#cc181e;"> Subscribe <i class="fa fa-bell"></i></div>
                </a>
                
                </div>
                <div class="col-md-6">
                    <div class="card rounded-5  mt-3 p-2  text-light text-center" style="height:58px;width:150px;"> 
                    <img src="logo.png" alt="" height="50" width="50" / >
                    </div>      
                </div>
                <h6 class=" ml-3 mt-3 text-danger">Art Of Coding</h6>
            </div>
           
        </div>
    </div>
</div>
    </div>
</div>

    
</body>
</html>