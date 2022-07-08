<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Animal;

class UpdateAge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'animal:age';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command update animals age';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
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
        return 0;
    }
}
