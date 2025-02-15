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
        h1, h2 {
            color: #333942;
        }
        h1 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .indent {
            margin-left: 20px;
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
        <h1>개인정보처리방침</h1>
        <p>코드런 (이하 "회사")는 개인정보를 소중하게 생각하고 개인정보를 보호하기 위하여 최선을 다하고 있습니다. "회사"는 본 개인정보처리방침을 통하여 이용자가 제공하는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드리고자 합니다. 본 개인정보처리방침은 정부의 법률 및 지침 변경이나 "회사"의 내부 방침 변경 등으로 인하여 수시로 변경될 수 있으며, 변경될 경우 변경된 개인정보처리방침을 "회사"가 제공하는 서비스 페이지에 공지하도록 하겠습니다.</p>
        <p>"회사"의 개인정보처리방침은 다음과 같은 내용을 포함하고 있습니다.</p>
        <ul>
            <li>1. 개인정보의 수집 및 이용 목적, 항목 및 수집방법</li>
            <li>2. 개인정보의 제공 및 처리위탁</li>
            <li>3. 개인정보 수집·이용의 거부 시 불이익</li>
            <li>4. 개인정보 보유 및 이용기간</li>
            <li>5. 개인정보의 파기절차 및 방법</li>
            <li>6. 회원의 권리와 행사 방법</li>
            <li>7. 개인정보 자동 수집 장치의 설치/운영 및 거부에 관한 사항</li>
            <li>8. 개인정보 보호를 위한 기술적/관리적 대책</li>
            <li>9. 개인정보 관리 책임자의 성명, 연락처, 부서</li>
            <li>10. 권익침해 구제방법</li>
            <li>11. 고지의 의무</li>
        </ul>
        
        <h2>1. 개인정보 수집의 이용 목적, 항목 및 수집방법</h2>
        <ul>
            <li>1. “개인정보”란 생존하는 개인에 관한 정보로서 당해 개인을 식별할 수 있는 정보(당해 정보만으로는 특정 개인을 식별할 수 없더라도 다른 정보와 용이하게 결합하여 식별할 수 있는 것을 포함합니다)를 말합니다.</li>
            <li>2. "회사"는 수집된 개인정보를 다음의 목적을 위해 활용합니다.
                <ul class="indent">
                    <li>a. 회원가입 및 의사소통에 관한 사항: 회원 본인확인, 부정 가입방지, 가입 의사확인, 연령확인, 운영자 게시판 문의, 공지사항 안내, 약관 위반 회원에 대한 이용제한 조치, 서비스의 원활한 운영에 지장을 미치는 행위 및 서비스 부정이용 행위 제재, 회원 가입 거절 사유 유무의 확인, 분쟁 조정을 위한 기록보존 등</li>
                    <li>b. 콘텐츠 및 서비스 제공에 관한 사항: 입사지원 및 채용 공고 제안 등 구직 활동 서비스 제공, AI챗봇 연령대별 맞춤 서비스 제공, 캐시 결제, 개인 및 법인사업자의 서비스 이용 및 판매대금 정산, 금융거래 시 본인 인증 및 금융서비스 등</li>
                    <li>c. 유료 서비스 요금 및 판매대금 정산 및 환불</li>
                    <li>d. 서비스 개선 및 이용에 관한 통계 조사 등, 신규 서비스 개발, 통계학적 특성에 따른 서비스 제공 및 광고 게재, 서비스의 유효성 확인, 접속빈도 파악, 회원의 서비스 이용에 대한 통계 분석 등 서비스 분석 및 서비스 이용환경 개선</li>
                    <li>e. 회원으로부터 이에 대한 별도의 동의를 얻은 경우에 한하여, 이벤트 정보 및 참여기회 제공, 광고성 정보 제공 및 참여기회 제공</li>
                </ul>
            </li>
            <li>3. "회사"는 위에 명시한 목적을 위해 다음과 같은 개인정보를 수집하고 있습니다.
                <ul class="indent">
                    <li>a. 개인회원 및 수강회원
                        <ul class="indent">
                            <li>• 통합회원가입시필수: 이메일, 비밀번호, 본인확인값(DI, CI)</li>
                            <li>• 자격확인서 발급 시 선택: 주소</li>
                            <li>• 유료서비스 결제 시 필수: 이름, 이메일, 휴대폰번호, 본인확인값(DI, CI) 및 기타 결제 관련 정보</li>
                            <li>• 서비스 이용 과정 중 자동 생성 수집 정보: IP Address, MAC 주소, 쿠키, 세션, 방문일시, 서비스 이용기록, 불량(부정) 이용기록, 기기정보(OS, 단말기 모델, 이동통신사 정보, 하드웨어 ID, 서비스 이용에 대한 기본 통계)</li>
                            <li>• IOS 운영체제 휴대폰을 사용하는 회원의 경우 사용자 식별을 위하여 UUID에 접근할 수 있음.</li>
                            <li>• 회원의 휴대전화 단말기의 카메라, 사진첩, 마이크 기능(IOS) 또는 저장공간(사진/미디어/파일)(Android)에 접근할 수 있음</li>
                            <li>• 강의자 참여 신청시 필수: 이름, 이메일, 연락처(휴대폰번호 등), 희망분야, 자기소개</li>
                            <li>• 선택: 홈페이지 주소 등</li>
                            <li>• 강의자 등록시 
                                <ul class="indent">
                                    <li>(i) 사업자 등록을 하지 않은 회원의 경우 필수: 이름, 휴대폰번호, 주소</li>
                                    <li>(ii) 개인사업자 및 법인사업자 필수: 회사명(상호), 사업자등록번호, 대표자명, 회사 전화번호, 주소</li>
                                    <li>강의자 등록시 추가 수집 정보
                                        <ul class="indent">
                                            <li>사업자등록을 하지 않은 회원: 정산계좌정보(은행명, 계좌번호, 예금주)</li>
                                            <li>개인사업자 및 법인사업자: 통신판매업신고번호, 수익입금계좌정보(은행명, 계좌번호, 예금주)</li>
                                        </ul>
                                    </li>
                                    <li>경력, 학교(소속) 인증을 위한 간편 인증 및 이메일 인증 진행 시 필수: 이름, 생년월일, 휴대폰번호</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>b. 기업회원
                        <ul class="indent">
                            <li>• 회원가입시 필수: 이름, 이메일, 비밀번호, 이름, 직책 또는 소속, 휴대폰 번호, 본인확인값(DI, CI)</li>
                            <li>• 회사정보 등록시 필수: 회사명, 사업자등록번호, 산업군, 회사주소, 회사소개, 직원수, 연매출</li>
                            <li>• 선택: 홈페이지 주소, 누적투자금액 등</li>
                            <li>• 유료서비스 이용 신청시 필수: 세금계산서 발행 정보 및 기타 금융식별정보</li>
                        </ul>
                    </li>
                    <li>c. 수집방법: 홈페이지(회원가입, 게시판 등), 모바일 어플리케이션, 팩스, 전화, 고객센터 문의, 이벤트 응모, 생성정보 수집 툴을 통한 자동 수집</li>
                </ul>
            </li>
            <li>4. "회사"는 이용자의 개인정보의 수집할 경우 반드시 이용자의 동의를 얻어 수집하며, 이용자의 기본적 인권을 침해할 우려가 있는 인종, 출신지, 본적지, 사상, 정치적 성향, 범죄기록, 건강상태 등의 정보는 이용자의 동의 또는 법령의 규정에 의한 경우 이외에는 수집하지 않습니다.</li>
        </ul>
        
        <h2>2. 개인정보의 제공 및 처리위탁</h2>
        <ul>
            <li>1. 개인정보의 제공
                <ul class="indent">
                    <li>"회사"는 이용자의 개인정보를 “1. 개인정보의 수집 및 이용 목적, 항목 및 수집 방법"에서 고지한 범위 내에서 사용하며, 원칙적으로 이용자의 개인정보를 제공하지 않습니다. 다만 아래의 경우에는 예외로 합니다.
                        <ul class="indent">
                            <li>a. 법령의 규정에 의거하거나, 수사 목적으로 법령에 정해진 절차와 방법에 따라 수사기관의 요구가 있는 경우</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>2. 개인정보 처리의 위탁
                <ul class="indent">
                    <li>"회사"는 원활한 업무 처리를 위해서 아래와 같이 개인정보를 위탁하고 있으며, 관계 법령에 따른 위탁계약 시 개인정보가 안전하게 관리될 수 있도록 필요한 사항을 규정하고 있습니다. 회사의 개인정보 위탁처리 기관 및 위탁업무 내용은 아래와 같습니다. 위탁기간은 회원의 탈퇴시 또는 위탁계약 종료시까지입니다.
                        <ul class="indent">
                            <li>a. 국내 위탁 업체
                                <ul class="indent">
                                    <li>제공받은 자: 룩포시큐리티</li>
                                    <li>제공하는 목적: 비정상 활동 차단을 위한 보안관제 시행</li>
                                    <li>제공받은 자: 나이스페이먼츠, JTNET, 네이버파이낸셜, 카카오페이, 토스페이먼츠</li>
                                    <li>제공하는 목적: 결제서비스(휴대폰, 무통장 입금, 계좌이체, 신용카드 및 기타 결제수단) 제공</li>
                                    <li>제공받은 자: 아마존웹서비시즈코리아(유)</li>
                                    <li>제공하는 목적: 서비스 제공을 위한 인프라 관리</li>
                                    <li>제공받은 자: 모두싸인</li>
                                    <li>제공하는 목적: 강사 및 기업고객 관련 계약 체결 진행</li>
                                    <li>제공받은 자: 우체국</li>
                                    <li>제공하는 목적: 실물 자격증 배송</li>
                                    <li>제공받은 자: ㈜헥토데이터</li>
                                    <li>제공하는 목적:
                                        <ul class="indent">
                                            <li>▪ 신용정보주체의 인증 정보를 이용하여 개인(신용)정보를 중계하는 업무</li>
                                            <li>▪ API 서비스 품질향상 및 업무 대응을 위해 신용정보주체 인증 정보를 통한 요청/응답 데이터 저장 업무(위탁 계약 종료 시 일괄 삭제)</li>
                                            <li>▪ 정보주체의 개인정보 열람, 정정·삭제, 처리 정지 요청 등을 처리</li>
                                            <li>▪ 위탁 정보: 개인(신용)정보, 요청/응답 데이터 일체, 기업정보</li>
                                            <li>▪ 위탁 기간: 위탁 계약 종료 시까지</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>b. 국외 위탁업체
                                <ul class="indent">
                                    <li>제공업체: Amazon Web Services Inc. (AWS Server)</li>
                                    <li>업체 연락처: aws-korea-privacy@amazon.com</li>
                                    <li>이전 목적: 데이터 저장을 위한 클라우드 서버 이용</li>
                                    <li>이전되는 개인정보 항목: 서비스 이용 기록 또는 수집된 개인정보</li>
                                    <li>이전 국가: 미국, 일본 등</li>
                                    <li>이용 기간: 이용자의 서비스 가입기간 동안 보유</li>
                                    <li>이전 일시 및 방법: 서비스 이용 시점에 네트워크를 통한 전송</li>
                                    <li>제공업체: OpenAI</li>
                                    <li>업체 연락처: privacy@openai.com</li>
                                    <li>이전 목적: 맞춤형 챗봇 서비스 제공을 위한 API 서비스 이용</li>
                                    <li>이전되는 개인정보 항목: 서비스 이용 기록 또는 수집된 개인정보</li>
                                    <li>이전 국가: 미국, 일본 등</li>
                                    <li>이용 기간: 챗봇 대화일로부터 30일</li>
                                    <li>이전 일시 및 방법: 서비스 이용 시점에 네트워크를 통한 전송</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        
        <h2>3. 개인정보 수집·이용의 거부 시 불이익</h2>
        <ul>
            <li>1. 회원은 개인정보 수집·이용에 관한 동의를 거부할 권리가 있습니다. 다만, 회원이 개인정보의 수집·이용에 관한 동의를 거부할 경우 불가피하게 아래와 같은 불이익이 발생합니다.
                <ul class="indent">
                    <li>a. 회원이 회원 가입 신청 시 회사가 수집·이용(마켓팅, 프로모션, 광고 목적 수집·이용 제외)하고자 하는 개인정보의 수집·이용을 거부하는 경우에는 회원의 회원 가입 또는 서비스 이용이 불가능합니다.</li>
                    <li>b. 회원의 서비스 이용 과정에서 회사가 수집·이용 또는 접근하는 개인정보 또는 휴대전화기능의 수집·이용 또는 접근을 거부하는 경우 해당 회원에 대한 서비스의 제공 및 기술 지원이 제한될 수 있습니다.</li>
                </ul>
            </li>
        </ul>
        
        <h2>4. 개인정보 보유 및 이용기간</h2>
        <ul>
            <li>1. "회사"는 회원 가입 시 제공한 정보를 회원 가입시점부터 탈퇴 신청이 접수된 날까지 보관할 수 있습니다. 단, 개인정보 도용 등으로 인한 원치 않는 회원탈퇴 등에 대비하기 위해 회원탈퇴 요청 후 [7]일간 개인정보를 보존합니다.</li>
            <li>2. 단, 관계법령의 규정에 의하여 보존할 필요가 있는 경우 "회사"는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.
                <ul class="indent">
                    <li>a. 개별적으로 회원의 동의를 받은 경우에는 약속한 보유기간</li>
                    <li>b. 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률, 통신비밀보호법 등 관련법령</li>
                    <li>c. 보존기간:
                        <ul class="indent">
                            <li>i. 계약 또는 청약철회 등에 관한 기록(전자상거래법): 5년</li>
                            <li>ii. 대금결제 및 재화 등의 서비스 등의 공급에 관한 기록(전자상거래법): 5년</li>
                            <li>iii. 소비자의 불만 또는 분쟁처리에 관한 기록(전자상거래법): 3년(다만, 민사, 형사, 행정상의 절차가 진행 중에 있는 경우에는 그 절차가 종료될 때까지)</li>
                            <li>iv. 표시/광고에 관한 기록(전자상거래법): 6개월</li>
                            <li>v. 세법이 규정하는 모든 거래에 관한 장부 및 증빙서류(국세기본법): 5년</li>
                            <li>vi. 전자금융 거래에 관한 기록(전자금융거래법): 5년</li>
                            <li>vii. 접속에 관한 기록(통신비밀보호법): 3개월</li>
                            <li>viii. 그 외 통신사실에 관한 기록: 12개월</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        
        <h2>5. 개인정보의 파기절차 및 방법</h2>
        <ul>
            <li>1. 회사는 개인정보 보유 및 이용 기간이 경과하면 다음과 같은 방법으로 지체 없이 파기합니다.
                <ul class="indent">
                    <li>a. 전자적 파일 형태인 경우: 복원이 불가능한 방법으로 영구 삭제</li>
                    <li>b. 인쇄물, 서면, 그 밖의 기록매체인 경우: 파쇄 또는 소각</li>
                </ul>
            </li>
        </ul>
        
        <h2>6. 회원의 권리와 행사 방법</h2>
        <ul>
            <li>1. 회원은 언제든지 다음의 사항에 관하여 개인정보 열람, 수정 및 회원 탈퇴를 요구할 수 있습니다. 다만 회원이 회원가입 및 서비스 제공에 필요한 개인정보 등에 대한 동의를 철회하는 경우 회원탈퇴 및 서비스 해지가 불가피하게 되거나 서비스를 제공받지 못하게 될 수 있습니다.
                <ul class="indent">
                    <li>a. "회사"가 보유하고 있는 회원의 개인정보</li>
                    <li>b. "회사"가 이용자의 개인정보를 이용하거나 제3자에게 제공한 내역</li>
                    <li>c. "회사"에게 개인정보수집ㆍ이용ㆍ제공 등의 동의를 한 내역</li>
                </ul>
            </li>
            <li>2. 회원은 "회사" 서비스에서 직접 자신의 정보를 열람, 정정을 할 수 있으며, 별도로 개인정보보호책임자에게 서면, 전화, 이메일 등을 통하여 개인정보의 열람, 정정을 요청할 수 있습니다.</li>
            <li>3. 회원은 언제든지 자신의 개인정보처리의 정지를 요구할 수 있습니다.</li>
            <li>4. 회원은 언제든지 회원가입 시 개인정보의 수집, 이용, 제공 등에 대해 동의하신 의사표시를 철회(회원탈퇴)할 수 있습니다.</li>
            <li>5. 회원이 "회사" 서비스에서 본인 확인 절차를 거친 후 직접 동의철회(회원탈퇴)를 하거나, 별도로 개인정보보호책임자에게 서면, 전화 또는 이메일 등을 통하여 연락하면 지체 없이 이용자의 개인정보를 파기하는 등 필요한 조치를 취합니다. 단, 동의철회(회원탈퇴)가 있더라도 관계법령에 따라 최소한의 정보가 보관됩니다.</li>
        </ul>
        
        <h2>7. 개인정보 자동 수집 장치의 설치/운영 및 거부에 관한 사항</h2>
        <ul>
            <li>1. "회사"는 회원의 정보를 수시로 저장하고 불러오는 "쿠키"(cookie)와 세션(session)를 사용합니다. "쿠키"는 웹사이트 이용 시 서버가 사용자의 웹브라우저에 보내는 작은 데이터 꾸러미로 회원의 컴퓨터의 하드디스크에 저장됩니다. 세션(session)은 서비스 운영에 이용되는 서버가 회원의 접속시간 동안에 회원의 정보를 서버에 저장하는 것을 의미합니다. "회사"는 다음과 같은 목적을 위해 "쿠키"와 “세션”를 사용합니다.
                <ul class="indent">
                    <li>“쿠키”와 “세션”은 이용자가 설정한 환경을 유지하도록 함으로써 편리한 사용을 도우며, 이용자의 방문 기록, 이용 형태, 관심 분야를 알게 해줌으로써 이를 통한 최적화된 맞춤 서비스를 제공하고 서비스 개선의 척도로 활용됩니다.</li>
                    <li>이용자는 "쿠키" 설치에 대한 선택권을 가지고 있으며 웹브라우저에서 옵션을 설정함으로써 모든 "쿠키"를 허용하거나, "쿠키"가 저장될 때마다 확인을 거치거나, 아니면 모든 "쿠키"의 저장을 거부할 수 있습니다. 다만, 쿠키 설치를 거부할 경우 로그인이 필요한 일부 서비스를 이용하는 것에 어려움이 있을 수 있습니다. 쿠키 설치 허용 여부를 지정하는 방법은 다음과 같습니다.
                        <ul class="indent">
                            <li>a. Chrome 웹 브라우저 > 우측 상단 메뉴 [설정] > [사이트 설정] > [쿠키] 설정</li>
                            <li>b. Safari 웹 브라우저 > [설정] > [Safari] > [쿠키 차단] > 설정</li>
                        </ul>
                    </li>
                    <li>이용자는 “세션” 설치에 대한 선택권을 가지고 있지 않으며, 로그인이 필요한 서비스 이용 시 서버에 자동으로 “세션”이 생성됩니다.</li>
                    <li>회사는 회원이 스마트폰, 태블릿 PC의 [연락처 기능, 카메라 및 사진첩 기능, 위치 서비스 기능]에 회사가 접근하는 것을 원하지 않을 경우 회원 스스로 접근을 차단할 수 있는 기술적 수단을 제공해 드립니다(즉, 회원이 휴대전화에서 [**] 앱(App)의 위 각 기능에 대한 접근을 차단 또는 비활성화하면 됩니다.)</li>
                </ul>
            </li>
        </ul>
        
        <h2>8. 개인정보 보호를 위한 기술적/관리적 대책</h2>
        <ul>
            <li>1. 회원의 개인정보는 비밀번호에 의해 철저히 보호되고 있으며 본인이 제공한 이메일주소에 매칭되는 비밀번호는 본인만이 알고 있습니다. 따라서 개인정보의 확인 및 변경도 비밀번호를 알고 있는 본인에 의해서만 가능합니다.</li>
            <li>2. 회원은 본인의 비밀번호를 누구에게도 알려주어서는 안 됩니다. 이를 위해 "회사"에서는 기본적으로 PC에서의 사용을 마치신 후 온라인상에서 로그아웃(LOG-OUT)하고 웹 브라우저를 종료하도록 권장합니다.</li>
            <li>3. "회사"의 개인정보 보호를 위한 기술적/관리적 대책 및 물리적 조치는 다음과 같습니다.
                <ul class="indent">
                    <li>a. 수집한 개인정보 중 비밀번호 등 본인임을 인증하는 정보에 대한 암호화 장치</li>
                    <li>b. 컴퓨터 바이러스에 의한 개인정보의 침해를 막기 위한 백신소프트웨어 설치, 갱신, 점검 조치</li>
                    <li>c. 개인정보 시스템에 대한 접근권한 설정, 관리 및 침입차단 시스템 등을 이용한 접근 통제장치</li>
                    <li>d. 개인정보 취급자에 대한 지정과 권한의 설정 및 교육, 개인정보의 안전한 관리</li>
                </ul>
            </li>
        </ul>
        
        <h2>9. 개인정보보호책임자의 성명, 연락처, 부서</h2>
        <p>회사의 서비스를 이용하시면서 발생한 모든 개인정보보호 관련 민원, 불만처리 등에 관한 사항을 개인정보 보호책임자 및 고객센터로 문의하실 수 있고, 회사는 이용자의 문의에 신속하고 성실하게 답변하겠습니다.</p>
        <ul>
            <li>• 이 름: 안가은</li>
            <li>• 소 속: 코드런</li>
            <li>• 연락처: 070-8834-6310</li>
            <li>• E-mail: agg101@codelrn.com</li>
        </ul>
        
        <h2>10. 권익침해 구제방법</h2>
        <p>이용자는 개인정보침해로 인한 구제를 받기 위하여 개인정보분쟁조정위원회, 한국인터넷진흥원 개인정보침해신고센터 등에 분쟁해결이나 상담 등을 신청할 수 있습니다. 이 밖에 기타 개인정보침해의 신고, 상담에 대하여는 아래의 기관에 문의하시기 바랍니다.</p>
        <ul>
            <li>1. 개인정보분쟁조정위원회 : (국번없이) 1833-6972 (www.kopico.go.kr)</li>
            <li>2. 개인정보침해신고센터 : (국번없이) 118 (privacy.kisa.or.kr)</li>
            <li>3. 대검찰청 : (국번없이) 1301 (www.spo.go.kr)</li>
            <li>4. 경찰청 : (국번없이) 182 (ecrm.cyber.go.kr)</li>
        </ul>
        
        <h2>11. 고지의 의무</h2>
        <p>회사는 개인정보처리방침이 변경되는 경우에는 “회사”의 사이트 “공지사항”을 통하여 변경 및 시행의 시기, 변경 내용을 공지합니다. 변경된 개인정보처리방침은 게시된 날로부터 7일 후부터 효력이 발생합니다.</p>
    </div>
    </body>
</html>

