<!DOCTYPE html>
<html>
    <!--  HEADER    -->
   <?php include_once 'src/inc/inc-header.php'; ?>
    
    
    <!--  BODY  -->
    <body>
        <?php
        // Include Content after clicking Navigation Link
        include_once 'src/inc/inc-navigation.php';
        $default = "src/view/content-start.php";
        $incFile = $default;
        $site = "";
                
        if (isset($_GET["site"])) {
            $site = $_GET["site"];
            if (strlen($site) != 0) {
                 if ($site == "start"){
                    $incFile = "src/view/content-start.php";
                }
                 else if ($site == "collection"){
                    $incFile = "src/view/content-collection.php";
            }
                else if ($site == "info"){
                    $incFile = "src/view/content-info.php";
                }
               else if ($site == "search"){
                    $incFile = "src/view/content-search.php";
                } else {
                    $incFile = "src/view/content-not_found.php";
                }
            }
            include $incFile;
        } else {
        include $incFile;
        }
        require_once 'src/inc/inc-footer.php';
        ?>
    </body>
    
</html>
