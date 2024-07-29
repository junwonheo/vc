<?php
    session_start();
    include "../utils/common.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLearn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2, h3 {
            margin-top: 20px;
        }
        p {
            margin: 10px 0;
        }
        ul {
            margin: 10px 0 10px 20px;
        }
    </style>
    <link rel="stylesheet" href="../utils/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                                <li><a class="dropdown-item" href="./coding/index.php">코딩테스트</a></li>
                                <li><a class="dropdown-item" href="./policy/index.php">약관ㆍ정책</a></li>
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
        <h1 style="text-align:center">지식공유자 콘텐츠 이용약관</h1>

        <h2>제 1 조 (목적)</h2>
        <p>본 약관은 “회사”와 “파트너”가 “서비스”에 사용할 콘텐츠를 제휴함에 있어 제반사항을 규정하고, 상호신뢰와 협조로 계약의 내용을 성실히 준수하여 공동의 번영과 발전에 기여하는 데 그 목적이 있다.</p>

        <h2>제 2 조 (용어의 정의)</h2>
        <ul>
            <li>1. “콘텐츠”라 함은 ‘파트너’가 제작한 강의 시청각 자료(영상, 텍스트, 이미지, 교안 등)를 말한다.</li>
            <li>2. “서비스”라 함은 “회사”가 운영하는 사이트를 통하여 “회사”와 “파트너”의 콘텐츠를 이용하고 제공하는 방식을 말한다.</li>
            <li>3. “회원”은 “회사”가 운영하는 사이트에 가입하여 이용하는 자를 말한다.</li>
            <li>4. “수강생”이라 함은 “콘텐츠”를 구매하여 교육을 진행하는 회원을 말한다.</li>
            <li>5. “정가”라 함은 “파트너”가 설정한 콘텐츠 가격을 말한다.</li>
            <li>6. “판매 대금”이라 함은 “파트너”가 설정한 가격에서 실제로 판매된 금액을 말한다.</li>
            <li>7. “정산금”은 매월 콘텐츠가 판매된 액수에서 환불된 금액 및 금융수수료를 차감한 “파트너” 순수익을 말한다.</li>
        </ul>

        <h2>제 3 조 (서비스 운영 내용)</h2>
        <ul>
            <li>1. “회사”는 “파트너”가 올린 콘텐츠의 판매 및 마케팅 업무를 성실히 이행한다.</li>
            <li>2. “회사”는 독자적으로 또는 “파트너”와 협의하여 홍보를 추진할 수 있다.</li>
            <li>3. “회사”는 마케팅/프로모션의 필요에 따라 강의 할인을 진행할 수 있으며, 회원 확보 및 매출 신장 등을 위하여 무료 쿠폰을 발급하거나 무료 포인트 지급 등의 방안을 활용한 마케팅/프로모션을 추진할 수 있다. 단, “파트너”가 약관 별첨 사항에서 마케팅/프로모션을 거부하는 경우 진행하지 않는다.</li>
        </ul>

        <h2>제 4 조 (“파트너”의 역할과 의무)</h2>
        <p>“파트너”는 다음 각호의 내용과 같은 역할과 의무를 성실히 이행한다.</p>
        <ul>
            <li>1. “회사”가 규정한 방식대로 콘텐츠를 게시하며, “회사”가 제시하는 이용약관 및 정책에 동의한다.</li>
            <li>2. “회사”가 요청하는 “콘텐츠” 세부사항에 대해 상호 협의하에 수행한다.</li>
            <li>3. “콘텐츠”는 제3자의 지적 재산권을 침해하거나 악용하지 않는다.</li>
            <li>4. “파트너”는 부적절하거나, 공격적이거나, 인종차별적이거나, 증오성, 성차별적, 음란한, 거짓, 오인, 침해, 명예훼손 또는 비방하는 콘텐츠 또는 정보를 게시하지 않는다.</li>
            <li>5. “서비스”를 통해 또는 다른 사용자에게 요청되지 않거나 승인되지 않은 광고, 홍보 자료, 정크 메일, 스팸, 행운의 편지, 피라미드 모집 또는 기타 형태의 청탁(상업용 또는 기타 목적으로)과 관련된 내용을 업로드, 게시 또는 전송하지 않는다.</li>
            <li>6. “파트너”는 “수강생”에게 개인 교습, 교육 및 강의 서비스를 제공하는 것 이외의 상업 목적으로 서비스를 사용하지 않는다.</li>
            <li>7. “파트너”는 강의 설정에서 질문에 대한 답변 여부를 ‘답변함’으로 설정시 “콘텐츠”를 수강하거나, 수강하려는 “회원”의 Q&A에 성실하게 대응하여야 하며 질문을 받은 경우 7일 이내에 답변을 제공하여야 한다.</li>
            <li>8. "파트너"는 18세 이상이어야 하며, 13세에서 17세 사이인 경우 제3자인 부모 또는 법적 보호자가 본 강사 약관과 당사의 서비스에 때때로 게재되는 다른 모든 약관 및 정책에 동의해야 하며, 이에 따른 강사의 실적과 규정 준수에 대한 책임과 의무를 받아들여야 한다.</li>
            <li>9. “파트너”는 “수강생”의 개인정보 등에 권한 없이 무단으로 접근하지 않는다.</li>
            <li>10. “파트너”는 정확한 계정 정보를 유지해야 한다.</li>
            <li>11. “파트너”는 상호 발전 및 수익성 확대를 위해 신의성실의 원칙에 입각하여 양질의 서비스를 제공하기로 하고, “회사”의 상품기획 및 마케팅 활동에 적극 협조하기로 한다.</li>
            <li>12. “콘텐츠”가 아래의 각 호에 해당하는 경우 "회사"의 수정 요청에 응하거나, 다시 제작하여야 한다.
                <ul>
                    <li>가. 만족도 : 평점 3점 미만으로 2달 이상 유지 시</li>
                    <li>나. 화질 : 1920*1080 Full HD 미만 이거나 다양한 이유로 가독성이 낮은 경우</li>
                    <li>다. 음질 : 노이즈, 반향, 외부소음으로 청취에 문제가 있다고 판단된 경우</li>
                    <li>라. 지식재산권: 제3자의 지식재산권 침해하는 또는 침해 소지가 있는 자료를 사용한 경우</li>
                    <li>마. 콘텐츠 유효성: 정책, UI 업데이트 등의 이유로 내용이 더이상 유효하지 않은 경우</li>
                    <li>바. 콘텐츠 윤리성: 사회 윤리에 위반되는 내용이 포함되는 경우</li>
                </ul>
            </li>
            <li>13. "콘텐츠" 검토 과정에서 각 호에 해당하는 경우가 발견되어 "콘텐츠" 게시가 어렵다고 판단다면 "회사"는 콘텐츠 게시 전 이를 반려할 수 있다.</li>
        </ul>

        <h2>제 5 조 (결제)</h2>
        <p>“파트너”는 “콘텐츠”의 “정가”를 정할 수 있으며, 실제 “수강생”이 구매하는 금액은 “정가”에 부가가치세가 추가된 금액으로 판매가 된다. 또한 본 약관 제3조 제3항 등에 따라 마케팅 및 프로모션이 진행된 경우 “수강생”이 혜택 및 할인을 받은 금액을 제외한 실제 “판매 대금”에 대하여 제6조에 의한 정산이 진행된다.</p>

        <h2>제 6 조 (정산)</h2>
        <ul>
            <li>1. “파트너”는 “판매 대금”(vat 제외)을 기준으로 하여 아래와 같이 “정산금”을 수령한다.
                <ul>
                    <li>a. 거래가 일반 고객과 발생한 경우(이하 B2C), “판매 대금”에서 PG사 수수료를 제외한 금액을 “파트너” 70%, “회사” 30%의 비율로 배분한다.</li>
                    <li>b. 거래가 기업간 제휴로 인하여 발생한 경우(이하 B2B), “판매 대금”에서 PG사 수수료를 제외한 금액을 “파트너” 50%, “회사” 50%의 비율로 배분한다.</li>
                </ul>
            </li>
            <li>2. 제1항의 지불 규정에 따라 “회사”는 전월 “파트너”의 수익을 정산하여 매월 10 영업일에 “파트너”의 지정계좌로 이용대금을 현금 입금하며, 결제일이 공휴일인 경우 익일 공휴일 이후 첫 영업일에 지급하기로 한다. 단, “파트너”가 요청하는 경우 지급일정은 별도 협의할 수 있다.</li>
        </ul>

        <h2>제 7 조 (계약기간 및 계약해지)</h2>
        <ul>
            <li>1. 계약기간은 계약일로부터 1년으로 하며, 계약 만료 1개월 전 계약 당사자 어느 일방의 서면 또는 전자우편에 의한 별도 해지의사가 없는 한 본 계약은 1년씩 자동 연장된다.</li>
            <li>2. 본 계약을 해지하고자 하는 경우 계약 당사자 일방은 계약 해지 예정일로부터 최소 30일 전에 상대방에게 서면 통보하여야 하며, 이 경우 계약 만료일까지는 본 계약을 성실히 이행하여야 한다.</li>
        </ul>

        <h2>제 8 조 (개인정보보호)</h2>
        <p>“회사”와 “파트너”는 정보통신망 이용촉진 및 정보보호 등에 관한 법률, 개인정보보호법 등 개인정보와 관련된 법규를 준수하여야 하며, “파트너”는 개인정보 보호에 만전을 기하여야 한다.</p>

        <h2>제 9 조 (기타사항)</h2>
        <ul>
            <li>1. 본 계약과 관련된 모든 분쟁은 당사자 간 상호 협의에 의해 원만히 해결하도록 노력하며, 합의되지 아니할 경우 서울중앙지방법원을 전속 관할 법원으로 한다.</li>
            <li>2. 본 계약서에 명시되지 않은 사항은 상호 합의하에 정하거나 상관례에 따른다.</li>
        </ul>
    </div>
</body>
</html>

