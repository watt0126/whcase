<?php
namespace app\index\controller;

class Controller extends \think\Controller
{
	const JSON_SUCCESS_STATUS = 1;
	const JSON_ERROR_STATUS = 0;
	
	public function _initialize()
	{
		$this->assign([
		    'base_url' => base_url(),                      // 当前域名
		    'index_url' => url('/index'),
		]);
	}
	/**
	 * 返回封装后的 API 数据到客户端
	 * @param int $code
	 * @param string $msg
	 * @param array $data
	 * @return array
	 */
	protected function renderJson($code = self::JSON_SUCCESS_STATUS, $msg = '', $data = [])
	{
	    return compact('code', 'msg', 'data');
	}
	
	/**
	 * 返回操作成功json
	 * @param array $data
	 * @param string|array $msg
	 * @return array
	 */
	protected function renderSuccess($data = [], $msg = 'success')
	{
	    return $this->renderJson(self::JSON_SUCCESS_STATUS, $msg, $data);
	}
	
	/**
	 * 返回操作失败json
	 * @param string $msg
	 * @param array $data
	 * @return array
	 */
	protected function renderError($msg = 'error', $data = [])
	{
	    return $this->renderJson(self::JSON_ERROR_STATUS, $msg, $data);
	}
}