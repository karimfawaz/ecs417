<?php
 include 'nav.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='reset.css'>
    <link rel='stylesheet' href='style.css'>
    <link rel='stylesheet' href='blog.css'>
    <title>Blog - Karim Fawaz</title>
</head>


<body>




    <main>

        <div id='blog'>
            <div class='section-title'>
                <svg class='spinning-SVG' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='signature' class='svg-inline--fa fa-signature fa-w-20' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'>
                    <path fill='currentColor' d='M623.2 192c-51.8 3.5-125.7 54.7-163.1 71.5-29.1 13.1-54.2 24.4-76.1 24.4-22.6 0-26-16.2-21.3-51.9 1.1-8 11.7-79.2-42.7-76.1-25.1 1.5-64.3 24.8-169.5 126L192 182.2c30.4-75.9-53.2-151.5-129.7-102.8L7.4 116.3C0 121-2.2 130.9 2.5 138.4l17.2 27c4.7 7.5 14.6 9.7 22.1 4.9l58-38.9c18.4-11.7 40.7 7.2 32.7 27.1L34.3 404.1C27.5 421 37 448 64 448c8.3 0 16.5-3.2 22.6-9.4 42.2-42.2 154.7-150.7 211.2-195.8-2.2 28.5-2.1 58.9 20.6 83.8 15.3 16.8 37.3 25.3 65.5 25.3 35.6 0 68-14.6 102.3-30 33-14.8 99-62.6 138.4-65.8 8.5-.7 15.2-7.3 15.2-15.8v-32.1c.2-9.1-7.5-16.8-16.6-16.2z'></path>
                </svg>
                <h2>Blog</h2>

            </div>


            <form action="blog.php" method="GET" class="filterForm">
                <select size="1" name="month">
                    <option selected value="0">See All</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <button type="submit">Filter Month</button>
            </form>
            <div class='posts'>


                <?php
               
                $dbhost = getenv("MYSQL_SERVICE_HOST");
                $dbport = getenv("MYSQL_SERVICE_PORT");
                $dbuser = getenv("DATABASE_USER");
                $dbpwd = getenv("DATABASE_PASSWORD");
                $dbname = "project";
                // Create connection
                $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

               
                if (isset($_GET["month"])&& $_GET["month"] !=0 ){
                    $month = $_GET["month"];
                    $sql = "SELECT * FROM blog WHERE DATE_FORMAT(DATETIME, '%m')=$month";
                    
                }
                else{
                    $sql = "SELECT * FROM blog";
                    
                }
                    
                
               
                $result = mysqli_query($conn, $sql);
                $conn->close();

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        $array[] = $row;
                    }
                    $size = count($array);

                    for ($i = 0; $i < $size; $i++) {

                        for ($x = 0; $x < $size - 1; $x++) {


                            if ($array[$x]["DATETIME"] < $array[$x + 1]["DATETIME"]) {
                                $tmp            = $array[$x + 1];
                                $array[$x + 1]  = $array[$x];
                                $array[$x]      = $tmp;
                            }
                        }
                    }
                    for ($a = 0; $a < $size; $a++) {

                        $title = $array[$a]["TITLE"];
                        $body = $array[$a]["BODY"];
                        $datetime = $array[$a]["DATETIME"];
                        echo "<div class='post'>
            <div class='post-header'>
            <h2 class='post-title'>  $title </h2>
            <h2 class='post-date'>$datetime</h2>
            </div>
            <div class='post-description'>$body</div>
            </div>
            <div class='divider-blog'></div>";
                    }
                } else {
                    echo "<h2> You have not posted anything yet!</h2>";
                }

                ?>


            </div>
        </div>

    </main>
</body>

</html>