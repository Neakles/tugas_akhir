<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MythAuth extends BaseConfig
{
    /*
    |--------------------------------------------------------------------------
    | Allow User Registration
    |--------------------------------------------------------------------------
    |
    | When enabled, allows users to register for new accounts. Disabled
    | accounts can only be created by an admin or via the CLI.
    |
    */
    public $allowRegistration = true;

    /*
    |--------------------------------------------------------------------------
    | Allow Persistent Login
    |--------------------------------------------------------------------------
    |
    | If true, allows user logins to be "remembered" and remain indefinitely,
    | or until they logout themselves. If false, users will have to log back
    | in manually if they close their browser or otherwise logout.
    |
    */
    public $allowRemembering = true;

    /*
    |--------------------------------------------------------------------------
    | Allow User Auto Login
    |--------------------------------------------------------------------------
    |
    | If true, allows user logins to be "remembered" and automatically
    | logs the user back in on subsequent visits.
    |
    */
    public $allowAutoLogin = true;

    /*
    |--------------------------------------------------------------------------
    | Use User's Email Address
    |--------------------------------------------------------------------------
    |
    | If true, login, forgot password, and reset password will all use the
    | user's email address, rather than the username, for helping with
    | account verification.
    |
    */
    public $useEmailAddress = false;

    /*
    |--------------------------------------------------------------------------
    | Authentication Time-to-live
    |--------------------------------------------------------------------------
    |
    | The amount of time, in seconds, that a login session should last.
    | Defaults to 30 minutes (1800 seconds). This value is only used
    | when `allowRemembering` is true.
    |
    */
    public $sessionLength = 1800;

    /*
    |--------------------------------------------------------------------------
    | Password Hashing Cost
    |--------------------------------------------------------------------------
    |
    | The default cost to use for password hashing when using the Bcrypt or Argon
    | algorithm. The higher the cost, the longer it will take to hash the password.
    | This value can be overridden by individual models by setting the `$hashCost`
    | property.
    |
    */
    public $hashCost = 10;

    /*
    |--------------------------------------------------------------------------
    | Authentication Libraries
    |--------------------------------------------------------------------------
    |
    | This is the list of service classes that will be used to help
    | with authentication.
    |
    | Each class must implement the following methods:
    |    - attempt(array $arguments) : bool
    |    - check(): bool
    |    - user(): array
    |
    */
    public $authenticationLibraries = [
        'local' => \Myth\Auth\Authentication\LocalAuthentication::class,
    ];

    /*
    |--------------------------------------------------------------------------
    | Password Validation
    |--------------------------------------------------------------------------
    |
    | Determines whether the user password should be validated according to
    | the rules defined in the Password Validation library.
    |
    */
    public $passwordValidation = true;
    public $activeReminder = false;
    public $authIgnored = [
        "midtrans/*"
    ];
}
