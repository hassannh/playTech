<?php

    /*
    ** Title Function v1.O
    ** Title Function That Echo The Page Title In Case The Page
    ** Has The Variable $pageTitle And Echo Default Title For Other Pages
    */

    function getTitle(){

        global $pageTitle;

        if (isset($pageTitle)){

            echo $pageTitle;

        } else {

            echo 'Default';

        }
    }

    /*
    ** Home Redirect Function v2.0
    ** This Function Accept Parameters
    ** $errorMsg = Echo The Message [ Error | Success | Warning ]
    ** $url = The Link You Want To Redirect To
    ** $seconds = Seconds Before Redirecting
    */

    function redirectHome($theMsg,$url=null, $seconds = 3){

        if ($url === null) {

            $url = 'index.php';

            $link = 'HomePage';

        } else {

            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

                $url = $_SERVER['HTTP_REFERER'];


                $link = 'Previous Page';

            } else {

                $url = 'index.php';

                $link = 'HomePage';

            }

        }

        echo $theMsg;
        
        echo "<div class='alert alert-info'>You Will Be Redirected To $link After $seconds Secondes.</div>";

        header("refresh:$seconds;url=$url");

        exit();

    }

    /*
    ** Check Items Function v1.0
    ** Function To Check Item In Database[ Function Accept Parameters ]
    ** $select = The Item To Select [ Example: user, item, category ]
    ** $from = The Table To Select [ Example: users, items, categories ]
    ** $value =The Value Of Select [ Example: marouane, box, electronics ]
    */

    function checkItem($select, $from, $value) {

        global $con;

        $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

        $statement->execute(array($value));

        $count = $statement->rowCount();

        return $count;

    }

    /*
    ** Count Number Of Items Function v1.0
    ** Function To Count Numbers Of Items Rows 
    ** $item = The Item To Count
    ** $table = The Table To Choose From
    */
    function countItems( $item, $table ) {

        global $con;

        $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

        $stmt2->execute();

        return $stmt2->fetchColumn();
        
    }