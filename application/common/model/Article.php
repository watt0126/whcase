<?php
namespace app\common\model;

/**
 * 案例文章模型
 * Class Article
 * @package app\common\model
 */
class Article extends BaseModel
{
	protected $name = 'article';
	
	/**
	 * 关联文章封面图
	 * @return \think\model\relation\HasOne
	 */
	// public function image()
	// {
	//     return $this->hasOne('uploadFile', 'file_id', 'image_id');
	// }
	public function image()
	{
	    return $this->hasMany('ArticleImage','article_id')->order(['id' => 'asc']);
	}
	/**
	 * 关联文章分类表
	 * @return \think\model\relation\BelongsTo
	 */
	public function category()
	{
	    return $this->belongsTo('Category');
	}
	/**
	 * 关联用户
	 * @return \think\model\relation\HasOne
	 */
	public function user()
	{
	    return $this->hasOne('User', 'user_id', 'user_id');
	}
	
	public function video()
	{
		return $this->hasMany("ArticleVideo",'article_id');
	}
	/**
	 * 获取文章列表
	 * @return \think\Paginator
	 * @throws \think\exception\DbException
	 */
	public function getList($query = [],$limit = 15)
	{
		!empty($query) && $this->setWhere($query);
	    return $this->with(['image.file', 'category', 'user'])
	        ->where('is_delete', '=', 0)
	        ->order(['article_sort' => 'asc', 'create_time' => 'desc'])
	        ->paginate($limit, false, [
	            'query' => request()->request()
	        ]);
	}
	public function getAllList($query = [])
	{
		!empty($query) && $this->setWhere($query);
		return $this->with(['image.file', 'category', 'user'])
		    ->where('is_delete', '=', 0)
		    ->order(['article_sort' => 'asc', 'create_time' => 'desc'])
		    ->select();
	}
	/**
	 * 文章详情
	 * @param $article_id
	 * @return null|static
	 * @throws \think\exception\DbException
	 */
	public static function detail($article_id)
	{
	    return self::get($article_id, ['image.file', 'category.special.image','user','video.file']);
	}
	/**
	 * 设置检索查询条件
	 * @param $query
	 */
	private function setWhere($query)
	{
	    if (isset($query['search']) && !empty($query['search'])) {
	        $this->where('article_title', 'like', '%' . trim($query['search']) . '%');
	    }
	    if (isset($query['category_id']) && !empty($query['category_id'])) {
	        $query['category_id'] > -1 && $this->where('category_id', '=', $query['category_id']);
	    }
		// 文章显示隐藏
		if (isset($query['article_status'])) {
			$this->where('article_status', '=', (int)$query['article_status']);
		}		
	    // 用户id
	    if (isset($query['user_id']) && $query['user_id'] > 0) {
	        $this->where('user_id', '=', (int)$query['user_id']);
	    }
		// 文章推荐
		if (isset($query['commend']) && $query['commend'] > -1) {
			$this->where('article_commend', '=', (int)$query['commend']);
		}
	}
	
	
}