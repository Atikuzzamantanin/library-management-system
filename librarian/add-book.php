<?php 
include"header.php"; 

    if(isset($_REQUEST['save_book'])){
        $bookname = $_REQUEST['bookname'];
        $authorname = $_REQUEST['authorname'];
        $purchasedate = $_REQUEST['purchasedate'];
        $bookprice = $_REQUEST['bookprice'];
        $bookqty = $_REQUEST['bookqty'];
        $availableqty = $_REQUEST['availableqty'];

        $image = explode('.', $_FILES['bookimage']['name']);
        $img_ext = end($image);
        $img = date('Ymdhis.').$img_ext;

        $query = mysqli_query($con,"INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`,`book_purchase_name`, `book_price`, `book_qty`, `available_qty`) VALUES ('$bookname','$img','$authorname','$purchasedate','$bookprice','$bookqty','$availableqty')");
        if($query){
            move_uploaded_file($_FILES['bookimage']['tmp_name'],'../images/books/'.$img);
            $success = "Book Save Success";
        }
    }


?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoit(0)">Add Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                   <!-- start add book from -->
                <div class="col-sm-12 col-md-6 col-sm-offset-3">
                    <h4 class="section-subtitle text-center">ADD BOOK</h4>
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
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="1" class="col-sm-3 control-label">Book_Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="bookname" class="form-control" id="1" placeholder="Book Name" value="<?php if(isset($bookname)){echo $bookname;} ?>" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="2" class="col-sm-3 control-label">Book_Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="bookimage" id="2" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="3" class="col-sm-3 control-label">Author_Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="authorname" class="form-control" id="3" placeholder="Book Author Name" value="<?php if(isset($authorname)){echo $authorname;} ?>" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="5" class="col-sm-3 control-label">Purchase_Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="purchasedate" class="form-control" id="5" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="6" class="col-sm-3 control-label">Book_Price</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="bookprice" class="form-control" id="6" placeholder="Book Price" value="<?php if(isset($bookprice)){echo $bookprice;} ?>" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="7" class="col-sm-3 control-label">Book_Qty</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="bookqty" class="form-control" id="7" placeholder="Book Qty" value="<?php if(isset($bookqty)){echo $bookqty;} ?>" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="8" class="col-sm-3 control-label">Available_Qty</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="availableqty" class="form-control" id="8" placeholder="Available Qty" value="<?php if(isset($availableqty)){echo $availableqty;} ?>" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
                <!-- End add book from -->
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <?php include"footer.php"; ?>