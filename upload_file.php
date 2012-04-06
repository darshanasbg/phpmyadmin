<?php
require_once './libraries/common.inc.php';


/**
 * Does the common work
 */
require './libraries/server_common.inc.php';


/**
 * Displays the links
 */
require './libraries/server_links.inc.php';


if ((($_FILES["import_file"]["type"] == "application/octet-stream")) && ($_FILES["import_file"]["size"] < 128000000))
  {
  if ($_FILES["import_file"]["error"] > 0)
    {
    $message = PMA_Message::error(__("Return Code: " . $_FILES["import_file"]["error"] . "<br />"));
    $message->display();
    }
  else
    {
      $message = PMA_Message::success(__(
        "Upload: " . $_FILES["import_file"]["name"] . "<br />".
        "Type: " . $_FILES["import_file"]["type"] . "<br />".
        "Size: " . ($_FILES["import_file"]["size"] / 1024) . " Kb<br />".
        "Temp file: " . $_FILES["import_file"]["tmp_name"] . "<br />"
        ));
      $message->display();
    if (file_exists("C:/Program Files (x86)/MySQL/MySQL Server 5.5/lib/plugin/" . $_FILES["import_file"]["name"]))
      {
            $message = PMA_Message::error(__($_FILES["import_file"]["name"] . " already exists. "));
            $message->display();
      }
    else
      {
      move_uploaded_file($_FILES["import_file"]["tmp_name"],
      "C:/Program Files (x86)/MySQL/MySQL Server 5.5/lib/plugin/" . $_FILES["import_file"]["name"]);
       $message = PMA_Message::success(__( "Stored in: " . "C:/Program Files (x86)/MySQL/MySQL Server 5.5/lib/plugin/" . $_FILES["import_file"]["name"]));
       $message->display();
      }
      
        $result_var = PMA_DBI_real_query("INSTALL PLUGIN test_plugin_server SONAME 'auth_test_plugin.dll'", $controllink, PMA_DBI_QUERY_STORE);
   
        if($result_var)
        {
            $message = PMA_Message::success(__("Plugin installed"));
            $message->display();
        }
        else
        {
            $message = PMA_Message::error(__("Error installing plugin: " . mysql_error()));
            $message->display();
        }
    }
  }
else
  {
  $message = PMA_Message::error(__('ERROR : Invalied file.'));
  $message->display();
  }
  
    echo $_REQUEST['plugin_na'];
    print_r($_FILES); 
  require './libraries/footer.inc.php';
?>
