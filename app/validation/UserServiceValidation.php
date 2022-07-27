<?php 

namespace Login\Management\Validation;

use Login\Management\Exception\UserException;
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
        if (strlen(trim($username)) < 3 || strlen(trim($username)) > 10) {
            echo "Hallo";
            throw new UserException("Username minimal 3 dan maksimal 10 karakter!");
        }

        // Tidak boleh sama (unik)
        $user = $userRepo->findByUsername($username);
        if (!is_null($user)) {
            echo "OKKKKK";
            throw new UserException("Username '$username' telah terdaftar!");
        }

    } 


}