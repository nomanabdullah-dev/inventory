<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('setting.index', compact('setting'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'com_name'          => 'required',
            'com_address'       => 'required',
            'com_email'         => 'required',
            'com_phone'         => 'required',
            'com_mobile'        => 'required',
            'com_city'          => 'required',
            'com_country'       => 'required',
            'com_zipcode'       => 'required',
            'com_logo'          => 'required|mimes:jpg,jpeg,png',
            ]);
            $data=array();
            $data['com_name']   = $request->com_name;
            $data['com_address']= $request->com_address;
            $data['com_email' ] = $request->com_email;
            $data['com_phone']  = $request->com_phone;
            $data['com_mobile'] = $request->com_mobile;
            $data['com_city']   = $request->com_city;
            $data['com_country']= $request->com_country;
            $data['com_zipcode']= $request->com_zipcode;

        if($request->file('com_logo')) {
            $image             = $request->file('com_logo');
            $ext               = strtolower($image->getClientOriginalExtension());
            $path              = 'images/setting/';
            $img_name          = time().'-'.rand(100,999).'.'.$ext;
            $img_url           = $path.$img_name;
            $moved             = $image->move($path,$img_name);
            if($moved) {
                $data['com_logo']= $img_url;
                $setting        = Setting::where('id', $id)->first();
                $old_photo      = $setting->com_logo;
                $old_photo_rmv  = unlink($old_photo);
                if($old_photo_rmv) {
                    Setting::where('id', $id)->update($data);
                    $notification  = [
                        'message'=>'Settings Updated Successfully!',
                        'alert-type'=> 'success'
                    ];
                    return redirect()->back()->with($notification);
                }
            }
        }else {
            Setting::where('id', $id)->update($data);
            $notification  = [
                'message'=>'Settings Updated Successfully!',
                'alert-type'=> 'success'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
