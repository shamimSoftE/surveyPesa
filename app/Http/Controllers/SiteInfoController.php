<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use App\Models\Order;
use App\Models\OrderMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SiteInfoController extends Controller
{
    public function index()
    {
        $siteInfo = SiteInfo::all();
        $site = SiteInfo::get()->first();

        if(count($siteInfo) != 0)
        {
            return view('Back.siteInfo.side-info-edit',compact('site'));
        }
        else{
            return view('Back.siteInfo.side-info-add');
        }
    }

    public function create()
    {
        return view('Back.siteInfo.side-info-add');
    }

    protected function Img($request)
    {
        if($request->hasFile('logo')){

            $img_tmp = $request->file('logo');

            if ($img_tmp->isValid()){
//                $img_exten = $img_tmp->getClientOriginalExtension();
                $img_name = $img_tmp->getClientOriginalName();
                $img_path = public_path('Back/images/logo');
                $img_tmp->move($img_path,$img_name);
                return $img_name;
            }
        }
    }

    protected function UrlLogo($request)
    {
        if($request->hasFile('url_logo')){

            $img_tmp = $request->file('url_logo');

            if ($img_tmp->isValid()){
//                $img_exten = $img_tmp->getClientOriginalExtension();
                $img_name = $img_tmp->getClientOriginalName();
                $img_path = public_path('Back/images/logo');
                $img_tmp->move($img_path,$img_name);
                return $img_name;
            }
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'site_name' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'contact_number' => 'required',
            'b_merchant_number' => 'required',

            'n_merchant_number' => 'required',
            'r_merchant_number' => 'required',
            'e_cab' => 'required',
            'bin' => 'required',

            'email' => 'required',
//           'email' => 'required',
//           'email' => 'required',
            'logo' => 'required',
            'url_logo' => 'required',
        ]);

        $logo = $this->Img($request);
        $url_logo = $this->UrlLogo($request);

        SiteInfo::create([
            'site_name' => $request->site_name,
            'wcu' => $request->wcu,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'b_merchant_number' => $request->b_merchant_number,

            'n_merchant_number' => $request->n_merchant_number,
            'r_merchant_number' => $request->r_merchant_number,
            'e_cab' => $request->e_cab,
            'bin' => $request->bin,


            'hot_number' => $request->hot_number,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,
            'logo' => $logo,
            'url_logo' => $url_logo,
        ]);

        return back()->with('sms','Information Created');
    }

    public function update(Request $request,SiteInfo $site)
    {

        $img_tmp = $request->file('logo');
        $Url_logo = $request->file('url_logo');

        if ( $Url_logo)
        {

            $img_url = $Url_logo->getClientOriginalName();
            $img_path = public_path('Back/images/logo');
            $Url_logo->move($img_path,$img_url);
            $old_img = $site->url_logo;

            if(file_exists($old_img)){
                unlink($old_img);
            }

            $site->url_logo = $img_url;
            $site->address = $request->address;
            $site->site_name = $request->site_name;
            $site->wcu = $request->wcu;


            $site->contact_number = $request->contact_number;
            $site->b_merchant_number = $request->b_merchant_number;


            $site->r_merchant_number = $request->r_merchant_number;
            $site->n_merchant_number = $request->n_merchant_number;
            $site->e_cab = $request->e_cab;
            $site->bin = $request->bin;

            $site->email = $request->email;
            $site->facebook = $request->facebook;
            $site->twitter = $request->twitter;
            $site->youtube = $request->youtube;
            $site->instagram = $request->instagram;
            $site->hot_number = $request->hot_number;
            $site->linkedin = $request->linkedin;
        }
        elseif ($img_tmp)
        {
            $img_name = $img_tmp->getClientOriginalName();
            $img_path = public_path('Back/images/logo');
            $img_tmp->move($img_path,$img_name);
            $old_img = $site->logo;

            if(file_exists($old_img)){
                unlink($old_img);
            }

            $site->logo = $img_name;
//            $site->header_service_logo = $img_service;
            $site->address = $request->address;
            $site->site_name = $request->site_name;
            $site->wcu = $request->wcu;

            $site->contact_number = $request->contact_number;
            $site->b_merchant_number = $request->b_merchant_number;


            $site->r_merchant_number = $request->r_merchant_number;
            $site->n_merchant_number = $request->n_merchant_number;
            $site->e_cab = $request->e_cab;
            $site->bin = $request->bin;
            $site->email = $request->email;
            $site->facebook = $request->facebook;
            $site->twitter = $request->twitter;
            $site->youtube = $request->youtube;
            $site->instagram = $request->instagram;
            $site->hot_number = $request->hot_number;
            $site->linkedin = $request->linkedin;
        }
        else{
            $site->address = $request->address;
            $site->site_name = $request->site_name;
            $site->wcu = $request->wcu;

            $site->contact_number = $request->contact_number;
            $site->b_merchant_number = $request->b_merchant_number;


            $site->r_merchant_number = $request->r_merchant_number;
            $site->n_merchant_number = $request->n_merchant_number;
            $site->e_cab = $request->e_cab;
            $site->bin = $request->bin;
            $site->email = $request->email;
            $site->facebook = $request->facebook;
            $site->twitter = $request->twitter;
            $site->youtube = $request->youtube;
            $site->instagram = $request->instagram;
            $site->hot_number = $request->hot_number;
            $site->linkedin = $request->linkedin;
        }

        $site->save();
        return back()->with('sms','Information Updated');
    }

    public function destroy($id)
    {
        $info = SiteInfo::find($id);
        $info->delete();
        return back()->with('sms', 'Information Deleted');
    }
    public function active($id)
    {
        $info = SiteInfo::find($id);
        $info->status = '1';
        $info->save();
        return back()->with('sms', 'Information Activated');
    }

    public function hide($id)
    {
        $info = SiteInfo::find($id);
        $info->status = '0';
        $info->save();
        return back()->with('sms', 'Information Deactivated');
    }


    public function withdraw(){

        $s_seller_orders_completed = OrderMaster::where('status','Completed')->whereNotNull('seller_id')->select( DB::raw('(product_price * product_qty) as total'))->get();

        $s_orders_price_with_commission = OrderMaster::where('status','Completed')->whereNotNull('seller_id')->select( DB::raw('( product_price - ((product_price * product_qty) / 100) * commission) as after_commission_product_price'))->get();

        $seller_orders_completed = $s_seller_orders_completed->sum('total');
        $seller_orders_completed_with_com = $s_orders_price_with_commission->sum('after_commission_product_price');
        $admin_orders_not_completed_sum = Order::where('status','!=','Completed')->where('seller_id',null)->sum('grand_total');
        $admin_orders_completed_sum = Order::where('status','Completed')->where('seller_id',null)->sum('grand_total');

        $withdraw_success = DB::table('withdraw')->where('status',1)->sum('amount');
        $withdraw_panding = DB::table('withdraw')->where('status',0)->sum('amount');

        $get_withdraw_data = DB::table('withdraw')->get();


        return view('Back.withdraw.admin_withdraw',compact('seller_orders_completed','seller_orders_completed_with_com','admin_orders_not_completed_sum','admin_orders_completed_sum','withdraw_success','withdraw_panding','get_withdraw_data'));



    }

    public function wsuccess($id)
    {
        date_default_timezone_set('Asia/Dhaka');
        $update_Time = Carbon::now()->toDateTimeString();
        $withdraw =  DB::table('withdraw')->find($id);
        if(!empty($withdraw)){
            DB::table('withdraw')->where('id', $id) ->update(['status' => 1,'updated_at' => $update_Time]);
        }else{
            return back()->with('sms', 'Withdraw Payment Failed');
        }

        return back()->with('sms', 'Withdraw Payment Success');
    }

}
