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
		
	
		Twig_Autoloader::register();		
		
		$query = DB::query('SELECT * FROM items')->as_object()->execute();
		//print_r($query);
		//print_r(Model_Item::insertData("15"));
		print_r(Model_Item::getInfoFromUrl("http://1.163.com/detail/01-37-00-04-20.html"));
		print_r(Model_Item::getItemidFromForurl(15));
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
   public function getDataFromWeb($url=null)
   {

   	$content = file_get_contents('http://1.163.com/detail/01-37-00-04-20.html');   	
   	$obj = new Grep();
   	$obj->set($content);   	
   	$t = $obj->get('shijian', 1);
   	$diji = $obj->get('dijiqi', 0);
   	$zhong = $obj->get('luckynum', 0);
   	//$t = $obj->get('shijian', 1);
   	//print_r($url);
   	echo "<br />";
   	print_r($t);
   	echo "<br />";
   	print_r($diji);
   	echo "<br />";
   	print_r($zhong);
   	
   	
   }
   

}
