 <?php include"header.php"; ?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInRight">
                    <!--WIDGET BOX STYLE 1-->
                <div class="row">
                    <!--BOX Style 1-->
                    <?php
                        $students = mysqli_query($con,"SELECT * FROM `students` ");
                        $total_students = mysqli_num_rows($students);

                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-users"></i>  <?= $total_students;?></h1>
                                    <h4 class="subtitle">Total Students</h4>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!--BOX Style 1-->
                    <?php
                        $book = mysqli_query($con,"SELECT * FROM `books` ");
                        $total_book = mysqli_num_rows($book);
                         // total books query
                        $book_qty = mysqli_query($con,"SELECT SUM(`book_qty`) as total FROM `books` ");
                        $qty = mysqli_fetch_assoc($book_qty);
                        // books availavail Queantity
                        $book_a_qty = mysqli_query($con,"SELECT SUM(`available_qty`) as total FROM `books` ");
                        $a_qty = mysqli_fetch_assoc($book_a_qty);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-light-2 color-light">
                            <a href="manage-book.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-book"></i>   <?= $total_book.' ('. $qty['total'].'-'.$a_qty['total'].')';?></h1>
                                    <h4 class="subtitle color-darker-1">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 1-->
                    <?php
                        $libraian = mysqli_query($con,"SELECT * FROM `librarian` ");
                        $total_libraian = mysqli_num_rows($libraian);

                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-user"></i>   <?= $total_libraian;?></h1>
                                    <h4 class="subtitle color-darker-1">Total Libraian</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <?php include"footer.php"; ?>