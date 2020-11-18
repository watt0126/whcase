<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">专题列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="page_toolbar am-margin-bottom-xs am-cf">
                    	<form class="toolbar-form" action="">
                    		<input type="hidden" name="s" value="/<?= $request->pathinfo() ?>">
                    		<div class="am-u-sm-12 am-u-md-3">
                    			<div class="am-form-group">
                    				<div class="am-btn-toolbar">
                    					<?php if (checkPrivilege('content.special/add')): ?>
                    						<div class="am-btn-group am-btn-group-xs">
                    							<a class="am-btn am-btn-default am-btn-success am-radius"
                    							   href="<?= url('content.special/add') ?>">
                    								<span class="am-icon-plus"></span> 新增
                    							</a>
                    						</div>
                    					<?php endif; ?>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="am-u-sm-12 am-u-md-9">
                    		    <div class="am fr">
                    		        <div class="am-form-group am-fl">
                    		            <?php $category_id = $request->get('category_id') ?: null; ?>
                    		            <select name="category_id"
                    		                    data-am-selected="{searchBox: 1, btnSize: 'sm',  placeholder: '专题分类', maxHeight: 400}">
                    		                <option value=""></option>
                    		                <?php if (isset($category)): foreach ($category as $first): ?>
                    		                    <option value="<?= $first['category_id'] ?>"
                    		                        <?= $category_id == $first['category_id'] ? 'selected' : '' ?>>
                    		                        <?= $first['name_h1'] ?></option>							                    
                    		                <?php endforeach; endif; ?>
                    		            </select>
                    		        </div>
                    		        
                    		        <div class="am-form-group am-fl">
                    		            <div class="am-input-group am-input-group-sm tpl-form-border-form">
                    		                <input type="text" class="am-form-field" name="search"
                    		                       placeholder="请输入专题名称"
                    		                       value="<?= $request->get('search') ?>">
                    		                <div class="am-input-group-btn">
                    		                    <button class="am-btn am-btn-default am-icon-search"
                    		                            type="submit"></button>
                    		                </div>
                    		            </div>
                    		        </div>
                    		    </div>
                    		</div>
                    	</form>
                    </div>
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black">
                            <thead>
                            <tr>
                                <th>专题ID</th>
								<th>封面图</th>
                                <th>专题名称</th>                                
								<th>排序</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (count($list) !== 0): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['special_id'] ?></td>
									<td class="am-text-middle">
										<a href="<?= $item['image']['file_path'] ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $item['image']['file_path'] ?>" height="72" alt="">
                                        </a>
									</td>
                                    <td class="am-text-middle"><?= $item['name'] ?></td>									
                                    <td class="am-text-middle"><?= $item['sort'] ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <?php if (checkPrivilege('content.special/edit')): ?>
                                                <a href="<?= url('content.special/edit',
                                                    ['special_id' => $item['special_id']]) ?>">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                            <?php endif; ?>
                                            <?php if (checkPrivilege('content.special/delete')): ?>
                                                <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                                   data-id="<?= $item['special_id'] ?>">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="6" class="am-text-center">暂无记录</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        // 删除元素
        var url = "<?= url('content.special/delete') ?>";
        $('.item-delete').delete('special_id', url);

    });
</script>

