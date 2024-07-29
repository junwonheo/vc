<?php
    session_start();
    
    echo "<script>alert('유료 회원만 접근가능합니다.');history.back(-1);</script>";
    exit();
?>
