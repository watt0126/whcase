<?php
namespace app\common\model;
/**
 * 专题模型
 * Class Special
 * @package app\common\model\Special
 */
class Special extends BaseModel
{
	protected $name = 'special';	
	/**
	 * 关联文章分类表
	 * @return \think\model\relation\BelongsTo
	 */
	public function category()
	{
	    return $this->belongsTo('Category');
	}
	/**
	 * 关联文章封面图
	 * @return \think\model\relation\HasOne
	 */
	public function image()
	{
		return $this->hasOne('UploadFile','file_id','image_id');
	}
}