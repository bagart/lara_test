<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    public function getClearSqlList($query)
    {
        $query = explode(
            ';',
            preg_replace(
                '~--.*?(\n|$)~s',
                '',
                preg_replace(
                    '~/\*.*?\*/~s',
                    '',
                    $query
                )
            )
        );

        foreach ($query as $key => $sql) {
            $query[$key] = trim($sql);
        }

        return array_filter($query);
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $query_list = $this->getClearSqlList(
            file_get_contents(__DIR__ . '/../raw/authDB.sql')
        );
        //remove original
        Schema::dropIfExists('users');
        foreach ($query_list as $query) {
            if (preg_match('~(UN)?LOCK~ius', $query)) {
                continue;
            }
            $query = str_replace("'0000-00-00 00:00:00'", "'2000-01-01 00:00:00'", $query);
            DB::select(DB::raw($query));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('as_user_types');
        Schema::dropIfExists('as_clients');
        Schema::dropIfExists('as_users');
        Schema::dropIfExists('users');
    }
}
