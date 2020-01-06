
<body>
	<h1>add_user_view.php</h1>
	<form action="/gy/index.php/user/add_user" method="post">
		<label for="user_id">아이디</label>
		<input type="text" id="user_id" name="user_id">
		<label for="user_pw">비밀번호</label>
		<input type="password" id="user_pw" name="user_pw">
		<label for="user_pw2">비밀번호 재입력</label>
		<input type="password" id="user_pw2" name="user_pw2">
		<button type="submit" class="add_user_btn">회원가입</button>
	</form>
</body>
</html>
<script>
	$(function(){
		$(".add_user_btn").on("click",function(){
			console.log("회원가입 버튼 클릭");
			var user_id = $("#user_id").val();
			var user_pw = $("#user_pw").val();
			var user_pw2 = $("#user_pw2").val();

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

			if (user_pw2 == "") {
				alert("비밀번호 재입력을 해주세요.");
				$("#user_pw2").focus();
				return false;
			};

			if (user_id != "" && user_pw != "" && user_pw2 != "") {
				if (user_pw != user_pw2) {
					alert("비밀번호가 일치하지 않습니다.");
					$("#user_pw2").focus();
					return false;
				};
			};
		});
	});
</script>