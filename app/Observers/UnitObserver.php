<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Unit;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit as XmlUnit;

class UnitObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param  \App\Models\Category  $plan
     * @return void
     */
    public function creating(Unit $unit)
    {
        $unit->id = (string) Str::uuid();
    }

    /**
     * Handle the plan "updating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updating(Unit $category)
    {
      
    }
}
