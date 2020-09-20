<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateItemsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_items AS 
                SELECT 
                    items.id,
                    items.code,
                    items.name,
                    items.category_id,
                    categories.name as categories_name,
                    items.price,
                    items.stock,
                    case 
                            WHEN items.created_by = 0 THEN 'System'
                            WHEN items.created_by is null THEN 'System'
                            else users.name
                    END created_by,
                    items.created_at,
                    items.updated_at
                FROM items
                JOIN categories
                    ON categories.id = items.category_id
                LEFT JOIN users
                    ON users.id = items.created_by"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_items");
    }
}
