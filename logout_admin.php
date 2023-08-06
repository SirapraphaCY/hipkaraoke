<?php
    // session_start();
    // if(session_destroy()){
    //     header("location:index.php");
    // }


    
    session_start();
    session_destroy();

?>

<script>
window.location = "./index.php"
</script>