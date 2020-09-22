<?php include('../nav.php') ?>

<?php
require('../edidiong_code/config.php');
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST['category'])){
        $sql = "INSERT INTO categories (name) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $name);
            $name = $_POST['category'];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                echo "<script>alert('Category Added Successfully')</script>";
            } else{
                echo "<script>alert('Something went wrong. Please try again later.')</script>";
            }
        }
    } else {
        $target_dir = "uploads/";
    
    $target_file1 = $target_dir . rand() . basename($_FILES["cover"]["name"]);

            if(move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file1)){
        $sql = "INSERT INTO message (name, user_id, message_file, date_time, month_year, cover, category_name) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $user_id, $message_file, $date_time, $month_year, $cover, $category_name);
            $t = time();
            $name = $_POST['name'];
            $user_id = $_POST['user_id'];
            $message_file = $_POST['message_file'];
            $category_name = $_POST['category_name'];
            $date_time = date("Y-m-d", $t);
            $month_year = $_POST['month'].' '.$_POST['year'];
            $r = rand();
            $cover = $target_file1;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                echo "<script>alert('Message Added Successfully')</script>";
            } else{
                echo "<script>alert('Something went wrong. Please try again later.')</script>";
            }
        }
            } else {
                echo "<script>alert('image error')</script>";
            } 
    }
    
}
?>

<body>
        <div class="my-3 px-5">
            <div class="float-left">
                <h1>Add Messages Here</h1>
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="container">
            <form action="" method="POST"  enctype="multipart/form-data">
                <input class="form-control" placeholder="Message Name" name="name" required  />
                <hr>
                <input class="form-control" placeholder="Preacher" name="user_id" required  />
                <hr>
                <Label> Google Drive link to message (.amr, .wav, .mp3) </Label>
                <input class="form-control" name="message_file" placeholder="Google Drive link to message" required  />
                <hr>
                <Label> Message Month </Label>
                <input class="form-control" name="month" placeholder="Month" required  />
                <hr>
                <Label> Message Year </Label>
                <input class="form-control" name="year" placeholder="Year" required  />
                <hr>
                <Label> Category(Multiselect. if on computer, press and hold Ctrl key (or Command if on Mac(which i need badly)) before tapping; works fine on mobile) </Label>
                <br><select name="category_name" multiple size="5">
                    <?php 
                    $mysqli = new mysqli("localhost","newwaved_udoh","Edidiong2020#","newwaved_experiment");
                    $sql2 = "SELECT * FROM categories";
                    $result1 = $mysqli -> query($sql2);
                        while($row = $result1->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['name'] ?>">
                                <?php echo $row['name'] ?>
                            </option>
                            <?php } ?>
                </select>
                <hr>
                <Label> Message Cover(image) </Label>
                <input class="form-control" name="cover" type="file" required />
                <br>
                <input type="submit" class="btn btn-success" value="Submit Message">
            </form>
            
            <form action="" method="POST">
                <Label> Add Category  </Label>
                <input class="form-control" name="category" type="text" required />
                <br>
                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
        </div>
        </div>
        </div>
        </div>
       
    <footer class="mt-5 px-5 py-5">
        <p class="float-left">Copyright &copy; 2020 The Pistis Place.</p>
        <p class="float-right">All Rights Reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>