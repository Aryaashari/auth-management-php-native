<?php

function getDatabaseConfig() : array {

    return [
        "mysql" => [
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=login_app_testas",
                "username" => "root",
                "password" => ""
            ],
            "production" => [
                "url" => "mysql:host=localhost:3306;dbname=login_app",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];

}