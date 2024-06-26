<?php


namespace App\Modules\Order\Repositories;


use App\Models\Order;

class OrderServices implements OrderRepositoryInterface
{
    public function allOrder(){
      
        return Order::orderBy('created_at','desc')
                    ->get()->map->format();
    }
    public function orderByUserId($user_id){
        return Order::where('user_id',$user_id)
            ->orderBy('created_at','desc')
            ->paginate(5);
            // ->get();
    }
    public function orderByFarmId($farm_id){
        return Order::where('farm_id',$farm_id)
            ->orderBy('created_at','desc')
            ->paginate(5);
            // ->get();
    }

    public function getFarmorderByStatus($farm_id=null,$status=null){
        if($farm_id!=null){
            return Order::where('farm_id',$farm_id)
                ->orderBy('created_at','desc')
                ->where('status',$status)
                ->get()
                ->map->format($status);
        }
        return Order::orderBy('created_at','desc')
            ->where('status',$status)
            ->get()
            ->map->format($status);

    }

    public  function getUserOrderByStatus($user_id,$staus=null){
          return Order::where('user_id',$user_id)
                        ->whereHas('rel_orderItems',function ($query)use($staus){
                            $query->where('remarks',$staus);
                        })->orderBy('orders.created_at', 'DESC')->get()
                        ->map->format($staus);
    }

    public function changeStatus($order_id,$status){
       //change order status
        Order::find($order_id)->update([
            'status'=>$status
        ]);
//        change order item status
        Order::find($order_id)->rel_orderItems()->update(['remarks'=>$status]);
        return true;

    }


    //for api purpose 

    
      public function allOrderByUserId($user_id){
        return Order::where('user_id',$user_id)
            ->orderBy('created_at','desc')
            ->paginate(10);
            // ->get();
      }

      public function allOrderByFarmId($farm_id){
        return Order::where('farm_id',$farm_id)
            ->orderBy('created_at','desc')
            ->paginate(10);
            // ->get();
    }

}
