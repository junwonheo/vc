<?php
    session_start();
    include "../utils/common.php";

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
        <div style="text-align: center;">
            <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                코드런 정책 살펴보기
            </a>
        </div>
        <div style="width:80%; padding: 20px; margin:auto;">
            <h4><strong>이용약관</strong></h4>
            <p>우리의 이용약관을 통해 서비스 이용에 대한 규칙과 조건을 확인하세요. 이용약관은 회사와 사용자 간의 권리와 의무를 명확히 하여 공정한 서비스를 제공하기 위한 기준을 제시합니다.</p>

            <h4><strong>지적재산권</strong></h4>
            <p>지적재산권 정책은 우리의 콘텐츠와 서비스가 보호받을 수 있도록 하는 중요한 요소입니다. 콘텐츠 제작자와 사용자의 권리를 보호하기 위한 우리의 정책을 확인해보세요.</p>

            <h4><strong>사업자 정보</strong></h4>
            <p>우리 회사의 사업자 정보는 투명하고 신뢰할 수 있는 서비스를 제공하기 위한 필수적인 정보입니다. 회사의 기본적인 정보와 사업자 등록번호 등을 확인할 수 있습니다.</p>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">CodeLearn Policy</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
            코드런의 이용하는데 필요한 약관 및 처리방침에 관해 다룹니다.
            </div>
            <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                펼쳐보기
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./bizCommPopView.php">사업자 정보</a></li>
                <li><a class="dropdown-item" href="./privacy.php">개인정보처리방침</a></li>
                <li><a class="dropdown-item" href="./terms-of-service.php">이용약관</a></li>
                <li><a class="dropdown-item" href="./content.php">지식공유자 콘텐츠 이용약관</a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class="footer-bg" style="margin-top:500px;">
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
