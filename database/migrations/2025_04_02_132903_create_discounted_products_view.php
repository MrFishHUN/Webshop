<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE VIEW discounted_products AS
            select `p`.`id`                                                 AS `id`,
       `c`.`id`                                                 AS `category_id`,
       `p`.`slug`                                               AS `slug`,
       `p`.`title`                                              AS `title`,
       `c`.`name`                                               AS `category_name`,
       `p`.`picture`                                            AS `picture`,
       `p`.`description`                                        AS `description`,
       `p`.`summary`                                            AS `summary`,
       round(((`p`.`price` * 1) - (`d`.`percentage` / 100)), 0) AS `price`,
       `d`.`percentage`                                         AS `percentage`,
       `p`.`quantity`                                           AS `quantity`,
       `d`.`starts_at`                                          AS `discount_start`,
       `d`.`ends_at`                                            AS `discount_end`
from ((`products` `p` join `discounts` `d`
       on ((`p`.`id` = `d`.`product_id`))) join `categories` `c` on ((`c`.`id` = `p`.`category_id`)))
        ');

        DB::statement("
            CREATE VIEW main_categories AS
        select `c`.`id`          AS `id`,
       `c`.`name`        AS `name`,
       `c`.`description` AS `description`,
       `c`.`created_at`  AS `created`,
       `c`.`updated_at`  AS `updated`,
       `c`.`deleted_at`  AS `deleted`
from `categories` `c`
where ((`c`.`parent_id` is null) and (`c`.`deleted_at` is null))
        ");

        DB::statement("
        CREATE VIEW alt_categories AS
        select `c`.`id`                                                AS `id`,
       `c`.`name`                                              AS `name`,
       `c`.`parent_id`                                         AS `parent_id`,
       (select `categories`.`name` AS `name`
        from `categories`
        where (`c`.`parent_id` = `categories`.`id`)) AS `parent_name`,
       `c`.`description`                                       AS `description`,
       `c`.`created_at`                                        AS `created`,
       `c`.`updated_at`                                        AS `updated`,
       `c`.`deleted_at`                                        AS `deleted`
from (`categories` `c` join `categories` `c2` on ((`c`.`parent_id` = `c2`.`id`)))
where (`c`.`deleted_at` is null)
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW discounted_products');
        DB::statement('DROP VIEW main_categories');
        DB::statement('DROP VIEW alt_categories');
    }
};
