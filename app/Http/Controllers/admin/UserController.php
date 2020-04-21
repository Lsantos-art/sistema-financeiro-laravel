<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\updateProfileFormRequest;
use App\Mail\newLaravelTips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use stdClass;

class UserController extends Controller
{
    //form Profile
    public function profile()
    {
        return view('site.profile.profile');
    }

    //Profile store update
    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if ($data['password'] != null)
                $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);


        $data['image'] = $user->image;
        $sufix = 'kek-bank';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $nameData = $user->id.$sufix;
            if ($user->image)
                $name = $nameData;
            else
                $name = $nameData;

            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";

            $upload = $request->image->storeAs('users-local', $nameFile, $options = [
                'ACL'           => 'public-read',
            ]);
            $url = Storage::url('users-local/'.$nameFile);
            $data['image'] = $url;
            $upload = $user->update($data);

            if (!$upload)
                    return redirect()
                                ->back()
                                ->with('error', 'Houve um ao alterar informações do perfil!');
        }


        $update = $user->update($data);

        if ($update)
                return redirect()
                        ->route('profile')
                        ->with('success', 'Sucesso ao alterar informações do perfil!');

                return redirect()
                        ->back()
                        ->with('error', 'Houve um ao alterar informações do perfil!');
    }
}
