<?php include"header.php";?>
 
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoit(0)">Manage Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- manage books data table start -->
                <div class="row animated fadeInUp">
                   <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Manage Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Author</th>
                                        <th>Purchase Date</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Available Qty</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = mysqli_query($con,"SELECT * FROM `books`");
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                 <tr>
                                                    <td><?= $row['book_name'];?></td>
                                                    <td><img style="width: 50px;" src="../images/books/<?= $row['book_image'];?>" alt=""></td>
                                                    <td><?= $row['book_author_name'];?></td>
                                                    <td><?= $row['book_purchase_name'];?></td>
                                                    <td><?= $row['book_price'];?></td>
                                                    <td><?= $row['book_qty'];?></td>
                                                    <td><?= $row['available_qty'];?></td>
                                                    <td>
                                                        <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id'];?>"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'];?>"><i class="fa fa-pencil"></i></a>
                                                        <a href="delete.php?bookdelete=<?= base64_encode($row['id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" ><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Modal -->
                    <?php
                        $result = mysqli_query($con,"SELECT * FROM `books`");
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                            <div class="modal fade" id="book-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>View Book Info</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordared">
                                                <tr>
                                                   <th>Book Name</th>
                                                   <td><?= $row['book_name'];?></td>
                                                </tr>
                                                   <th>Book Image</th>
                                                   <td><img style="width:50px;" src="../images/books/<?= $row['book_image'];?>" alt=""></td>
                                                <tr>
                                                   <th>Author Name</th>
                                                   <td><?= $row['book_author_name'];?></td>
                                                </tr>
                                                   <th>Purchase Date</th>
                                                   <td><?= $row['book_purchase_name'];?></td>
                                                <tr>
                                                   <th>Book Price</th>
                                                   <td><?= $row['book_price'];?></td>
                                                </tr>
                                                   <th>Book Quantity</th>
                                                   <td><?= $row['book_qty'];?></td>
                                                <tr>
                                                   <th>Available Quantity</th>
                                                   <td><?= $row['available_qty'];?></td> 
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                             }
                        ?>

                        <!-- model book update -->
                    <?php
                        $result = mysqli_query($con,"SELECT * FROM `books`");
                        while($row = mysqli_fetch_assoc($result)){

                            $id = $row ['id'];
                            $book_info = mysqli_query($con,"SELECT * FROM `books` WHERE `id` = '$id' ");
                            $book_info_row = mysqli_fetch_assoc($book_info);
                    ?>
                            <div class="modal fade" id="book-update-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Info</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="panel">
                                                <div class="panel-content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label >Book_Name</label>
                                                                    <input type="text" name="bookname" class="form-control" value="<?= $book_info_row['book_name'];?>" required="">
                                                                    <input type="hidden" name="id" class="form-control" value="<?= $book_info_row['id'];?>" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label >Book_Image</label>
                                                                    <input type="file" name="bookimage" required="">
                                                                    <img  style="height:50px; width: 50px;" src="../images/books/<?= $book_info_row['book_image'];?>" alt="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Author_Name</label>
                                                                    <input type="text" name="authorname" class="form-control" value="<?= $book_info_row['book_author_name'];?>" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label >Purchase_Date</label>
                                                                    <input type="date" name="purchasedate" class="form-control" value="<?= $book_info_row['book_purchase_name'];?>" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Book_Price</label>
                                                                    <input type="number" name="bookprice" class="form-control" value="<?= $book_info_row['book_price'];?>" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Book_Qty</label>
                                                                    <input type="number" name="bookqty" class="form-control" value="<?= $book_info_row['book_qty'];?>" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Available_Qty</label>
                                                                    <input type="number" name="availableqty" class="form-control" value="<?= $book_info_row['available_qty'];?>" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                             }


         if(isset($_REQUEST['update_book'])){
        $id = $_REQUEST['id'];
        $bookname = $_REQUEST['bookname'];
        $authorname = $_REQUEST['authorname'];
        $purchasedate = $_REQUEST['purchasedate'];
        $bookprice = $_REQUEST['bookprice'];
        $bookqty = $_REQUEST['bookqty'];
        $availableqty = $_REQUEST['availableqty'];

        $image = explode('.', $_FILES['bookimage']['name']);
        $img_ext = end($image);
        $img = date('Ymdhis.').$img_ext;

        $query = mysqli_query($con,"UPDATE `books` SET `book_name`='$bookname',`book_image`='$img',`book_author_name`='$authorname',`book_purchase_name`='$purchasedate',`book_price`='$bookprice',`book_qty`='$bookqty',`available_qty`='$availableqty' WHERE `id`='$id' ");
        if($query){
            move_uploaded_file($_FILES['bookimage']['tmp_name'],'../images/books/'.$img);
        }

    }
                        ?>

 <?php include"footer.php"; ?>