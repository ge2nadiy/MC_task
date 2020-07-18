<?php

namespace App\Console\Commands;

use App\Models\Department;
use Illuminate\Console\Command;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command-test';

    /**
     * The console command description.
     *
     * @var string
     */

    public function handle()
    {
        $empl_count = Department::query()->first()->employees;
        dd($empl_count == []);
    }
}
