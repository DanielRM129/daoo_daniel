<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Area;
use App\Models\AreaItem;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class AreaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();
        $createUpdateAt = ['created_at'=>$now,'updated_at'=>$now];
        $area = Area::find(1);
        $area->itens()->attach([3=>$createUpdateAt]);
        $area = Area::find(2);
        $area->itens()->attach([3=>$createUpdateAt]);
        $area = Area::find(3);
        $area->itens()->attach([2=>$createUpdateAt]);
        $area = Area::find(2);
        $area->itens()->attach([1=>$createUpdateAt]);
    }
}
