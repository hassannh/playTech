<?php

    /*
    ===================================================
    == Items Page
    ===================================================
    */

    ob_start(); //Output Buffering Start
    
    session_start();

    $pageTitle = 'Items';

    if (isset($_SESSION['Username'])){

        include 'init.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage'){ // Manage Items Page 
    
            $stmt = $con->prepare("SELECT
                                        items.*
                                    FROM 
                                        items
                                    ORDER BY
                                        Item_ID
                                    DESC");
    
            // Execute The Statement
    
            $stmt->execute();
    
            // Assign To Variable
    
            $items = $stmt->fetchAll();
    
        ?>

<h1 class="text-center push">Manage Items</h1>
<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>#ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Adding Date</td>
                <td>Control</td>
            </tr>

            <?php
                        foreach ($items as $item) {
    
                            echo "<tr>";
                            echo "<td>" . $item['Item_ID'] . "</td>";
                            echo "<td>" . $item['Name'] . "</td>";
                            echo "<td>" . $item['Description'] . "</td>";
                            echo "<td>" . $item['Price'] . "</td>";
                            echo "<td>" . $item['Add_Date'] . "</td>";
                            echo "<td>
                                <a href='items.php?do=Edit&itemid=" . $item['Item_ID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                <a href='items.php?do=Delete&itemid=" . $item['Item_ID'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
        </table>
    </div>
    <a href="items.php?do=Add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Item</a>
</div>
<?php } elseif ($do == 'Add'){// Add Items Page 
?>
    <form class="add_item" action="?do=Insert" method="POST">
    <div class="item">
        <label class="input-group-text label_item" for="name">Nom de produit</label>
        <input type="text" class="form-control" name="name" placeholder="Name Of The Item" required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="description">Description de produit</label>
        <input type="text" class="form-control" name="description" placeholder="Description Of The Item" required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="prix_item">Prix de produit</label>
        <input type="text" class="form-control" name="price" placeholder="Price Of The Item" required="required">
    </div>   
    <div class="item">
        <label class="input-group-text label_item file" for="img_item">Image de produit</label>
        <input class="form-control input_item" type="file" name="img_item" required="required">
    </div>
    <div class="submit_add">
        <i class="fa fa-plus add_plus"></i>
        <input class="input-group-text input_submit" type="submit" value="  Ajouter le produit">
    </div>
</form>
<?php
        
        } elseif ($do == 'Insert') { // Insert Items Page

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                echo "<h1 class='text-center'>Insert Items</h1>";
                echo "<div class='container'>";

                // Get Variables From The Form

                $name         =  $_POST['name'];
                $desc         =  $_POST['description'];
                $price        =  $_POST['price'];
                $image      =  $_POST['img_item'];
                
                // Validate The Form

                $formErrors = array();

                if (empty($user)) {

                    $formErrors[] = 'Name Can\'t Be <strong>Empty</strong>';
                }

                if (empty($desc)) {

                    $formErrors[] = 'Description Can\'t Be <strong>Empty</strong>';
                }

                if (empty($price)) {

                    $formErrors[] = 'Price Can\'t Be <strong>Empty</strong>';
                }

                if (empty($image)) {

                    $formErrors[] = 'image Can\'t Be <strong>Empty</strong>';
                }
                // Loop Intro Errors Array And Echo It

                foreach ($formErrors as $error) {

                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
                
                // Check If There's No Error Proceed The Update Operation

                if (empty($formErrors)) {

                    // Insert Item info In The Database

                    $stmt = $con->prepare("INSERT INTO 
                                items(Name, Description, Price, Image, Add_Date)
                            VALUES(:zname, :zdesc, :zprice, :zimage, now())");
                    $stmt->execute(array(

                        'zname'     => $name,
                        'zdesc'     => $desc,
                        'zprice'    => $price,
                        'zimage'  => $image

                    ));
                    
                    // Echo Success Message

                    $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted </div>';

                    redirectHome($theMsg, 'back');
                }
            } else {

                echo "<div class='container'>";

                $theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

                redirectHome($theMsg);

                echo "</div>";
            }

            echo "</div>";
            
        } elseif ($do == 'Edit'){ // Edit Page 

            // Check If Get Request Item Is Numeric & Get The Integer Value Of It

            $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

            // Select All Data Depend On This ID

            $stmt = $con->prepare("SELECT * FROM items WHERE Item_ID = ?");

            // Execute Query

            $stmt->execute(array($itemid));

            // Fetch The Data

            $item = $stmt->fetch();

            // The Row Count

            $count = $stmt->rowCount();

            // If There's Such The Form

            if ($count > 0) { ?>

                <h1 class="text-center">Edit Item</h1>
                <form class="add_item" action="?do=Update" method="POST">
                <input type="hidden" name="itemid" value="<?php echo $itemid ?>">   
    <div class="item">
        <label class="input-group-text label_item" for="name">Nom de produit</label>
        <input type="text" class="form-control" name="name" placeholder="Name Of The Item" required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="description">Description de produit</label>
        <input type="text" class="form-control" name="description" placeholder="Description Of The Item" required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="prix_item">Prix de produit</label>
        <input type="text" class="form-control" name="price" placeholder="Price Of The Item" required="required">
    </div>   
    <div class="item">
        <label class="input-group-text label_item file" for="img_item">Image de produit</label>
        <input class="form-control input_item" type="file" name="img_item" required="required">
    </div>
    <div class="submit_add">
        <i class="fa fa-plus add_plus"></i>
        <input class="input-group-text input_submit" type="submit" value="  Save Item">
    </div>
</form>
<?php

                // If There's No Show Error Message

            } else {

                echo "<div class='container'>";

                $theMsg =  '<div class="alert alert-danger">Theres No Such Id</div>';

                redirectHome($theMsg);

                echo "</div>";
            }
           
        } elseif ($do == 'Update') { // Update Page 

            echo "<h1 class='text-center'>Update Item</h1>";
            echo "<div class='container'>";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Get Variables From The Form

                $id         =  $_POST['itemid'];
                $name       =  $_POST['name'];
                $desc       =  $_POST['description'];
                $price      =  $_POST['price'];
                $image    =  $_POST['img_item'];

                // Validate The Form

                $formErrors = array();

                if (empty($user)) {

                    $formErrors[] = 'Name Can\'t Be <strong>Empty</strong>';
                }

                if (empty($desc)) {

                    $formErrors[] = 'Description Can\'t Be <strong>Empty</strong>';
                }

                if (empty($price)) {

                    $formErrors[] = 'Price Can\'t Be <strong>Empty</strong>';
                }

                if (empty($image)) {

                    $formErrors[] = 'Image Can\'t Be <strong>Empty</strong>';
                }

                // Loop Intro Errors Array And Echo It

                foreach ($formErrors as $error) {

                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }


                // Check If There's No Error Proceed The Update Operation

                if (empty($formErrors)) {

                    // Update The Database With This Info

                    $stmt = $con->prepare("UPDATE
                                                items 
                                            SET 
                                                Name = ?,  
                                                Description = ?, 
                                                Price = ?, 
                                                Image = ?
                                            WHERE 
                                                Item_ID = ?");
                    $stmt->execute(array($name, $desc, $price, $image, $id));

                    // Echo Success Message

                    $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

                    redirectHome($theMsg);
                }
            } else {

                $theMsg = "<div class='alert alert-danger'>Sorry You Cant Browse This Page Directly</div>";

                redirectHome($theMsg, 'back');
            }

            echo "</div>";
        } elseif ($do == 'Delete'){ // Delete Items Page

            echo "<h1 class='text-center'>Update Item</h1>";
            echo "<div class='container'>";
    
            // Check If Get Request Item ID Is Numeric & Get The Integer Value Of It
    
            $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
    
            // Select All Data Depend On This ID
    
            $check = checkItem('Item_ID', 'items', $itemid);
    
            // If There's Such The Form
    
            if ($check > 0) {
    
                $stmt = $con->prepare("DELETE FROM items WHERE Item_ID = :zid");
    
                $stmt->bindParam(":zid", $itemid);
    
                $stmt->execute();
    
                $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';
    
                redirectHome($theMsg, 'back');
            } else {
    
                $theMsg = "<div class='alert alert-danger'>This Id Is Not Exist</div>";
    
                redirectHome($theMsg);
            }
    
            echo "</div>";

        } elseif ($do == 'Approve') {

            echo "<h1 class='text-center'>Approve Item</h1>";
            echo "<div class='container'>";
    
            // Check If Get Request Item ID Is Numeric & Get The Integer Value Of It
    
            $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
    
            // Select All Data Depend On This ID
    
            $check = checkItem('Item_ID', 'items', $itemid);
    
            // If There's Such The Form
    
            if ($check > 0) {
    
                $stmt = $con->prepare("UPDATE  items SET Approve = 1 WHERE Item_ID = ?");
    
                $stmt->execute(array($itemid));
    
                $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Approve</div>';
    
                redirectHome($theMsg);
            } else {
    
                $theMsg = "<div class='alert alert-danger'>This Id Is Not Exist</div>";
    
                redirectHome($theMsg);
            }
    
            echo "</div>";              
        }
        echo "</div>"; 
        include 'tmp/footer.php';
        include 'tmp/script.php';

    } else{
        
        header('Location: index.php');

        exit();
    }

    ob_end_flush(); // Release The Output
