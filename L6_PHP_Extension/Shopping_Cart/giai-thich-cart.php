<?php
class Cart{
	public $items = []; //ds sản phẩm trong giỏ hàng 
	public $totalQty = 0;	 
	public $totalPrice = 0;
	public $promtPrice = 0; 

	public function __construct($oldCart=null){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->promtPrice = $oldCart->promtPrice;
		}
	}
    /*
    Mô hình dữ liệu của giỏ hàng: 
    {
        items : [
            12=>[
                item: $item,
                qty: 2,
                price: 20,
                discountPrice: 20
            ],
            15=>[
                item:  $item, 
                qty: 4,
                price: 80,
                discountPrice: 60
            ]
        ],
        totalQty: 6,
        totalPrice : 100,
        promtPrice: 80
    }
    */

    //item: sản phẩm đang mua
	public function add($item, $qty=1){ 
        //----- B1: Thiết lập các thông số cho sp đang mua
		if($item->promotion_price == 0){
			$item->promotion_price = $item->price;
        }
        //Khởi tạo các thông số cho sp đang mua 
		$giohang = [ //$giahnag <==> 1 sản phẩm 
			'qty'=> 0, 
			'price' => $item->price,  //giá gốc
			'discountPrice'=>$item->promotion_price,  //giá sau khi đã giảm
			'item' => $item //thông tin sp
		]; 
        
        //-------- B2: Kiểm tra sp đang mua đã có trong giỏ hàng chưa, Nếu có rồi thì lấy lại thông số cũ của nó
		if($this->items){ 
			if(array_key_exists($item->id, $this->items)){ //nếu sp đã có trong giỏ
				$giohang = $this->items[$item->id];
			}
        }
        //-------- B3: Cập nhật lại thông tin của sp đó trước khi đưa nó vào giỏ hàng
        // Cập nhật các thông số cho sp đó
		$giohang['qty'] =  $giohang['qty'] + $qty;
		$giohang['price'] = $item->price * $giohang['qty'];
        $giohang['discountPrice'] = $item->promotion_price * $giohang['qty'];
        //đưa sp mới này vào giỏ hàng
		$this->items[$item->id] = $giohang; 
        
        //-------- B4: Tính toán lại thông số cho Cart
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = $this->totalPrice + $qty*$giohang['item']->price;
		$this->promtPrice = $this->promtPrice + $qty*$giohang['item']->promotion_price;
		
	}
	
	//update
	public function update($item, $qty=1){
		//Khởi tạo các thông số cho sp
		if($item->promotion_price == 0){
			$item->promotion_price = $item->price;
		}
		$giohang = [
			'qty'=>$qty, 
			'price' => $item->price*$qty, 
			'discountPrice'=>$item->promotion_price * $qty, 
			'item' => $item
		];
		$id = $item->id;
		//xoá sp đó ra khỏi cart (thực chất ở đây chỉ là lấy các thông số của Cart - các thông số của sp đó)
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$this->totalPrice -= $this->items[$id]['price'];
				$this->promtPrice -= $this->items[$id]['discountPrice'];
				$this->totalQty -= $this->items[$id]['qty'];
			}
		}

		//thêm sp đó lại vào Cart với thông số mới
		$giohang['price'] = $item->price * $giohang['qty'];
		$giohang['discountPrice'] = $item->promotion_price * $giohang['qty'];
		$this->items[$id] = $giohang;

		//Cập nhật lại Thông số của Cart
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = $this->totalPrice + $giohang['price'];
		$this->promtPrice = $this->promtPrice + $giohang['discountPrice'];
    }
    
	//xóa 1 so luong
	public function deleteByOne($id){ 
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']->price;
		$this->items[$id]['discountPrice'] -= $this->items[$id]['item']->promotion_price;
		$this->totalQty--;
		$this->totalPrice = ($this->totalPrice - $this->items[$id]['item']->price);
		$this->promtPrice = ($this->promtPrice - $this->items[$id]['item']->promotion_price);
		
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	
	//xóa sản phẩm khỏi cart
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		$this->promtPrice -= $this->items[$id]['discountPrice'];		
		unset($this->items[$id]);
	}
}
?>