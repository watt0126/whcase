<div class="w-item-box center">
	<div class="w-item-pannel introduce">
		<div class="flex h-sb">
			<div class="l flex">
				<h1 class="name v-bl"><?=$model['article_title']?></h1>
				<?php if(!empty($model['pro_alias'])):?>
				<span class="alias">别名：<?=$model['pro_alias']?></span>
				<?php endif;?>
			</div>
		</div>
		<p class="desc"><?=$model['article_des']?></p>
	</div>
	<div class="w-item-pannel2">
		<ul class="flex">
			<li class="tab active">
				<span class="text">项目介绍</span>
			</li>
			<li class="tab">
				<a href="#surgery_after"><span class="text">术后护理</span></a>
			</li>
			<li class="tab">
				<a href="#video"><span class="text">相关视频 </span></a>
			</li>
			<li class="tab">
				<a href="#special"><span class="text">相关专题 </span></a>
			</li>
		</ul>
	</div>
	<div class="w-content center">
		<div class="w-item-pannel">
			<div class="catalog flex">
				<h4 class="catalog-title">目录</h4>
				<ul class="list">
					<li class="item">
						<span class="index">1</span><a href="#effect_show"><span class="title">效果展示</span></a>
					</li>
					<li class="item">
						<span class="index">2</span><a href="#summary"><span class="title">项目概览</span></a>
					</li>
					<li class="item">
						<span class="index">3</span><a href="#crowd"><span class="title">适合人群</span></a>
					</li>
				</ul>
				<ul class="list">
					<li class="item">
						<span class="index">4</span><a href="#merit"><span class="title">项目优点</span></a>
					</li>
					<li class="item">
						<span class="index">5</span><a href="#defect"><span class="title">项目缺点</span></a>
					</li>
					<li class="item">
						<span class="index">6</span><a href="#limit_crowd"><span class="title">禁忌人群</span></a>
					</li>
				</ul>
				<ul class="list">
					<li class="item">
						<span class="index">7</span><a href="#operation_show"><span class="title">操作展示</span></a>
					</li>
					<li class="item">
						<span class="index">8</span><a href="#operation_file"><span class="title">操作档案</span></a>
					</li>
					<li class="item">
						<span class="index">9</span><a href="#surgery_before"><span class="title">术前必读</span></a>
					</li>
				</ul>
			</div>
			<div class="fixed-list" id="effect_show">
				<h2>效果展示</h2>
				<div class="pub-swiper">
					<div class="swiper-container">
						<ul class="swiper-wrapper">
							<?php foreach($model['image'] as $img):?>
							<li class="swiper-slide">
								<img src="<?=$img['file_path']?>" alt="<?=$img['file_name']?>">
							</li>
							<?php endforeach;?>
						</ul>
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>
			</div>
			<div class="fixed-list" id="summary">
				<h2>项目概览</h2>
				<h4>项目特色</h4>
				<p class="p1"><?=$model['feature']?></p>
				<h4>功效</h4>
				<div class="labels">
					<?php foreach(str_exp($model['effect'],"、") as $e): ?>
					<span class="label"><?=$e ?></span>
					<?php endforeach;?>
				</div>
			</div>
			<div class="fixed-list" id="indications">
				<h4>适用人群特征</h4>
				<div class="labels">
					<?php foreach(str_exp($model['indications'],"、") as $e): ?>
					<span class="label"><?=$e ?></span>
					<?php endforeach;?>
				</div>
				<div class="price-wr">
					<h4 class="modal-hook-price">参考价格</h4>
					<p class="p1">约<?=$model['min_price']?>~<?=$model['max_price']?>元/次</p>
				</div>
			</div>
			<div class="fixed-list" id="crowd">
				<h2>适合人群</h2>
				<p class="p1"><?=$model['crowd']?></p>
			</div>
			<div class="fixed-list" id="merit">
				<h2>项目优点</h2>
				<p class="p1"><?=$model['merit']?></p>
			</div>
			<div class="fixed-list" id="defect">
				<h2>项目缺点</h2>
				<p class="p1"><?=$model['defect']?></p>
			</div>
			<div class="fixed-list" id="limit_crowd">
				<h2>禁忌人群</h2>
				<p class="p1"><?=$model['limit_crowd']?></p>
			</div>
			<div class="fixed-list" id="operation_show">
				<h2>操作展示</h2>				
				<div class="pub-swiper">
					<video src="<?=$model['operation_show']?>" poster="" style="height: 406px;width: 100%;" controls=""></video>
				</div>
			</div>
			<div class="fixed-list" id="operation_file">
				<h2>操作档案</h2>
				<div class="archives">
					<ul>
						<li>
							<div class="l">
								<span class="name">治疗时长</span>
								<span class="value"><?=$model['treat_time_text']?></span>
							</div>
							<div class="r">
								<span class="name">效果持续</span>
								<span class="value"><?=$model['maintain_time_text']?></span>
							</div>
						</li>
						<li>
							<div class="l">
								<span class="name">麻醉方式</span>
								<span class="value"><?=$model['anesthesia_text']?></span>
							</div>
							<div class="r">
								<span class="name">恢复时间</span>
								<span class="value"><?=$model['recovery_time_text']?></span>
							</div>
						</li>
						<li>
							<div class="l">
								<span class="name">治疗周期</span>
								<span class="value"><?=$model['treat_cycle_text']?></span>
							</div>
							<div class="r">
								<span class="name">操作人员资质</span>
								<span class="value"><?=$model['qalification_text']?></span>
							</div>
						</li>
						<li>
							<div class="l">
								<span class="name">操作方式</span>
								<span class="value"><?=$model['operation_type_name']?></span>
							</div>
							<div class="r">
								<span class="name">疼痛感</span>
								<span class="value"><?=$model['pain_text']?></span>
							</div>
						</li>
						<li>
							<div class="l">
								<p class="tip">以上信息均为参考，实际以到医院操作为准</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="fixed-list" id="surgery_before">
				<h2>术前必读</h2>
				<ul>
					<?php foreach(str_exp($model['surgery_before'],"；") as $e): ?>
					<li class="p1"><?=$e ?></li>
					<?php endforeach;?>
				</ul>
			</div>
			<div class="fixed-list" id="surgery_after">
				<h2>术后护理</h2>
				<div class="module-content">
					<?=$model['surgery_after']?>
				</div>
			</div>			
		</div>
		<div id="video" class="w-item-pannel module">
			<div class="line">
				<div class="l"><h2>相关视频</h2></div>
			</div>
			<ul class="list flex">
				<?php foreach($model['video'] as $item) : ?>
				<li class="item ">
					<a href="<?= $item['url']?>" target="_blank">
						<img class="play" src="__STATIC__/img/play.png" alt="">
						<img class="cover" src="<?= $item['file']['file_path']?>" alt="">
					</a>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<div id="special" class="w-item-pannel module">
			<div class="line">
				<div class="l"><h2>相关专题</h2></div>
			</div>
			<ul class="list flex">
				<?php foreach($model['category']['special'] as $item) : ?>
				<li class="item ">
					<a href="<?= $item['url']?>" target="_blank">
						<img class="cover" src="<?= $item['image']['file_path']?>" alt="">
					</a>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="d-fixed">
			<ul>
				<li>
					<a class="jb-all" href="#effect_show"><span class="index">1</span><span class="name">效果展示</span></a>
				</li>
				<li>
					<a class="jb-all" href="#summary"><span class="index">2</span><span class="name">项目概览</span></a>
				</li>
				<li>
					<a class="jb-all" href="#crowd"><span class="index">3</span><span class="name">适合人群</span></a>
				</li>
				<li>
					<a class="jb-all" href="#merit"><span class="index">4</span><span class="name">项目优点</span></a>
				</li>
				<li>
					<a class="jb-all" href="#defect"><span class="index">5</span><span class="name">项目缺点</span></a>
				</li>
				<li>
					<a class="jb-all" href="#limit_crowd"><span class="index">6</span><span class="name">禁忌人群</span></a>
				</li>
				<li>
					<a class="jb-all" href="#operation_file"><span class="index">7</span><span class="name">操作档案</span></a>
				</li>
				<li>
					<a class="jb-all" href="#surgery_before"><span class="index">8</span><span class="name">术前必读</span></a>
				</li>
			</ul>
			<div class="top"><i class="iconfont icon-fanhuidingbu"></i></div>
		</div>
	</div>
</div>
<script>
	
</script>