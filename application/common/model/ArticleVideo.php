<?php
namespace app\common\model;
/**
 * 案例相关视频模型
 * Class ArticleVideo
 * @package app\common\model
 */
class ArticleVideo extends BaseModel
{
	protected $name = "article_video";
	protected $updateTime = false;
	
	public function file()
	{
		return $this->hasOne('uploadFile', 'file_id', 'image_id');
	}
}