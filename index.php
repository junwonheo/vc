<?php
    session_start();
    include "./utils/common.php";
    $query = 'SELECT * FROM lecture';
    $result = $db_conn->query($query);
    $row = $result->fetch_assoc();

    $chatbot_query = "SELECT CONCAT(name, ',', grade) AS chat FROM lecture;";
    $chatbot_result = $db_conn->query($chatbot_query);

    if ($chatbot_result === false) {
        // 쿼리 실행 실패 시 오류 메시지 출력
        echo "Error: " . $db_conn->error;
    } else {
        $result_array = array();
        
        // 쿼리 실행 성공 시 결과를 배열에 저장
        while ($row = $chatbot_result->fetch_assoc()) {
            $result_array[] = $row['chat'];
        }
        
        // 배열 출력
    }

    $query = 'SELECT * FROM review';
    $result = $db_conn->query($query);
    $review = array();
    
    while ($row = $result->fetch_assoc()) {
        $review[] = $row;
    }

    $query = 'SELECT * FROM lecture';
    $result = $db_conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $lectures[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./utils/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLearn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div style="width:80%; margin: auto; margin-top:20px">
        <!-- 부트스트랩 navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
            <div class="container">
                <a class="navbar-brand" href="./index.php"><img src="./images/ca.png" alt="" style="width:110px"></a>
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
                                <li><a class="dropdown-item" href="./gubun/index.php?gubun=sec">정보 보안</a></li>
                                <li><a class="dropdown-item" href="./gubun/index.php?gubun=game">게임 개발</a></li>
                                <li><a class="dropdown-item" href="./gubun/index.php?gubun=dbms">데이터베이스</a></li>
                                <li><a class="dropdown-item" href="./gubun/index.php?gubun=cs">컴퓨터 공학</a></li>
                                <li><a class="dropdown-item" href="./gubun/index.php?gubun=network">네트워크</a></li>
                                <li><a class="dropdown-item" href="./gubun/index.php?gubun=cipher">암호학</a></li>
                                <li><a class="dropdown-item" href="./gubun/index.php?gubun=programming">프로그래밍</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>커뮤니티</strong>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./community/qna.php">질문 & 답변</a></li>
                                <li><a class="dropdown-item" href="./community/review.php">수강평</a></li>
                                <li><a class="dropdown-item" href="./community/study.php">스터디</a></li>
                                <li><a class="dropdown-item" href="./coding/index.php">코딩테스트</a></li>
                                <li><a class="dropdown-item" href="./policy/index.php">약관ㆍ정책</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./loadmap/index.php"><strong>로드맵</strong></a>
                        </li>
                        <form class="d-flex" role="search" id="container" style="width:350px" action="./search/index.php">
                            <input name="keyword" class="form-control me-2" type="search" placeholder="나의 진짜 성장을 도와줄 실무 강의를 찾아보세요" aria-label="Search" style="border-radius:10px;" autocomplete="off">
                            <button type="submit">🔍</button>
                        </form>
                            <?php
                                if(!isset($_SESSION['login'])){

                            ?>
                            <li class="nav-item" style="flex:right">
                                <a class="nav-link" href="./login/login.php"><strong>로그인</strong></a>
                            </li>
                            <?php
                                }else{

                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./login/logout.php"><strong>로그아웃</strong></a>
                            </li>
                        <?php
                            }
                        ?>
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login'] == 'admin'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./mypage/index.php">관리자님</a>
                        </li>
                        <?php
                                }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./mypage/index.php"><?=$_SESSION['login']?>님</a>
                        </li>
                        <?php
                                }
                            }
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login'] == 'admin'){ ?>
                            <a href="./lecture/write.php">강의 생성</a>
                        <?php   }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- 부트스트랩 navbar -->

        <!-- 캐러셀 박스 -->
        <div style="overflow: hidden; width: 100%; margin-top:10px; margin-bottom:0px">
            <div class="slide-container">
                <div class="slide-box">
                    <img src="./images/ban1.png" alt="">
                </div>         
                <div class="slide-box">
                    <img src="./images/ban2.png" alt="">
                </div>   
                <div class="slide-box">
                    <img src="./images/ban3.png" alt="">
                </div>
            </div>
        </div>
        <!-- 캐러셀 박스 -->


        <h4 style="text-align:center; margin:40px; margin-top:0px"><strong>배우고, 나누고, 성장하세요 !</strong></h4>
        <!-- 중간 화면에 배치할 검색란 -> 배우고 싶은 분야를 검색하면 AI가 자동으로 해당 주제에 맞는 강의를 추천해줌 -->
        <form id="container" action="ai/index.php">
            <input name="keyword" type="text" placeholder="배우고 싶은 분야를 검색해보세요" autocomplete="off" autofocus>
            <button type="submit">🔍</button>
        </form>
        <!-- 중간 화면에 배치할 검색란 -> 배우고 싶은 분야를 검색하면 AI가 자동으로 해당 주제에 맞는 강의를 추천해줌 -->
        
        <!-- 부트캠프, 보안, 스프링, 개발 등등 다양한 아이콘을 추가하여 클릭시 해당 강의목록으로 이동 -->
        <div id="lecture-img">
            <div class="lecture-item">
                <a href="./gubun/index.php?gubun=cipher">
                    <img src="./images/cipher.png" alt="암호학" style="width:50px; margin:20px;">
                    <span>#암호학</span>
                </a>
            </div>
            <div class="lecture-item">
                <a href="./gubun/index.php?gubun=dbms">
                    <img src="./images/data.png" alt="데이터" style="width:50px; margin:20px;">
                    <span>#데이터</span>
                </a>
            </div>
            <div class="lecture-item">
                <a href="./gubun/index.php?gubun=sec">
                    <img src="./images/security.png" alt="정보보안" style="width:50px; margin:20px;">
                    <span>#정보보안</span>
                </a>
            </div>
            <div class="lecture-item">
                <a href="./gubun/index.php?gubun=cs">
                    <img src="./images/cloud.png" alt="컴퓨터공학" style="width:50px; margin:20px;">
                    <span>#컴퓨터공학</span>
                </a>
            </div>
            <div class="lecture-item">
                <a href="./gubun/index.php?gubun=game">
                    <img src="./images/game.png" alt="게임" style="width:50px; margin:20px;">
                    <span>#게임개발</span>
                </a>
            </div>
            <div class="lecture-item">
                <a href="./gubun/index.php?gubun=programming">
                    <img src="./images/python.png" alt="파이썬" style="width:50px; margin:20px;">
                    <span>#프로그래밍</span>
                </a>
            </div>
            <div class="lecture-item">
                <a href="./gubun/index.php?gubun=network">
                    <img src="./images/network.png" alt="네트워크" style="width:50px; margin:20px;">
                    <span>#네트워크</span>
                </a>
            </div>
        </div>
        <!-- 부트캠프, 보안, 스프링, 개발 등등 다양한 아이콘을 추가하여 클릭시 해당 강의목록으로 이동 -->


        <!-- 내가 좋아할만한 다른 강의 목록 -->
        <h4 style="margin-top:20px"><strong>내가 좋아할만한 다른 강의</strong></h4>
        <div id="lecture-img">
            <?php for($i=0; $i<12; $i++){ ?>
            <div class="lecture-item" style="width:250px">
                <a href="./lecture/index.php?div=<?=$i+1?>">
                    <img src="./images/<?=$lectures[$i]['img']?>" alt="암호학" style="width:220px; margin:20px;">
                    <span><strong><?=$lectures[$i]['name']?></strong></span>
                </a>
                <p><strong>⭐ : <?=round($lectures[$i]['grade'],2)?></strong></p>
            </div>
            <?php } ?>
        </div>
        <!-- 내가 좋아할만한 다른 강의 목록 -->

        <!-- 얼리버드 할인중인 신규 강의 목록 -->
        <h4 style="margin-top:20px"><strong>얼리버드 할인중인 신규 강의<span style="font-size:15px; color:red">NEW!!</span></strong></h4>
        <div id="lecture-img">
            <?php for($i=12; $i<24; $i++){ ?>
            <div class="lecture-item" style="width:250px">
                <a href="./lecture/index.php?div=<?=$i+1?>">
                    <img src="./images/<?=$lectures[$i]['img']?>" alt="암호학" style="width:220px; margin:20px;">
                    <span><strong><?=$lectures[$i]['name']?></strong></span>
                </a>
                <p><strong>⭐ : <?=round($lectures[$i]['grade'],2)?></strong></p>
            </div>
            <?php } ?>
        </div>
        <!-- 얼리버드 할인중인 신규 강의 목록 -->
         
        <!-- 기본부터 실무까지 제시해주는 로드맵 -->
        <h4 style="margin-top:20px"><strong>기본부터 실무까지 제시해주는 로드맵<span style="font-size:15px; color:red">🏃🏻‍♀️ RoadMap!!</span></strong></h4>
        <div id="lecture-img">
            <div id="lecture-img">
                <?php for($i=24; $i<28; $i++){ ?>
                <div class="lecture-item" style="width:250px">
                    <a href="./lecture/index.php?div=<?=$i+1?>">
                        <img src="./images/<?=$lectures[$i]['img']?>" alt="암호학" style="width:220px; margin:20px;">
                        <span><strong><?=$lectures[$i]['name']?></strong></span>
                    </a>
                    <p><strong>⭐ : <?=round($lectures[$i]['grade'],2)?></strong></p>
                </div>
                <?php } ?>
            </div>
         <div>
        <!-- 기본부터 실무까지 제시해주는 로드맵 -->

            <div style="display: flex; width:120%">
                <div class="codelearn-box">
                    <h2><strong><span style="color:green">4,454,654</span>명이 코드런과 함께합니다.</strong></h2>
                    <p>코드런은 강의의 수강생수, 평점을 투명하게 공개합니다.<br>실제로 많은 온오프라인 학원들은 단기적 성과를 높이기 위해 잘나온 특정 후기만 노출 하거나,<br>아예 숨겨버리는 경우가 많습니다.반면 코드런은 강의에 대한 후기, 학생수 등 정보를 투명하게 공개합니다.<br>신뢰성을 바탕으로 학습자들이 더 좋은 컨텐츠를 선택하고 교육의 질을 높입니다.</p>
                </div>
                <div class="information-box-container">
                    <?php for ($i=0; $i<count($review); $i++) { ?>
                        <div class="information-box">
                            <p><strong><?= $review[$i]['username'] ?>님</strong></p>
                            <p><?= $review[$i]['content'] ?></p>
                        </div>
                    <?php } ?>
                </div>
            <div>
        </div>
        </div>
    </div>
    <script>
        const btn_history = document.querySelector('#history');
        const history_modal = document.querySelector('#history-show');
        document.addEventListener("DOMContentLoaded", function() {
            const slide_container = document.querySelector('.slide-container');
            let i = 0;
            function repeat() {
                setTimeout(() => {
                    slide_container.style.transform = `translateX(${-i * 80}vw)`;
                    i++;
                    if (i > 2) i = 0;
                    repeat(); 
                }, 2500);
            }
            repeat(); 
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('chat-form');
    const chatHistory = document.getElementById('chat-history');
    const chatbotButton = document.getElementById('chatbot-button');
    const chatbotContainer = document.getElementById('chatbot-container');
    const closeChatbotButton = document.getElementById('close-chatbot');
    // API 키 수정 필요
    const API_KEY = ''
    //img src 수정 필요
    chatHistory.innerHTML += `<div class="bot-message"><img src='bot.png' class = 'bot-icon'><strong>Bot</strong><br> 안녕하세요, 무엇을 도와드릴까요? </div>`;

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        form.reset();
        const userMessage = formData.get('message');
        
        chatHistory.innerHTML += `<div class="user-message"><strong>You</strong><br> ${userMessage}</div>`;
        
        fetch('https://api.openai.com/v1/chat/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${API_KEY}` 
            },
            body: JSON.stringify({
                model: 'gpt-4o',
                messages: [
                    {
                        role: 'system',
                        content: '너는 codelearn이라는 우리 회사 챗봇이야. 다음은 우리 회사 강의와 평점이야: [UNITY] 유니티로 입문하는 게임 프로그래밍,4.680; [악성코드] 인공지능을 이용한 악성코드 분석 및 탐지,4.810; [iOS] iOS 프로그래밍 - 이론과 실습,4.260; [정보보안] 사이버 시큐리티 - 웹해킹,4.730; HTML/CSS/JavaScript 한 번에 끝내기,4.720; [System] 초심자를 위한 시스템 해킹,4.880; [AI] 생성형 인공지능 & LLM 공격 및 분석,4.930; 코틀린을 통해 개발하는 안드로이드,4.620; 엔지니어를 위한 소프트웨어,4.990; 클라우드 아키텍처의 A-Z,4.550; DATA Analysis with Python,4.190; 현대 운영체제의 이해,4.280; 입문자를 위한 암호학,4.890; SSL과 PKI를 통해 배우는 암호체계,4.190; 현대 암호학 응용,5.000; 블록체인 암호학,4.660; 네트워크 보안 핵심요소,4.900; 소켓 프로그래밍을 통한 네트워크,4.980; AWS를 통한 클라우드 이해,4.440; 네트워크 관리사 2급 올인원,4.370; 보안 장비를 통해 배우는 네트워크 보안,4.860; 데이터베이스 구조 이해,4.550; 프로그래머를 위한 MySQL,4.740; 실무자를 위한 데이터 분석,4.630; 매일의 작은 변화: 작심n일 로드맵,4.850; 엔진부터 엔딩까지: 게임프로그래밍 완전 정복,4.880; 모던 웹의 길: 프론트엔드 개발자 로드맵,4.760; 사이버 시큐리티 마스터: 정보보안 로드맵,4.600. 앞으로 이것을 참고해서 답변해줘. 다른 회사 얘기는 하지말아줘. 계속 존칭을 써줘. 답변은 100글자를 넘지 말아줘'
                    },
                    {
                        role: 'user',
                        content: userMessage
                    }
                ]
            })
        })
        .then(response => response.json())
        .then(data => {
            //img src 수정 필요
            chatHistory.innerHTML += `<div class="bot-message"><img src='bot.png' class = 'bot-icon'><strong>Bot</strong><br> ${data.choices[0].message.content}</div>`;
            chatHistory.scrollTop = chatHistory.scrollHeight;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    chatbotButton.addEventListener('click', () => {
        chatbotButton.style.display = 'none'; 
        chatbotContainer.style.display = 'block'; 
    });

    closeChatbotButton.addEventListener('click', () => {
        chatbotContainer.style.display = 'none'; 
        chatbotButton.style.display = 'block'; 
    });
});

    </script>
    </div>
</div>
    <div class="footer-bg">
        <div class="footer-bottomMenu">
            <p> <a href="policy/privacy.html">개인정보처리방침</a> | <a href="policy/terms-of-service.html">이용약관</a> </p>
            <p>대표자: 박연우 | 사업자번호: 799-25-00428 <a href="policy/bizCommPopView.html">사업자 정보 확인</a></p>
            <p>통신판매업: 2019-금천가산B-0048 | 개인정보보호책임자: 안가은 | 이메일: info@codelrn.com</p>
            <p>전화번호: 070-8834-6310 | 주소: 서울특별시 금천구 가산동 543-1 26층</p>
            <p>Hosting by Amazon Web Services, Inc.</p>
            <p>&copy; CODELEARN. ALL RIGHTS RESERVED</p>
        </div>
    </div>
</body>
</html>

