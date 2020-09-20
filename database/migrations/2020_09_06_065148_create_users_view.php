<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_users AS SELECT 
                u1.id,
                u1.name,
                u1.username,
                u1.password,
                CASE u1.role
                    WHEN 0 THEN 'Admin'
                    WHEN 1 THEN 'Warehouse'
                    ELSE u1.role
                END as role,
                case 
                    WHEN u1.created_by = 0 THEN 'System'
                    WHEN u1.created_by is null THEN 'System'
                    else u2.name
                END created_by,
                u1.created_at,
                u1.updated_at
            FROM users as u1
            LEFT JOIN users as u2
                ON u2.id = u1.created_by"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_users");
    }
}
