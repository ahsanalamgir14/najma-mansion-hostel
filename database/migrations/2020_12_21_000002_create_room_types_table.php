<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });

        DB::table('room_types')->insert(
            array(
                [    
                    'id' => 1, 
                    'type' => "Single (Basement)"
                ],
                [    
                    'id' => 2, 
                    'type' => "2 Persons (Basement)"
                ],
                [    
                    'id' => 3, 
                    'type' => "2+ persons (Basement)"
                ],
                [    
                    'id' => 4, 
                    'type' => "Single"
                ],
                [    
                    'id' => 5, 
                    'type' => "2 Persons"
                ],
                [    
                    'id' => 6, 
                    'type' => "2+ persons"
                ],
                [    
                    'id' => 7, 
                    'type' => "VIP Room"
                ],
                [    
                    'id' => 8, 
                    'type' => "VIP Flat"
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_types');
    }
}
