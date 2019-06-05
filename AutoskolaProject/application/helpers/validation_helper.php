
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Validacija prilikom promene sopstvnih podataka korisnika da li su sva polja popunjena
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

//Validacija kod promene sopstvenih podataka da li je korisnicko ime vec zauzeto (a da nije od trenutnog korisnika)
if ( ! function_exists('validateUpdateUsername'))
{
    function validateUpdateUsername($user, $model, $curUser)
    {
        if ($model->checkUsernameExists($user['username']) && $user['username']!= $curUser->username) {return false;}
        return true;
    }   
}

//Validacija za proveru da li su sva polja popunjna prilikom registracije novog zaposlenog
if ( ! function_exists('validateRegisterEmployeeEmpty'))
{
    function validateRegisterEmployeeEmpty($user)
    {
        if ($user['name']=='' || $user['surname']=='' || $user['phone']=='' || $user['email']=='' || 
                $user['jmbg']=='' || $user['address']=='' || $user['username']=='' || $user['password']==''){
            return false;
        }
        return true;
    }   
}

//Validacija da li su sva polja popunjena kod menjajna casa teorije
if ( ! function_exists('validateChangeTClassEmpty'))
{
    function validateChangeTClassEmpty($class)
    {
        if ($class['days']=='' || $class['time']==''){
            return false;
        }
        return true;
    }   
}

//Validacija da li su sva polja popunjena kod zakazivanja novog casa
if ( ! function_exists('validateAddDClassEmpty'))
{
    function validateAddDClassEmpty($class)
    {
        if ($class['name']=='' || $class['surname']=='' || $class['date']=='' || $class['time']==''){
            return false;
        }
        return true;
    }   
}

//Validacija da li su sva polja popunjena kod zakazivanja novog casa
if ( ! function_exists('validateDateTimeEmpty'))
{
    function validateDateTimeEmpty($class)
    {
        if ($class['date']=='' || $class['time']==''){
            return false;
        }
        return true;
    }   
}