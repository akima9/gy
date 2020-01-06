
<body>
	<h1>login_view.php</h1>
	<form action="" method="post">
		<label for="user_id">아이디</label>
		<input type="text" id="user_id" name="user_id">
		<label for="user_pw">비밀번호</label>
		<input type="password" id="user_pw" name="user_pw">
		<button type="submit" class="login_btn">로그인</button>
	</form>
</body>
</html>
<script>
	$(function(){
		$(".login_btn").on("click",function(){
			console.log("로그인 버튼 클릭");
			var user_id = $("#user_id").val();
			var user_pw = $("#user_pw").val();

			if (user_id == "") {
				alert("아이디를 입력해주세요.");
				$("#user_id").focus();
				return false;
			};

			if (user_pw == "") {
				alert("비밀번호를 입력해주세요.");
				$("#user_pw").focus();
				return false;
			};
		});
	});
</script>