<?php 

include 'connection.php';

// subcategory show in admin dashhboard

function subcat_show($cat_id){

	   global $conn; 

        $cat_sel_sql = "SELECT * FROM category WHERE is_sub='$cat_id'";
        $cat_sel_res = mysqli_query($conn,$cat_sel_sql);

        $serial = 0;

        while($row = mysqli_fetch_assoc($cat_sel_res)){

                   $cat_id     = $row['cat_id'];
                   $cat_name   = $row['cat_name'];
                   $cat_desc   = $row['cat_desc'];
                   $is_sub     = $row['is_sub'];
                   $cat_status = $row['cat_status'];

                   // $serial++;

               ?>

               <tr>
                <td><?php //echo $serial;?></td>
                <td>
                        <?php 
                         // if ($is_sub == 0){
                         //      echo $cat_name;
                         //     }else{
                         //      echo '-',$cat_name;
                         //  }

                        echo '-'.$cat_name;
                                                
                        ?>  
                </td>
                <td><?php echo $cat_desc;?></td>
                <td>
                        <?php 

                        if ($cat_status ==1){
                            echo '<span clatext-light">Active</span>';
                        }

                        if ($cat_status ==0){
                            echo '<span class="bagde bg-danger px-2 text-light">Inactive</span>';

                        }

                       ?>
                                                   
                </td> 
                
                <td>
                           <a href="category.php?edit_id=<?php echo $cat_id;?>"data-toggle="tooltip" data-placement="left" title="Edit"><i class="far fa-edit"></i></a>
                           <a href="" data-toggle="modal"  data-bs-toggle="modal" data-bs-target="#delete_id<?php echo $cat_id;?>"><i class="fas fa-trash-alt text-danger pl-2"></i></a>


                           <div class="modal fade" id="delete_id<?php echo $cat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel"></h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body text-center"> 
                                    <h3 class="text-center text-danger mb-3">Are You Sure?</h3>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                     <a type="button" href="category.php?delete_id=<?php echo $cat_id;?>" class="btn btn-danger text-light">Confirm</a>                                     
                                   </div>
                                 </div>
                               </div>
                             </div>
                </td>
              </tr>

            <?php

             }

         }

         // delete Funtion
         // table name. primary key, delete id, page name


         function delete($table, $p_key, $delete_id, $redirect){

            global $conn;

              $del_sql = "DELETE FROM $table WHERE $p_key= '$delete_id'";
              $del_res = mysqli_query($conn,$del_sql);

                if($del_res){
                 header('location: '.$redirect);
                }else{
                  die($table. ' Delete Error!'.mysqli_error($conn));
               }

         } 

      ?>