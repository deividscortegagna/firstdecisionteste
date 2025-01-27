<?php

namespace App;

use App\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        try {
            $data['password'] = bcrypt($data['password']);
            return $this->userRepository->create($data);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create user');
        }
    }    

    public function updateUser(int $id, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return $this->userRepository->update($id, $data);
    }

    public function deleteUser(int $id)
    {
        return $this->userRepository->delete($id);
    }

    public function findUserById(int $id)
    {
        return $this->userRepository->findById($id);
    }
}
