
<body>
	<h1>add_user_view.php</h1>
	<form action="/gy/index.php/user/add_user" method="post">
		<label for="user_id">아이디</label>
		<input type="text" id="user_id" name="user_id">
		<button type="button" class="user_id_dupe_check_btn">중복확인</button>
		<input type="hidden" id="user_id_dupe_check">
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

		//중복확인 초기화
		$("#user_id").on("keydown",function(){
			$("#user_id_dupe_check").val();
		});

		//회원가입 버튼 클릭
		$(".add_user_btn").on("click",function(){

			var user_id = $("#user_id").val();
			var user_pw = $("#user_pw").val();
			var user_pw2 = $("#user_pw2").val();
			var user_id_dupe = $("#user_id_dupe_check").val();

			if (user_id == "") {
				alert("아이디를 입력해주세요.");
				$("#user_id").focus();
				return false;
			};//End if

			if (user_pw == "") {
				alert("비밀번호를 입력해주세요.");
				$("#user_pw").focus();
				return false;
			};//End if

			if (user_pw2 == "") {
				alert("비밀번호 재입력을 해주세요.");
				$("#user_pw2").focus();
				return false;
			};//End if

			if (user_id_dupe == "") {
				alert("아이디 중복확인을 해주세요.");
				$("#user_id").focus();
				return false;
			};//End if

			if (user_id != "" && user_pw != "" && user_pw2 != "" && user_id_dupe != "") {

				if (user_pw != user_pw2) {
					alert("비밀번호가 일치하지 않습니다.");
					$("#user_pw2").focus();
					return false;
				};//End if

				if (user_id_dupe != "Y") {
					alert("이미 사용중인 아이디입니다.");
					$("#user_id").focus();
					return false;
				};//End if
			};//End if
		});

		//아이디 중복확인 버튼 클릭
		$(".user_id_dupe_check_btn").on("click",function(){

			var user_id = $("#user_id").val();

			if (user_id == "") {
				alert("아이디를 입력해주세요.");
				$("#user_id").focus();
				return false;
			} else {
				$.ajax({
					url: '/gy/index.php/user/user_id_dupe_check',
					type: 'POST',
					dataType: 'json',
					data: {user_id : user_id},
				})
				.done(function(data) {
					console.log("success");
					if (data['res_data'] == "Y") {
						alert("사용 가능한 아이디입니다.");
					} else {
						alert("이미 사용중인 아이디입니다.");
					};
					$("#user_id_dupe_check").val(data['res_data']);
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});

			};//End if
		});

	});//End jQuery
</script>