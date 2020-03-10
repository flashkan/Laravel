<?php


namespace App\Repositories;

use App\User;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;

class UserRepository
{
    /**
     * @param UserOAuth $user
     * @param string $socName
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getUserBySocId($user, string $socName)
    {
        $email = '';
        if ($socName === 'vkontakte') $email = $user->accessTokenResponseBody['email'];
        elseif ($socName === 'facebook') $email = $user->getEmail();

        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();

        if (empty($userInSystem) && !empty(User::query()->where('email', '=', $email)->get())) {
            return ['massage' => 'This email is busy!'];
        }

        if (empty($userInSystem)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName()) ? $user->getName() : '',
                'email' => $email,
                'password' => '',
                'id_in_soc' => !empty($user->getId()) ? $user->getId() : '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar()) ? $user->getAvatar() : ''
            ]);
            $userInSystem->save();
        }
        return $userInSystem;
    }
}
