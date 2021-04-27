<?php


namespace App\Model\Entity;

use Cake\ORM\Entity;

//Should be called results, but threw an error I couldn't work out when I tried to change it, so 'User' it shall remain
class User
{
    protected $_accessible = [
        //Prevents mass assignment
        '*' => true,
        'slug' => false,
        'first_name' => false,
        'surname' => false,
        'ip_address' => false,
        'favourite_film' => false,
        'favourite_series' => false,
    ];
}
