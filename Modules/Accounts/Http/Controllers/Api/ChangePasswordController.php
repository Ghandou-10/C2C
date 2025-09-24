<?php

namespace Modules\Accounts\Http\Controllers\Api;

use App\Support\Traits\ApiTrait;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Accounts\Http\Requests\Api\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    use ApiTrait;

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();

        if (!$user) {
            return $this->sendError(trans('accounts::auth.failed'));
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return $this->sendError(__('accounts::users.messages.password'));
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        $user = auth()->user();
        //remove device token
        $user->update([
            'device_token' => null
        ]);

        $user->tokens()->delete();

        return $this->sendResponse(null, __('accounts::users.messages.password_changed_successfully'));
    }

}
