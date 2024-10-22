<?php

class CreateAdminsTable {

    public function up() {
        return "CREATE TABLE IF NOT EXISTS `admins` (
            `admin_id` int(11) NOT NULL AUTO_INCREMENT,
            `admin_name` varchar(255) NOT NULL,
            `admin_email` varchar(255) NOT NULL,
            `admin_password` varchar(255) NOT NULL,
            PRIMARY KEY (`admin_id`),
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL
            )";   
    }

    public function down() {
        return "DROP TABLE IF EXISTS `admins`";
    }
}