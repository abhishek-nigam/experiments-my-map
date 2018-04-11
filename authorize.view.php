<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'headcontent.partial.php' ?>
</head>
<body>
    
    <?php require 'navbar.partial.php' ?>

    <div class="authorize-form-container">
    
        <section class="form-section">
            <form action="authorize.php" method="post">
                
                <h4>Sign up or Sign in</h4>
                <?php if($error): ?>
                Error: <?= $error_message ?>
                <?php endif;?>

                <div class="form-group">
                    <label for="">Username:</label>
                    <input type="text" name="username" id="">
                </div>

                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="password" name="password" id="">
                </div>

                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>

            </form>
        </section>

    </div>

</body>
</html>