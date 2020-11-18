<link rel="stylesheet" href="__STATIC__/common/plugins/umeditor/themes/default/css/umeditor.css">
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">基本信息</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">项目名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="article[article_title]"
                                           value="<?=$model['article_title']?>" placeholder="请输入项目名称" required>
                                </div>
                            </div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">项目别名 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[pro_alias]"
							               value="<?=$model['pro_alias']?>" placeholder="请输入别名">
							    </div>
							</div>
							
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">项目概要 </label>
							    <div class="am-u-sm-9 am-u-end">
									<textarea name="article[article_des]" rows="2" placeholder="请输入简介"><?=$model['article_des']?></textarea>
							        
							    </div>
							</div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">项目分类 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <select name="article[category_id]"
                                            data-am-selected="{searchBox: 1, btnSize: 'sm',
                                             placeholder:'请选择', maxHeight: 400}" id="category">
                                        <option value=""></option>
                                        <?php if (isset($catgory)): foreach ($catgory as $item): ?>
                                            <option value="<?= $item['category_id'] ?>"
                                                <?= $model['category_id'] == $item['category_id'] ? 'selected' : '' ?>>
                                    			<?= $item['name_h1'] ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                    <small class="am-margin-left-xs">
                                        <a href="<?= url('content.category/add') ?>">去添加</a>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">效果图片 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-form-file">
                                        <div class="am-form-file">
                                            <button type="button" id="upload-file"
                                                    class="upload-file am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择图片
                                            </button>
                                            <div class="uploader-list am-cf">
												<?php foreach ($model['image'] as $key => $item): ?>
												    <div class="file-item">
												        <a href="<?= $item['file_path'] ?>" title="点击查看大图" target="_blank">
												            <img src="<?= $item['file_path'] ?>">
												        </a>
												        <input type="hidden" name="article[images][]"
												               value="<?= $item['image_id'] ?>">
												        <i class="iconfont icon-shanchu file-item-delete"></i>
												    </div>
												<?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="widget-head am-cf">
							    <div class="widget-title am-fl">项目概览</div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">项目特色 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[feature]"
							               value="<?=$model['feature']?>" placeholder="请输入项目特色" required>
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">功效 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[effect]"
							               value="<?=$model['effect']?>" placeholder="请输入功效">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">特征 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[indications]"
							               value="<?=$model['indications']?>" placeholder="请输入适用人群特征">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">参考价格 </label>
							    <div class="am-u-sm-9 am-u-end">
									<div class="am-u-sm-3 am-u-end">
										<input type="number" class="tpl-form-input" name="article[min_price]"
										       value="<?=$model['min_price']?>" placeholder="请输入最低价格">									    
									</div>
									<div class="am-u-sm-3 am-u-end">
										<input type="number" class="tpl-form-input" name="article[max_price]"
										       value="<?=$model['max_price']?>" placeholder="请输入最高价格">									    
									</div>
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">适合人群 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <textarea name="article[crowd]" placeholder="请输入适合人群" cols="4"><?=$model['crowd']?></textarea>
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">项目优点 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <textarea name="article[merit]" placeholder="请输入项目优点" cols="4"><?=$model['merit']?></textarea>
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">项目缺点 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <textarea  name="article[defect]" placeholder="请输入项目缺点" cols="4"><?=$model['defect']?></textarea>
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">禁忌人群 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <textarea  name="article[limit_crowd]" placeholder="请输入禁忌人群" cols="4"><?=$model['limit_crowd']?></textarea>
							    </div>
							</div>
							<div class="widget-head am-cf">
							    <div class="widget-title am-fl">操作档案</div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">治疗时长 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[treat_time_text]"
							               value="<?=$model['treat_time_text']?>" placeholder="请输入治疗时长">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">效果持续 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[maintain_time_text]"
							               value="<?=$model['maintain_time_text']?>" placeholder="请输入效果持续时长">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">麻醉方式 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[anesthesia_text]"
							               value="<?=$model['anesthesia_text']?>" placeholder="请输入麻醉方式">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">恢复时间 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[recovery_time_text]"
							               value="<?=$model['recovery_time_text']?>" placeholder="请输入恢复时间">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">治疗周期 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[treat_cycle_text]"
							               value="<?=$model['treat_cycle_text']?>" placeholder="请输入治疗周期">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">操作人员资质 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[qalification_text]"
							               value="<?=$model['qalification_text']?>" placeholder="请输入操作人员资质">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">操作方式 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[operation_type_name]"
							               value="<?=$model['operation_type_name']?>" placeholder="请输入操作方式">
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">疼痛感 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="article[pain_text]"
							               value="<?=$model['pain_text']?>" placeholder="请输入疼痛感">
							    </div>
							</div>
							<div class="widget-head am-cf">
								<div class="widget-title am-fl">手术注意事项</div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">术前必读 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <textarea name="article[surgery_before]" rows="4" placeholder="请输入术前注意事项"><?=$model['surgery_before']?></textarea>
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">术后护理 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <textarea name="article[surgery_after]" rows="4" placeholder="请输入术后护理事项"><?=$model['surgery_after']?></textarea>
							    </div>
							</div>
							<div class="widget-head am-cf">
							    <div class="widget-title am-fl">案例视频</div>
							</div>
                            <div class="am-form-group am-padding-top">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">操作展示视频地址 </label>
                                <div class="am-u-sm-9 am-u-end">
									<input type="text" class="tpl-form-input" name="article[operation_show]"
									       value="<?=$model['operation_show']?>" placeholder="请输入视频地址">
                                </div>
                            </div> 
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">相关视频 </label>
							    <div class="am-u-sm-9 am-u-end">
									<label class="am-radio-inline">
										<input type="radio" name="article[is_video]" value="1" data-am-ucheck="" <?=$model['is_video'] == 1 ? 'checked' : ''?> class="am-ucheck-radio am-field-valid">
										<span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span>
										视频信息
									</label>
									<label class="am-radio-inline">
										<input type="radio" name="article[is_video]" value="0" data-am-ucheck="" <?=$model['is_video'] == 0 ? 'checked' : ''?> class="am-ucheck-radio am-field-valid">
										<span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span>
										<span>无</span>
									</label>
							    </div>
							</div>
							<?php if (count($model['video']) !== 0 ): ?>
							<div class="art-pro-video" style="display: block;">
								<?php foreach($model['video'] as $key=>$item):?>
								<div class="am-form-group">
									<?php 
										if($key == 0){
											$group = 'first';
										}elseif($key == 1){
											$group = 'second';
										}else{
											$group = 'third';
										}									
									?>									
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">视频封面 </label>
									<div class="am-u-sm-9 am-u-end">
										<div class="am-form-file">
										    <div class="am-form-file">
										        <button type="button" id="upload-<?= $group?>-file"
										                class="upload-file am-btn am-btn-secondary am-radius">
										            <i class="am-icon-cloud-upload"></i> 选择图片
										        </button>
										        <div class="uploader-list am-cf">
													<div class="file-item">
													    <a href="<?= $item['file']['file_path'] ?>" title="点击查看大图" target="_blank">
													        <img src="<?= $item['file']['file_path'] ?>">
													    </a>
													    <input type="hidden" name="article[video][<?=$group?>][image_id]"
													           value="<?= $item['file']['file_id'] ?>">
													    <i class="iconfont icon-shanchu file-item-delete"></i>
													</div>
										        </div>
												<div class="help-block am-margin-top-sm">
													<small>尺寸360x360像素，大小2M以下</small>
												</div>
										    </div>
										</div>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">视频地址 </label>
									<div class="am-u-sm-9 am-u-end">
										<input type="text" class="tpl-form-input" name="article[video][<?=$group?>][url]"
										       value="<?=$item['url']?>">
									</div>
								</div>
								<?php endforeach;?>
							</div>
							<?php else: ?>
							<div class="art-pro-video" style="display: none;">
								<div class="am-form-group">
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">视频封面 </label>
									<div class="am-u-sm-9 am-u-end">
										<div class="am-form-file">
										    <div class="am-form-file">
										        <button type="button" id="upload-first-file"
										                class="upload-file am-btn am-btn-secondary am-radius">
										            <i class="am-icon-cloud-upload"></i> 选择图片
										        </button>
										        <div class="uploader-list am-cf">
										        </div>
												<div class="help-block am-margin-top-sm">
													<small>尺寸360x360像素，大小2M以下</small>
												</div>
										    </div>
										</div>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">视频地址 </label>
									<div class="am-u-sm-9 am-u-end">
										<input type="text" class="tpl-form-input" name="article[video][first][url]"
										       value="" placeholder="请输入视频地址">
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">视频封面 </label>
									<div class="am-u-sm-9 am-u-end">
										<div class="am-form-file">
										    <div class="am-form-file">
										        <button type="button" id="upload-second-file"
										                class="upload-file am-btn am-btn-secondary am-radius">
										            <i class="am-icon-cloud-upload"></i> 选择图片
										        </button>
										        <div class="uploader-list am-cf">
										        </div>
												<div class="help-block am-margin-top-sm">
													<small>尺寸360x360像素，大小2M以下</small>
												</div>
										    </div>
										</div>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">视频地址 </label>
									<div class="am-u-sm-9 am-u-end">
										<input type="text" class="tpl-form-input" name="article[video][second][url]"
										       value="" placeholder="请输入视频地址">
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">视频封面 </label>
									<div class="am-u-sm-9 am-u-end">
										<div class="am-form-file">
										    <div class="am-form-file">
										        <button type="button" id="upload-third-file"
										                class="upload-file am-btn am-btn-secondary am-radius">
										            <i class="am-icon-cloud-upload"></i> 选择图片
										        </button>
										        <div class="uploader-list am-cf">
										        </div>
												<div class="help-block am-margin-top-sm">
													<small>尺寸360x360像素，大小2M以下</small>
												</div>
										    </div>
										</div>
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">视频地址 </label>
									<div class="am-u-sm-9 am-u-end">
										<input type="text" class="tpl-form-input" name="article[video][third][url]"
										       value="" placeholder="请输入视频地址">
									</div>
								</div>								
							</div>
							<?php endif;?>
							<div class="widget-head am-cf">
							    <div class="widget-title am-fl">项目详情</div>
							</div>
							<div class="am-form-group am-padding-top">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label">项目详情 </label>
							    <div class="am-u-sm-9 am-u-end">									
							        <!-- 加载编辑器的容器 -->
							        <textarea id="container" name="article[article_content]" type="text/plain"><?=$model['article_content']?></textarea>
							    </div>
							</div>
							
							
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">推荐 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="article[article_command]" value="1" data-am-ucheck
										<?= $model['article_command'] == 1 ? 'checked' : '' ?>>
                                        是
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="article[article_command]" value="0" data-am-ucheck 
										<?= $model['article_command'] == 0 ? 'checked' : '' ?>>
                                        否
                                    </label>
                                </div>
                            </div>
							
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">排序 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="article[article_sort]"
                                           value="<?=$model['article_sort']?>" required>
                                    <small>数字越小越靠前</small>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 附加字段列表模板 -->

<!-- 图片文件列表模板 -->
<script id="tpl-file-item" type="text/template">
    {{ each list }}
    <div class="file-item">
        <a href="{{ $value.file_path }}" title="点击查看大图" target="_blank">
            <img src="{{ $value.file_path }}">
        </a>
        <input type="hidden" name="{{ name }}" value="{{ $value.file_id }}">
        <i class="iconfont icon-shanchu file-item-delete"></i>
    </div>
    {{ /each }}
</script>


<!-- 文件库弹窗 -->
{{include file="layouts/_template/file_library" /}}
<script src="__STATIC__/common/plugins/umeditor/umeditor.config.js"></script>
<script src="__STATIC__/common/plugins/umeditor/umeditor.min.js"></script>
<script>
    $(function () {
		
        // 选择封面图片
        $('#upload-file').selectImages({
            name: 'article[images][]',
			multiple:true
        });
		// 选择封面图片
		$('#upload-first-file').selectImages({
		    name: 'article[video][first][image_id]'
		});
		// 选择封面图片
		$('#upload-second-file').selectImages({
		    name: 'article[video][second][image_id]'
		});
		// 选择封面图片
		$('#upload-third-file').selectImages({
		    name: 'article[video][third][image_id]'
		});
        // 富文本编辑器
        UM.getEditor('container', {
            initialFrameWidth: 852 + 15,
            initialFrameHeight: 600
        });
		// 切换
		$('input:radio[name="article[is_video]"]').change(function (e) {
		    var $visShow = $('.art-pro-video')
		    if (e.currentTarget.value === '1') {
		        $visShow.show();
		    } else {
		        $visShow.hide();
		    }
		});
        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>
