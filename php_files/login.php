<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="../css_files/login.css">
</head>

<body>
    <header>
        <a href="index.php">
            <div class="logo-wrapper">
                <img class="fridge-img" src="../images/fridge.png">
                <p class="logo">sharefridge</p>
            </div>
        </a>
        <!-- <div class="logo-container">
        <img class="fridge-img" src="../images/fridge.png">
        <p class="logo">sharefridge</p>
    </div> -->
    </header>
    <div class="content">
        <a class="to_top" href="index.php">TOP</a>
        <div id="funwithforms">
            <form action="#" method="post" onsubmit="return false;">
                <fieldset>
                    <legend>Contact form</legend>
                    <label for="name">Name</label><br class="br" /><input name="name" type="text" class="textfield"
                        id="name" /><br>
                    <label for="email">Email</label><br class="br" /><input name="email" type="text" class="textfield"
                        id="email" /><br />
                    <label for="website">Website</label><br class="br" /><input name="website" type="text"
                        class="textfield" id="website" value="http://" /><br>
                    <label for="comment">Comment</label><br class="br" /><textarea cols="30" rows="15" name="comment"
                        id="comment"></textarea><br>
                    <label for="submit">&nbsp;</label><br class="br" /><input name="submit" type="submit" class="submit"
                        id="submit" value="submit" />
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>