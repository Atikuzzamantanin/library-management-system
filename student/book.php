<?php include"header.php"; ?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><i class="fa fa-book" aria-hidden="true"></i><a href="book.php">Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <!--SEARCH-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-content">
                                    <form method="POST" action="">
                                        <div class="row pt-md">
                                            <div class="form-group col-sm-9 col-lg-10">
                                                    <span class="input-with-icon">
                                                <input type="text" name="result" class="form-control" id="lefticon" placeholder="Search" required="">
                                                <i class="fa fa-search"></i>
                                            </span>
                                            </div>
                                            <div class="form-group col-sm-3  col-lg-2 ">
                                                <button type="submit" name="book" class="btn btn-primary btn-block">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(isset($_REQUEST['book'])){
                            $result = $_REQUEST['result'];
                            ?>
                                <div class="col-sm-12">
                                    <div class="panel">
                                        <div class="panel-content">
                                            <div class="row">
                                                <?php
                                                   $result = mysqli_query($con,"SELECT * FROM `books` WHERE `book_name` LIKE '%$result%' ");
                                                   while($row = mysqli_fetch_assoc($result)){?>

                                                    <div class="col-sm-3 col-md-2">
                                                        <img style="height: 100px;width: 100px;" src="../images/books/<?= $row['book_image']?>" alt="">
                                                        <p><?= $row['book_name']?></p>
                                                        <span><b>Available: <?= $row['available_qty']?></b></span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }else{?>
                                <!-- show All Book -->
                                <div class="col-sm-12">
                                    <div class="panel">
                                        <div class="panel-content">
                                            <div class="row">
                                                <?php
                                                   $result = mysqli_query($con,"SELECT * FROM `books` ");
                                                   while($row = mysqli_fetch_assoc($result)){?>

                                                    <div class="col-sm-3 col-md-2">
                                                        <img style="height: 100px;width: 100px;" src="../images/books/<?= $row['book_image']?>" alt="">
                                                        <p><?= $row['book_name']?></p>
                                                        <span><b>Available: <?= $row['available_qty']?></b></span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php } ?>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <?php include"footer.php"; ?>