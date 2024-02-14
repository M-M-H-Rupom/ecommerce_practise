
            <div class="e_sidebar">
                <ul>
                <?php 
                    $conn = mysqli_connect("localhost","root","mysql","php-shop");
                    $category_result = mysqli_query($conn,"SELECT * FROM categories");
                    
                    while($category_row = mysqli_fetch_assoc($category_result)){  ?>
                            <li><a href="index.php?category_id=<?php echo $category_row['id'] ?> "> <?php echo $category_row['name'] ?> </a></li>
                <?php } ?>
                   
               </ul>
              
            </div>