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
       `p`.`tags`                                               AS `tags`,
       `d`.`starts_at`                                          AS `discount_start`,
       `d`.`ends_at`                                            AS `discount_end`
from ((`products` `p` join `discounts` `d`
       on ((`p`.`id` = `d`.`product_id`))) join `categories` `c` on ((`c`.`id` = `p`.`category_id`)))
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW discounted_products');
    }
};
