<?php 
session_start();         
session_destroy();       
echo '<script>alert("Anda Telah Logout")</script>';
echo '<script>window.location="index.html"</script>';
?>