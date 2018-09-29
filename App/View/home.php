<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paragraf Test</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link rel="stylesheet" href="libs/css/bootstrap-grid.min.css">
    <link type="text/css"   rel="stylesheet"    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">

</head>
<body id="body">
    <div class="container" style="margin-top: 1em;">
        
        <h2>This is homepage</h2>
        <p>With arguments: </p></br>
        <?php
            foreach($data as $d) {
                echo $d.'</br>';
            }
        ?>
        <p>Notification: I haven't finished form</p>
        <h2>Insert new user</h2> 
        <form action="./" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
<footer>
</footer>
</body>
</html>