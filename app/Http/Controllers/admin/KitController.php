<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//���ö�Ӧ�������ռ�
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class KitController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function captcha($tmp)
    {
                //������֤��ͼƬ��Builder����������Ӧ����
        $builder = new CaptchaBuilder;
        //��������ͼƬ��߼�����
        $builder->build($width = 100, $height = 40, $font = null);
        //��ȡ��֤�������
        $phrase = $builder->getPhrase();

        //�����ݴ���session
        Session::flash('milkcaptcha', $phrase);
        //����ͼƬ
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
	public function ajax3(Request $request)
	{	
		$userInput = $request->get('captcha');
		if (Session::get('milkcaptcha') == $userInput) {
			echo "yes";
		} else {
			echo "no";
		}
	}	
}