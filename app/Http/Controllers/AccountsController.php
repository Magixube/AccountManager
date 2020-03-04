<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account_info;

class AccountsController extends Controller
{
    public function all()
    {
        return account_info::all();
    }

    public function store()
    {
        request()->validate([
            'newAccount' => 'required',
            'newName' => 'required',
            'newSex' => 'required',
            'newBirthday' => 'required',
            'newEmail' => 'required'
        ]);
        $account = new account_info();

        $account->account = request('newAccount');
        $account->name = request('newName');
        $account->sex = request('newSex');
        $account->birthday = request('newBirthday');
        $account->email = request('newEmail');
        $account->remark = request('newRemark');

        $account->save();

        return redirect('/');

    }

    public function update()
    {
        request()->validate([
            'editAccount' => 'required',
            'editName' => 'required',
            'editSex' => 'required',
            'editBirthday' => 'required',
            'editEmail' => 'required'
        ]);
        $account = account_info::find(request('editId'));
        $account->account = request('editAccount');
        $account->name = request('editName');
        $account->sex = request('editSex');
        $account->birthday = request('editBirthday');
        $account->email = request('editEmail');
        $account->remark = request('editRemark');

        $account->save();

        return redirect('/');

    }

    public function destroy()
    {
        $data = request()->all();
        foreach($data as $key => $value) {
            if(strpos($key, 'id') === 0) {
                $account = account_info::find($value);
                $account->delete();
            }
        }

        return redirect('/');
    }

}
