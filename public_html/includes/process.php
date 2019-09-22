<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("Manage.php");

//For Registration Processsing
if (isset($_POST["username"]) AND isset($_POST["email"])) {
    $user = new User();
    $result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"]);
    echo $result;
    exit();
}
//For Login Processing
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
    echo $result;
    exit();
}
//For Admin Registration Processsing
if (isset($_POST["adminusername"]) AND isset($_POST["adminemail"])) {
    $user = new User();
    $result = $user->createAdminAccount($_POST["adminusername"], $_POST["adminemail"], $_POST["password1"]);
    echo $result;
    exit();
}
//For Admin Login Processing
if (isset($_POST["admin_email"]) AND isset($_POST["admin_password"])) {
    $user = new User();
    $result = $user->AdminLogin($_POST["admin_email"], $_POST["admin_password"]);
    echo $result;
    exit();
}
//-------------------------------Rumor----------------------
//Create Rumor
if (isset($_POST["rumor_type"])) {
    $file = $_FILES["file"];

    $filename = $_FILES["file"]['name'];
    $fileTmpName = $_FILES["file"]['tmp_name'];
    $fileSize = $_FILES["file"]['size'];
    $fileError = $_FILES["file"]['error'];
    $fileType = $_FILES["file"]['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $destination_path = $_SERVER['DOCUMENT_ROOT'];
                $fileNameNew = uniqid('', TRUE) . "." . $fileActualExt;
                $fileDestination = $destination_path . "/Icha3a/public_html/images/" . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $dbo = new DBOperation();
                $result = $dbo->addRumor($_POST["Admin_name"], $_POST["rumor_date"], $_POST["rumor_type"], $_POST["title"], $_POST["article"], $fileNameNew);
                echo $result;
                exit();
            } else {
                echo 'Your File is much bigger than the maximum size!';
                exit();
            }
        } else {
            echo 'there was an error uploading your file!';
            exit();
        }
    } else {
        echo "you cannout upload files of that type!";
        exit();
    }
}
//Fetch Rumors
if (isset($_POST["rumors_info"])) {
    $m = new Manage();
    $result = $m->consultRumors('rumor');
    $rows = $result["rows"];
    if (count($rows) > 0) {
        $n = 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><img style="border-radius: 50%;" src="images/<?php echo $row["image"]; ?>" height="50" width="50"</td>
                <td><?php echo $row["admin"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["type"]; ?></td>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["article"]; ?></td>
                <td>
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_rumor"><i class="fa fa-trash-alt">&nbsp;</i>Delete</a>
                    <a href="#" eid="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#form_update_rumors" class="btn btn-info btn-sm edit_rumor"><i class="fa fa-pencil-alt">&nbsp;</i>Edit</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <?php
        exit();
    }
}
//Set Rumor
if (isset($_POST["updateRumor"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("rumor", "id", $_POST["id"]);
    echo json_encode($result);
    exit();
}
//Update Record after getting data
if (isset($_POST["select_Type"])) {
    $id = $_POST["id"];
    $admin = $_POST["admin"];
    $date = $_POST["date"];
    $type = $_POST["select_Type"];
    $title = $_POST["title"];
    $article = $_POST["article"];

    if ($_FILES["file"]["name"] == "") {
        $m = new Manage();
        $result = $m->update_record("rumor", ["id" => $id], ["admin" => $admin, "date" => $date, "type" => $type, "title" => $title, "article" => $article]);
        echo $result;
    } else {
        $file = $_FILES["file"];

        $filename = $_FILES["file"]['name'];
        $fileTmpName = $_FILES["file"]['tmp_name'];
        $fileSize = $_FILES["file"]['size'];
        $fileError = $_FILES["file"]['error'];
        $fileType = $_FILES["file"]['type'];

        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $destination_path = $_SERVER['DOCUMENT_ROOT'];
                    $fileNameNew = uniqid('', TRUE) . "." . $fileActualExt;
                    $fileDestination = $destination_path . "/Icha3a/public_html/images/" . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $m = new Manage();
                    $result = $m->update_record("rumor", ["id" => $id], ["admin" => $admin, "date" => $date, "type" => $type, "title" => $title, "article" => $article, "image" => $fileNameNew]);
                    echo $result;
                    exit();
                } else {
                    echo 'Your File is much bigger than the maximum size!';
                    exit();
                }
            } else {
                echo 'there was an error uploading your file!';
                exit();
            }
        } else {
            echo "you cannout upload files of that type!";
            exit();
        }
    }
}
//Delere Rumor
if (isset($_POST["deleteRumor"])) {
    $m = new Manage();
    $result = $m->deleteRecord('rumor', 'id', $_POST["id"]);
    echo $result;
}
//Send a Porsonal Rumor
if (isset($_POST["rumor"])) {
    $presence = 'Private';
    if (isset($_POST['known'])) {
        $presence = $_POST['from'];
    }
    $from = $presence;
    $to = $_POST["to"];
    $rumor = $_POST["rumor"];
    $dbo = new DBOperation();
    $result = $dbo->addPersonalRumor($from, $to, $rumor);
    echo $result;
}
//Insert Suggested Rumor
if (isset($_POST['suggest_rumor_title'])) {
    $dbo = new DBOperation();
    $result = $dbo->addSuggestRumor($_POST['username'], $_POST['suggest_rumor_title'], $_POST['suggest_article']);
    echo $result;
}

//Insert COntact Message
if (isset($_POST['contact_message'])) {
    $dbo = new DBOperation();
    $result = $dbo->addContactMessage($_POST['username'], $_POST['contact_message']);
    echo $result;
}
//Notification Suggested Rumors
if (isset($_POST["suggested_rumors"])) {
    $dbo = new DBOperation();
    $result = $dbo->getAllRecord('suggestrumors');
    if (count($result) > 0) {
        foreach ($result as $row) {
            ?>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">At <?php echo $row['date']; ?>, with the title bellow</div>
                    <span class="font-weight-bold"><?php echo $row['title']; ?></span>
                </div>
            </a>
            <?php
        }
        ?>
        <?php
        exit();
    }
}
//Suggested Rumors Totale
if (isset($_POST["totaleSuggested"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("suggestrumors");

    echo $row["totale"];

    exit();
}

//Notification Contact Messages
if (isset($_POST["Messages"])) {
    $dbo = new DBOperation();
    $result = $dbo->getAllRecord('usercontact');
    if (count($result) > 0) {
        foreach ($result as $row) {
            ?>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="ussefpic/unknown.png">
                    <div class="status-indicator"></div>
                </div>
                <div>
                    <div class="text-truncate"><?php echo $row['message']; ?></div>
                    <div class="small text-gray-500">from "<?php echo $row['username']; ?>" at <?php echo $row['date']; ?> </div>
                </div>
            </a>
            <?php
        }
        ?>
        <?php
        exit();
    }
}
//Contacte Message Totale
if (isset($_POST["totaleMessages"])) {
    $obj = new DBOperation();
    $row = $obj->getAllStat("usercontact");

    echo $row["totale"];

    exit();
}
//----------------Suggested Rumors--------------------
//Fetch Suggested Rumors
if (isset($_POST["suggested_rumors_info"])) {
    $m = new Manage();
    $result = $m->consultRumors('suggestrumors');
    $rows = $result["rows"];
    if (count($rows) > 0) {
        $n = 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["article"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td>
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_sugg_rumor"><i class="fa fa-trash-alt">&nbsp;</i>Delete</a>
                    <a href="#" eid="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#form_create_rumors" class="btn btn-info btn-sm create_rumor"><i class="fa fa-pencil-alt">&nbsp;</i>Make it as Rumor</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <?php
        exit();
    }
}
//Set Suggested Rumor
if (isset($_POST["updateSuggestedRumor"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("suggestrumors", "id", $_POST["id"]);
    echo json_encode($result);
    exit();
}
//Update Record after getting suggested rumors
if (isset($_POST["Suggested_rumor_title"])) {
    $file = $_FILES["file"];

    $filename = $_FILES["file"]['name'];
    $fileTmpName = $_FILES["file"]['tmp_name'];
    $fileSize = $_FILES["file"]['size'];
    $fileError = $_FILES["file"]['error'];
    $fileType = $_FILES["file"]['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if ($_FILES["file"]["name"] != "") {
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $destination_path = $_SERVER['DOCUMENT_ROOT'];
                    $fileNameNew = uniqid('', TRUE) . "." . $fileActualExt;
                    $fileDestination = $destination_path . "/Icha3a/public_html/images/" . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    $dbo = new DBOperation();
                    $result = $dbo->addRumor($_POST["admin"], $_POST["date"], $_POST["Type"], $_POST["Suggested_rumor_title"], $_POST["article"], $fileNameNew);
                    echo $result;
                    exit();
                } else {
                    echo 'Your File is much bigger than the maximum size!';
                    exit();
                }
            } else {
                echo 'there was an error uploading your file!';
                exit();
            }
        } else {
            echo "you cannout upload files of that type!";
            exit();
        }
    } else {
        echo "Don't forget the image!";
        exit();
    }
}
//Delere Suggested Rumor
if (isset($_POST["deleteSuggestedRumor"])) {
    $m = new Manage();
    $result = $m->deleteRecord('suggestrumors', 'id', $_POST["id"]);
    echo $result;
}
//-----------------History-----------------
if (isset($_POST['history_info'])) {
    $dbo = new DBOperation();
    $result = $dbo->getAllRecord('history');
    $rows = $result;
    if (count($rows) > 0) {
        $n = 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["operation"]; ?></td>
                <td><?php echo $row["admin"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <?php
        exit();
    }
}
//--------------------Users Messages-------------------
//Fetch Messages
if (isset($_POST["messages_info"])) {
    $dbo = new DBOperation();
    $result = $dbo->getAllRecord('usercontact');
    $rows = $result;
    if (count($rows) > 0) {
        $n = 1;
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["message"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td>
                    <a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_message"><i class="fa fa-trash-alt">&nbsp;</i>Delete</a>
                    <a href="#" eid="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#responseModal" class="btn btn-info btn-sm con_response"><i class="fa fa-pencil-alt">&nbsp;</i>Response The Message</a>
                </td>
            </tr>
            <?php
            $n++;
        }
        ?>
        <?php
        exit();
    }
}
//delete message
//Delere Rumor
if (isset($_POST["deleteMessage"])) {
    $m = new Manage();
    $result = $m->deleteRecord('usercontact', 'id', $_POST["id"]);
    echo $result;
}
