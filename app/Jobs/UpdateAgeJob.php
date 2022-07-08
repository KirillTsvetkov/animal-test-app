<?php

namespace App\Jobs;

use App\Models\Animal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateAgeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $animals = Animal::get()->all();
        foreach($animals as $animal){
            if($animal->age < $animal->kind->max_age){
                $animal->age += 1;
            }
            if($animal->size < $animal->kind->max_size){
                $animal->size += $animal->kind->growth_factor;
            }
            $animal->save();
        }
    }
}
