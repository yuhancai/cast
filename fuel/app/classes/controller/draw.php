<?php
include 'Getcontent.class.php';
require_once VENDORPATH."/autoload.php";
class Controller_Draw extends Controller_Template{

	public function action_index()
	{


		$default_opts = array(
				'http'=>array(
						'method'=>"GET",
						'header'=>"Accept-language: en\r\n" .
						"Cookie: foo=bar",
						'proxy'=>"proxysv:80"
				)
		);
		$default = stream_context_set_default($default_opts);
		
	
			
		
		//$query = DB::query('SELECT * FROM items')->as_object()->execute();
		//print_r($query);
		//print_r(Model_Item::insertData("15"));
		$arr=Model_Item::getInfoFromUrl("http://1.163.com/detail/01-37-00-04-20.html");
		echo strlen((string)(int)$arr[1]);
		print_r(Model_Item::getItemidFromForurl(15));
		echo "<br />";
		print_r($this->getDataFromUrl("http://1.163.com/detail/01-37-00-00-03.html"));
		print_r($this->getAllDataFromUrl("http://1.163.com/detail/01-37-00-00-03.html"));
		
		//$this->getDataFromWeb();
/* 		$qishu=1;
		$luckynum=1;
		$beginat=1;
		$luckyat=1;
		$openat=1;
		$itemid=Model_Item::getItemidFromForurl(15);
		$draw = Model_Draw::forge(array(
				'qishu' => $qishu,
				'luckynum' =>$luckynum,
				'begin_at' =>$beginat,
				'lucky_at' =>$luckyat,
				'open_at' =>$openat,
				'itemid' => $itemid,
		));
		
		if ($draw and $draw->save())
		{
			Session::set_flash('success', 'Added draw #'.$draw->id.'.');
		
			//Response::redirect('draw');
		}
		
		else
		{
			Session::set_flash('error', 'Could not save draw.');
		}
		 */
		
		
		///////////////////
		$data['draws'] = Model_Draw::find('all');
		$this->template->title = "Draws";
		$this->template->content = View::forge('draw/index', $data);
		///


	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('draw');

		if ( ! $data['draw'] = Model_Draw::find($id))
		{
			Session::set_flash('error', 'Could not find draw #'.$id);
			Response::redirect('draw');
		}

		$this->template->title = "Draw";
		$this->template->content = View::forge('draw/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Draw::validate('create');
			
			if ($val->run())
			{
				$draw = Model_Draw::forge(array(
					'qishu' => Input::post('qishu'),
					'luckynum' => Input::post('luckynum'),
					'begin_at' => Input::post('begin_at'),
					'lucky_at' => Input::post('lucky_at'),
					'open_at' => Input::post('open_at'),
					'itemid' => Input::post('itemid'),
				));

				if ($draw and $draw->save())
				{
					Session::set_flash('success', 'Added draw #'.$draw->id.'.');

					Response::redirect('draw');
				}

				else
				{
					Session::set_flash('error', 'Could not save draw.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Draws";
		$this->template->content = View::forge('draw/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('draw');

		if ( ! $draw = Model_Draw::find($id))
		{
			Session::set_flash('error', 'Could not find draw #'.$id);
			Response::redirect('draw');
		}

		$val = Model_Draw::validate('edit');

		if ($val->run())
		{
			$draw->qishu = Input::post('qishu');
			$draw->luckynum = Input::post('luckynum');
			$draw->begin_at = Input::post('begin_at');
			$draw->lucky_at = Input::post('lucky_at');
			$draw->open_at = Input::post('open_at');
			$draw->itemid = Input::post('itemid');

			if ($draw->save())
			{
				Session::set_flash('success', 'Updated draw #' . $id);

				Response::redirect('draw');
			}

			else
			{
				Session::set_flash('error', 'Could not update draw #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$draw->qishu = $val->validated('qishu');
				$draw->luckynum = $val->validated('luckynum');
				$draw->begin_at = $val->validated('begin_at');
				$draw->lucky_at = $val->validated('lucky_at');
				$draw->open_at = $val->validated('open_at');
				$draw->itemid = $val->validated('itemid');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('draw', $draw, false);
		}

		$this->template->title = "Draws";
		$this->template->content = View::forge('draw/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('draw');

		if ($draw = Model_Draw::find($id))
		{
			$draw->delete();

			Session::set_flash('success', 'Deleted draw #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete draw #'.$id);
		}

		Response::redirect('draw');

	}
/////////
   public function getDataFromUrl($url=null)
   {

   	$content = file_get_contents($url);   	
   	$obj = new Grep();
   	$obj->set($content);   	
   	$t = $obj->get('shijian', 1);
   	$duobaotime=$t[1];
   	$jieshutime=$t[2];
   	$jiexiaotime=$t[0];
   	$diji = $obj->get('dijiqi', 0);
   	$pattern='/\d{1,}/';
   	preg_match($pattern,$diji[0], $matches);
   	$diji=$matches[0];
   	$zhong = $obj->get('luckynum', 0)[0];
    $info=array(
    		'duobaotime'=>$duobaotime,
    		'jieshutime'=>$jieshutime,
    		'jiexiaotime'=>$jiexiaotime,
    		'diji'=>$diji,
    		'zhong'=>$zhong 
          );
   	return $info;   	
   }
   
   public function getAllDataFromUrl($url=null)
   {
   	$arrInfo=Model_Item::getInfoFromUrl($url);
   	for($s=1;$s<=(int)$arrInfo[1];$s++)
   	{
   		$str="http://1.163.com/detail/";
   		$str.=$arrInfo[0];
    	switch (strlen((string)$s))
		{
			case 1: $str.="-00-00-0".$s.".html";break;
			case 2: $str.="-00-00-".$s.".html"; break;
			case 3: $str.="-00-0".substr($s,0,1)."-".substr($s,-2).".html";break;
			case 4: $str.="-00-".substr($s,0,2)."-".substr($s,-2).".html";break;
			case 5: $str.="-0".substr($s,0,1)."-".substr($s,1,2)."-".substr($s,-2).".html";break;
			case 6: $str.="-".substr($s,0,2)."-".substr($s,2,2)."-".substr($s,4).".html";break;
		    default: break;
		}
		$jieshu[]=$this->getDataFromUrl($str)['jieshutime'];
		$fromOnepage=$this->getDataFromUrl($str);
		if($s>1)
		{
			$allData[]=array("kaishitime"=>$jieshu[$s-1],"duobaotime"=>$fromOnepage['duobaotime'],"jieshutime"=>$fromOnepage['jieshutime'],"jiexiaotime"=>$fromOnepage['jiexiaotime'],"diji"=>$fromOnepage['diji'],"zhong"=>$fromOnepage['zhong']);
		}
		
		$ar[]=$str;

   	}   	
   
   	return $allData;   
   }
   

      	 
      
}
    
    


