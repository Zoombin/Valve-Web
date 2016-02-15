<?php
namespace Home\Model;

use Think\Model;

class ProductModel extends Model {
	protected $trueTableName    =   'products';
	/*protected $_validate = array(
			array('name','require','主机名必须！'),
			array('ip','require','ip必须！'), 
			array('country','require','国家必须！'), 
			array('name','','主机名已经存在！',0,'unique',self::MODEL_BOTH), 
	);*/
	
	function get_list_images($list){
		if($list){
			foreach ($list as $k=>$v){
				$sql="select a.*,CONCAT('/images/',a.path) as image,b.products_options_values_name as color_name from products_gallery a left join products_options_values b on a.color=b.products_options_values_id and b.language_id=1 where products_id='".$v['products_id']."' order by color_code,id";
				$list[$k]["gallery"]=$this->query($sql);
			}
		}
		return $list;
	}
}