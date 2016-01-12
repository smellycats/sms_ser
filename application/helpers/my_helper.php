<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Kakou publishing system
 *
 * @package		Kakou
 * @subpackage	Helpers
 * @category	Helpers
 * @author      Fire
 * @link
 */


/**
 * 发送post请求
 * 
 * @param string $url 请求地址
 * @param array $post_data POST键值对数据
 * @param int $timeout 超时
 * 
 * @return string 返回响应信息或者在失败时返回 FALSE。
 */
if( ! function_exists('h_send_post'))
{
	function h_send_post($url, $post_data, $timeout=5) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// post数据
		curl_setopt($ch, CURLOPT_POST, 1);
		// post的变量
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($post_data))
		);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$output = curl_exec($ch);

		curl_close($ch);
		return $output;
		//打印获得的数据
		#print_r($output);
	}
}

/**
 * 发送post请求
 * 
 * @param string $url 请求地址
 * @param array $post_data POST键值对数据
 * @param int $timeout 超时
 * 
 * @return string 返回响应信息或者在失败时返回 FALSE。
 */
if( ! function_exists('h_send_json_post'))
{
	function h_send_json_post($url, $post_data, $timeout=5) {
	
		//$postdata = http_build_query($post_data);
		$options = array(
			'http' => array(
				'method' => 'POST',
				'header' => 'Content-type:application/json',
				'content' => $post_data,
				'timeout' => $timeout // 超时时间（单位:s）
			)
		);
		$context = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
	
		return $result;
	}
}



