
<body>
	<h1>content_view.php</h1>
	<label for="content_title">제목</label>
	<p><?= $contents->CONTENT_TITLE ?></p>
	<label for="cr_user_id">작성자</label>
	<p><?= $contents->CR_USER_ID ?></p>
	<label for="cr_time">작성일</label>
	<p><?= $contents->CR_TIME ?></p>
	<label for="view_cnt">조회수</label>
	<p><?= $contents->VIEW_CNT ?></p>
	<label for="contents">내용</label>
	<p><?= $contents->CONTENTS?></p>
</body>
</html>
<script>
	$(function(){

	});//End jQuery
</script>