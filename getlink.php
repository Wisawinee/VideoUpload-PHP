 <?php 

    include_once('functions.php');

    if (isset($_GET['get'])) {
        $video_id = $_GET['get'];
        $getdata = new DB_con();
        $sql = $getdata->fetchonerecord($video_id);

        if ($sql) {
            echo "<script>window.location.href='display.php?videoid=". $video_id ."'</script>";
        }
    }

?>