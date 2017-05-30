<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DBMS- database system</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/form.css">
    </head>
    <body>
        <div class="container-main">
            <ul class="tab">
                <li class="tabLi" onclick='selTab(event, "login");'><a href="javascript:void(0)" id="default" class="tablink" >Log In</a></li>
                <li class="tabLi" onclick='selTab(event, "signup")'><a href="javascript:void(0)" class="tablink">Sign Up</a></li>
            </ul>
            <div id="login" class="container-login tabcontent">
                <p class="formLines">
                    <span>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username">
                    </span>
                </p>
                <p class="formLines">
                    <span>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password">
                    </span>
                </p>
                <input id="submit" type="submit" name="submit" value="Login">
            </div>
            <div id="signup" class="container-signup tabcontent">
                <p class="formLines">
                    <span>
                        <label for="email">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="email" name="email" id="email">
                    </span>
                </p>
                <p class="formLines">
                    <span>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username">
                    </span>
                </p>
                <p class="formLines">
                    <span>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password">
                    </span>
                </p>
                <input id="submit" type="submit" name="submit" value="Sign Up">
            </div>
        </div>
    <script src="js/tab.js"></script>
    </body>
</html>
