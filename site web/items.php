<?php

/*
===================================================
== Items Page
===================================================
*/

ob_start(); //Output Buffering Start

session_start();

$pageTitle = 'Items';

if (isset($_SESSION['Username'])) {

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { // Manage Items Page 

        //select all items from table items

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
                <td>Quantity</td>
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
            echo "<td>" . $item['quantity'] . "</td>";
            echo "<td>" . $item['Price'] . "</td>";
            echo "<td>" . $item['Add_Date'] . "</td>";
            echo '<td style=" GAP: 10PX; DISPLAY: flex; FLEX-WRAP: WRAP; JUSTIFY-CONTENT: center;" class="controol">';
            echo "<a href='items.php?do=Edit&itemid=" . $item['Item_ID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>";
            echo "<a href='items.php?do=Delete&itemid=" . $item['Item_ID'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
            echo "</td>";
            echo "</tr>";
        }
            ?>
        </table>
    </div>
    <a href="items.php?do=Add" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New Item</a>
</div>
<?php } elseif ($do == 'Add') { // Add Items Page 
?>
<form class="add_item" action="?do=Insert" method="POST">
    <div class="item">
        <label class="input-group-text label_item" for="name">Nom de produit</label>
        <input type="text" class="form-control" name="name" placeholder="Name Of The Item" required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="description">Description de produit</label>
        <input type="text" class="form-control" name="description" placeholder="Description Of The Item"
            required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="quantity">Quantity</label>
        <input type="text" class="form-control" name="quantity" placeholder="quantity" required="required">
    </div>



    <div class="item">
        <label class="input-group-text label_item" for="prix_item">Prix de produit</label>
        <input type="text" class="form-control" name="price" placeholder="Price Of The Item" required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="img_item">Image de produit</label>
        <input class="form-control input_item" type="file" name="img_item" accept="image/png, image/jpeg, image/jpg"
            required="required">

    </div>
    <select class="form-select input-group-text" name="categories">
        <option selected Disabled>Categories</option>
        <option value="Games">Games</option>
        <option value="Mouses">Mouses</option>
        <option value="KeyBoards">KeyBoards</option>
        <option value="Screen">Screen</option>
        <option value="Control">Remote control</option>
    </select>
    <div class="submit_add">
        <input class="input-group-text input_submit" type="submit" value="+ Ajouter le produit">
    </div>
</form>
<?php

    } elseif ($do == 'Insert') { // Insert Items Page

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo "<h1 class='text-center'>Insert Items</h1>";
            echo "<div class='container'>";

            // Get Variables From The Form

            $name = $_POST['name'];
            $desc = $_POST['description'];
            $quan = $_POST['quantity'];
            $price = $_POST['price'];
            $image = $_POST['img_item'];
            $category = $_POST['categories'];


            // Insert Item info In The Database
            //cus cant merge sql with php

            $stmt = $con->prepare("INSERT INTO 
                                items(Name, Description, quantity, Price, Image, Add_Date, categories)
                            VALUES(:zname, :zdesc, :zquan, :zprice, :zimage, now(), :zcategory)");
            $stmt->execute(
                array(
                    'zname' => $name,
                    'zdesc' => $desc,
                    'zquan' => $quan,
                    'zprice' => $price,
                    'zimage' => $image,
                    'zcategory' => $category
                )
            );

            // Echo Success Message

            $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted </div>';
            //back to previus page
            redirectHome($theMsg, 'back');

        } else {
            //else if someone try to log in with url

            echo "<div class='container'>";

            $theMsg = '<div class="alert alert-danger push">Sorry You Cant Browse This Page Directly</div>';

            redirectHome($theMsg);

            echo "</div>";
        }

        echo "</div>";

    } elseif ($do == 'Edit') { // Edit Page 

        // Check If Get Request Item Is Numeric 
        // intval Get The Integer Value Of It

        $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

        // Select All Data Depend On This ID

        $stmt = $con->prepare("SELECT * FROM items WHERE Item_ID = ?");

        // Execute abouv code

        $stmt->execute(array($itemid));

        // Fetch The Data

        $item = $stmt->fetch();

        // add one if it found it

        $count = $stmt->rowCount();

        // If There's Such The Form

        if ($count > 0) { ?>

<h1 class="text-center">Edit Item</h1>
<form class="add_item" action="?do=Update" method="POST">
    <input type="hidden" name="itemid" value="<?php echo $itemid ?>">
    <div class="item">
        <label class="input-group-text label_item" for="name">Nom de produit</label>
        <input type="text" class="form-control" name="name" value="<?php echo $item['Name'] ?>" required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="description">Description de produit</label>
        <input type="text" class="form-control" name="description" value="<?php echo $item['Description'] ?>"
            required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="quantity">Quantity</label>
        <input type="text" class="form-control" name="quantity" value="<?php echo $item['quantity'] ?>"
            required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="prix_item">Prix de produit</label>
        <input type="text" class="form-control" name="price" value="<?php echo $item['Price'] ?>" required="required">
    </div>
    <div class="item">
        <label class="input-group-text label_item" for="img_item">Image de produit</label>
        <input class="form-control input_item" type="file" name="img_item" accept="image/png, image/jpeg, image/jpg">

    </div>
    <select class="form-select input-group-text" name="categories">
        <option disabled selected>
            <?php echo $item['categories'] ?>
        </option>
        <option value="Games">Games</option>
        <option value="Mouses">Mouses</option>
        <option value="KeyBoards">KeyBoards</option>
        <option value="Screen">Screen</option>
        <option value="Control">Remote control</option>
    </select>
    <div class="submit_add">
        <input class="input-group-text input_submit" type="submit" value="+ Save Item">
    </div>
</form>
<?php

            // If not find id if id=0 OR something else

        } else {

            echo "<div class='container'>";

            $theMsg = '<div class="alert alert-danger push-">Theres No Such Id</div>';

            redirectHome($theMsg);

            echo "</div>";
        }

    } elseif ($do == 'Update') { // Update Page 

        echo "<h1 class='text-center'>Update Item</h1>";
        echo "<div class='container'>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Get Variables From The Form

            $id = $_POST['itemid'];
            $name = $_POST['name'];
            $desc = $_POST['description'];
            $quan = $_POST['quantity'];
            $price = $_POST['price'];
            $image = $_POST['img_item'];
            $category;
            if (isset($_POST['categories'])) {
                $category = $_POST['categories'];
            }

            // Update The Database With This Info


            if (!empty($category) && $category != ' ') { //update category

                $stmt = $con->prepare("UPDATE
                        items 
                    SET 
                        Name = ?,  
                        Description = ?, 
                        quantity = ?,
                        Price = ?, 
                        categories = ?
                    WHERE 
                        Item_ID = ?");
                $stmt->execute(array($name, $desc, $quan, $price, $category, $id));

            } elseif (!empty($image) && $image != ' ') { //update image

                $stmt = $con->prepare("UPDATE
                        items 
                    SET 
                    
                        Name = ?,  
                        Description = ?, 
                        quantity = ?,
                        Price = ?, 
                        Image = ?
                    WHERE 
                        Item_ID = ?");
                $stmt->execute(array($name, $desc, $quan, $price, $image, $id));

                //update category and image
            } elseif ((!empty($category) && $category != ' ') && (!empty($image) && $image != ' ')) {

                $stmt = $con->prepare("UPDATE
                        items 
                    SET 
                        Name = ?,  
                        Description = ?, 
                        quantity = ?,
                        Price = ?, 
                        Image = ?,
                        categories = ?
                    WHERE 
                        Item_ID = ?");
                $stmt->execute(array($name, $desc, $quan, $price, $image, $category, $id));

            } else {
                $stmt = $con->prepare("UPDATE
                        items 
                    SET 
                        Name = ?,  
                        Description = ?, 
                        quantity = ?,
                        Price = ?
                    WHERE 
                        Item_ID = ?");
                $stmt->execute(array($name, $desc, $quan, $price, $id));
            }

            // Echo Success Message

            $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

            redirectHome($theMsg);

        } else {
            //if someone try to log in from url

            $theMsg = "<div class='alert alert-danger push'>Sorry You Cant Browse This Page Directly</div>";

            redirectHome($theMsg, 'back');
        }

        echo "</div>";
    } elseif ($do == 'Delete') { // Delete Items Page

        echo "<h1 class='text-center'>Delete Item</h1>";
        echo "<div class='container'>";

        // Check If itemid not equal 0

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

            $theMsg = "<div class='alert alert-danger push'>This Id Is Not Exist</div>";

            redirectHome($theMsg);
        }

        echo "</div>";

    }

    echo "</div>";
    include 'tmp/footer.php';
    include 'tmp/script.php';

} else {

    //go to index

    header('Location: index.php');

    exit();
}

ob_end_flush(); // Release The Output
