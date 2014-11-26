<?php

/* 		// prepare an insert statement
 $query = DB::insert('items');

// Set the columns
$query->columns(array(
		'itemname',
		'forurl',
));

// Set the values

$query->values(array(
		'John',
		$fromurl,
));
$query->execute();
}
else
{  //http://1.163.com/detail/01-37-00-04-20.html
//alert is alreay in DB OR DO NOTHING
} */


use Orm\Model;

class Model_Item extends Model
{
	protected static $_properties = array(
		'id',
		'itemname',
		'itemtype',
		'itemabbr',
		'forurl',
/* 		'created_at',
		'updated_at', */
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('itemname', 'Itemname', 'required|max_length[255]');
		$val->add_field('itemtype', 'Itemtype', 'required|valid_string[numeric]');
		$val->add_field('itemabbr', 'Itemabbr', 'required|max_length[255]');

		return $val;
	}
	
	public static function isInDb($fromurl)
	{
		$fromurl=(string)$fromurl;
		$result = DB::select()->from('items')->where('forurl', '=', $fromurl)->execute();	    
		return (count($result)>0)?1:0;
	}
	
	public static function insertData($fromurl)
	{
	 if(!Model_Item::isInDb($fromurl))
	 {
	 	  $item = Model_Item::forge(array(
	 				'itemname' =>'joly',
	 				'forurl' =>$fromurl,
	 		));
	 		 
	 		if ($item and $item->save())
	 		{
	 			Session::set_flash('success', 'Added item #'.$item->itemname.'.');	 			 
	 			//Response::redirect('messages');
	 		}
	 }

	 else
	 {
	 	//doing nothing
	 }
    }
   
    public static function getInfoFromUrl($url)
    {
    	$pattern='/\d{2}-\d{2}-\d{2}-\d{2}-\d{2}/';
    	preg_match($pattern,$url, $matches);
    	$d=implode(explode('-',$matches[0]));
    	$a=array();
    	$a[]=substr($matches[0],0,5);//for itemtype
    	$a[]=substr($d,4);//for loops
    	return $a;     	
    }
    
    public static function getItemidFromForurl($forurl)
    {
    	$query = DB::select('id')->from('items');  
    	$query->order_by('id','desc');
    	$query->limit(1);
    	$query->where('forurl', '=', $forurl);
    	$result=$query->execute()->as_array();
        return $result[0]['id'];
    }
    
	
}
