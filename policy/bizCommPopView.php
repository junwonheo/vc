<?php
    session_start();
    include "../utils/common.php";
?>
<!DOCTYPE html>
    <html lang="ko">
        <head>
            <meta charset="UTF-8">
            <title>CodeLearn</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                table, th, td {
                    border: 1px solid #ddd;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                .notice {
                    font-size: 0.9em;
                    color: #666;
                }
            </style>
    </head>
    <link rel="stylesheet" href="../utils/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
        <div style="width:80%; margin:auto; margin-top:20px; padding:20px;">
            <h2>사업자 정보</h2>
            <table>
                <tr>
                    <th>통신판매번호</th>
                    <td>2019-금천가산B-0048</td>
                    <th>사업자등록번호</th>
                    <td>799-25-00428</td>
                </tr>
                <tr>
                    <th>신고현황</th>
                    <td>통신판매업 신고</td>
                    <th>법인여부</th>
                    <td>법인</td>
                </tr>
                <tr>
                    <th>상호</th>
                    <td>주식회사 코드런</td>
                    <th>대표 전화번호</th>
                    <td>070-8834-6310</td>
                </tr>
                <tr>
                    <th>대표자명</th>
                    <td>박연우</td>
                    <th>취급품목</th>
                    <td>교육/도서/완구/오락, 기타</td>
                </tr>
                <tr>
                    <th>전자우편(E-mail)</th>
                    <td colspan="3">info@codelrn.com</td>
                </tr>
                <tr>
                    <th>사업장소재지</th>
                    <td colspan="3">서울특별시 금천구 가산동 543-1 대성디폴리스지식산업센터 A동</td>
                </tr>
                <tr>
                    <th>사업장소재지(도로명)</th>
                    <td colspan="3">서울특별시 금천구 서부샛길 606, 대성디폴리스지식산업센터 A동 26층</td>
                </tr>
                <tr>
                    <th>인터넷도메인</th>
                    <td colspan="3"><a href="../">https://www.codelrn.com</a></td>
                </tr>
                <tr>
                    <th>호스트서버소재지</th>
                    <td colspan="3">대성디폴리스지식산업센터 A동</td>
                </tr>
                <tr>
                    <th>통신판매업 신고기관명</th>
                    <td colspan="3">서울특별시 금천구청 (02-2627-2114)</td>
                </tr>
            </table>

            <p class="notice">
                본자료는 전자상거래소비자보호법 제12조사항에 따라 제공하는 정보입니다.<br>
                사업자 정보에 대한 궁금한 사항이나 사업자의 신원정보가 불일치할 경우에는 사업자 정보검색시 확인되는 해당 신고기관(지방자치단체)에 문의하여 주시기 바랍니다.<br>
                일부 사업자의 경우, 부가가치세법상 사업자 폐업 신고는 하였으나 통신판매업법상 폐업 신고를 하지 않은 사례가 있을 수 있습니다. 사업자 폐업 여부도 국세청 홈택스 페이지(<a href="http://www.hometax.go.kr">www.hometax.go.kr</a>)의 사업자등록상태조회 코너를 통해 확인하시기 바랍니다.
            </p>
        </div>
</body>
</html>

