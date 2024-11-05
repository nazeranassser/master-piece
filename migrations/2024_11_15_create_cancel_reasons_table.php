<?php

class CreateCancelReasonsTable {

    public function up() {
        return "CREATE TABLE IF NOT EXISTS `cancel_reasons` (
            `admin_id` int(11) NOT NULL,
            `order_id` int(11) NOT NULL,
            `cancel_reason` varchar(255) NOT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            foreign key (admin_id) references admins(admin_id),
            foreign key (order_id) references orders(order_id)
            )";   
    }

    public function down() {
        return "DROP TABLE IF EXISTS `cancel_reasons`";
    }
}