<!-- 项目列表模板 -->
<script id="tpl-list-item" type="text/template">
{{ each list }}
<div class="w-product" data-url="">
	<div class="w-product-title">
		{{ $value.article_title }}
		{{ if $value.article_command == 1 }}<img class="ico" src="__STATIC__/img/hot.png" alt="">{{ /if }}
		<span class="w-product-info">¥{{ $value.min_price }}～¥{{ $value.max_price }} | {{ $value.maintain_time_text }} | {{ $value.operation_type_name }}</span>
	</div>
	<p class="w-product-des">{{ $value.feature }}</p>
	<div class="w-product-tag">
		<a href="#">精彩直播</a>
		<a href="#">效果展示</a>
		<a href="#">相关日记</a>
		<a href="#">热门问答</a>
	</div>
</div>
{{ /each }}
</script>