<?php

/**
 * Single-responsibility principle
 */

// Bad example

class UserSettings
{
    public function __construct(private User $user)
    {

    }

    public function change(): void
    {
        if ($this->verifyCredentials()) {
            // ...
        }
    }

    private function verifyCredentials(): bool
    {
        // ...
    }
}

// Better example

class UserSettings
{
    private UserAuth $auth;

    public function __construct(private User $user)
    {
        $this->auth = new UserAuth($this->user);
    }

    public function change(): void
    {
        if ($this->auth->verifyCredentials()) {
            // ...
        }
    }
}

class UserAuth
{
    public function __construct(private User $user)
    {

    }
    public function verifyCredentials(): bool
    {
        // ...
    }
}
