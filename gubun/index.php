<?php
    include "../utils/common.php";
    session_start();

    $gubun = isset($_GET['gubun']) ? $_GET['gubun'] : '';
    $query = 'SELECT * FROM lecture';
    $result = $db_conn->query($query);
    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $subjects = array(
        'sec' => array(1, 3, 5, 6),
        'game' => array(0, 2, 4, 7),
        'dbms' => array(10,21,22,23),
        'cs' => array(8, 9, 10, 11),
        'network' => array(16,17,18,19),
        'cipher' => array(12,13,14,15),
        'programming' => array(0, 2, 7, 4)
    );
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
                                <li><a class="dropdown-item" href="./index.php?gubun=sec">정보 보안</a></li>
                                <li><a class="dropdown-item" href="./index.php?gubun=game">게임 개발</a></li>
                                <li><a class="dropdown-item" href="./index.php?gubun=dbms">데이터베이스</a></li>
                                <li><a class="dropdown-item" href="./index.php?gubun=cs">컴퓨터 공학</a></li>
                                <li><a class="dropdown-item" href="./index.php?gubun=network">네트워크</a></li>
                                <li><a class="dropdown-item" href="./index.php?gubun=cipher">암호학</a></li>
                                <li><a class="dropdown-item" href="./index.php?gubun=programming">프로그래밍</a></li>
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
    </div>
    <div id="lecture-img">
    <?php if ($_GET['gubun'] == 'sec'){ 
            for ($i = 0; $i < count($subjects['sec']); $i++){ ?>
            <div class="lecture-item" style="width:250px">
                <a href="../lecture/index.php?div=<?=$subjects['sec'][$i]+1?>">
                    <img src="<?= $rows[$subjects['sec'][$i]]['img'] ?>" alt="<?= $rows[$subjects['sec'][$i]]['name'] ?>" style="width:220px; margin:20px;">
                    <span><strong><?= $rows[$subjects['sec'][$i]]['name'] ?></strong></span>
                </a>
            </div>
        <?php }}else if($_GET['gubun'] == 'game'){ 
            for ($i = 0; $i < count($subjects['game']); $i++){ ?>
                <div class="lecture-item" style="width:250px">
                    <a href="../lecture/index.php?div=<?=$subjects['game'][$i]+1?>">
                        <img src="<?= $rows[$subjects['game'][$i]]['img'] ?>" alt="<?= $rows[$subjects['game'][$i]]['name'] ?>" style="width:220px; margin:20px;">
                        <span><strong><?= $rows[$subjects['game'][$i]]['name'] ?></strong></span>
                    </a>
                </div>
        <?php }}else if($_GET['gubun'] == 'dbms'){ 
            for ($i = 0; $i < count($subjects['dbms']); $i++){ ?>
                <div class="lecture-item" style="width:250px">
                    <a href="../lecture/index.php?div=<?=$subjects['dbms'][$i]+1?>">
                        <img src="<?= $rows[$subjects['dbms'][$i]]['img'] ?>" alt="<?= $rows[$subjects['dbms'][$i]]['name'] ?>" style="width:220px; margin:20px;">
                        <span><strong><?= $rows[$subjects['dbms'][$i]]['name'] ?></strong></span>
                    </a>
                </div>
        <?php }}else if($_GET['gubun'] == 'cs'){ 
            for ($i = 0; $i < count($subjects['cs']); $i++){ ?>
                <div class="lecture-item" style="width:250px">
                    <a href="../lecture/index.php?div=<?=$subjects['cs'][$i]+1?>">
                        <img src="<?= $rows[$subjects['cs'][$i]]['img'] ?>" alt="<?= $rows[$subjects['cs'][$i]]['name'] ?>" style="width:220px; margin:20px;">
                        <span><strong><?= $rows[$subjects['cs'][$i]]['name'] ?></strong></span>
                    </a>
                </div>
        <?php }}else if($_GET['gubun'] == 'network'){ 
            for ($i = 0; $i < count($subjects['network']); $i++){ ?>
                <div class="lecture-item" style="width:250px">
                    <a href="../lecture/index.php?div=<?=$subjects['network'][$i]+1?>">
                        <img src="<?= $rows[$subjects['network'][$i]]['img'] ?>" alt="<?= $rows[$subjects['network'][$i]]['name'] ?>" style="width:220px; margin:20px;">
                        <span><strong><?= $rows[$subjects['network'][$i]]['name'] ?></strong></span>
                    </a>
                </div>
        <?php }}else if($_GET['gubun'] == 'cipher'){ 
            for ($i = 0; $i < count($subjects['cipher']); $i++){ ?>
                <div class="lecture-item" style="width:250px">
                    <a href="../lecture/index.php?div=<?=$subjects['cipher'][$i]+1?>">
                        <img src="<?= $rows[$subjects['cipher'][$i]]['img'] ?>" alt="<?= $rows[$subjects['cipher'][$i]]['name'] ?>" style="width:220px; margin:20px;">
                        <span><strong><?= $rows[$subjects['cipher'][$i]]['name'] ?></strong></span>
                    </a>
                </div>
        <?php }}else if($_GET['gubun'] == 'programming'){ 
            for ($i = 0; $i < count($subjects['programming']); $i++){ ?>
                <div class="lecture-item" style="width:250px">
                    <a href="../lecture/index.php?div=<?=$subjects['programming'][$i]+1?>">
                        <img src="<?= $rows[$subjects['programming'][$i]]['img'] ?>" alt="<?= $rows[$subjects['programming'][$i]]['name'] ?>" style="width:220px; margin:20px;">
                        <span><strong><?= $rows[$subjects['programming'][$i]]['name'] ?></strong></span>
                    </a>
                </div>
        <?php }} ?>
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
