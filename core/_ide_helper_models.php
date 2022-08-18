<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $mobile
 * @property string $image
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUsername($value)
 */
	class Admin extends \Eloquent {}
}

namespace App{
/**
 * App\Blog
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 */
	class Blog extends \Eloquent {}
}

namespace App{
/**
 * App\Deposit
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $gateway_id
 * @property string|null $amount
 * @property string|null $charge
 * @property string|null $usd_amo
 * @property string|null $btc_amo
 * @property string|null $btc_wallet
 * @property string|null $trx
 * @property int $status
 * @property int $try
 * @property string|null $image
 * @property string|null $detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Gateway|null $gateway
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereBtcAmo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereBtcWallet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereGatewayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereTrx($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereTry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUsdAmo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUserId($value)
 */
	class Deposit extends \Eloquent {}
}

namespace App{
/**
 * App\Epin
 *
 * @property int $id
 * @property int $user_id
 * @property string $amount
 * @property string $pin
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $pin_user
 * @method static \Illuminate\Database\Eloquent\Builder|Epin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Epin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Epin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Epin whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Epin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Epin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Epin wherePin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Epin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Epin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Epin whereUserId($value)
 */
	class Epin extends \Eloquent {}
}

namespace App{
/**
 * App\Faq
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 */
	class Faq extends \Eloquent {}
}

namespace App{
/**
 * App\Gateway
 *
 * @property int $id
 * @property string|null $main_name
 * @property string $name
 * @property string|null $minamo
 * @property string|null $maxamo
 * @property string|null $fixed_charge
 * @property string|null $percent_charge
 * @property string|null $rate
 * @property string|null $val1
 * @property string|null $val2
 * @property string|null $val3 paytm Website
 * @property string|null $val4 paytm Industry Type
 * @property string|null $val5 paytm Channel ID
 * @property string|null $val6 paytm Transaction URL
 * @property string|null $val7 paytm Transaction Status URL
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Deposit[] $deposit
 * @property-read int|null $deposit_count
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereFixedCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereMainName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereMaxamo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereMinamo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway wherePercentCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereVal1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereVal2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereVal3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereVal4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereVal5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereVal6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gateway whereVal7($value)
 */
	class Gateway extends \Eloquent {}
}

namespace App{
/**
 * App\GeneralSettings
 *
 * @property int $id
 * @property string|null $sitename
 * @property string|null $color
 * @property string|null $color_two
 * @property string|null $currency
 * @property string|null $currency_sym
 * @property int|null $email_notification
 * @property int|null $sms_notification
 * @property int|null $emailver
 * @property int|null $smsver
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property string|null $esender
 * @property string|null $emobile
 * @property string|null $emessage
 * @property string|null $smsapi
 * @property string|null $banner_title
 * @property string|null $banner_sub_title
 * @property string|null $service_title
 * @property string|null $service_sub_title
 * @property string|null $test_title
 * @property string|null $test_sub_title
 * @property string|null $blog_title
 * @property string|null $blog_sub_title
 * @property string|null $footer
 * @property string|null $footer_text
 * @property string|null $team_title
 * @property string|null $team_sub_title
 * @property string $fb_client_id
 * @property string $fb_client_secret
 * @property string $google_client_id
 * @property string $google_client_secret
 * @property int $social_login
 * @property string|null $faq_title
 * @property string|null $faq_sub_title
 * @property string|null $static_title_1
 * @property string|null $static_number_1
 * @property string|null $static_icon_1
 * @property string|null $static_title_2
 * @property string|null $static_number_2
 * @property string|null $static_icon_2
 * @property string|null $static_title_3
 * @property string|null $static_number_3
 * @property string|null $static_icon_3
 * @property string|null $about_title
 * @property string|null $about_detail
 * @property string|null $plan_title
 * @property string|null $plan_subtitle
 * @property string|null $deposit_wallet_name
 * @property string|null $interest_wallet_name
 * @property string|null $bal_trans_fixed_charge
 * @property string|null $bal_trans_per_charge
 * @property string $template_active
 * @property string|null $video_url
 * @property string|null $how_it_work_title
 * @property string|null $how_it_work_sub_title
 * @property string|null $referral_title
 * @property string|null $referral_sub_title
 * @property string|null $transaction_title
 * @property string|null $transaction_sub_title
 * @property string|null $payment_title
 * @property string|null $payment_sub_title
 * @property string|null $subscriber_title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereAboutDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereAboutTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereBalTransFixedCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereBalTransPerCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereBannerSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereBannerTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereBlogSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereBlogTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereColorTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereCurrencySym($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereDepositWalletName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereEmailNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereEmailver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereEmessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereEmobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereEsender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereFaqSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereFaqTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereFbClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereFbClientSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereFooterText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereGoogleClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereGoogleClientSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereHowItWorkSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereHowItWorkTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereInterestWalletName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings wherePaymentSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings wherePaymentTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings wherePlanSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings wherePlanTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereReferralSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereReferralTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereServiceSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereServiceTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSitename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSmsNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSmsapi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSmsver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSocialLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticIcon1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticIcon2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticIcon3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticNumber1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticNumber2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticNumber3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticTitle1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticTitle2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereStaticTitle3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereSubscriberTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereTeamSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereTeamTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereTemplateActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereTestSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereTestTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereTransactionSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereTransactionTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSettings whereVideoUrl($value)
 */
	class GeneralSettings extends \Eloquent {}
}

namespace App{
/**
 * App\HowItWork
 *
 * @property int $id
 * @property string $icon
 * @property string $title
 * @property string $detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork query()
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HowItWork whereUpdatedAt($value)
 */
	class HowItWork extends \Eloquent {}
}

namespace App{
/**
 * App\Invest
 *
 * @property int $id
 * @property int $user_id
 * @property int $plan_id
 * @property string $amount
 * @property string $interest
 * @property int $period
 * @property string $hours
 * @property string $time_name
 * @property int $return_rec_time
 * @property string $next_time
 * @property string|null $last_time
 * @property int $status
 * @property int $capital_status 1 = YES & 0 = NO
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Plan $plan
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Invest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereCapitalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereLastTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereNextTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereReturnRecTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereTimeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invest whereUserId($value)
 */
	class Invest extends \Eloquent {}
}

namespace App{
/**
 * App\Language
 *
 * @property int $id
 * @property string|null $icon
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 */
	class Language extends \Eloquent {}
}

namespace App{
/**
 * App\Menu
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $ref_id
 * @property string $name
 * @property string $email
 * @property string|null $mobile
 * @property string|null $country
 * @property string $username
 * @property string $password
 * @property string|null $balance
 * @property string $interest_balance
 * @property int $emailv
 * @property int $smsv
 * @property int $status
 * @property string|null $vsent
 * @property string|null $vercode
 * @property string|null $remember_token
 * @property string|null $provider
 * @property string|null $provider_id
 * @property int $tauth
 * @property int $tfver
 * @property string|null $secretcode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInterestBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecretcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSmsv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTauth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTfver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVercode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVsent($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App{
/**
 * App\Plan
 *
 * @property int $id
 * @property string $name
 * @property string $minimum
 * @property string $maximum
 * @property string $fixed_amount
 * @property string $interest
 * @property int $interest_status 1 = '%' / 0 ='currency'
 * @property string $times
 * @property int $status
 * @property int $capital_back_status
 * @property int $lifetime_status
 * @property string $repeat_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCapitalBackStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereFixedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereInterestStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereLifetimeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereMaximum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereMinimum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereRepeatTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereTimes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereUpdatedAt($value)
 */
	class Plan extends \Eloquent {}
}

namespace App{
/**
 * App\Referral
 *
 * @property int $id
 * @property int $level
 * @property string $percent
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Referral newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Referral newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Referral query()
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Referral whereUpdatedAt($value)
 */
	class Referral extends \Eloquent {}
}

namespace App{
/**
 * App\Service
 *
 * @property int $id
 * @property string $icon
 * @property string $title
 * @property string $detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App{
/**
 * App\Social
 *
 * @property int $id
 * @property string $icon
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Social newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Social newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Social query()
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereUpdatedAt($value)
 */
	class Social extends \Eloquent {}
}

namespace App{
/**
 * App\Subscriber
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereUpdatedAt($value)
 */
	class Subscriber extends \Eloquent {}
}

namespace App{
/**
 * App\SupportTicket
 *
 * @property int $id
 * @property string $ticket
 * @property string $subject
 * @property int $user_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TicketComment[] $ticket_comment
 * @property-read int|null $ticket_comment_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereTicket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereUserId($value)
 */
	class SupportTicket extends \Eloquent {}
}

namespace App{
/**
 * App\Team
 *
 * @property int $id
 * @property string $name
 * @property string $designation
 * @property string $image
 * @property string $fb_link
 * @property string $ln_link
 * @property string $tw_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereFbLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereLnLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereTwLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 */
	class Team extends \Eloquent {}
}

namespace App{
/**
 * App\Testimonial
 *
 * @property int $id
 * @property string $name
 * @property string $company
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereUpdatedAt($value)
 */
	class Testimonial extends \Eloquent {}
}

namespace App{
/**
 * App\TicketComment
 *
 * @property int $id
 * @property string $ticket_id
 * @property int $type
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\SupportTicket|null $ticket
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketComment whereUpdatedAt($value)
 */
	class TicketComment extends \Eloquent {}
}

namespace App{
/**
 * App\TimeSetting
 *
 * @property int $id
 * @property string $name
 * @property string $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSetting whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeSetting whereUpdatedAt($value)
 */
	class TimeSetting extends \Eloquent {}
}

namespace App{
/**
 * App\Transection
 *
 * @property int $id
 * @property string|null $trxid
 * @property int $user_id
 * @property string $amount
 * @property string $balance
 * @property string $des
 * @property string $charge
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transection query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereDes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereTrxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transection whereUserId($value)
 */
	class Transection extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int|null $ref_id
 * @property string $name
 * @property string $email
 * @property string|null $mobile
 * @property string|null $country
 * @property string $username
 * @property string $password
 * @property string|null $balance
 * @property string $interest_balance
 * @property int $emailv
 * @property int $smsv
 * @property int $status
 * @property string|null $vsent
 * @property string|null $vercode
 * @property string|null $remember_token
 * @property string|null $provider
 * @property string|null $provider_id
 * @property int $tauth
 * @property int $tfver
 * @property string|null $secretcode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Epin[] $pin_user
 * @property-read int|null $pin_user_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInterestBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecretcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSmsv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTauth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTfver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVercode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVsent($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Withdraw
 *
 * @property int $id
 * @property string $withdraw_id
 * @property int $user_id
 * @property string $amount
 * @property string $charge
 * @property int $method_id
 * @property string $method_cur_amount
 * @property string $processing_time
 * @property string $detail
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @property-read \App\WithdrawMethod $withdraw_method
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw query()
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereMethodCurAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereProcessingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Withdraw whereWithdrawId($value)
 */
	class Withdraw extends \Eloquent {}
}

namespace App{
/**
 * App\WithdrawMethod
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $min_amo
 * @property string $max_amo
 * @property string $chargefx
 * @property string $chargepc
 * @property string $rate
 * @property string $processing_day
 * @property string $currency
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereChargefx($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereChargepc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereMaxAmo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereMinAmo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereProcessingDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereUpdatedAt($value)
 */
	class WithdrawMethod extends \Eloquent {}
}

