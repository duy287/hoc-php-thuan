<?php 
class Pager{
	private $_totalItem;    //tổng số sp 
	private $_nItemOnPage; //số sp muốn hiển thị trên 1 page
	private $_nPageShow ;  //số page muốn hiển thị trên thanh phân trang
	private $_totalPage;   //tổng số page 
    private $_currentPage;  //page hiện tại đang đứng
    
	public function __construct($totalItem, $currentPage = 1, $nItemOnPage = 5, $nPageShow = 5){
		$this->_totalItem 	= $totalItem;
		$this->_nItemOnPage	= $nItemOnPage;
		if ($nPageShow%2==0) {
			$nPageShow 		= $nPageShow + 1; //mục đích để tổng số page hiển thị trên thanh phân trang luôn là số lẻ
		}
		$this->_nPageShow 	= $nPageShow;
		$this->_currentPage = abs($currentPage);
		$this->_totalPage  	= ceil($totalItem/$nItemOnPage);  
    }
    
	public function showPagination(){
        $paginationHTML 	= '';
        //nếu số page > 1 thì mới cho hiển thị thanh pagination, ngược lại thì ko hiển thị
		if($this->_totalPage > 1){
            //http://localhost:81/KhoaPham-MVC/ten-loai/page/4
            $actual_link = ($_SERVER['REQUEST_SCHEME']=='http' ? "http" : "https") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            //http://localhost:81/KhoaPham-MVC/ten-loai
			$actual_link = explode('/page/', $actual_link)[0];
            
            //=========== xác định các button đặc biệt trên thanh pagination ============//
			$start 	= ''; //button của page đầu tiên (page 1)
			$prev 	= ''; //button của nút previous (nhảy đến page phía trước)
			if($this->_currentPage > 1){
                $start 	= "<li><a href='$actual_link/page/1'>Start</a></li>";
				$prev 	= "<li><a href='$actual_link/page/".($this->_currentPage-1)."'>«</a></li>";
            }
            
			$next 	= ''; //button của nút next (mục đích nhảy đển page tiếp theo)
			$end 	= ''; //button của page cuối cùng (nhảy đến page cuối cùng)
			if($this->_currentPage < $this->_totalPage){
				$next 	= "<li><a href='$actual_link/page/".($this->_currentPage+1)."'>»</a></li>";
				$end 	= "<li><a href='$actual_link/page/".$this->_totalPage."'>End</a></li>";
			}
            
            //=========== Xác định page đầu tiên và page kết thúc trong thanh pagination =========//
            //------ T/h: Số page muốn hiển thị trên pagination < tổng số page của website ----------//
			if($this->_nPageShow < $this->_totalPage){
                /*
                totalPage = 10
                nPageShow = 5
                => pagination : [1] 2 3 4 5
                */
				if($this->_currentPage == 1 ){
					$startPage 	= 1;
					$endPage 	= $this->_nPageShow;
                }
                /*
                totalPage = 10
                nPageShow = 5
                => pagination : 6 7 8 9 [10]
                */
                else if($this->_currentPage == $this->_totalPage){
                    $startPage 	= $this->_totalPage - $this->_nPageShow + 1;
					$endPage 	= $this->_totalPage;
                }
                /*
                totalPage = 10
                nPageShow = 5
                page active đang ở giữa (giả sử là page 4)
                ==>Tính page bắt đầu và page kết thúc ?
                startPage = 4 - (5-1)/2 = 2
                endPage = 4 + (5-1)/2 = 6 
                ==> pagination: 2 3 [4] 5 6
                */
				else{
					$startPage		= $this->_currentPage - ($this->_nPageShow-1)/2;
					$endPage		= $this->_currentPage + ($this->_nPageShow-1)/2;
					if($startPage < 1){
						$endPage	= $endPage + 1;  
						$startPage 	= 1; 
					}
					if($endPage > $this->_totalPage){
						$endPage	= $this->_totalPage;
						$startPage 	= $endPage - $this->_nPageShow + 1;
					}
				}
            }
            //------ T/h: Số page muốn hiển thị trên pagination = tổng số page của website ----------//
			else{
				$startPage		= 1;
				$endPage		= $this->_totalPage;
            }
            
            //------ Hiển thị ra view thanh pagination ----------//
			$listPages = '';
			
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->_currentPage) {
                    //nếu là page hiện tại thì thêm class active và ko có href
					$listPages .= "<li class='active'><a href='#'>".$i.'</a>';
				}
				else{
					$listPages .= "<li><a href='$actual_link/page/".$i."'>".$i.'</a>';
				}
			}
			$paginationHTML = '<ul class="pagination">'.$start.$prev.$listPages.$next.$end.'</ul>';
		}
		return $paginationHTML;
	}
}

// $pagination = new Pager(20);
// print_r( $pagination->showPagination() );
// print_r( $_SERVER);
?>