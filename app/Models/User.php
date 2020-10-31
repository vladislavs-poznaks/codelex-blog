<?php

namespace App\Models;

class User
{
    private string $name;
    private string $email;
    private string $password;
    /**
     * @var int|null
     */
    private $refferal;

    public function __construct(
        string $name,
        string $email,
        string $password,
        $refferal = null
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->refferal = $refferal;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function refferal()
    {
        return $this->refferal;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'email' => $this->email(),
            'password' => $this->password(),
            'refferal' => $this->refferal()
        ];
    }

    public static function create(array $data, $refferal = null): User
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'],
            $refferal
        );
    }
}