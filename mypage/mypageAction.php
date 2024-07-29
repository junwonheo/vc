<?php
    session_start();
    include "../utils/common.php";
    header("Content-Type: text/html; charset=UTF-8");

    //입력한 값을 가져오는 과정
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $old_pass = isset($_POST['old_pass']) ? $_POST['old_pass'] : '';
    $new_pass1 = isset($_POST['new_pass1']) ? $_POST['new_pass1'] : '';
    $new_pass2 = isset($_POST['new_pass2']) ? $_POST['new_pass2'] : '';
    $introduction = isset($_POST['introduction']) ? $_POST['introduction'] : '';
    $idx = isset($_POST['idx']) ? $_POST['idx'] : 0;

    if($idx == 0){
        echo "<script>alert('정상적인 입력값이 아닙니다.');history.back(-1);</script>";
        exit;
    }
    $query = "SELECT * FROM users WHERE idx = $idx";
    $result = $db_conn->query($query);
    if (!$result) {
        echo "<script>alert('unusual request');</script>";
        exit;
    }
    if ($result->num_rows == 0) {
        echo "<script>alert('존재하지 않는 계정입니다.');</script>";
        exit;
    }
    $row = $result->fetch_assoc();
    

    //입력값 검증로직
    if($_SESSION['login'] != 'admin'){
        if(strlen($old_pass)>16){
            echo "<script>alert('패스워드는 16글자 미만으로 설정해주세요.');history.back(-1);</script>";
            exit;
        }
    }
    if($new_pass1 != $new_pass2){
        echo "<script>alert('변경할 패스워드가 서로 일치하지 않습니다.');history.back(-1);</script>";
        exit;
    }else if(strlen($new_pass1)>16 || strlen($new_pass2)>16){
        echo "<script>alert('패스워드는 16글자 미만으로 설정해주세요.');history.back(-1);</script>";
        exit;
    }
    $login = $_SESSION['login'];
    $query = "SELECT * FROM users WHERE username='$login'";
    $result = $db_conn->query($query);
    $row = $result->fetch_assoc();

    
    if(!$result){
        echo "<script>alert('존재하지 않는 계정입니다.');history.back(-1);</script>";
        exit;
    }
    // 파일 업로드 처리
    if(!empty($_FILES['userfile']['name'])) {
        $filename = $_FILES['userfile']['name']; 
        $upload_path = "../uploads/profile/".$filename; 
        $file_info = pathinfo($upload_path); 
        $ext = strtolower($file_info["extension"]);
        $ext_arr = array('jpg', 'jpeg', 'png', 'gif'); 
        // 업로드된 파일의 확장자가 허용 목록에 있는지 확인
        if(!in_array($ext, $ext_arr)){
            echo "<script>alert('허용되지 않은 확장자입니다.');history.back(-1);</script>";
            exit;
        } else if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path)){
            echo "<script>alert('파일 업로드에 실패했습니다.');history.back(-1)</script>";
            exit;
        }
    }else{
        $filename = isset($row['profile']) ? $row['profile'] : '';

    }
    if($new_pass1 == '' && $new_pass2 ==''){
        if ($row['username'] == $username && $row['introduction'] == $introduction && $row['profile'] == $filename){
            echo "<script>alert('변경된 값이 없습니다.');history.back(-1);</script>";
            exit;
        }
    }
    if($row['password'] != hash("sha256",$old_pass)){
        echo "<script>alert('기존 패스워드가 일치하지 않습니다.');history.back(-1);</script>";
        exit;
    }


    $old_pass = hash("sha256", $old_pass);
    $new_pass1 = hash("sha256", $new_pass1);
    if ($new_pass1 == '' && $new_pass2 == '') {
        $query = "UPDATE users SET username=?, password=?, introduction=?, profile=? WHERE idx = ?";
        $stmt = $db_conn->prepare($query);
        $stmt->bind_param('ssssi', $username, $old_pass, $introduction, $filename, $idx);
    } else if (($new_pass1 != '' && $new_pass2 != '') || ($new_pass1 != '' && $new_pass2 == '')) {
        $query = "UPDATE users SET username=?, password=?, introduction=?, profile=? WHERE idx = ?";
        $stmt = $db_conn->prepare($query);
        $stmt->bind_param('ssssi', $username, $new_pass1, $introduction, $filename, $idx);
    }
    
    if ($stmt->execute()) {
        // 쿼리 실행 성공
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('사용자 정보가 성공적으로 업데이트되었습니다.')</script>";
            $_SESSION['login'] = $username;
        } else {
            echo "<script>alert('업데이트된 내용이 없습니다.')</script>";
        }
    } else {
        // 쿼리 실행 실패
        echo "쿼리 실행 중 오류가 발생했습니다: " . $stmt->error;
    }
    
    $stmt->close();
    
     echo "<script>self.location.href='../index.php';</script>";
?>
