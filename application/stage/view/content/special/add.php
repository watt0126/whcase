<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加专题</div>
                            </div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">专题名称 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="special[name]"
							               value="" required>
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">专题分类 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <select id="category" name="special[category_id]"
							                data-am-selected="{searchBox: 1, btnSize: 'sm',
							                 placeholder:'请选择', maxHeight: 400}">
							            <option value=""></option>
							            <?php if (isset($category)): foreach ($category as $item): ?>
							                <option value="<?= $item['category_id'] ?>"><?= $item['name_h1'] ?></option>
							            <?php endforeach; endif; ?>
							        </select>
							    </div>
							</div>
							<div class="am-form-group">
							    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">专题链接 </label>
							    <div class="am-u-sm-9 am-u-end">
							        <input type="text" class="tpl-form-input" name="special[url]"
							               value="" placeholder="请填写专题链接" required>
									<small>专题链接有外链(域名/专题)和内链(/special/syp)，内链需把专题文件上传至文件夹special中</small>
							    </div>
																
							</div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">封面图 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-form-file">
                                        <div class="am-form-file">
                                            <button type="button" id="upload-file"
                                                    class="upload-file am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择图片
                                            </button>
                                            <div class="uploader-list am-cf">
                                            </div>
											<div class="help-block am-margin-top-sm">
												<small>尺寸360x360,大小2M以下</small>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>							
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">排序 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="special[sort]"
                                           value="100" required>
                                    <small>数字越小越靠前</small>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交</button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
<script>	
    $(function () {
		// 选择封面图片
		$('#upload-file').selectImages({
		    name: 'special[image_id]'
		});
        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>
