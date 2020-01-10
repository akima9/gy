
<body>
	<div class="header">
		<div class="inner">
			<div class="top_menu">
				<h1 id="logo">GY</h1>
				<ul class="reg">
<?php if ($this->session->userdata('is_login') == TRUE) { ?>
					<li><?php echo $this->session->userdata('user_id') ?>님 환영합니다.</li>
					<li><a href="/gy/index.php/user/log_out">로그아웃</a></li>
<?php } else { ?>
					<li><a href="/gy/index.php/welcome/login_view">로그인</a></li>
					<li><a href="/gy/index.php/welcome/add_user_view">회원가입</a></li>
<?php } ?>
				</ul>
				<ul class="nav_menu">
					<li><a href="">게시판</a></li>
<?php if ($this->session->userdata('is_login') == TRUE) { ?>
					<li><a href="">마이페이지</a></li>
<?php } ?>
				</ul>
			</div><!-- End top_menu -->
		</div><!-- End inner -->
	</div><!-- End header -->

	<div class="contain">
		<div class="inner">
			<div class="table-wrapper">
<?php if ($this->session->userdata('is_login') == TRUE) { ?>
				<button type="button" class="add_content btn btn-dark">글쓰기</button>
<?php } ?>
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">번호</th>
							<th class="text-center">제목</th>
							<th class="text-center">등록일</th>
							<th class="text-center">작성자</th>
							<th class="text-center">조회수</th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($contents as $content) : ?>
			            <tr>
			                <td class="text-center"><?= $content->ROW_NUM ?></td>
			                <td class="text-center"><a href="/gy/index.php/board/get_content_view/<?= $content->CONTENT_CD ?>"><?= $content->CONTENT_TITLE ?></a></td>
			                <td class="text-center"><?= $content->CR_TIME ?></td>
			                <td class="text-center"><?= $content->CR_USER_ID ?></td>
			                <td class="text-center"><?= $content->VIEW_CNT ?></td>
			            </tr>
<?php endforeach ?>
					</tbody>
				</table>
			</div><!-- End table-wrapper -->
		</div><!-- End inner -->
	</div><!-- End contain -->
</body>
</html>
<script>
	$(function(){

		$(".add_content").on("click",function(){
			self.location="/gy/index.php/board/add_content_view";
		});
	});//End jQuery
</script>