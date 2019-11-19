<?php

$nameErr = "";
$name = "";

$emailErr = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];

    $email = $_POST["email"];

    if (empty($name)) {
    
        $nameErr = "Name is required";
    }

    if (empty($email)) {
    
        $emailErr = "E-mail is required";
    }
    elseif (!strpos($email, "@")) {

        $emailErr = "E-mail is invalid"; 
    }

    if (empty($nameErr) && empty($emailErr)) {

        session_start();

        $_SESSION['name'] = $name;

        $_SESSION['email'] = $email;

        header('Location: display_form_results.php');
    }
}
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Display form</title>
    </head>
    <body>
        <div class="container">

            <h1>Enter your name and your e-mail please</h1>

            <?php
            
            if (!empty($nameErr) || !empty($emailErr)) {

                echo "<div class=\"alert alert-danger\">";

                echo "<ul class=\"mb-0\">";

                if (!empty($nameErr)) {

                    echo "<li>".$nameErr."</li>";
                }

                if (!empty($emailErr)) {

                    echo "<li>".$emailErr."</li>";
                }

                echo "</ul>";

                echo "</div>";
            }

            ?>

            <form action="display_and_process_form.php" method="post">

                <div class="form-group">
                    <label for="name">Name</label> 
                    <input type="text" name="name" id="name" value="<?php echo $name ?>" class="form-control">
                    <small id="nameHelp" class="form-text text-muted">
                        Required
                    </small>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="<?php echo $email ?>" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">
                        Required
                    </small>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>