<?php

//cron
    use App\Http\Controllers\AdminAuth\LoginController;
    use App\Http\Controllers\FrontendController;
    use App\Http\Controllers\HomeController;
    use App\Pay\SiliconPay;
    use Illuminate\Support\Facades\Route;

    Auth::routes();
    Route::get('/cron', 'CronController@returnInterest');

    Route::get('hash', function () {
        return \Illuminate\Support\Facades\Hash::make('omodingmike@gmail.com');
    });

    // callback urls
    Route::post('/deposit-callback', [SiliconPay::class, 'callback'])->name('user.deposit.callback');
    Route::post('/withdraw-callback', [SiliconPay::class, 'withdrawCallback'])->name('user.withdraw.callback');

//Payment IPN
    Route::get('/ipnbtc', 'PaymentController@ipnBchain')->name('ipn.bchain');
    Route::get('/ipnblockbtc', 'PaymentController@blockIpnBtc')->name('ipn.block.btc');
    Route::get('/ipnblocklite', 'PaymentController@blockIpnLite')->name('ipn.block.lite');
    Route::get('/ipnblockdog', 'PaymentController@blockIpnDog')->name('ipn.block.dog');
    Route::post('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
    Route::post('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
    Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
    Route::post('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
    Route::post('/ipncoinpaybtc', 'PaymentController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
    Route::post('/ipncoinpayeth', 'PaymentController@ipnCoinPayEth')->name('ipn.coinPay.eth');
    Route::post('/ipncoinpaybch', 'PaymentController@ipnCoinPayBch')->name('ipn.coinPay.bch');
    Route::post('/ipncoinpaydash', 'PaymentController@ipnCoinPayDash')->name('ipn.coinPay.dash');
    Route::post('/ipncoinpaydoge', 'PaymentController@ipnCoinPayDoge')->name('ipn.coinPay.doge');
    Route::post('/ipncoinpayltc', 'PaymentController@ipnCoinPayLtc')->name('ipn.coinPay.ltc');
    Route::post('/ipncoin', 'PaymentController@ipnCoin')->name('ipn.coinpay');
    Route::post('/ipncoingate', 'PaymentController@ipnCoinGate')->name('ipn.coingate');

    Route::post('/ipnpaytm', 'PaymentController@ipnPayTm')->name('ipn.paytm');
    Route::post('/ipnpayeer', 'PaymentController@ipnPayEer')->name('ipn.payeer');
    Route::post('/ipnpaystack', 'PaymentController@ipnPayStack')->name('ipn.paystack');
    Route::post('/ipnvoguepay', 'PaymentController@ipnVoguePay')->name('ipn.voguepay');
//Payment IPN


    Route::get('/', [FrontendController::class, 'frontIndex']);
    Route::get('/knowledge-base', 'FrontendController@blogIndex')->name('fornt.blog');
    Route::get('/contact', 'FrontendController@contactIndex')->name('contact.front');
    Route::post('/contact', 'FrontendController@contactMailSend')->name('send.mail.contact');
    Route::get('/knowledge-base/{id}/{any}', 'FrontendController@blogDetail')->name('blog.detail');
    Route::get('/terms/{id}/{any}', 'FrontendController@termsIndex')->name('menu.index.front');
    Route::post('/subscriber', 'FrontendController@storeSubs')->name('subscriber.store');

//lang
    Route::get('/change-lang/{lang}', 'FrontendController@changeLang')->name('lang');

//admin panel
    Route::get('admin', 'AdminAuth\LoginController@showLoginForm');
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin-login');
    Route::post('admin/login', [LoginController::class, 'login']);
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('user.login');

    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

        Route::get('/home', 'AdminController@dashboard')->name('admin.home');
        Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

        //profile
        Route::get('/change/password', 'AdminController@changePassword')->name('admin.changePass');
        Route::post('/change/password', 'AdminController@updatePassword')->name('admin.changePassword');
        Route::get('/profile', 'AdminController@profile')->name('admin.profile');
        Route::post('/profile', 'AdminController@updateProfile')->name('admin.profile.post');

        //general
        Route::get('/general/settings', 'GeneralSettingController@GenSetting')->name('general.index');
        Route::get('/general/email', 'GeneralSettingController@GenSettingEmail')->name('email.index');
        Route::get('/general/sms', 'GeneralSettingController@GenSettingSms')->name('sms.index');
        Route::get('/general/contact', 'GeneralSettingController@GenSettingContact')->name('contact.index');
        Route::post('/general/settings', 'GeneralSettingController@UpdateGenSetting')->name('general.store');

        //logo
        Route::get('/logo/icon', 'GeneralSettingController@logoIndex')->name('logo.index');
        Route::post('/logo/icon', 'GeneralSettingController@UpdateLogoFavi')->name('manage-logo');

        //banner
        Route::get('/banner', 'GeneralSettingController@bannerIndex')->name('banner.index');
        Route::post('/banner', 'GeneralSettingController@Updatebanner')->name('banner.store');
        //bread
        Route::get('/bread', 'GeneralSettingController@breadIndex')->name('bread.index');
        Route::post('/bread', 'GeneralSettingController@Breadbanner')->name('bread.store');
        //static
        Route::get('/static', 'GeneralSettingController@staticIndex')->name('static.index');
        //about
        Route::get('/about', 'GeneralSettingController@aboutIndex')->name('about.index');

        //background
        Route::get('/background/image', 'GeneralSettingController@backgroundIndex')->name('background.image.index');
        Route::post('/background/image', 'GeneralSettingController@backgroundUpdate')->name('background.image.store');

        //footer
        Route::get('/footer', 'GeneralSettingController@footerIndex')->name('footer.index');
        //footer
        Route::get('/charges', 'GeneralSettingController@chargeIndex')->name('charge.index');


        Route::resources([
            //team
            'team'            => 'TeamController',
            //team
            'testimonial'     => 'TestimonialController',
            //social
            'social'          => 'SocialController',
            //service
            'service'         => 'ServiceController',
            //service
            'knowledge-base'  => 'BlogController',
            //service
            'terms'           => 'MenuController',
            //plan
            'plan'            => 'PlanController',
            //TIMES
            'time'            => 'TimeSettingController',
            //withdraw
            'withdraw_method' => 'WithdrawMethodController',
            //how it's work
            'how-it-work'     => 'HowItWorkController',
        ]);

        //advertise
//        Route::get('/banner/advertise', 'AdvertiseController@indexBanner')->name('advertise.banner');
//        Route::get('/script/advertise', 'AdvertiseController@indexScript')->name('advertise.script');
        //withdraw
        Route::get('/withdraw/request', 'AdminController@withdrawRequest')->name('withdraw.request');
        Route::get('/approved/withdraw', 'AdminController@withdrawApproved')->name('approved.withdraw');
        Route::get('/rejected/withdraw', 'AdminController@withdrawRejected')->name('rejected.withdraw');
        Route::post('/withdraw/approve', 'AdminController@withdrawApprove')->name('withdraw.approve');
        Route::post('/withdraw/reject', 'AdminController@withdrawReject')->name('withdraw.reject');
        Route::get('/withdraw/log', 'AdminController@withdrawLog')->name('withdraw.log');
        //support ticket
        Route::get('/supports', 'SupportTicketController@indexSupport')->name('support.admin.index');
        Route::get('/support/reply/{ticket}', 'SupportTicketController@adminSupport')->name('ticket.admin.reply');
        Route::post('/reply/{ticket}', 'SupportTicketController@adminReply')->name('store.admin.reply');
        //user
        Route::get('/active/users', 'AdminController@activeUserIndex')->name('active.user');
        Route::get('/email/verified/users', 'AdminController@emailVerified')->name('total.email.verified');
        Route::get('/sms/verified/users', 'AdminController@smsVerified')->name('total.sms.verified');
        Route::get('/all/users', 'AdminController@allUsers')->name('all.user');
        Route::get('/deactive/users', 'AdminController@deactiveUserIndex')->name('deactive.user');
        Route::get('/user/{id}', 'AdminController@singleUser')->name('user.view');
        Route::put('/user/update/{id}', 'AdminController@updateUser')->name('user.detail.update');
        Route::post('/add/sub/{id}', 'AdminController@addSubUser')->name('add.sub.user');
        Route::post('/mail/send/{id}', 'AdminController@sendMailUser')->name('send.mail.user');


        Route::get('/pending/deposit', 'AdminController@depositPennding')->name('pending.request.deposit');
        Route::get('/all/deposit/history', 'AdminController@depositHistory')->name('all.deposit.history');
        Route::get('/approve/deposit', 'AdminController@approvePennding')->name('approve.request.deposit');
        Route::get('/rejected/deposit', 'AdminController@RejectPennding')->name('reject.request.deposit');
        Route::post('/pending/deposit/{id}', 'AdminController@depositPenndingAction')->name('action.pending.request');

        Route::get('user/withdraw/{id}', 'AdminController@withdrawUser')->name('user.single.withdraw');
        Route::get('user/transaction/{id}', 'AdminController@withdrawTrans')->name('user.single.transaction');

        Route::get('user/search/email', 'AdminController@userSearchEmail')->name('user.search.email');
        Route::get('user/search/username', 'AdminController@userSearchUsername')->name('user.search.username');

        /*Manage Faq*/
        Route::get('faqs-create', 'FaqController@createFaqs')->name('faqs-create');
        Route::post('faqs-create', 'FaqController@storeFaqs')->name('faqs-create.post');
        Route::get('faqs', 'FaqController@allFaqs')->name('faqs-all');
        Route::get('faqs-edit/{id}', 'FaqController@editFaqs')->name('faqs-edit');
        Route::put('faqs-edit/{id}', 'FaqController@updateFaqs')->name('faqs-update');
        Route::delete('faqs-delete', 'FaqController@deleteFaqs')->name('faqs-delete');

        //Payment Gateway
        Route::get('/bank/gateway', 'AdminController@gatewayBankIndex')->name('bank.gateway.index');
        Route::post('/bank/gateway', 'AdminController@gatewayBankStore')->name('bank.gateway.store');

        Route::get('/gateway', 'AdminController@gateway')->name('admin.gateway');
        Route::put('/gateway-update/{gateway}', 'AdminController@gatewayUpdate')->name('admin.gateup');
        //e-pin
        Route::get('/manage-pin', 'AdminController@managePin')->name('manage-pin');
        Route::get('/used-pin', 'AdminController@UsedPin')->name('used-pin');
        Route::post('/manage-pin', 'AdminController@storePin')->name('storePin');
        //refer
        Route::get('/referral', 'AdminController@refIndex')->name('referral.index');
        Route::post('/referral', 'AdminController@refStore')->name('store.refer');
        //subscriber
        Route::get('/subscriber/list', 'AdminController@subsIndex')->name('subs.list');
        Route::delete('/subscriber/{id}', 'AdminController@subsDelete')->name('subs.delete');
        Route::get('/subscriber/send/mail', 'AdminController@subsMail')->name('subs.mail');
        Route::post('/subscriber/send/mail', 'AdminController@sendMail')->name('send.mail.subs');

        //language
        Route::get('/language/manager', 'LanguageController@langManage')->name('language-manage');
        Route::post('/language/manager', 'LanguageController@langStore')->name('language-manage-store');
        Route::delete('language-manage/{id}', 'LanguageController@langDel')->name('language-manage-del');
        Route::get('language-key/{id}', 'LanguageController@langEdit')->name('language-key');
        Route::put('key-update/{id}', 'LanguageController@langUpdate')->name('key-update');
        Route::post('language-manage-update/{id}', 'LanguageController@langUpdatepp')->name('language-manage-update');
        Route::post('language-import', 'LanguageController@langImport')->name('import_lang');

        //webTemplate
        Route::get('web/template', 'AdminController@webTemplateIndex')->name('template.index');
        Route::post('web/template', 'AdminController@webTemplateActive')->name('template.active');

        Route::get('title/subtitle', 'AdminController@titleSubtitle')->name('extra.title.subtitle');

    });

//admin password reset
    Route::get('admin-password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('admin-password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('user.password.reset');
    Route::post('/reset', 'AdminAuth\ResetPasswordController@reset')->name('reset.password');

//user panel

    Route::get('register/{username}', 'Auth\RegisterController@showRegistrationFormRef');
//Authorization


    Route::group(['prefix' => '/', 'middleware' => 'auth:web'], function () {


        Route::post('/sendemailver', 'FrontendController@sendemailver')->name('sendemailver');
        Route::post('/emailverify', 'FrontendController@emailverify')->name('emailverify');
        Route::post('/sendsmsver', 'FrontendController@sendsmsver')->name('sendsmsver');
        Route::post('/smsverify', 'FrontendController@smsverify')->name('smsverify');
        Route::get('/authorization', 'FrontendController@authorization')->name('authorization');
        Route::post('/g2fa-verify', 'FrontendController@verify2fa')->name('go2fa.verify');

        //2fa
        Route::get('/security/two/step', 'HomeController@twoFactorIndex')->name('two.factor.index');
        Route::post('/g2fa-create', 'HomeController@create2fa')->name('go2fa.create');
        Route::post('/g2fa-disable', 'HomeController@disable2fa')->name('disable.2fa');

        Route::post('/g2fa-check', 'HomeController@checkTwoFactor')->name('check_two_facetor');

        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::get('/transaction', 'HomeController@indexTrans')->name('user.transaction');
        //invest
        Route::get('/plans', [HomeController::class, 'indexPlan'])->name('user.plan.index');
        Route::post('/plans', 'HomeController@buyPlan')->name('user.buy.plan');
        Route::get('/interest/log', 'HomeController@interestLog')->name('user.interest.log');

        //balance transfer
        Route::get('/transfer', 'HomeController@indexTransfer')->name('user.balance.transfer');
        Route::post('/transfer', 'HomeController@balTransfer')->name('user.balance.transfer.post');
        Route::post('/search-user', 'HomeController@searchUser')->name('search.user');

        //withdraw
        Route::get('/withdraw', [HomeController::class, 'indexWithdraw'])->name('user.withdraw');
        Route::get('/withdraw/history', 'HomeController@historyWithdraw')->name('withdraw.history');

        Route::post('/withdraw', [HomeController::class, 'previewWithdraw'])->name('withdraw.preview.user');
        Route::post('/withdraw/confirmed/{id}', [HomeController::class, 'storeWithdraw'])->name('confirm.withdraw.store');
        //profile
        Route::get('/account', 'HomeController@accountIndex')->name('user.profile');
        Route::post('/account', 'HomeController@accountUpdate')->name('user.profile.update');
        Route::post('/update/password', 'HomeController@passwordChange')->name('change.password.user');

        //support
        Route::get('/support', 'SupportTicketController@ticketIndex')->name('support.index.customer');
        Route::get('/support/new', 'SupportTicketController@ticketCreate')->name('add.new.ticket');
        Route::post('/store/ticket', 'SupportTicketController@ticketStore')->name('ticket.store');
        Route::get('/ticket/close/{ticket}', 'SupportTicketController@ticketClose')->name('ticket.close');
        Route::get('/support/reply/{ticket}', 'SupportTicketController@ticketReply')->name('ticket.customer.reply');
        Route::post('/support/store/{ticket}', 'SupportTicketController@ticketReplyStore')->name('store.customer.reply');

        //deposit
        Route::post('/deposit-pay', [HomeController::class, 'deposit'])->name('user.balance');
        Route::post('/deposit-pay', [HomeController::class, 'deposit'])->name('user.deposit-post');
        Route::get('/deposit', [HomeController::class, 'deposit'])->name('user.deposit');
        Route::post('/deposit-data-insert', [HomeController::class, 'depositDataInsert'])->name('deposit.data-insert');
        Route::get('/deposit-preview', [HomeController::class, 'depositPreview'])->name('deposit.preview');
        Route::post('/deposit-confirm', [HomeController::class, 'depositConfirm'])->name('deposit.confirm');
        Route::get('/deposit-history', [HomeController::class, 'depositHistory'])->name('user.deposit.history');


        Route::get('/vogue/{trx}/{type}', 'PaymentController@purchaseVogue')->name('vogue');


        //bank-deposit
        Route::get('/deposit-bank', 'HomeController@depositBankPranto')->name('submit.bank.deposit.pranto');
        Route::post('/deposit-bank', 'HomeController@depositBankSubmit')->name('submit.bank.deposit');

        //pin-recharge
        Route::get('/pin-recharge', 'HomeController@pinRecharge')->name('pin.recharge');
        Route::post('/pin-recharge', 'HomeController@pinRechargePost')->name('pin.recharge.post');

        //referral commission
        Route::get('/referral/commission', 'HomeController@refComIndex')->name('user.referral.com');
        Route::get('/referral/', 'HomeController@refMy')->name('my.referral.com');


    });

//social login
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


//user forgot password
    Route::post('/forgot/password', 'FrontendController@forgotPass')->name('forget.password.user');
    Route::get('/reset/{token}', 'FrontendController@resetLink')->name('reset.passlink');
    Route::post('/reset/password', 'FrontendController@passwordReset')->name('reset.passw');
