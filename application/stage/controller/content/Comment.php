<?php
namespace app\stage\controller\content;

use app\stage\controller\Controller;
/**
 * 文章评论控制器
 * Class Comment
 * @package app\stage\controller\content
 */
class Comment extends Controller
{
	public function index()
	{
		return $this->fetch('index');
	}
}