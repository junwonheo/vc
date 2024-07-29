<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="mt-2 mb-3">
        </div>
        <div class="mb-2 d-flex gap-2">
            <input type="text" name="name" class="form-control w-25" placeholder="글쓴이" autocomplete="off" id="id_name">
        </div>
        <div>
            <input autocomplete="off type="text" name="subject" class="form-control mb-2" id="id_subject">
        </div>
        <div id="summernote"></div>
        <div class="mt-2">
            <button class="btn btn-secondary" id="btn_submit">확인</button>
            <button class="btn btn-secondary" id="btn_list">목록</button>
        </div>

    </div>
    <script>
        document.querySelector('#btn_list').addEventListener('click', ()=>{
            self.location.href = 'list.php';
        })
        const btn_submit = document.querySelector('#btn_submit');
        btn_submit.addEventListener("click", (e)=>{
            const btn_name = document.querySelector('#id_name');
            const btn_password = document.querySelector('#id_password');
            const btn_subject = document.querySelector('#id_subject');
            var markupStr = $('#summernote').summernote('code');

            if(btn_subject.value == ''){
                alert('제목이 공백입니다.');
                btn_subject.focus();
                return
            }else if(markupStr == '<p><br></p>') {
                alert('내용을 입력하세요'); 
                return;
            }
            let param = {}

            const f1 = new FormData();
            f1.append('name', btn_name.value);
            f1.append('password', btn_password.value);
            f1.append('subject', btn_subject.value);
            f1.append('content', markupStr);

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "./action.php", "true");
            xhr.send(f1);
            btn_submit.disabled = true
            xhr.onload= () =>{
                if(xhr.status == 200) {
                    alert('작성 완료');
                    self.location.href = 'list.php';
                }
                else alert('실패');
            }
        })
        

        $('#summernote').summernote({
          placeholder: '글 내용을 입력해주세요',
          tabsize: 2,
          height: 500,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      </script>
</body>
</html>
