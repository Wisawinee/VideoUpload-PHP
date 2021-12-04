<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $video_name = $_GET['del'];
        $deletedata = new DB_con();
        $sql = $deletedata->delete($video_name);

        if ($sql) {
            echo "<script>alert('Record Deleted Successfully!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }

?>