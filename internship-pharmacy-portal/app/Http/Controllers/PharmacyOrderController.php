<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacyOrderResource;
use App\Models\PharmacyCancellationDetail;
use App\Models\PharmacyCancellationReason;
use App\Models\PharmacyOrder;
use App\Models\PharmacyOrderImage;
use App\Models\PharmacyOrderItem;
use App\Models\PharmacyOrderStatus;
use App\Models\PharmacyOrderUser;
use App\Models\PharmacyOrderUserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PharmacyOrderController extends Controller
{

    public function get_pharmacy_order(Request $request) {
        if($request->has('order_id')){
            if (PharmacyOrder::where('order_number', $request->input('order_id'))->exists()){
                return new PharmacyOrderResource(PharmacyOrder::where('order_number', $request->input('order_id'))->first());
            }
            else return response()->json(['message' => 'There is no record of this order'], 422);
        }
        else return response()->json(['message' => 'Wrong request structure'], 400);
    }

    private function create_update_user_and_addresses($user_details, $order_address_global_id){

        // If user is already in the database, update their data
        $user = PharmacyOrderUser::where('user_global_id', $user_details['user_global_id'])->first();
        if (!$user){
            $user = PharmacyOrderUser::create($user_details);
        }
        else $user->update($user_details);

        // If address is already in the database, update its data
        $order_address = null;
        foreach($user_details['addresses'] as $address_details){

            $address = PharmacyOrderUserAddress::where('address_global_id', $address_details['address_global_id'])->first();
            if (!$address){
                $address = $user->pharmacy_order_user_addresses()->create($address_details);
            }
            else $address->update($address_details);

            if ($order_address_global_id == $address_details['address_global_id'])
            {
                $order_address = $address;
            }
        }

        return [
            'user' => $user,
            'address' => $order_address
        ];
    
    }

    private function create_status($status_name){
        // If the given status isn't in the statuses table, add it
        $status = PharmacyOrderStatus::where('name', $status_name)->first();
        if (!$status) $status = PharmacyOrderStatus::create(['name' => $status_name]);
        return $status;
    }

    private function update_order_details(&$order, $order_details){

        $returned_models = $this->create_update_user_and_addresses($order_details['user-details'], $order_details['order-address']['address_global_id']);

        $order->fill([
            'user_address_id' => $returned_models['address']->id,
            'user_id' => $returned_models['user']->id,
            'status_id' => $this->create_status($order_details['order-status'])->id
        ]);
        $order->fill($order_details['financial-details']);
        
        $order->fill($order_details['order-details'])->save();

    }

    private function nuke_order_associations($order){

        PharmacyOrderImage::where('pharmacy_order_id', $order->id)->delete();
        PharmacyOrderItem::where('pharmacy_order_id', $order->id)->delete();
        $cancellation_detail = PharmacyCancellationDetail::where('pharmacy_order_id', $order->id)->first();
        if($cancellation_detail){
            DB::table('cancellation_detail_reason')->where('detail_id', $cancellation_detail->id)->delete();
            $cancellation_detail->delete();
        }

    }

    private function add_order_associations($order, $images_urls_list, $items_details_list, $cancellation_note, $cancellation_reasons){

        // Adding the order images
        foreach($images_urls_list as $image_url){
            $order->pharmacy_order_images()->create(['image_url' =>  $image_url]);
        }

        // Adding the order items
        $order->pharmacy_order_items()->createMany($items_details_list);

        // Adding a cancellation detail if the status is cancelled
        if($order->status_id == 4){
            $cancellation_detail = $order->pharmacy_cancellation_detail()->create(['cancellation_note' =>  $cancellation_note]);
            // If the given cancellation reason isn't in the cancellation reasons table, add it
            foreach($cancellation_reasons as $reason_name){
                $reason = PharmacyCancellationReason::where('name', $reason_name)->first();
                if (!$reason){
                    $reason = PharmacyCancellationReason::create(['name' => $reason_name]);
                }
                // Attach the cancellation reasons to the details
                $cancellation_detail->pharmacy_cancellation_reasons()->attach($reason);
            }
        }
    }

    public function create_from_scratch(Request $request){

        try{

            $order_details = $request->input('data')['order'];

            if (PharmacyOrder::where('order_number', $order_details['order-details']['order_number'])->exists()){
                return response()->json(['message' => "This pharmacy order already exists"], 422);
            }

            // Creating the new order
            $order = new PharmacyOrder;

            $this->update_order_details($order, $order_details);

            $this->add_order_associations(
                $order,
                $order_details['order-images'],
                $order_details['order-items'],
                $order_details['cancellation-note'],
                $order_details['cancellation-reasons']);

            return response()->json(['message' => "Pharmacy order created successfully with id " . $order->id], 200);
        }
        catch (\Exception $e) {
            Log::error("Error in line " . $e->getLine() . ' of file ' . $e->getFile() .' -> ' . $e->getMessage());
            return response()->json(['message' => 'Wrong request structure'], 400);
        }
    }

    public function update_order(Request $request){

        try{

            $order_details = $request->input('data')['order'];

            $order = PharmacyOrder::where('order_number', $order_details['order-details']['order_number'])->first();

            if (!$order){
                return response()->json(['message' => "This pharmacy order does not exist"], 422);
            }

            $this->update_order_details($order, $order_details);

            $this->nuke_order_associations($order);

            $this->add_order_associations(
                $order,
                $order_details['order-images'],
                $order_details['order-items'],
                $order_details['cancellation-note'],
                $order_details['cancellation-reasons']);

            return response()->json(['message' => "Pharmacy order with id " . $order->id . " updated successfully"], 200);
        }
        catch (\Exception $e) {
            Log::error("Error in line " . $e->getLine() . ' of file ' . $e->getFile() .' -> ' . $e->getMessage());
            return response()->json(['message' => 'Wrong request structure'], 400);
        }
    }
}
