<?php

    namespace App\Pay;

    use App\Deposit;
    use App\GeneralSettings;
    use App\Transection;
    use App\User;
    use App\Withdraw;
    use App\WithdrawMethod;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Str;

    class SiliconPay
    {
        const SILICON_PAY_KEY = '33a307f90ae7e0f9a9e003476485393f';
        const SILICON_PAY_SECRETE_KEY = 353737;

        public static function pay($amount, $reference)
        {
            $currency = 'UGX';
            $url      = 'https://silicon-pay.com/process_payments';
//            $call_back_url = 'https://34a7-154-226-60-30.in.ngrok.io/africapay2/deposit-callback';
            $call_back_url = 'https://africapay.site/deposit-callback';
            $user          = User::find(auth()->id());
            $payload       = [
                'req'            => 'mobile_money',
                'currency'       => $currency,
                'phone'          => $user->mobile,
                'encryption_key' => self::SILICON_PAY_KEY,
                'amount'         => $amount,
                'emailAddress'   => $user->email,
                'call_back'      => $call_back_url,
                'txRef'          => $reference
            ];
            return Http::post($url, $payload)->json();
//            return json_decode(Http::post($url, $payload)->json(), true);

        }

        public function callback(Request $request)
        {
            info($request);
            if ($this->isAuthentic()) {
                if ($request->status === 'successful') {
                    Deposit::where('trx', $request->txRef)
                        ->update([
                            'status' => 1,
                        ]);

                    $deposit       = Deposit::where('trx', $request->txRef)->first();
                    $user          = User::find($deposit->user_id);
                    $user->balance = $user->balance + $deposit->amount;
                    $user->save();
                }
            } else {
                info('not from silicon pay');
            }

        }

        public function isAuthentic()
        : bool
        {
            $body        = file_get_contents('php://input');
            $dataObject  = json_decode($body);
            $reference   = $dataObject->txRef;
            $secure_hash = $dataObject->secure_hash;
            $secrete_key = self::SILICON_PAY_SECRETE_KEY;

            // Generate a secure hash on your end.
            $cipher         = 'aes-256-ecb';
            $generated_hash = openssl_encrypt($reference, $cipher, $secrete_key);
            // authenticating the callback data
            if ($generated_hash == $secure_hash) {
                return true;
            } else {
                return false;
            }
        }

        public function withdraw($amount, $id)
        {
            $txRef    = Str::random(16);
            $user     = User::find(auth()->id());
            $email    = $user->email;
            $currency = 'UGX';
            $phone    = $user->mobile;
//            $url            = 'https://silicon-pay.com/process_payments';
            $url            = 'https://silicon-pay.com/api_withdraw';
            $encryption_key = self::SILICON_PAY_KEY;
            $secrete_key    = self::SILICON_PAY_SECRETE_KEY;
//            $call_back_url  = 'https://dde3-154-226-60-30.in.ngrok.io/africapay2/withdraw-callback';
            $call_back_url   = 'https://africapay.site/withdraw-callback';
            $withdraw_method = WithdrawMethod::findOrFail($id);
            $our_charge      = ($amount * $withdraw_method->chargepc) / 100;
            Withdraw::create([
                'amount'            => $amount,
                'charge'            => round($our_charge, 4),
                'method_id'         => $withdraw_method->id,
                'processing_time'   => $withdraw_method->processing_day,
                'detail'            => 'Mobile money',
                'withdraw_id'       => $txRef,
                'user_id'           => $user->id,
                'method_cur_amount' => $our_charge,
                'status'            => 0,
            ]);
            $token     = self::token();
            $data_req  = [
                'req'            => 'mm',
                'currency'       => $currency,
                'txRef'          => $txRef,
                'encryption_key' => $encryption_key,
                'amount'         => $amount,
                'emailAddress'   => $email,
                'call_back'      => $call_back_url,
                'phone'          => $phone,
                'reason'         => 'Payout request',
                'debit_wallet'   => 'UGX'
            ];
            $msg       = hash('sha256', $encryption_key) . $phone;
            $signature = hash_hmac('sha256', $msg, $secrete_key);
            $headers   = [
                'Authorization: Bearer ' . $token,
                'signature:' . $signature,
                'Content-Type: application/json'
            ];

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'POST',
                CURLOPT_POSTFIELDS     => json_encode($data_req),
                CURLOPT_HTTPHEADER     => $headers,
            ]);

            $response = curl_exec($curl);
            curl_close($curl);
//            return $response;

            return json_decode($response, true);
        }

        public function token()

        {
            $token_url      = 'https://silicon-pay.com/generate_token';
            $secrete_key    = self::SILICON_PAY_SECRETE_KEY;
            $encryption_key = self::SILICON_PAY_KEY;
            $secrete_hash   = hash('sha512', $secrete_key);
            $headers        = [
                'encryption_key: ' . $encryption_key,
                'secrete_hash: ' . $secrete_hash,
                'Content-Type: application/json'
            ];
            $curl           = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL            => $token_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'GET',
                CURLOPT_HTTPHEADER     => $headers
            ]);
            $response = curl_exec($curl);
            curl_close($curl);
            return json_decode($response, true)['token'];

        }

        public function withdrawCallback(Request $request)
        {
            info('withdraw callback');
            info($request);
            if ($this->isAuthentic()) {
                if (strtolower($request->status) == strtolower('successful')) {
                    $withdraw         = Withdraw::where('withdraw_id', $request->txRef)->first();
                    $withdraw->status = 1;
                    $withdraw->save();
                    $user                   = User::find($withdraw->user_id);
                    $new_balance            = $user->interest_balance - $withdraw->amount;
                    $user->interest_balance = round($new_balance, 4);
                    $user->save();
                    info($user);
                    Transection::create([
                        'user_id' => $user->id,
                        'des'     => 'Withdraw Via Mobile Money',
                        'amount'  => '-' . $request->amount,
                        'balance' => round($new_balance, 4)
                    ]);

                    $general = GeneralSettings::first();
                    $message = 'Welcome! Your Withdraw request is success, Please wait for processing days.Your Withdraw amount : ' . $request->amount . $general->currency . ' Your current balance is ' . $new_balance . $general->currency . ' .';

                    send_email($user['email'], $user['name'], 'Successfully Withdraw', $message);
                    send_sms($user['mobile'], $message);

                } else {
                    info('successful');
                }
            } else {
                info('data from wrong source');
            }
        }

    }
