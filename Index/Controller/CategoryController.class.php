<?php
/**
* 分类列表
*/
class CategoryController extends Controller
{
	private $_model_all;
	private $_model_goods;
	public function __auto()
	{
		$this->_model_all = K('Category');
		$this->_model_goods = K('Goods');
	}
	
	function index()
	{
		$category = $this->_model_all->all();
		// p($category);
		$str = $this->_model_all->stree($category, '0');
		$this->assign('str', $str);
		$this->assign('web', '分类列表页');
		$this->display();
	}

	function category_list()
	{
		$category_id = (int)$_GET['category_id'];
		$cat_ids = $this->categroy_str($category_id);
		$cat_ids[] = array(
				'id' => $category_id
			);
		// p($cat_ids);
		foreach ($cat_ids as $key => $value) {
			$good[] = $this->_model_goods->where('cat_id = ' . $value['id'])->all();
			
		}
		$goods = array();
		foreach ($good as $key => $value) {
			foreach ($value as $k => $v) {
				$goods[] = $v;
			}
		}
		$this->assign('goods', $goods);
		$this->assign('web', '分类详情页');
		$this->display();
	}

	function categroy_str($category_id)
	{
		$str = array();
		$str = $this->_model_all->field('id')->where('pid = ' . $category_id)->all();
		foreach ($str as $key => $value) {
			// $str[$key]['arr'] = $this->categroy_str($value['id']);
			$str = array_merge($str, $this->categroy_str($value['id']));
		}
		return $str;
	}
}