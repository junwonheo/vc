<?php
session_start();
include "../utils/common.php";
header("Content-Type: text/html; charset=UTF-8");

if(!isset($_SESSION['login'])){
    echo "<script>alert('로그인 후 이용 가능합니다.');history.back(-1);</script>";
    exit;
}
$login = $_SESSION['login'];
$query = "SELECT * FROM users WHERE username = '$login'";
$result = $db_conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $introduction = isset($row['introduction']) ? $row['introduction'] : '';
} else {
    echo "<script>alert('조회에 실패했습니다.');history.back(-1);</script>";
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
                                <li><a class="dropdown-item" href="../community/qna.php">질문 & 답변</a></li>
                                <li><a class="dropdown-item" href="../community/review.php">수강평</a></li>
                                <li><a class="dropdown-item" href="../community/study.php">스터디</a></li>
                                <li><a class="dropdown-item" href="../coding/index.php">코딩테스트</a></li>
                                <li><a class="dropdown-item" href="../policy/index.php">약관ㆍ정책</a></li>
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
                            if(isset($_SESSION['id'])){
                                if($_SESSION['id'] == 'admin'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../mypage/index.php">관리자님</a>
                        </li>
                        <?php
                                }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../mypage/index.php"><?=$_SESSION['id']?>님</a>
                        </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="mypage">
        <div style="display:flex">
            <div style="width:50%; margin-left:15px;">
                <form action="./mypageAction.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">User ID</span>
                        <input name="username" value="<?=$row['username']?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="hidden" value="<?=$row['idx']?>" name="idx">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                        <input name="old_pass" type="password" class="form-control" placeholder="현재 패스워드" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">New password</span>
                        <input name="new_pass1" type="password" class="form-control" placeholder="변경할 패스워드" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">New password</span>
                        <input name="new_pass2" type="password" class="form-control" placeholder="변경할 패스워드 확인" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Introduction</span>
                        <textarea class="form-control" aria-label="With textarea" name="introduction"><?=$introduction?></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Profile</span>
                        <input type="file" class="form-control" id="inputGroupFile01" name="userfile">
                    </div>
                    <div style="margin-top: 20px; text-align: center;">
                        <input type="submit" class="btn btn-outline-success" value="수정" style="width:100px;"></input>
                        <button id="backBtn" type="button" class="btn btn-outline-danger" style="width:100px;">탈퇴</button>
                    </div>
                </form>
            </div>
            <div style="margin:auto">
                <?php
                    if($row['profile'] != ''){
                ?>
                    <img src="../uploads/profile/<?=$row['profile']?>" alt="" style="width: 150px; height: auto;">
                <?php
                    }else{
                ?>
                    <img src="../images/th.jpg" alt="" style="width: 150px; height: auto;">
                <?php
                    }
                ?>
                <div style="margin-top:20px">
                    <strong>이름 : <?=$row['name']?></strong>
                </div>
                <div>
                    <strong>번호 : <?=$row['phone']?></strong>
                </div>
                <div>
                    <strong>email : <?=$row['email']?></strong>
                </div>
            </div>
        </div>
    </div>
    <script>
        const backBtn = document.querySelector('#backBtn');
        backBtn.addEventListener('click', ()=>{
            if(confirm('계정을 삭제하시겠습니까?')){
                window.location.href="delete.php?idx=<?=$row['idx']?>"
            }
        })
    </script>
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
