<?php
namespace app\stage\model;

use think\Session;
use app\common\model\Article as ArticleModel;
/**
 * 案例文章模型
 * Class Article
 * @package app\stage\model
 */
class Article extends ArticleModel
{	
	/**
	 * 新增记录
	 * @param $data
	 * @return false|int
	 */
	public function add($data)
	{
		if (empty($data['category_id'])) {
		    $this->error = '请选择文章分类';
		    return false;
		}
	    if (empty($data['images'])) {
	        $this->error = '请上传封面图';
	        return false;
	    }
	    // if (empty($data['article_content'])) {
	    //     $this->error = '请输入文章内容';
	    //     return false;
	    // }
		//dump($data);exit;
		// 开启事务
		$this->startTrans();
		try {
			$data['user_id'] = Session::get('whc_stage')['user']['user_id'];
			
			// $artCont = ArticleModel::getArticleTotal(['category_id'=>$data['category_id']]);
			// $artCont > 0 && $data['def'] ? '1' : '0';
			// 添加文章
			$this->allowField(true)->save($data);
			// 案例图片
			$this->addArticleImages($data['images']);
			if($data['is_video'] == 1){
				$this->addArticleVideo($data['video']);
			}
			
			$this->commit();
			return true;
		} catch (\Exception $e) {
            $this->error = $e->getMessage();
            $this->rollback();
            return false;
        };
	    
	}
	
	/**
	 * 添加缩略图片
	 * @param $images
	 * @return int
	 */
	private function addArticleImages($images)
	{
		$this->image()->delete();
	    $data = array_map(function ($image_id) {
	        return [
	            'image_id' => $image_id,
	        ];
	    }, $images);
	    return $this->image()->saveAll($data);
	}
	/**
	 * 添加缩略图片
	 * @param $images
	 * @return int
	 */
	private function addArticleVideo($videos)
	{
		$this->video()->delete();
		
	    return $this->video()->saveAll($videos);
	}
	/**
	 * 更新记录
	 * @param $data
	 * @return bool|int
	 */
	public function edit($data)
	{
		//dump($data);exit;
	    if (empty($data['category_id'])) {
	        $this->error = '请选择文章分类';
	        return false;
	    }        
	    
	    if (empty($data['images'])) {
	        $this->error = '请上传封面图';
	        return false;
	    }
	    // if (empty($data['article_content'])) {
	    //     $this->error = '请输入文章内容';
	    //     return false;
	    // }
		return $this->transaction(function () use ($data) {
			// 保存文章
			$this->allowField(true)->save($data);
		    // 案例图片
		    $this->addArticleImages($data['images']);
			
			if($data['is_video'] == 1){
				$this->addArticleVideo($data['video']);
			}else{
				$this->video()->delete();
			}
			
		    return true;
		});
	}
	
	/**
	 * 软删除
	 * @return false|int
	 */
	public function setDelete()
	{
		$this->video()->delete();
	    return $this->save(['is_delete' => 1]);
	}
	/**
	 * 获取文章总数量
	 * @param array $where
	 * @return int|string
	 */
	public static function getArticleTotal($where = [])
	{
	    $model = new static;
	    !empty($where) && $model->where($where);
	    return $model->where('is_delete', '=', 0)->count();
	}
		
	
}