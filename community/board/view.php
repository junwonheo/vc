<?php
    session_start();
    include "../../utils/common.php";

    $idx = isset($_GET['idx']) ? $_GET['idx'] : '';
    if (preg_match("/^[0-9]*$/", $idx) == 0) {
        echo "<script>alert('정상적인 입력값이 아닙니다.');history.back(-1);</script>";
        exit;
    }

    $query = "SELECT * FROM comments WHERE boardidx = ?";
    $stmt = $db_conn->prepare($query);
    $stmt->bind_param('i', $idx);
    $stmt->execute();
    $result = $stmt->get_result();

    $comments = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
    }

    $query = "SELECT * FROM board WHERE idx = $idx";
    $result = $db_conn->query($query);
    $num = ($result && $result->num_rows) ? $result->num_rows : 0;
    if ($num == 0){
        echo "<script>alert('존재하지 않는 게시글입니다.');history.back(-1)</script>";
        exit;
    }
    
    $row = $result->fetch_assoc();
    $filename = isset($row['filename']) ? $row['filename'] : '';
    if($row['writer'] == 'admin'){
        $writer = '관리자';
    }else{
        $writer = $row['writer'];
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
    <link rel="stylesheet" href="../../utils/main.css">
</head>
<body>
    <div style="width:80%; margin: auto; margin-top:20px">
        <!-- 부트스트랩 navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
            <div class="container">
            <a class="navbar-brand" href="../../index.php"><img src="../../images/ca.png" alt="" style="width:110px"></a>
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
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=sec">정보 보안</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=game">게임 개발</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=dbms">데이터베이스</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=cs">컴퓨터 공학</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=network">네트워크</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=cipher">암호학</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=programming">프로그래밍</a></li>
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
                                <li><a class="dropdown-item" href="../../coding/index.php">코딩테스트</a></li>
                                <li><a class="dropdown-item" href="../../policy/index.php">약관ㆍ정책</a></li>
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
                                <a class="nav-link" href="../../login/login.php"><strong>로그인</strong></a>
                            </li>
                            <?php
                                }else{

                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../../login/logout.php"><strong>로그아웃</strong></a>
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
        <div style="width:80%; margin:auto">
            <div>
                <div style="width:100%; border:1px solid grey; border-radius: 5px; min-height: 50px; display:flex; margin-top:20px;">
                    <div style="width: 15%; border-right:1px black solid; min-height:50px; padding:13px; text-align: center; word-wrap: break-word;">
                        <?=$writer?>
                    </div>
                    <div style="width: 50%; border-right:1px black solid; min-height:50px; padding:13px; word-wrap: break-word;">
                        <?=$row['title']?>
                    </div>
                    <div style="width: 15%; min-height:50px; padding:13px;text-align: center; border-right:1px grey solid; word-wrap: break-word;">
                        <?=substr($row['regdate'],0,10)?>
                    </div>
                    <div style="width: 15%; min-height:50px; padding:13px;text-align: center; font-size:10px; word-wrap: break-word;">
                        <a href="./download.php?idx=<?=$row['idx']?>"><?=$row['filename']?></a>
                    </div>
                </div>
                <div style="overflow: auto; border:1px solid grey; border-radius:5px; padding:20px; margin-top:20px; min-height:400px">
                <?php if($row['filename'] != ''){ ?>
                    <img src="../../uploads/<?= $row['filename']?>" alt="" style="width:300px"><br>
                <?php } ?>    
                <?=$row['content']?>
                </div>
                <?php if (isset($_SESSION['login'])){
                if($_SESSION['login'] == 'admin') { ?> 
                <div style="margin-bottom: 70px;">
                    <form action="../comment/commentAction.php" style="margin-top: 20px; display: flex; align-items: flex-start;" method="post">
                        <textarea name="comment" id="" class="coment-box" style="flex: 1;"></textarea>
                        <input type="submit" class="btn btn-outline-success" id="write" value="Write" style="margin-left: auto;height:70px">
                        <input type="hidden" name="idx" value="<?=$row['idx']?>">
                    </form>
                </div>
                <?php }} ?>
                <?php for($i=0; $i<count($comments); $i++){ ?>
                    <div style="margin-top:10px">
                    <?php if($comments[$i]['id'] == 'admin'){ ?>
                            <strong>작성자 : 관리자님</strong>
                    <?php } ?>
                        <strong style="float:right">날짜 : <?=date('Y-m-d', strtotime($comments[$i]["reg"]))?></strong>    
                    </div>
                    <div style="display: flex; align-items: flex-start; width:100%; overflow:auto">
                        <div class="coment-box"><?=$comments[$i]['comment_text']?></div>
                    <?php if(isset($_SESSION['login'])){
                    if($_SESSION['login'] == 'admin'){ ?>
                        <div>
                            <button onclick="location.href='../comment/commentEdit.php?idx=<?=$comments[$i]['boardidx']?>&commentidx=<?=$comments[$i]['idx']?>'" type="button" class="btn btn-sm btn-outline-success" style="margin-left: auto;height:35px; width:50%">Edit</button>
                            <button type="button" class="btn btn-outline-danger" style="margin-left: auto;width:50%; height:35px" onclick="location.href='../comment/commentDelete.php?idx=<?=$comments[$i]['idx']?>'">Del</button>
                        </div>
                    <?php } ?>
                    </div>
                <?php }} ?>
            </div>
            <div style="margin-top:30px">
                <?php if(isset($_SESSION['login'])){ 
                        if($row['writer'] == $_SESSION['login']){ ?>
                <button type="button" class="btn btn-outline-success" style="margin-top: 10px;" id="edit_btn" onClick="window.location.href='./edit.php?idx=<?=$row['idx']?>'">Edit</button>
                <button type="button" class="btn btn-outline-danger" style="margin-top: 10px;" id="delete_btn" onClick="window.location.href='./deleteAction.php?idx=<?=$row['idx']?>'">Delete</button>
                <?php }} ?>
                <button type="button" class="btn btn-outline-warning" style="margin-top: 10px;" id="list_bStn" onClick="window.location.href='../qna.php'">List</button>
            </div>
        </div>
    </div>
    <script>
        // 이벤트 핸들링을 위한 변수 선언
        const list_btn = document.querySelector('#list_btn');
        const edit_btn = document.querySelector('#edit_btn');
        const modal_text = document.querySelector('#modal-text');
        const delete_btn = document.querySelector('#delete_btn');
        const modal = document.querySelector('#modal');
        const modal_delete = document.querySelector('#modal-delete');
        const modal_cancel = document.querySelector('#modal-cancel');


        // 모달창이 띄워진 후 취소 버튼을 누르면 다시 지워주는 기능
        modal_cancel.addEventListener('click', ()=>{
            modal.classList.remove('show-modal')
        })
        // list 버튼을 누르면 board 페이지로 전환
        list_btn.addEventListener('click', ()=>{
            window.location.href = '../qna.php';
        });
        // 삭제를 눌렀을 때 모달창의 버튼 글자를 삭제로 변경해주고 deleteAction.php로 이동
        delete_btn.addEventListener('click', () => {
            modal_text.textContent = "삭제";
            modal.classList.add('show-modal');
            modal_text.addEventListener('click', ()=>{
            const delPassword = document.querySelector('#inputPass').value;
            window.location.href = `./deleteAction.php?idx=<?=$row['idx']?>&inputPass=${delPassword}`;
        })
        });
        // 수정을 눌렀을 때 모달창의 버튼 글자를 수정으로 변경해주고 editAction.php로 이동
        edit_btn.addEventListener('click', ()=>{
            modal_text.textContent = '수정';
            modal.classList.add('show-modal');
            modal_text.addEventListener('click', ()=>{
                const editPassword = document.querySelector('#inputPass').value;
                window.location.href = `./edit.php?idx=<?=$row['idx']?>&inputPass=${editPassword}`;
            })
        })
    </script>
            <div class="footer-bg">
        <div class="footer-bottomMenu">
            <p> <a href="../../policy/privacy.html">개인정보처리방침</a> | <a href="../../policy/terms-of-service.html">이용약관</a> </p>
            <p>대표자: 박연우 | 사업자번호: 799-25-00428 <a href="../../policy/bizCommPopView.html">사업자 정보 확인</a></p>
            <p>통신판매업: 2019-금천가산B-0048 | 개인정보보호책임자: 안가은 | 이메일: info@codelrn.com</p>
            <p>전화번호: 070-8834-6310 | 주소: 서울특별시 금천구 가산동 543-1 26층</p>
            <p>Hosting by Amazon Web Services, Inc.</p>
            <p>&copy; CODELEARN. ALL RIGHTS RESERVED</p>
        </div>
    </div>
</body>
</html>
