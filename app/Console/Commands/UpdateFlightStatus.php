<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateFlightStatus extends Command
{
    protected $signature = 'flights:update';

    
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
public function handle()
{
    $now = now()->format('H:i:s');
    
   
    $this->info('Current time: ' . $now);

   
$updated = \App\Models\Schedule::where('departure_time', '<', $now)
    ->update(['status' => 'Departed']);
        
    $this->info('Updated ' . $updated . ' flights.');
}
}
