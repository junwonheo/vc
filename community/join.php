<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>alert('로그인 후 이용 가능합니다.');window.location.href='../login/login.php'</script>";
    exit();
}

$idx = isset($_GET['num']) ? $_GET['num'] : 0;
if ($idx == 0) {
    echo "<script>alert('잘못된 접근입니다.');history.back(-1);</script>";
    exit();
} else if (!preg_match("/^[0-9]*$/", $idx)) {
    echo "<script>alert('정상적인 입력값이 아닙니다.');history.back(-1);</script>";
    exit;
}

include "../utils/common.php";

$query = 'SELECT * FROM study WHERE idx = ?';
$stmt = $db_conn->prepare($query);
$stmt->bind_param('i', $idx);
$stmt->execute();
$result = $stmt->get_result(); // 결과 집합을 얻습니다.

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // 결과에서 한 행을 얻습니다.
} else {
    echo "<script>alert('해당하는 스터디가 없습니다.');history.back(-1);</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLearn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../utils/main.css">
</head>
<body>
    <div style="width:80%; margin: auto; margin-top:20px">
        <!-- 부트스트랩 navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
            <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="../images/ca.png" alt="" style="width:110px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>강의</strong>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../gubun/index.php?gubun=sec">정보 보안</a></li>
                                <li><a class="dropdown-item" href="../gubun/index.php?gubun=game">게임 개발</a></li>
                                <li><a class="dropdown-item" href="../gubun/index.php?gubun=dbms">데이터베이스</a></li>
                                <li><a class="dropdown-item" href="../gubun/index.php?gubun=cs">컴퓨터 공학</a></li>
                                <li><a class="dropdown-item" href="../gubun/index.php?gubun=network">네트워크</a></li>
                                <li><a class="dropdown-item" href="../gubun/index.php?gubun=cipher">암호학</a></li>
                                <li><a class="dropdown-item" href="../gubun/index.php?gubun=programming">프로그래밍</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>커뮤니티</strong>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./qna.php">질문 & 답변</a></li>
                                <li><a class="dropdown-item" href="./review.php">수강평</a></li>
                                <li><a class="dropdown-item" href="./study.php">스터디</a></li>
                                <li><a class="dropdown-item" href="./coding/index.php">코딩테스트</a></li>
                                <li><a class="dropdown-item" href="./policy/index.php">약관ㆍ정책</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../loadmap/index.php"><strong>로드맵</strong></a>
                        </li>
                        <form class="d-flex" role="search" id="container" style="width:350px" action="../search/index.php">
                            <input autocomplete="off" name="keyword" class="form-control me-2" type="search" placeholder="나의 진짜 성장을 도와줄 실무 강의를 찾아보세요" aria-label="Search" style="border-radius:10px; ">
                            <button type="submit">🔍</button>
                        </form>
                            <?php
                                if(!isset($_SESSION['login'])){

                            ?>
                            <li class="nav-item" style="flex:right">
                                <a class="nav-link" href="../login/login.php"><strong>로그인</strong></a>
                            </li>
                            <?php
                                }else{

                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../login/logout.php"><strong>로그아웃</strong></a>
                            </li>
                        <?php
                            }
                        ?>
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login'] == 'admin'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../mypage/index.php">관리자님</a>
                        </li>
                        <?php
                                }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../mypage/index.php"><?=$_SESSION['login']?>님</a>
                        </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- 부트스트랩 navbar -->
         <div style="margin:auto; text-align:center;">
            <img src="<?= $row['img'] ?>" alt="">
            <h3><strong><?= $row['title'] ?></strong></h3>
            <h5><strong>┌───────────────목표───────────────┐</strong></h5>
            <strong><?= $row['objective'] ?></strong>
            <h5 style="margin-bottom:40px;"><strong>└────────────────────────────────┘</strong></h5>

            <h5><strong>┌──────────────참여방법──────────────┐</strong></h5>
            <strong><?= $row['way'] ?></strong>
            <h5 style="margin-bottom:40px;"><strong>└────────────────────────────────┘</strong></h5>

            <h5><strong>┌───────────────규칙───────────────┐</strong></h5>
            <strong><?= $row['rule'] ?></strong>
            <h5 style="margin-bottom:40px;"><strong>└────────────────────────────────┘</strong></h5>

            <h5><strong>┌───────────────멤버───────────────┐</strong></h5>
            <strong><?= $row['member'] ?>명</strong>
            <h5 style="margin-bottom:40px;"><strong>└────────────────────────────────┘</strong></h5>
            <button style="margin-top:20px;" type="button" class="btn btn-outline-success" onClick="location.href='./joinAction.php?idx=<?=$row['idx']?>'">참여 신청 !</button>  
        </div>
    </div>    
    <div class="footer-bg">
        <div class="footer-bottomMenu">
            <p> <a href="../policy/privacy.php">개인정보처리방침</a> | <a href="../policy/terms-of-service.php">이용약관</a> </p>
            <p>대표자: 박연우 | 사업자번호: 799-25-00428 <a href="../policy/bizCommPopView.php">사업자 정보 확인</a></p>
            <p>통신판매업: 2019-금천가산B-0048 | 개인정보보호책임자: 안가은 | 이메일: info@codelrn.com</p>
            <p>전화번호: 070-8834-6310 | 주소: 서울특별시 금천구 가산동 543-1 26층</p>
            <p>Hosting by Amazon Web Services, Inc.</p>
            <p>&copy; CODELEARN. ALL RIGHTS RESERVED</p>
        </div>
    </div>
</body>
</html>
