<?php
namespace app\stage\controller;
/**
 * 后台首页
 * Class Index
 * @package app\stage\controller
 */
class Index extends Controller
{
	public function index()
	{
		return $this->fetch();
	}
}