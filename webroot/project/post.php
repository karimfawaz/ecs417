<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="post.css">
    <title>Add Post</title>
</head>


<body>
    <?php
    include "nav.php";
    ?>
    <main>
        <div class="content-creation">

            <form method="POST" action="post_process.php" id="postForm">
                <div class="section-title">
                    <svg class="spinning-SVG" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="feather-alt" class="svg-inline--fa fa-feather-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M512 0C460.22 3.56 96.44 38.2 71.01 287.61c-3.09 26.66-4.84 53.44-5.99 80.24l178.87-178.69c6.25-6.25 16.4-6.25 22.65 0s6.25 16.38 0 22.63L7.04 471.03c-9.38 9.37-9.38 24.57 0 33.94 9.38 9.37 24.59 9.37 33.98 0l57.13-57.07c42.09-.14 84.15-2.53 125.96-7.36 53.48-5.44 97.02-26.47 132.58-56.54H255.74l146.79-48.88c11.25-14.89 21.37-30.71 30.45-47.12h-81.14l106.54-53.21C500.29 132.86 510.19 26.26 512 0z"></path>
                    </svg>
                    <h2>Add Post</h2>
                </div>


                <div class="field">
                    <input type="text" name="title" class="input" placeholder="Title" id="title" value="" />
                </div>
                <div class="field">
                    <textarea name="body" placeholder="Post" id="body" cols="30" rows="10"></textarea>
                </div>
                <div class="buttons">
                    <button type="submit">Add Post</button>
                    <button type="button" id="clear">Clear</button>
                    <button type="button" id="previewBtn">Preview</button>

                </div>
                <div id="overlay">
                <div id="preview">
                    <h3 class="preview-title">Preview</h3>
                    <br>
                    <div id="post-preview">
                        <h4 id="previewTitle"></h4>
                        <p id="previewBody"></p>
                        <div class='post-divider'></div>
                    </div>
                    <br>
                    <button type="button" id="backBtn" >Back</button>
                    <button type="submit">Add Post</button>
                </div>
            </div>
            </form>

            
        </div>

    </main>
    <script defer type="text/javascript" src="script.js"></script>

</body>

</html>