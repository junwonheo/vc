<?php
    session_start();
    include "../utils/common.php";
    $username = isset($_POST['uid']) ? $_POST['uid'] : '';
    $password = isset($_POST['upw']) ? $_POST['upw'] : '';
    $password2 = isset($_POST['upw2']) ? $_POST['upw2'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $ssn = isset($_POST['ssn']) ? $_POST['ssn'] : '';

    if ($username === '' || $password === '' || $password2 ===''){
        echo "<script>alert('아이디 또는 패스워드가 공백입니다.');history.back(-1);</script>";
        exit();
    }else if((preg_match("/^[0-9a-zA-Z]*$/", $username) == 0)){
        echo "<script>alert('아이디에는 영문자/숫자만 입력 가능합니다.');history.back(-1);</script>";
        exit;
    }else if(mb_strlen($username) > 15){
        echo "<script>alert('아이디는 영어/숫자만으로 15글자 미만으로 해주세요.');history.back(-1);</script>";
        exit();
    }
    else if($password != $password2){
        echo "<script>alert('패스워드가 서로 일치하지 않습니다.');history.back(-1);</script>";
        exit();
    } else if (!preg_match("/^(?=.*[A-Z])(?=.*\W).{10,}$/", $password)) {
        echo "<script>alert('패스워드는 10글자 이상, 특수문자와 대문자가 1개 이상 포함되어야 합니다.');history.back(-1);</script>";
        exit();
    }else if((preg_match("/^[0-9]*$/", $ssn) == 0)){
        echo "<script>alert('정상적인 입력값이 아닙니다.');history.back(-1);</script>";
        exit;
    }else if((preg_match("/^[0-9]*$/", $phone) == 0)){
        echo "<script>alert('전화번호는 숫자만 입력해주세요.');history.back(-1);</script>";
        exit;
    }else if($name=='' || $ssn == '' || $phone == '' || $username=='' || $password=='' || $password2==''){
        echo "<script>alert('입력되지 않은 값이 존재합니다.');history.back(-1);</script>";
        exit;
    }else if (!preg_match("/^[가-힣]+$/u", $name)) {
        echo "<script>alert('이름에 한글 외의 문자가 포함되어 있습니다.');history.back(-1);</script>";
        exit();
    }

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $db_conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = ($result && $result->num_rows) ? $result->num_rows : 0;
    $row = $result->fetch_assoc();

    if($num > 0){
        echo "<script>alert('이미 존재하는 아이디입니다.');history.back(-1);</script>";
        exit();
    } else {
        $query = 'INSERT INTO users(username, password, email, ssn, name, phone) VALUES(?, ?, ?, ?, ?, ?)';
        $password = hash("sha256", $password);
        $stmt = $db_conn->prepare($query);
        $stmt->bind_param('ssssss', $username, $password, $email, $ssn, $name, $phone);  // 수정된 부분
        $stmt->execute();
        echo "<script>alert('회원가입이 완료되었습니다.');window.location.href='./login.php'</script>";
        exit();
    }
    
?>
