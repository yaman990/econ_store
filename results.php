<?php 

   

    $active='Shop';
    include("includes/header.php");

?>

<div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->

<div class="row"><!-- row Begin -->
          
         <?php 
         
         $con = mysqli_connect("localhost","root","","ecom_store");
         $output = '';
         $searchq = '';


         if(isset($_POST['search'])){
          $searchq = $_POST['user_query'];

          $ret_test = "select * from products where product_keywords = '$searchq' order by 1 DESC LIMIT 0,8 ";

          $query = mysqli_query($con,$ret_test) ;

          $count = mysqli_num_rows($query);

          if($count == 0 ){
              echo "<h1>OOPS! item not found </h1>";
          }
          else{

            while($row=mysqli_fetch_array($query)){

                $pro_id = $row['product_id'];
        
                $pro_title = $row['product_title'];
                
                $pro_price = $row['product_price'];
                
                $pro_img1 = $row['product_img1'];

                echo "
        
                <div class='col-md-4 col-sm-6 single'>
                
                    <div class='product'>
                    
                        <a href='details.php?pro_id=$pro_id'>
                        
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        
                        </a>
                        
                        <div class='text'>
                        
                            <h3>
                    
                                <a href='details.php?pro_id=$pro_id'>
        
                                    $pro_title
        
                                </a>
                            
                            </h3>
                            
                            <p class='price'>
                            
                                $ $pro_price
                            
                            </p>
                            
                            <p class='button'>
                            
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
        
                                    View Details
        
                                </a>
                            
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
        
                                    <i class='fa fa-shopping-cart'></i> Add to Cart
        
                                </a>
                            
                            </p>
                        
                        </div>
                    
                    </div>
                
                </div>
                
                ";







            }


          }

         }

         
         
         
         
         
         
         
         
         ?>
           
       </div><!-- row Finish -->



<?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    