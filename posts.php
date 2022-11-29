<?php include 'inc/header.php'; ?>
 <style type="text/css">

.tags-input-wrapper{
    background: transparent;
    padding: 10px;
    border-radius: 4px;
    max-width: 400px;
    border: 1px solid #ccc
}
.tags-input-wrapper input{
    border: none;
    background: transparent;
    outline: none;
    width: 140px;
    margin-left: 8px;
}
.tags-input-wrapper .tag{
    display: inline-block;
    background-color: #fa0e7e;
    color: white;
    border-radius: 40px;
    padding: 0px 3px 0px 7px;
    margin-right: 5px;
    margin-bottom:5px;
    box-shadow: 0 5px 15px -2px rgba(250 , 14 , 126 , .7)
}
.tags-input-wrapper .tag a {
    margin: 0 7px 3px;
    display: inline-block;
    cursor: pointer;
}

/*image css*/
.thumb {
  height: 75px;
  border: 1px solid #000;
  margin: 10px 5px 0 0;
}

</style>

<div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 col-sm-4 col-xs-8">
                        <h4 class="page-title">All Posts Pages</h4>
                    </div>

                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                           
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
           </div>

 
     <?php 

    // if(isset($_GET['do'])){

    //     $do = $_GET['do'];
    // }else{
    //     $do = 'view';
    // }

// 2nd Way

    $do = isset($_GET['do']) ? $_GET['do'] : 'view';

   if($do == 'view'){
    // view code
    ?>
<div class="container-fluid">

      <div class="row justify-content-center">
             

        <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="white-box analytics-info">
                        <h3 class="box-title">All Posts Information</h3>
                            <div class="mt-4">
                                <div class="table">
                                    
                          <table class="table text-nowrap">
                                <thead>
                                        <tr>
                                            <th class="border-top-0 ">#</th>
                                            <th class="border-top-0 ">Date</th>
                                            <th class="border-top-0 ">Thumnail</th>
                                            <th class="border-top-0 ">Title</th>
                                            <!-- <th class="border-top-0 ">Description</th> -->
                                            <th class="border-top-0 ">Author</th>
                                            <th class="border-top-0 ">Category</th>
                                            <th class="border-top-0 ">Tags</th>
                                            <th class="border-top-0 ">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                    

                                    <?php

                                    $all_posts  = "SELECT * FROM posts";
                                    $posts_res  = mysqli_query($conn, $all_posts);
                                    $serial = 0;

                                   while ($row = mysqli_fetch_assoc($posts_res)){
                                      $p_id        = $row['p_id'];
                                      $title       = $row['title'];
                                      $thumbnail   = $row['thumbnail'];
                                      $date        = $row['date'];                                      
                                      $author      = $row['author'];
                                      $category    = $row['category'];
                                      $tags        = $row['tags'];
                                      $status      = $row['status'];
                                      $serial++;
                                      ?>


                                        <tr>
                                        <td><?php echo $serial;?></td>
                                        <td>
                                            <?php echo $date;?>
                                        </td>
                                        <td><img src="images/post/<?php echo $thumbnail;?>" width="80" class="rounded-circle"></td>
                                        <td><?php echo $title;?></td>
                                        
                                        <td><?php echo $author;?></td>
                                        <td><?php echo $category;?></td>
                                        <td><?php echo $tags;?></td>
                                            <td>

                                             <?php
                                             if($status == 1)
                                              echo 'Active';
                                             else
                                                echo 'Inactive';
                                             ?>                                                
                                             </td>
                                        
                                      <td>
                                        <a href="category.php?edit_id=11" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                        <a href="" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#delete_id11"><i class="fas fa-trash-alt text-danger pl-2"></i></a>

                                        <!-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> -->



                                      <?php


                                    }



                                    ?>

                                 <!-- Modal -->
                                   <div class="modal fade" id="delete_id11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                   <div class="modal-content">
                                   <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel"></h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body text-center"> 
                                    <h3 class="text-center text-danger mb-3">Are You Sure?</h3>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                     <a type="button" href="category.php?delete_id=11" class="btn btn-danger text-light">Confirm</a>                                     
                                   </div>
                                 </div>
                               </div>
                             </div>

                              </td>

                               </tr>

                             
                          </tbody>                                
                      </table>

                 </div>
              </div>
             </div>
      </div>                   
    </div>

</div> 
     <?php
    }
    if($do == 'add'){
    // add code
    ?>
<div class="container-fluid">

     <div class="row justify-content-center">
             <div class="col-lg-6 col-md-6 col-sm-12">
                   <div class="white-box analytics-info">
                            <h3 class="box-title">Add a new category</h3>
                            <div>
        <form method="POST" action="post.php">
                <div class="form-group">
                    <input type="text" id="title" name="title" class="form-control" placeholder="input title">
                </div>
                <div class="form-group">
                    <textarea id="content" name="content" class="form-control" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button> <a href="index.php" class="btn btn-dark">Back</a>
            </form>

              <style type="text/css">
                #menu_27{
                    display: none !important;
                }
               </style>



                      <!-  <!-- Subcategory -->
<!--                             <div class="form-group">
                            <label>Add a Parent Category</label>
                            <select class="form-control" name="sub_id">
                             <option>Select a parent category</option>
                                                                     <option value="2">Politics</option>     
                                                                            <option value="3">Fashion</option>     
                                                                            <option value="6"> Entertaintment</option>     
                                                                            <option value="10">Education</option>     
                                                                            <option value="11">Travelling</option>     
                                    
                             </select>
                             </div> --> --> -->

                          <!-- description -->
                           <!-- <div class="form-group">
                           <label>Category Description</label>
                           <textarea type="text" rows="6" name="cat_desc" placeholder="Category Description ...." class="form-control"></textarea>
                          </div>
                         <!-Button -->
                          <!-- <div class="form-group">
                          <input type="submit" name="add_cat" value="Add Category" class="btn btn-md btn-info text-light">
                          </div> --> -->

              </form>
         </div>
    </div>


                  <!-- edit a category -->
                                   
            </div>

        <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="white-box analytics-info">
                        <h3 class="box-title"></h3>
                            <div class="mt-4">
                              <div class="form-group">
                                <label>Select a category</label>
                                <select class="form-control">
                                    <option>fashion</option>
                                    <option>tarvel</option>
                                    <option>FoodCart</option>
                                    <option>Sports</option>
                                    <option>Sports</option>
                                    <option>Sports</option>
                                </select>
                             </div>
                             <div class="form-group my-4">
                                <label>Add some Tags</label>  
                                    <input type="text" id="tag-input1">
                             </div>
                             <div class="form-group my-2">  
                                 <label>Upload Feature Image</label><br><br>  
                                    <input type="file" id="files" name="files[]" multiple />
                                              <br>
                                    <output id="list"></output>
                              </div>
                        </div>
                 </div>                   
           </div>
  </div>
      <?php  
    }
    if($do == 'edit'){
    // edit code
    }
    
    if($do == 'update'){
    // update code
    }
    if($do == 'delete'){
    // delete code
   }

 ?> 



<?php include 'inc/footer.php'; ?>