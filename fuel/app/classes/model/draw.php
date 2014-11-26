<?php
use Orm\Model;
class Model_Draw extends Model {
	protected static $_properties = array (
			'id',
			'qishu',
			'luckynum',
			'begin_at',
			'lucky_at',
			'open_at',
			'itemid',
/* 		'created_at',
		'updated_at', */
	);
	protected static $_observers = array (
			'Orm\Observer_CreatedAt' => array (
					'events' => array (
							'before_insert' 
					),
					'mysql_timestamp' => false 
			),
			'Orm\Observer_UpdatedAt' => array (
					'events' => array (
							'before_save' 
					),
					'mysql_timestamp' => false 
			) 
	);
	public static function validate($factory) {
		$val = Validation::forge ( $factory );
		$val->add_field ( 'qishu', 'Qishu', 'required|valid_string[numeric]' );
		$val->add_field ( 'luckynum', 'Luckynum', 'required|valid_string[numeric]' );
		$val->add_field ( 'begin_at', 'Begin At', 'required' );
		$val->add_field ( 'lucky_at', 'Lucky At', 'required' );
		$val->add_field ( 'open_at', 'Open At', 'required' );
		$val->add_field ( 'itemid', 'Itemid', 'required|valid_string[numeric]' );
		
		return $val;
	}
	
	public static function getMaxQishuByItemid($itemid)
	{
		$query = DB::select('qishu')->from('draws');
		$query->order_by('qishu','desc');
		$query->limit(1);
		$query->where('itemid', '=', $itemid);
		$result=$query->execute()->as_array();
		return $result[0]['qishu'];
	}
	
	public static function itemidIsInDb($itemid)
	{
		$itemid=(int)$itemid;
		$result = DB::select()->from('draws')->where('itemid', '=', $itemid)->execute();
		return (count($result)>0)?1:0;
	}
	public static function caculateDiffByMinutes($start,$end)
	{
		$datetime1 = strtotime($start);
		$datetime2 = strtotime($end);
		$interval  = abs($datetime2 - $datetime1);
		$minutes   = round($interval / 60);
		return $minutes;
	}
}