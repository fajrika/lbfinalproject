<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateItemFlowsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_item_flows AS 
                SELECT 
                    item_flows.id,
                    items.name,
                    item_flows.quantity,
                    item_flows.price,
                    item_flows.process_date,
                    item_flows.description,
                    case 
                        WHEN item_flows.created_by = 0 THEN 'System'
                        WHEN item_flows.created_by is null THEN 'System'
                        else users.name
                    END created_by,
                    item_flows.created_at,
                    item_flows.updated_at
                FROM item_flows
                JOIN items
                    ON items.id = item_flows.item_id
                JOIN users
                    ON users.id = item_flows.created_by"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_item_flows");
    }
}
