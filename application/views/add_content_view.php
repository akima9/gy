
<body>
	<h1>add_content_view.php</h1>
	<form action="/gy/index.php/board/add_content" method="post">
		<label for="content_title">제목</label>
		<input type="text" id="content_title" name="content_title">
		<label for="contents">내용</label>
		<textarea name="contents" id="contents" cols="30" rows="10"></textarea>
		<button type="submit" class="add_content_btn">등록</button>
	</form>
</body>
</html>