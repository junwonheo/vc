<?php
    session_start();
    include "../utils/common.php";
    
    $idx = isset($_GET['div']) ? $_GET['div'] : '';
    if($idx == ''){
        echo "<script>alert('정상적인 입력값이 아닙니다.');history.back(-1);</script>";
        exit;
    }


    $query = 'SELECT * FROM lecture WHERE idx = ?';
    $stmt = $db_conn->prepare($query);
    $stmt->bind_param('i', $idx);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    $grade = round($row['grade']);
    $star = str_repeat('⭐', $grade);
    $curriculum = explode(",", $row['curriculum']);
    $detailcurri = explode("@", $row['detailcurri']);
    $price = round($row['price'] / 6);
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
                            <input name="keyword" class="form-control me-2" type="search" placeholder="나의 진짜 성장을 도와줄 실무 강의를 찾아보세요" aria-label="Search" style="border-radius:10px; ">
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
        <div class="main-banner">
            <div class="text-container">
                <h3><strong><?=$row['name']?></strong></h3>
                <h5><?=$star ,$row['grade']?></h5>
            </div>
            <div class="picture-container">
                <img src="<?=$row['img']?>" alt="">
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" data-target="target1">강의소개</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" data-target="target2">커리큘럼</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../community/qna.php" data-target="target4">수강전 문의</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div style="width:100%; display:flex">
            <div style="width:60%; border:solid 1px gray;border-radius:5px">
                <div style="padding:20px;">
                    <?=$row['intro']?>
                </div>
                <div class="accordion" id="target2">
                    <?php for($i=0; $i<count($curriculum); $i++){ ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse100+<?=$i?>" aria-expanded="false" aria-controls="collapse100+<?=$i?>">
                        <?= $curriculum[$i] ?>
                        </button>
                        </h2>
                        <div id="collapse100+<?=$i?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <?php $detailCnt = explode(",", $detailcurri[$i]);
                        for ($j=0; $j<count($detailCnt); $j++){ ?>
                        <div class="accordion-body" style="height:5px; padding:10px;">
                            <p style="text-align: left;"><a href="./view.php?lecture=<?=$row['name']?>&&idx=<?=$i?>">⏯ <?=$detailCnt[$j]?></a></p>
                        </div>
                        <hr>
                        <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="lecture-register-box" style="text-align:center;" id="register">
                <h5><strong>월 <?=$price?>원 (6개월 할부시)</strong></h5>
                <h5><?=round($row['price'])?>원</h5>
                <p>수강 기한 : 무제한</p>
                <p>수료증 : 발급</p>
                <button type="button" class="btn btn-success" style="margin:auto; text-align:center; width:70%; height:20%" onClick="window.location.href='../cart/index.php?idx=<?=$idx?>'">바로 수강신청 하기</button>
            </div>
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
    <script>
            const register = document.querySelector('#register');
            document.querySelectorAll('.nav-link').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
            window.addEventListener('scroll', function() {
                const registerBox = document.querySelector('#register');
                if (window.scrollY >= 450) {
                    registerBox.classList.add('fixed');
                } else {
                    registerBox.classList.remove('fixed');
                }
            });
            window.addEventListener('scroll', function() {
                console.log(window.scrollY);
            });

    </script>
</body>
</html>
