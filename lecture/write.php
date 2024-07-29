<?php
    session_start();
    include "../utils/common.php";
    header("Content-Type: text/html; charset=UTF-8");
    if(!isset($_SESSION['login'])){
        echo "<script>alert('로그인 후 이용 가능합니다.');window.location.href='../login/login.php';</script>";
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
                                <li><a class="dropdown-item" href="../qna.php">질문 & 답변</a></li>
                                <li><a class="dropdown-item" href="../review.php">수강평</a></li>
                                <li><a class="dropdown-item" href="../study.php">스터디</a></li>
                                <li><a class="dropdown-item" href="../coding/index.php">코딩테스트</a></li>
                                <li><a class="dropdown-item" href="../policy/index.php">약관ㆍ정책</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../loadmap/index.php"><strong>로드맵</strong></a>
                        </li>
                        <form class="d-flex" role="search" id="container" style="width:350px" action="../../search/index.php">
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
        <div class="parent">
            <div>
                <form action="./action.php" method="post" enctype="multipart/form-data">
                    <input autocomplete="off" type="text" style="width:700px" name="idx" placeholder="강의 인덱스를 입력해주세요. 1부터 시작입니다."><br>
                    <input autocomplete="off" type="title" style="width:700px" placeholder="강의 제목을 입력해주세요">
                    <textarea autocomplete="off" name="intro" id="" style="width:700px; height:300px" placeholder="강의 소개 입력란입니다. HTML 태그를 활용해서 작성해주세요 <br> 태그는 자동입력입니다."></textarea>
                    <textarea autocomplete="off" name="curriculum" id="" style="width:700px; height:300px" placeholder="강의 커리큘럼 대분류입니다. 쉼표를 기준으로 분류해주세요 ex)환경 설정, Python 기본 문법, 반복문, 제어문"></textarea>
                    <textarea autocomplete="off" name="detailcurri" id="" style="width:700px; height:300px" placeholder="강의 커리큘럼 소분류입니다. @를 기준으로 대분류를 구분하고 쉼표를 기준으로 소분류를 분류해주세요 ex)OT,Visual Studio Code 설치,환경변수 세팅@자료형 구조,연산자"></textarea>
                    
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="userfile">
                    </div>
                    <input type="submit" class="btn btn-outline-success" id="write" value="Write">
                    <button type="button" class="btn btn-outline-danger" id="back">Back</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const back = document.querySelector('#back');
            back.addEventListener('click', () => {
                history.back(-1);
            });
        });
        const btn_submit = document.querySelector('#write');
        btn_submit.addEventListener("click", (e)=>{
            const title = document.querySelector('#title');
            const content = document.querySelector('.text-box');
            if(title.value == '') {
                alert('제목을 입력하세요.');
                title.focus()
                e.preventDefault();
                return
            }
            else if(content.value == ''){
                alert('본문을 입력하세요.');
                content.focus();
                e.preventDefault();
                return
            }else if(title.value.length > 30){
                alert('제목은 30글자를 넘을 수 없습니다.');
                title.focus();
                e.preventDefault();
                return
            }
        })
    </script>
</body>
</html>

