<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>案例中心</title>
		<link rel="icon" type="image/png" href="__STATIC__/common/i/favicon.ico"/>
		<link rel="stylesheet" href="__STATIC__/css/swiper/swiper.min.css">
		<link rel="stylesheet" href="__STATIC__/common/css/base.css">		
		<link rel="stylesheet" href="__STATIC__/css/style.css">
		<script>
		    BASE_URL = '<?= isset($base_url) ? $base_url : '' ?>';
		    INDEX_URL = '<?= isset($index_url) ? $index_url : '' ?>';
		</script>
	</head>
	<body>
		<header class="w-header">
			<div class="center">
				<h1>华美案例中心<em>（内部）</em></h1>
				<p>您的随身医美专家</p>
			</div>
		</header>
		<div class="w-nav">
			<div class="center">
				<ul><li>项目库</li></ul>
			</div>
		</div>
		<div class="content">
			{__CONTENT__}
		</div>
		{{include file="layouts/_template/tpl_list_item" /}}
		<footer class="w-footer">
			<div class="copyright">欢迎使用H-MCMS后台管理系统<br>@copyright lianxiqq:1005443542</div>
		</footer>
		<script src="__STATIC__/common/js/jquery-1.11.3.min.js"></script>
		<script src="__STATIC__/js/swiper/swiper.min.js"></script>
		<script src="__STATIC__/common/js/art-template.js"></script>
		<script src="__STATIC__/js/index.js"></script>	
	</body>
</html>