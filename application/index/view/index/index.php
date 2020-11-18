<div class="w-product-all center">
	<div class="w-tab-main">全部项目</div>
	<div class="w-tab-des">共有<?=$count['parent']?>个分类，<?=$count['child']?>个项目</div>
</div>
<div class="w-all-category center">
	<ul class="flex">
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img1.jpg" alt="">
				<span>玻尿酸</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img2.jpg" alt="">
				<span>肉毒素</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img3.jpg" alt="">
				<span>自体脂肪</span>
			</a>
		</li>
		<li>
			<a href="#product0">
				<img src="__STATIC__/img/cate_img4.jpg" alt="">
				<span>眼部整形</span>
			</a>
		</li>
		<li>
			<a href="#product1">
				<img src="__STATIC__/img/cate_img5.jpg" alt="">
				<span>鼻部整形</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img6.jpg" alt="">
				<span>半永久妆</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img7.jpg" alt="">
				<span>激光脱毛</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img8.jpg" alt="">
				<span>唇部整形</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img9.jpg" alt="">
				<span>皮肤美容</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img10.jpg" alt="">
				<span>美体塑形</span>
			</a>
		</li>
		<li>
			<a href="#product2">
				<img src="__STATIC__/img/cate_img11.jpg" alt="">
				<span>面部轮廓</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img12.jpg" alt="">
				<span>胸部整形</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img13.jpg" alt="">
				<span>毛发种植</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img14.jpg" alt="">
				<span>牙齿美容</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img15.jpg" alt="">
				<span>耳部整形</span>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="__STATIC__/img/cate_img16.jpg" alt="">
				<span>私密整形</span>
			</a>
		</li>
	</ul>
</div>

<?php foreach ($category as $key => $item): ?>
<div class="w-item-block center" id="product<?=$key?>">
	<div class="w-tab">
		<div class="w-tab-title"><?=$item['name']?></div>
		<div class="w-tab-box">
			<div class="w-tab-nav" id="tab-nav">
				<div class="swiper-wrapper">
					<?php $second = isset($item['child']) ? $item['child'] : []; ?>
					<?php if (!empty($second)) : foreach ($second as $k=>$sec) :?>
					<a data-id="<?=$sec['category_id']?>" class="second-item jb-all cap swiper-slide swiper-no-swiping <?= $k == 0 ? 'active' : '' ?>">
						<?=$sec['name']?>
						<div class="arrow-up jb-all"></div>
					</a>
					<?php endforeach;endif;?>							
				</div>
				<div class="button-box">
					<div class="sd"></div>
					<div class="tab-button jb-all swiper-button-prev"></div>
					<div class="tab-button jb-all swiper-button-next"></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="w-content-box">
		<?php foreach($second as $k=>$item):?>
		<div class="w-con-child <?=$k==0?'active':'' ?>">
			<div class="w-product-box">
				<?php foreach($item['article'] as $v):?>
				<div class="w-product" data-url="<?= url('index/detail',['article_id' => $v['article_id']]) ?>">
					<div class="w-product-title">
						<?=$v['article_title']; ?>
						<?php if($v['article_command'] == 1):?>
						<img class="ico" src="__STATIC__/img/hot.png" alt="">
						<?php endif;?>
						<span class="w-product-info">¥<?=$v['min_price']?>～¥<?=$v['max_price']?> | <?=$v['maintain_time_text']?> | <?=$v['operation_type_name']?></span>
					</div>							
					<p class="w-product-des"><?=$v['feature']?></p>
					<div class="w-product-tag">
						<a href="#">精彩直播</a>
						<a href="#">效果展示</a>
						<a href="#">相关日记</a>
						<a href="#">热门问答</a>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
		<?php endforeach;?>
	</div>
</div>
<?php endforeach;?>

<div class="fixed">
	<ul>
		<?php foreach($parent as $key=>$item):?>
		<li><a class="jb-all" href="#product<?=$key?>"><?=$item['name']?></a></li>
		<?php endforeach;?>
	</ul>
	<div class="top"><i class="iconfont icon-fanhuidingbu"></i></div></div>
		