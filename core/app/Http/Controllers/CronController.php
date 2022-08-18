<?php

namespace App\Http\Controllers;

use App\GeneralSettings;
use App\Invest;
use App\IpTrack;
use App\Link;
use App\Transection;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;


class CronController extends Controller
{
    public function returnInterest()
    {
        $now = Carbon::now();
        $invest = Invest::whereStatus(1)->where('next_time','<=',$now)->get();
        $gnl = GeneralSettings::first();

        foreach ($invest as $data)
        {
            $user = User::find($data->user_id);
            $next_time = Carbon::parse($now)->addHours($data->hours);

            $in = Invest::find($data->id);
            $in->return_rec_time = $data->return_rec_time + 1;
            $in->next_time = $next_time;
            $in->last_time = $now;

            if ($data->period == '-1')
            {
                $in->status = 1;
                $in->save();

                $new_balance = $user->interest_balance + $data->interest;
                $user->interest_balance = $new_balance;

                Transection::create([
                    'trxid' => 'TRX-'.rand(1000,9999).uniqid(),
                    'user_id' => $user->id,
                    'des' => 'Interest Return '.$data->interest.' '.$gnl->currency.' Added on Your '.$gnl->interest_wallet_name.' Wallet',
                    'amount' => $data->interest,
                    'balance' => round($new_balance,4)
                ]);

                $user->save();

            }else{

                if ($data->capital_status == 1)
                {

                    if ($in->return_rec_time >= $data->period){
                        $bonus = $data->interest + $data->amount;
                        $new_balance = $user->interest_balance + $bonus;
                        $user->interest_balance = $new_balance;
                        $in->status = 0;
                    }else{
                        $bonus = 0;
                        $new_balance = $user->interest_balance + $data->interest;
                        $user->interest_balance = $new_balance;
                        $in->status = 1;
                    }

                    $in->save();



                    if ($bonus != 0){
                        Transection::create([
                            'trxid' => 'TRX-'.rand(1000,9999).uniqid(),
                            'user_id' => $user->id,
                            'des' => 'Interest Return '.$data->interest.' '.$gnl->currency.' Added on Your '.$gnl->interest_wallet_name.' Wallet',
                            'amount' => $data->interest,
                            'balance' => round($new_balance,4)
                        ]);
                    }else{
                        Transection::create([
                            'trxid' => 'TRX-'.rand(1000,9999).uniqid(),
                            'user_id' => $user->id,
                            'des' => 'Interest & Capital Return '.$bonus.' '.$gnl->currency.' Added on Your '.$gnl->interest_wallet_name.' Wallet',
                            'amount' => $data->interest,
                            'balance' => round($new_balance,4)
                        ]);
                    }


                    $user->save();



                }else{

                    if ($in->return_rec_time >= $data->period){
                        $in->status = 0;
                    }else{
                        $in->status = 1;
                    }

                    $in->save();

                    $new_balance = $user->interest_balance + $data->interest;
                    $user->interest_balance = $new_balance;

                    Transection::create([
                        'trxid' => 'TRX-'.rand(1000,9999).uniqid(),
                        'user_id' => $user->id,
                        'des' => 'Interest Return '.$data->interest.' '.$gnl->currency.' Added on Your '.$gnl->interest_wallet_name.' Wallet',
                        'amount' => $data->interest,
                        'balance' => round($new_balance,4)
                    ]);

                    $user->save();

                }

            }

        }



    }
    
   
}
