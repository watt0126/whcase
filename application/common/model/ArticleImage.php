<?php
namespace app\common\model;

class ArticleImage extends BaseModel
{
	protected $name = 'article_image';
	protected $updateTime = false;
	
	/**
	 * 关联文件库
	 * @return \think\model\relation\BelongsTo
	 */
	public function file()
	{
	    return $this->belongsTo('UploadFile', 'image_id', 'file_id')
	        ->bind(['file_path', 'file_name', 'file_url']);
	}
	
	
}