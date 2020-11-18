<?php
namespace app\index\model;

use app\common\model\Article as ArticleModel;

class Article extends ArticleModel
{
	protected $hidden = [
		'create_time',
		'update_time',
		'user',
	];
}