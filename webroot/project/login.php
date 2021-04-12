<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='reset.css'>
    <link rel='stylesheet' href='login.css'>
    <link rel='stylesheet' href='style.css'>

    <title>Blog - Log In</title>
</head>


<body>
    <?php
    //INSERT INTO `users` (`ID`, `EMAIL`, `PASSWORD`) VALUES (NULL, 'user@admin.com', 'admin123');
    include "nav.php";
    ?>
    <main>

        <form action='login_process.php' method='POST'>
            <div class='section-title'>
                <svg class='spinning-SVG' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sign-in-alt' class='svg-inline--fa fa-sign-in-alt fa-w-16' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                    <path fill='currentColor' d='M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z'></path>
                </svg>
                <h2>Log In</h2>
            </div>

            <div class='field'>
                <input type='email' name='email' class='input' placeholder='Email' required />
            </div>
            <div class='field'>
                <input type='password' name='password' class='input' placeholder='Password' required />
            </div>
            <input class='btn' type='submit' value='Sign In'>

            <?php


            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "login=error") == true) {
                echo "<p> Login was unsuccessful, please try again </p>";
            }

            ?>
        </form>

    </main>

</body>

</html>