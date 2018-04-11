<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'headcontent.partial.php' ?>
</head>
<body>
    
    <?php require 'navbar.partial.php' ?>

    <div class="authorize-form-container">
    
    <section class="form-section">
        <form action="addplace.php" method="post" name="addplace">
            
            <h4>Add a new place</h4>
            <?php if($error): ?>
            Error: <?= $error_message ?>
            <?php endif;?>

            <div class="form-group">
                <label for="">Title:</label>
                <input type="text" name="title" id="">
            </div>

            <div class="form-group">
                <label for="">Description:</label>
                <input type="text" name="description" id="">
            </div>

            <div class="form-group">
                <label for="">Latitude:</label>
                <input type="number" name="latitude" id="" step="0.0001">
            </div>

            <div class="form-group">
                <label for="">Longitude:</label>
                <input type="number" name="longitude" id=""  step="0.0001">
            </div>

            <div class="form-group">
                <label for="">Public visibility:</label>
                <input type="checkbox" name="public" id="">
            </div>

            <div class="form-group">
                <label for="">Date:</label>
                <input type="date" name="date" id="">
            </div>

            <div class="form-group">
                <label for="">Time:</label>
                <input type="time" name="time" id="">
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>

        </form>
    </section>

    </div>
    
    <script src="resources/js/addplace.js"></script>
</body>
</html>