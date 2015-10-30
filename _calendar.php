<?php
/**
 * カレンダーの作成
 */
if (isset($_POST['m']) && isset($_POST['y'])) {
	foreach($_POST as $key => $value){
		$tmp = $value;
		$$key = $tmp;
	}
}else{
	$m = date('m',strtotime('today'));
	$y = date('Y',strtotime('today'));
}
$calendar = new Calendar($m,$y);

/**
 *
 */
class Calendar {
//public:
	public $cell = array();
	public $pre_;
	public $next_;
	public function set_cell(){
		$day = 1;
		while(checkdate($this->month_,$day,$this->year_)) {
			$this->cell []= date('d',mktime(0,0,0,$this->month_,$day,$this->year_));
			$day++;
		}
	}
	public function set_pre(){
		$m = (int)$this->month_;
		$y = (int)$this->year_;
		if($m === 1){
			$date['m'] = 12;
			$date['y'] = $y - 1;
		}else{
			$date['m'] = $m - 1;
			$date['y'] = $y;
		}
		return $date;
	}
	public function set_next(){
		$m = (int)$this->month_;
		$y = (int)$this->year_;
		if($m === 12){
			$date['m'] = 1;
			$date['y'] = $y + 1;
		}else{
			$date['m'] = $m + 1;
			$date['y'] = $y;
		}
		return $date;
	}
	public function get_weekday($m,$d,$y){
		return (int)date('w',mktime(0,0,0,$m,$d,$y));
	}
	public function set_tbl_start(){
		return (int)date('w',mktime(0,0,0,$this->month_,1,$this->year_));
	}
	public function set_tbl_end(){
		$last_day = date('Y-m-t',mktime(0,0,0,$this->month_,1,$this->year_));
		return 6 - (int)date('w',strtotime($last_day));
	}
	public function __construct($month,$year){
		$this->year_ = $year;
		$this->month_ = $month;
		$this->pre = $this->set_pre();
		$this->next = $this->set_next();
		$this->set_cell();
	}
	public function get_year(){return $this->year_;}
	public function get_month(){return $this->month_;}
//private:
	private $year_;
	private $month_;
//	const WEEK = array('日','月','火','水','木','金','土',);
}
