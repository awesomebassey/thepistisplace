 <?php include('../nav.php') ?>
<body>
        <div class="my-3 px-5">
            <div class="float-left">
                <h1>Messages</h1>
            </div>
            <div class="float-right sort">
                <div class="dropdown">
                    <p>Sort by:</p>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="?sort=name">Name</a>
                        <a class="dropdown-item" href="?sort=date">Date</a>
                        <a class="dropdown-item" href="?sort=category">Category</a>
                    </div>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        -- Select --
                    </button>
                    <!--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                    <!--    <a class="dropdown-item" href="#">January</a>-->
                    <!--    <a class="dropdown-item" href="#">Healing</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php $mo_y = $_GET['m'] ?>
        <center><h2>All Messages of <?php echo $mo_y ?></h2></center>
            <div class="month my-3 px-5">
            <h3 class="my-2 px-5"><small><?php echo $row['month_year'] ?></small></h3>
            <div class="row">
                  <?php 
                  $mysqli = new mysqli("localhost","newwaved_udoh","Edidiong2020#","newwaved_experiment");
                    $sql2 = "SELECT * FROM message WHERE month_year LIKE '%$mo_y%' ORDER BY date_time DESC";
                    $result1 = $mysqli -> query($sql2);
                        while($row = $result1->fetch_assoc()){
                        ?>
                <div class="my-2 col-lg-3 py-3 card">
                    <div class="newui july text-center">
                        <img class="my-2 mx-auto cover" src="../add/<?php echo $row['cover'] ?>" alt="" width="40%">
                        <h5 class="text-center"><?php echo $row['name'] ?></h5>
                        <small class="text-center"><?php echo $row['user_id'] ?></small>
                        <input class="my-auto seek" type="range" value="0" max="" />
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