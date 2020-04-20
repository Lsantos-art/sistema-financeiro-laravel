<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MoneyValidationFormRequest;
use App\Mail\newLaravelTips;
use App\Mail\senderConfirm;
use App\Models\Balance;
use App\Models\Historic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BalanceController extends Controller
{
   private $totalPage = 6;

   //index balance
   public function index()
   {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
   }

   //form deposit
   public function deposit()
   {
       return view('admin.balance.deposit');
   }

   //deposit store
   public function depositStore(MoneyValidationFormRequest $request, Balance $balance)
   {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if ($response['success'])
            return redirect()
                        ->route('balance')
                        ->with('success', $response['message']);

            return redirect()
                        ->back()
                        ->with('error', $response['message']);
    }


    //withdrawn form

    public function withdrawn()
   {
       $balance = auth()->user()->balance->amount;
       return view('admin.balance.withdrawn', compact('balance'));
   }

   //withdrawn Store
   public function withdrawnStore(MoneyValidationFormRequest $request)
   {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdrawn($request->value);

        if ($response['success'])
            return redirect()
                        ->route('balance')
                        ->with('success', $response['message']);

            return redirect()
                        ->back()
                        ->with('error', $response['message']);
   }

   //transfer form
   public function transfer()
   {
       return view('admin.balance.transfer');
   }

   //transfer-confirm
   public function transferConfirm(Request $request, User $user)
   {
        $balance = auth()->user()->balance->amount;
       if (!$sender = $user->getSender($request->sender))
                return redirect()
                            ->back()
                            ->with('error', 'Usuário não encontrado!');

        if ($sender->id === auth()->user()->id)
                return redirect()
                            ->back()
                            ->with('error', 'Que feio servidor, você não pode comer biscoitos!');

        return view('admin.balance.transfer-confirm', compact('sender', 'balance'));
   }

   //transfer store
   public function transferStore(MoneyValidationFormRequest $request, User $user)
   {
    $userBalance = auth()->user()->balance->amount;
    if ($request->value > $userBalance)
                    return redirect()
                            ->route('transfer')
                            ->with('error', 'Que feio servidor, você não pode comer biscoitos!');

    if(!$sender = $user->find($request->sender_id))
                   return redirect()
                            ->route('transfer')
                            ->with('error', 'Houve um erro interno!');

    $balance = auth()->user()->balance()->firstOrCreate([]);
    $response = $balance->transfer($request->value, $sender);

    if ($response['success'])
        $mail = $response['mail'];
        $myMail = $response['myMail'];
        $mailName1 = $response['mailName1'];
        $mailName2 = $response['mailName2'];
        //return new newLaravelTips($mail, $myMail, $mailName1, $mailName2);
        // return new senderConfirm($mail, $myMail, $mailName1, $mailName2);
        Mail::send(new newLaravelTips($mail, $myMail, $mailName1, $mailName2));
        Mail::send(new senderConfirm($mail, $myMail, $mailName1, $mailName2));
        return redirect()
                    ->route('balance')
                    ->with('success', $response['message']);

        return redirect()
                    ->route('transfer')
                    ->with('error', $response['message']);
   }

   //historic index
   public function historic(Historic $historic)
   {
       $historics = auth()->user()
                          ->historics()
                          ->with(['userSender'])
                          ->latest()->paginate($this->totalPage);

       $types = $historic->type();

       return view('admin.balance.historics', compact('historics', 'types'));
   }

   public function searchHistoric(Request $request, Historic $historic)
   {
        $dataForm = $request->except('_token');

        $historics = $historic->search($dataForm, $this->totalPage);
        $types = $historic->type();
        return view('admin.balance.historics', compact('historics', 'types', 'dataForm'));
   }
}
