
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('validateUpdateUserEmpty'))
{
    function validateUpdateUserEmpty($user)
    {
        if ($user['name']=='' || $user['surname']=='' || $user['phone']=='' || $user['email']=='' || 
                $user['jmbg']=='' || $user['address']=='' || $user['username']==''){
            return false;
        }
        return true;
    }   
}

if ( ! function_exists('validateUpdateUsername'))
{
    function validateUpdateUsername($user, $model, $curUser)
    {
        if ($model->checkUsernameExists($user['username']) && $user['username']!= $curUser->username) {return false;}
        return true;
    }   
}