<?php
    include "../utils/common.php";
    session_start();
    
    $username = isset($_SESSION['login']) ? $_SESSION['login'] : '';
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $db_conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLearn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../utils/main.css">
    <link rel="stylesheet" href="../utils/common.js">
    <style>
        .coding-box{
            width: 80%;
            height:500px;
            background-color:whitesmoke;
            margin: auto;
            margin-top:20px;
        }
        .profile{
            width:35%;
            border:1px black solid;
            padding:30px;
        }
    </style>
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
                                <li><a class="dropdown-item" href="../index.php?gubun=sec">정보 보안</a></li>
                                <li><a class="dropdown-item" href="../index.php?gubun=game">게임 개발</a></li>
                                <li><a class="dropdown-item" href="../index.php?gubun=dbms">데이터베이스</a></li>
                                <li><a class="dropdown-item" href="../index.php?gubun=cs">컴퓨터 공학</a></li>
                                <li><a class="dropdown-item" href="../index.php?gubun=network">네트워크</a></li>
                                <li><a class="dropdown-item" href="../index.php?gubun=cipher">암호학</a></li>
                                <li><a class="dropdown-item" href="../index.php?gubun=programming">프로그래밍</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="../" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <div class="coding-box" style="display:flex">

            <div style="width:65%;">
                <div class="accordion" id="accordionExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse100" aria-expanded="false" aria-controls="collapse100">
                            Level 1
                        </button>
                        </h2>
                        <div id="collapse100" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p style="text-align: left;">
                                <h2>배열의 합 구하기</h2>
                                <p>
                                주어진 배열의 모든 숫자의 합을 구하세요. 입력으로 주어지는 배열은 정수로만 구성되어 있습니다. 이 문제는 기본적인 배열 처리와 반복문을 연습하는 데 도움이 됩니다.
                                </p>
                            </p>
                            <div style="text-align: center">
                            <button type="button" class="btn btn-outline-success" onclick="window.location.href='./action.php'">도전!!</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse101" aria-expanded="false" aria-controls="collapse101">
                            Level 2
                        </button>
                        </h2>
                        <div id="collapse101" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p style="text-align: left;">
                                <h2>문자열 뒤집기</h2>
                                <p>
                                주어진 문자열을 뒤집어서 반환하세요. 입력으로 주어지는 문자열은 알파벳 소문자와 대문자로만 구성되어 있습니다. 이 문제는 문자열 조작과 기본적인 알고리즘을 이해하는 데 도움이 됩니다.
                                </p>
                            </p>
                            <div style="text-align: center">
                            <button type="button" class="btn btn-outline-success" onclick="window.location.href='./action.php'">도전!!</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse102" aria-expanded="false" aria-controls="collapse102">
                            Level 3
                        </button>
                        </h2>
                        <div id="collapse102" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p style="text-align: left;">
                                <h2>배열의 중복 제거</h2>
                                <p>
                                주어진 배열에서 중복된 요소를 제거하고 고유한 값들만 남기는 프로그램을 작성하세요. 입력 배열은 정수로 구성되어 있으며, 결과 배열의 순서는 입력 배열의 순서를 유지해야 합니다. 이 문제는 배열 조작과 해시 테이블을 이해하는 데 도움이 됩니다.
                                </p>    
                            </p>
                            <div style="text-align: center">
                            <button type="button" class="btn btn-outline-success" onclick="window.location.href='./action.php'">도전!!</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse103" aria-expanded="false" aria-controls="collapse103">
                            Level 4
                        </button>
                        </h2>
                        <div id="collapse103" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p style="text-align: left;">
                                <h2>팰린드롬 검사</h2>
                                <p>
                                주어진 문자열이 팰린드롬인지 확인하는 프로그램을 작성하세요. 팰린드롬은 앞뒤로 읽어도 동일한 문자열을 말합니다. 이 문제는 문자열 조작과 조건문을 이해하는 데 도움이 됩니다.
                                </p>    
                            </p>
                            <div style="text-align: center">
                            <button type="button" class="btn btn-outline-success" onclick="window.location.href='./action.php'">도전!!</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse104" aria-expanded="false" aria-controls="collapse104">
                            Level 5
                        </button>
                        </h2>
                        <div id="collapse104" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p style="text-align: left;">
                                <h2>이진 트리의 높이 구하기</h2>
                                <p>
                                주어진 이진 트리의 높이를 계산하는 프로그램을 작성하세요. 이진 트리의 높이는 루트 노드에서 가장 먼 리프 노드까지의 경로 길이로 정의됩니다. 이 문제는 트리 구조와 재귀 알고리즘을 이해하는 데 도움이 됩니다.
                                </p>    
                            </p>
                            <div style="text-align: center">
                            <button type="button" class="btn btn-outline-success" onclick="window.location.href='./action.php'">도전!!</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            


            <div class="profile" style="text-align: center">
                <?php if($row['profile'] == '') { ?>
                <img src="../uploads/profile/th.jpg" alt="" style="max-width:250px;"> <?php }else {?>
                <img src="../uploads/profile/<?=$row['profile']?>" alt="" style="max-width:250px;"> <?php } ?>
                <div style="margin-top:20px;">
                    <p> <strong>이름 : <?= $row['name'] ?></strong></p>
                    <p>점수 : 0</p>
                </div>
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
</body>
