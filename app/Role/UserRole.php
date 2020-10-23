<?php


namespace App\Role;


class UserRole
{
    const ROLE_GM = 'ROLE_GM';
    const ROLE_OFFICER = 'ROLE_OFFICER';
    const ROLE_RAIDER = 'ROLE_RAIDER';
    const ROLE_MEMBER = 'ROLE_MEMBER';

    protected static $roleHierarchy = [
        self::ROLE_GM => ['*'],
        self::ROLE_OFFICER => [
            self::ROLE_RAIDER,
            self::ROLE_MEMBER,
        ],
        self::ROLE_RAIDER => [
            self::ROLE_MEMBER
        ],
        self::ROLE_MEMBER => []
    ];

    public static function getAllowedRoles(string $role){
        if (isset(self::$roleHierarchy[$role])) {
            return self::$roleHierarchy[$role];
        }
        return [];
    }

    public static function getRoleList()
    {
        return [
            static::ROLE_GM =>'Guildmaster',
            static::ROLE_OFFICER => 'Officer',
            static::ROLE_RAIDER => 'Raider',
            static::ROLE_MEMBER => 'Member',
        ];
    }

}
