<?php 

namespace Login\Management\Validation;

use Login\Management\Entity\User;
use Login\Management\Exception\UserException;
use Login\Management\Model\UserLoginRequest;
use Login\Management\Model\UserRegisterRequest;
use Login\Management\Repository\UserRepository;

class UserServiceValidation {

    public static function RegisterValidation(UserRegisterRequest $request, UserRepository $userRepo) : void {

        $name = trim($request->getName());
        $username = trim($request->getUsername());
        $password = trim($request->getPassword());
        $confirmPassword = trim($request->getConfirmPassword());

        /* -- Validasi Name -- */
        // Name harus berupa huruf
        if (preg_match("/[0-9]/", $name) || strpbrk($name, "#$%^&*()+=-[]';,./{}|:<>?~_")) {
            throw new UserException("Nama harus berupa huruf!");
        }

        // Name minimal 3 karakter
        if (strlen($name) < 3) {
            throw new UserException("Nama minimal 3 huruf!");
        }


        /* -- Validasi Username -- */
        // Tidak ada simbol kecuali underscore dan titik
        if (strpbrk($username, "`!@#$%^&*()+=-[]\'\";,/{}|:<>?~") || strpos($username, " ") != null) {
            throw new UserException("Username tidak boleh mengandung spasi dan simbol (kecuali underscore dan titik)!");
        }

        // Minimal 3 dan maksimal 10
        if (strlen($username) < 3 || strlen($username) > 10) {
            throw new UserException("Username minimal 3 dan maksimal 10 karakter!");
        }

        // Tidak boleh sama (unik)
        $user = $userRepo->findByUsername($username);
        if (!is_null($user)) {
            throw new UserException("Username '$username' telah terdaftar!");
        }


        /* -- Validasi Password -- */
        // Minimal 8 karakter
        if (strlen($password) < 8) {
            throw new UserException("Password minimal 8 karakter!");
        }

        // Confirm Password harus sama dengan Password
        if ($confirmPassword !== $password) {
            throw new UserException("Konfirmasi password tidak sesuai!");
        }

    } 



    public static function LoginValidation(UserLoginRequest $request, UserRepository $userRepo) : User {

        /* -- Validasi Username dan Password -- */
        $user = $userRepo->findByUsername($request->getUsername());
        
        // Usernya ada atau tidak
        if (is_null($user)) {

            throw new UserException("Username atau password salah!");

        } else {
            // Cek apakah passwordnya sesuai
            if (!password_verify($request->getPassword(), $user->getPassword())) {
                throw new UserException("Username atau password salah!");
            }
        }

        return $user;

    }


}