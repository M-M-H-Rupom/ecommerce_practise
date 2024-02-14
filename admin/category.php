<?php
  include('session.php');
  include('functions_category.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="p_container">
          <?php include 'sidebar.php'; ?>
        <div class="content">
          <h2>All category <a href="add_category.php">Add category</a></h2>
          <table>
              <tr>
                  <th>Name</th>
                  <th>Action </th>
              </tr>
          <?php
                $category = catch_category();
             ?>
                  <tr> 
                      <td><?php echo $row['name'] ?></td>
                      <td>
                          <a href="add_category.php?action=edit&category_id=<?php echo $row['id'] ?>">Edit</a>
                          <a href="?action=delete&category_id=<?php echo $row['id'] ?>">Delete</a>
                      </td> 
                  </tr>
            
            

            <tr>

            </tr>
          </table>
       </div>
    </div>
</body>
</html>