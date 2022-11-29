<?php

    /*
    ** Title Function That Echo The Page Title In Case The Page
    ** Has The Variable $pageTitle And Echo Default Title For Other Pages
    */

    function getTitle(){

        global $pageTitle;

        if (isset($pageTitle)){

            echo $pageTitle;

        } else {

            echo 'Playtech';

        }
    }

    /*
    ** Home Redirect Function
    ** This Function Accept Parameters
    ** $errorMsg = Echo The Message [ Error | Success | Warning ]
    ** $url = The Link You Want To Redirect To
    ** $seconds = Seconds Before Redirecting
    */

    function redirectHome($theMsg,$url=null, $seconds = 0){

        if ($url === null) {

            $url = 'index.php';

            $link = 'log-in';

        } else {
                    //if data exest from form and not empty
            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

                $url = $_SERVER['HTTP_REFERER'];

                $link = 'Previous Page';

            } else {

                $url = 'index.php';

                $link = 'log-in';

            }

        }

        //  echo $theMsg;
        
        // echo "<div class='alert alert-info push'>You Will Be Redirected To $link After $seconds Secondes.</div>";

        header("refresh:$seconds;url=$url");

        exit();

    }

    /*
    ** Check Items Function v1.0
    ** Function To Check Item In Database[ Function Accept Parameters ]
    ** $select = The Item To Select [ Example: user, item, category ]
    ** $from = The Table To Select [ Example: users, items, categories ]
    ** $value =The Value Of Select [ Example: marouane,hassan, box, electronics ]
    */

    function checkItem($item, $items, $value) {

        global $con;

        $statement = $con->prepare("SELECT $item FROM $items WHERE $item = ?");

        $statement->execute(array($value));

        $count = $statement->rowCount();

        return $count;

    }

    /*
    ** Count Number Of Items Function
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