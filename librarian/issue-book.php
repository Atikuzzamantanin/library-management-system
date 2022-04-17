 <?php include"header.php"; ?>
<?php
    if(isset($_REQUEST['issue_book'])){
        $student_id = $_REQUEST['student_id'];
        $book_id = $_REQUEST['book_id'];
        $book_issue_date = $_REQUEST['issue_date'];

        $issue_book_query = mysqli_query($con,"INSERT INTO `issue_books`(`student_id`, `book_id`, `issue_date`) VALUES ('$student_id','$book_id','$book_issue_date')");

        if($issue_book_query){
            mysqli_query($con,"UPDATE `books` SET `available_qty`=`available_qty`-1 WHERE `id`='$book_id'");
            $success = "Book Issued Successfully!";
        }


    }?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoit(0)">Issue Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                        <?php
                     if(isset($success)){
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?= $success;?>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        <?php
                     }
                 ?>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-10 col-sm-offset-2">
                                        <form class="form-inline" method="POST" action="">
                                            <div class="form-group">
                                                <select class="form-control" name="student_id" >
                                                    <option value="Select">Select</option>
                                                    <?php
                                                        $result = mysqli_query($con,"SELECT * FROM `students` WHERE `status` ='1' ");
                                                        while($row = mysqli_fetch_assoc($result)){?>

                                                            <option value="<?= $row['id']?>"> <?= ucwords($row['fname']).' - ( '.$row['roll'].' )' ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Show Search All Student Info  -->
                                <?php
                                    if(isset($_REQUEST['search'])){
                                        $id = $_REQUEST['student_id'];
                                        $result = mysqli_query($con,"SELECT * FROM `students` WHERE `id`='$id' AND `status` ='1' ");
                                        $row = mysqli_fetch_assoc($result);
                                            ?>
                                                <div class="panel">
                                                    <div class="panel-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form method="POST" action="">
                                                                    <div class="form-group">
                                                                        <label for="name">Student Name</label>
                                                                        <input type="text"  class="form-control" id="name" value="<?=ucwords($row['fname']);?>" readonly>
                                                                        <input name= "student_id" type="hidden" value="<?= $row['id']?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Book Name</label>
                                                                        <select class="form-control" name="book_id" >
                                                                            <option value="Select">Select</option>
                                                                            <?php
                                                                                $result = mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty` > 0 ");
                                                                                while($row = mysqli_fetch_assoc($result)){?>

                                                                                    <option value="<?= $row['id']?>"> <?= $row['book_name']?></option>
                                                                                    <?php } ?>
                                                                        </select>                                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Issue Date</label>
                                                                        <input type="text" class="form-control" name="issue_date"  value="<?= date('d-m-y')?>" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" name="issue_book" class="btn btn-primary">Save Issue Book</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <?php include"footer.php"; ?>