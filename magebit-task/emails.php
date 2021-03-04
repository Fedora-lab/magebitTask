<?php
require_once 'php/isset.php';
?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Database</title>
      </head>
      <body>
           <br /><br />
           <div class="container" style="width:700px;">
                <form method="get">
                          <label>Seacrh:</label>
                          <input type="text" name="search" class="form-control" />
                          <input type="submit" name="searchBtn" class="btn btn-info" value="Search!" />
                          <br />
                          <br />
                          <input type="submit" name="sortBy" class="btn btn-info" value="email" />
                          <input type="submit" name="sortBy" class="btn btn-info" value="date" />
                          <br />
                          <br/>
                          <?php
//domain buttons
foreach ($data->dom as $key) {
    ?>
                                   <input type="submit" name="domain" value="<?php echo $key ?>" />
                         <?php
}
?>
                     <span class="text-success">
                     <?php
if (isset($massage)) {
    echo $massage;
}
?>
                     </span>
                </form>
           <br />
                <div class="table-responsive">
                     <table border="2" class="table table-bordered">
                     <h3><?php echo "Email is sorted by $order"; ?></h3>
                     <?php if (!empty($search)) {?>
                     <h3><?php echo "Email is sorted by $search"; ?></h3>
                     <?php
}
?>
                          <tr>
                               <td width="30%">E-mail</td>
                               <td width="50">Registration Date</td>
                               <td width="10%">ID</td>
                               <td width="10%">Delete</td>
                          </tr>
                          <?php
foreach ($post_data as $post) {
    ?>
                              <tr>
                               <td><?php echo $post["email"]; ?></td>
                               <td><?php echo $post["date"]; ?></td>
                               <td><?php echo $post["id"]; ?></td>
                               <td><a href="emails.php?delete=&id=<?php echo $post['id']; ?>" id="<?php echo $post["id"]; ?>" class="delete">Delete</a></td>
                          </tr>
                          <?php
}
?>
                          <p id="demo"></p>
                     </table>
                </div>
           </div>
      </body>
 </html>