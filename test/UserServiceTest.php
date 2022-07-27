<?php

namespace Login\Management;

require_once __DIR__."./../vendor/autoload.php";

use Login\Management\Config\Database;
use Login\Management\Exception\UserException;
use Login\Management\Model\UserRegisterRequest;
use Login\Management\Repository\UserRepository;
use Login\Management\Service\UserService;
use PHPUnit\Framework\TestCase;


class UserServiceTest extends TestCase {

    private \PDO $db;
    private UserRepository $repository;
    private UserService $service;

    public function setUp() : void {
        $this->db = Database::getConnection();
        $this->repo = new UserRepository($this->db);
        $this->service = new UserService($this->repo);
        Database::deleteAll();
    }

    public function testRegisterService() {
        // Database::deleteAll();
        $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "arya345", "12345678", "12345678"));
        var_dump($user);
        $this->assertIsObject($user);
    }

    public function testRegisterServiceNameValidation() {
        

        // Success
        $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "arya345", "12345678", "12345678"));
        var_dump($user);
        $this->assertIsObject($user);

        // Harus berupa huruf
        $this->expectExceptionMessage("Nama harus berupa huruf!");
        $user = $this->service->register(new UserRegisterRequest("Arya Ashari12$", "arya345", "12345678", "12345678"));

        // Minimal 3
        $this->expectExceptionMessage("Nama minimal 3 huruf!");
        $user = $this->service->register(new UserRegisterRequest("Ar ", "arya345", "12345678", "12345678"));
    }

    public function testRegisterServiceUsernameValidation() {

        // Success
        // $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "aryaashari", "12345678", "12345678"));
        // var_dump($user);
        // $this->assertIsObject($user);

        // Tidak ada simbol kecuali underscore dan titik
        // $this->expectExceptionMessage("Username tidak boleh mengandung spasi dan simbol (kecuali underscore dan titik)!");
        // $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "arya34&5", "12345678", "12345678"));

        // $this->expectExceptionMessage("Username tidak boleh mengandung spasi dan simbol (kecuali underscore dan titik)!");
        // $user = $this->service->register(new UserRegisterRequest("Arasd", "arya345^&", "12345678", "12345678"));


        // Minimal 3 dan maksimal 10
        // $this->expectExceptionMessage("Username minimal 3 dan maksimal 10 karakter!");
        // $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "aff", "12345678", "12345678"));

        // $this->expectExceptionMessage("Username minimal 3 dan maksimal 10 karakter!");
        // $user = $this->service->register(new UserRegisterRequest("Arasd", "arya345asddasd", "12345678", "12345678"));


        // Tidak boleh sama (unik)
        $this->expectExceptionMessage("Username 'aryaashari' telah terdaftar!");
        $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "aryaashari", "12345678", "12345678"));
        $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "aryaashari", "12345678", "12345678"));
    }

    public function testRegisterPasswordValidation() {

        // Success
        // $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "aryaashari", "12345678", "12345678"));
        // var_dump($user);
        // $this->assertIsObject($user);

        // Minimal 8 karakter
        // $this->expectExceptionMessage("Password minimal 8 karakter!");
        // $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "aryaashari", "1234567", "12345678"));

        // Confirm password harus sesuai dengan password
        $this->expectExceptionMessage("Konfirmasi password tidak sesuai!");
        $user = $this->service->register(new UserRegisterRequest("Arya Ashari", "aryaashari", "123456798", "12345678"));

    }

}