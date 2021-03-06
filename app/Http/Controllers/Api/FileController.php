<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/6/8
 * Time: 9:00
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FileController extends BaseApiController {

	public function upload(Request $request) {
		//获取上传文件和文件信息

		$directoryHeadPic = env('HEAD_PIC_FILE_PATH');
		$articleThumbFilePath = env('ARTICLE_THUMB_FILE_PATH');
		//图片保存路径
		$directoryArray = [$directoryHeadPic, $articleThumbFilePath, env('ATTACH_FILE_PATH')];
		$directory = implode(',', $directoryArray);

		$rules = ['attach_file' => 'required|max:10240', 'directory' => 'required|in:' . $directory];
		$validate = \Validator::make($request->all(), $rules);
		$file = Input::file('attach_file');

		$result = ['result' => false, 'errors' => []];
		//验证文件信息s
		if (!is_null($file) && !$validate->fails()) {

			//保存文件
			$extension = $file->getClientOriginalExtension();
			$filePath = public_path() . DIRECTORY_SEPARATOR . $request->get('directory') . DIRECTORY_SEPARATOR;
			$fileName = date('YmdHis', time());
			$fileName .= '.' . $extension;
			$file->move($filePath, $fileName);
			$result['result'] = true;
			$result['file'] = $request->get('directory') . DIRECTORY_SEPARATOR . $fileName;
		} else {

			$result['errors'] = $validate->errors();
		}
		return $result;
	}

}