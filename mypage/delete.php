<?php
session_start();
include "../utils/common.php";

$idx = isset($_GET['idx']) ? $_GET['idx'] : '';
if ($idx == '') {
    echo "<script>alert('정상적인 접근이 아닙니다.');history.back(-1);</script>";
    exit;
}

$query = "DELETE FROM users WHERE idx = ?";
$stmt = $db_conn->prepare($query);
$stmt->bind_param('i', $idx);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('계정이 삭제되었습니다.');history.back(-1);</script>";
        session_destroy();
        exit;
    } else {
        echo "<script>alert('계정을 찾을 수 없습니다.');history.back(-1);</script>";
        exit;
    }
} else {
    echo "<script>alert('계정 삭제에 실패했습니다.');history.back(-1);</script>";
    exit;
}
$stmt->close();
?>

