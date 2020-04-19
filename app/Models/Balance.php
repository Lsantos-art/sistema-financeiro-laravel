<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    // deposit
    public function deposit(float $value) : Array
    {
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.', '');
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
             'type'         => 'I',
             'amount'       => $value,
             'total_before' => $totalBefore,
             'total_after'  => $this->amount,
             'date'         => date('Ymd')
        ]);

        if ($deposit && $historic){

            DB::commit();

            return [
                'success' => true,
                'message' => 'Recarga feita com sucesso!'
            ];
        } else {

            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Houve um erro durante a recarga'
            ];
        }
    }

    // withdraw
    public function withdrawn(float $value) : Array
    {
        if ($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Saldo insuficiente'
            ];

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $retirada = $this->save();

        $historic = auth()->user()->historics()->create([
             'type'         => 'O',
             'amount'       => $value,
             'total_before' => $totalBefore,
             'total_after'  => $this->amount,
             'date'         => date('Ymd')
        ]);

        if ($retirada && $historic){

            DB::commit();

            return [
                'success' => true,
                'message' => 'Saque feito com sucesso!'
            ];
        } else {

            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Houve um erro durante o saque...'
            ];
        }
    }

    // transfer
    public function transfer(float $value, User $sender) : Array
    {

        $mail = $sender->email;
        $mailName1 = $sender->name;
        $myMail = auth()->user()->email;
        $mailName2 = auth()->user()->name;

        if ($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Saldo insuficiente'
            ];

        DB::beginTransaction();

        // atualiza proprio saldo e historico
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 2, '.', '');
        $transfer = $this->save();

        $historic = auth()->user()->historics()->create([
             'type'                 => 'T',
             'amount'               => $value,
             'total_before'         => $totalBefore,
             'total_after'          => $this->amount,
             'date'                 => date('Ymd'),
             'user_id_transaction'  => $sender->id
        ]);

        // atualiza o saldo e historico do destinatário
        $senderBalance = $sender->balance()->firstOrCreate([]);
        $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount : 0;
        $senderBalance->amount += number_format($value, 2, '.', '');
        $transferSender = $senderBalance->save();

        $historicSender = $sender->historics()->create([
             'type'                 => 'I',
             'amount'               => $value,
             'total_before'         => $totalBeforeSender,
             'total_after'          => $senderBalance->amount,
             'date'                 => date('Ymd'),
             'user_id_transaction'  => auth()->user()->id
        ]);

        if ($transfer && $historic && $transferSender && $historicSender){

            DB::commit();

            return [
                'success' => true,
                'message' => 'Sucesso ao transferir, confira a confimação no seu email, confira a caixa de spans!',
                'mail'    => $mail,
                'myMail'    => $myMail,
                'mailName1'    =>$mailName1,
                'mailName2'    =>$mailName2
            ];
        }
            DB::rollBack();
    }
}
