
        <?php
        
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
                    
                    // my code starts here
                    require "edidiong_code/config.php";
                    
            // the pagination code begins here
            if (isset($_GET['page']) && $_GET['page']!="") {
                $page_no = $_GET['page'];
                } else {
                 $page_no = 1;
                }
                
                	
            $total_records_per_page = 3; // you can select any number you want, Sir Awesome
            $offset = ($page_no-1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "0";
            $sql = "SELECT DISTINCT month_year FROM message";
            $num = mysqli_query($link, $sql);
            
            if($num){
                $total_records = mysqli_num_rows($num);
            } else {
                $total_records = 0;
            }
            
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total pages minus 1
        ?>

<?php include('nav.php') ?>

<div class="my-3 px-5">
            <div class="float-left">
                <h1>Messages</h1>
            </div>
            <div class="float-right sort">
                <div class="dropdown">
                    <p>Sort by:</p>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="?date">Date</a>
                        <a class="dropdown-item" href="?category">Category</a>
                    </div>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        -- Select --
                    </button>
                </div>
                
                <div class="dropdown">
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item" href="?alph=A-E">A-E</a>
                        <a class="dropdown-item" href="?alph=F-J">F-J</a>
                        <a class="dropdown-item" href="?alph=K-O">K-O</a>
                        <a class="dropdown-item" href="?alph=P-T">P-T</a>
                        <a class="dropdown-item" href="?alph=U-Z">U-Z</a>
                    </div>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        -- A/Z --
                    </button>
                </div>
                
                <div class="dropdown">
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php 
                    $mysqli = new mysqli("localhost","newwaved_udoh","Edidiong2020#","newwaved_experiment");
                    $sql2 = "SELECT DISTINCT month_year FROM message ORDER BY date_time DESC";
                    $result1 = $mysqli -> query($sql2);
                        while($row = $result1->fetch_assoc()){
                        ?>
                        <a class="dropdown-item" href="?m=<?php echo $row['month_year'] ?>"><?php echo $row['month_year'] ?></a>
                        <?php } ?>
                    </div>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        -- Date --
                    </button>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        
        
        
                    <?php
                    if(!isset($_GET['alph'])){
                    if(!isset($_GET['m'])){
                    $mysqli = new mysqli("localhost","newwaved_udoh","Edidiong2020#","newwaved_experiment");
                    if(!isset($_GET['category'])){
                    $sql1 = "SELECT DISTINCT month_year FROM message ORDER BY date_time DESC";
                    $result = $mysqli -> query($sql1);
                    if($result){
                        if(mysqli_num_rows($result) > 0){
                             while($row = $result->fetch_assoc()){
                                 $mo_y = $row['month_year'];
                        ?>
        <div class="month my-3 px-5">
            <h3 class="my-2 px-5"><small><?php echo $row['month_year'] ?></small></h3>
            <div class="row">
                  <?php 
                    $sql2 = "SELECT * FROM message WHERE month_year='$mo_y' ORDER BY date_time DESC LIMIT 4";
                    $result1 = $mysqli -> query($sql2);
                        while($row = $result1->fetch_assoc()){
                        ?>
                <div class="my-2 col-lg-3 py-3 card">
                    <div class="newui july text-center">
                        <img class="my-2 mx-auto cover" src="add/<?php echo $row['cover'] ?>" alt="" width="40%">
                        <h5 class="text-center"><?php echo $row['name'] ?></h5>
                        <small class="text-center"><?php echo $row['user_id'] ?></small>
                        <!--input class="my-auto seek" type="range" value="0" max="" /-->
                        <?php $f = $row['message_file'] ?>
                        <audio id="<?php echo $f ?>" style="width: 100%">
                          <source src="<?php echo $row['message_file'] ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                        <div class="icon my-3 mx-auto">
                            <a style = "color: white" href="<?php echo $f ?>" download="Message File"><i class="icofont-download mr-5" title="Download"></i></a>
                            <i class="icofont-play-alt-3 mr-5 button play" onclick="document.getElementById('<?php echo $f ?>').play()" title="Play"></i>
                            <i class="icofont-ui-pause" onclick="document.getElementById('<?php echo $f ?>').pause()" title="Pause"></i>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    ?>
            </div>
            <a href="all?m=<?php echo $mo_y ?>" class="btn btn-secondary my-2 mx-auto">See All <?php echo $mo_y ?> Messages <i class="icofont-caret-right"></i>
            </a>
        </div>
        <?php
                             }
                        }
                    }
                    }
                    }
                    } else if(!isset($_GET['alph'])) {
                    ?>
                    <!---->
                     <?php
                    $sql1 = "SELECT DISTINCT category_name FROM message ORDER BY date_time DESC";
                    $result = $mysqli -> query($sql1);
                    if($result){
                        if(mysqli_num_rows($result) > 0){
                             while($row = $result->fetch_assoc()){
                                 $mo_y = $row['category_name'];
                        ?>
        <div class="month my-3 px-5">
            <h3 class="my-2 px-5"><small><?php echo $row['category_name'] ?></small></h3>
            <div class="row">
                  <?php 
                    $sql2 = "SELECT * FROM message WHERE category_name='$mo_y' ORDER BY date_time DESC";
                    $result1 = $mysqli -> query($sql2);
                        while($row = $result1->fetch_assoc()){
                        ?>
                <div class="my-2 col-lg-3 py-3 card">
                    <div class="newui july text-center">
                        <img class="my-2 mx-auto cover" src="add/<?php echo $row['cover'] ?>" alt="" width="40%">
                        <h5 class="text-center"><?php echo $row['name'] ?></h5>
                        <small class="text-center"><?php echo $row['user_id'] ?></small>
                        <!--input class="my-auto seek" type="range" value="0" max="" /-->
                        <?php $f = $row['message_file'] ?>
                        <audio id="<?php echo $f ?>" style="width: 100%">
                          <source src="<?php echo $row['message_file'] ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                        <div class="icon my-3 mx-auto">
                            <a style = "color: white" href="<?php echo $f ?>" download="Message File"><i class="icofont-download mr-5" title="Download"></i></a>
                            <i class="icofont-play-alt-3 mr-5 button play" onclick="document.getElementById('<?php echo $f ?>').play()" title="Play"></i>
                            <i class="icofont-ui-pause" onclick="document.getElementById('<?php echo $f ?>').pause()" title="Pause"></i>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    ?>
            </div>
        </div>
        <?php
                             }
                        }
                    }
                    }
                    ?>
                    <!---->
                     <?php
                     if(isset($_GET['alph'])){
                         $mysqli = new mysqli("localhost","newwaved_udoh","Edidiong2020#","newwaved_experiment");
                         if($_GET['alph'] == 'A-E'){
                            $sql1 = "SELECT * FROM message WHERE name LIKE 'A%' OR name LIKE 'b%' OR name LIKE 'c%' OR name LIKE 'd%' OR name LIKE 'e%'";
                         } else if($_GET['alph'] == 'F-J') { 
                             $sql1 = "SELECT * FROM message WHERE name LIKE 'f%' OR name LIKE 'g%' OR name LIKE 'h%' OR name LIKE 'i%' OR name LIKE 'j%'";
                         } else if($_GET['alph'] == 'K-O') {
                             $sql1 = "SELECT * FROM message WHERE name LIKE 'k%' OR name LIKE 'l%' OR name LIKE 'm%' OR name LIKE 'n%' OR name LIKE 'o%'";
                         } else if($_GET['alph'] == 'P-T') {
                             $sql1 = "SELECT * FROM message WHERE name LIKE 'p%' OR name LIKE 'q%' OR  name LIKE 'r%' OR name LIKE 's%' OR name LIKE 't%'";
                         } else if($_GET['alph'] == 'U-Z') {
                             $sql1 = "SELECT * FROM message WHERE name LIKE 'u%' OR name LIKE 'v%' OR name LIKE 'w%' OR name LIKE 'x%' OR name LIKE 'y%' OR name LIKE 'z%";
                         }
                    ?>
        <div class="month my-3 px-5">
            <h3 class="my-2 px-5"><small><?php echo $_GET['alph'] ?></small></h3>
            <div class="row">
                  <?php 
                            $result = $mysqli -> query($sql1);
                    if($result){
                        if(mysqli_num_rows($result) > 0){
                             while($row = $result->fetch_assoc()){
                        ?>
                <div class="my-2 col-lg-3 py-3 card"> 
                    <div class="newui july text-center">
                        <img class="my-2 mx-auto cover" src="add/<?php echo $row['cover'] ?>" alt="" width="40%">
                        <h5 class="text-center"><?php echo $row['name'] ?></h5>
                        <small class="text-center"><?php echo $row['user_id'] ?></small>
                        <!--input class="my-auto seek" type="range" value="0" max="" /-->
                        <?php $f = $row['message_file'] ?>
                        <audio id="<?php echo $f ?>" style="width: 100%">
                          <source src="<?php echo $row['message_file'] ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                        <div class="icon my-3 mx-auto">
                            <a style = "color: white" href="<?php echo $f ?>" download="Message File"><i class="icofont-download mr-5" title="Download"></i></a>
                            <i class="icofont-play-alt-3 mr-5 button play" onclick="document.getElementById('<?php echo $f ?>').play()" title="Play"></i>
                            <i class="icofont-ui-pause" onclick="document.getElementById('<?php echo $f ?>').pause()" title="Pause"></i>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    ?>
            </div>
        </div>
        <?php
                        }
                    }
                    }
                    ?>
                    
                     <!---->
                     <?php
                     if(isset($_GET['m'])){
                         $m = $_GET['m'];
                         $mysqli = new mysqli("localhost","newwaved_udoh","Edidiong2020#","newwaved_experiment");
                         $sql1 = "SELECT * FROM message WHERE month_year = '$m'";
                          $result = $mysqli -> query($sql1);
                    if($result){
                        if(mysqli_num_rows($result) > 0){
                             while($row = $result->fetch_assoc()){
                                 ?>
                                  <div class="my-2 col-lg-3 py-3 card">
                    <div class="newui july text-center">
                        <img class="my-2 mx-auto cover" src="add/<?php echo $row['cover'] ?>" alt="" width="40%">
                        <h5 class="text-center"><?php echo $row['name'] ?></h5>
                        <small class="text-center"><?php echo $row['user_id'] ?></small>
                        <!--input class="my-auto seek" type="range" value="0" max="" /-->
                        <?php $f = $row['message_file'] ?>
                        <audio id="<?php echo $f ?>" style="width: 100%">
                          <source src="<?php echo $row['message_file'] ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                        <div class="icon my-3 mx-auto">
                            <a style = "color: white" href="<?php echo $f ?>" download="Message File"><i class="icofont-download mr-5" title="Download"></i></a>
                            <i class="icofont-play-alt-3 mr-5 button play" onclick="document.getElementById('<?php echo $f ?>').play()" title="Play"></i>
                            <i class="icofont-ui-pause" onclick="document.getElementById('<?php echo $f ?>').pause()" title="Pause"></i>
                        </div>
                    </div>
                </div>
                <?php
                    }
                        }
                    }
                     }
                    ?>
        
        
        
        
        
        <nav aria-label="Page navigation example" class="">
            <ul class="pagination justify-content-center">
                <?php if($total_no_of_pages > 1){ ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                    }
                 for ($counter = 1; $counter < $total_no_of_pages; $counter++){ 
                 if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                 }else{
                           echo "<li class='page-item'><a class='page-link' href='?page=$counter'>$counter</a></li>";
                                }
                }
                if($page_no < $total_no_of_pages){
                ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php
                } ?>
            </ul>
        </nav>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() { startplayer(); }, false);
        var player;     

        function edidiong_custom_player() 
        {
         player = document.getElementById('music_player');
         player.controls = false;
        }
        
        function play_aud() 
        {
         player.play();
        } 
        function pause_aud() 
        {
         player.pause();
        }
        function down_aud() 
        {
         player.download();
        }
        function change_vol()
        {
         player.volume=document.getElementById("change_vol").value;
        }
    </script>
</body>

</html>