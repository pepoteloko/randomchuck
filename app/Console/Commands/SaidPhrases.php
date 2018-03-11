<?php

namespace App\Console\Commands;

use App\Chuck;
use Illuminate\Console\Command;

class SaidPhrases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chuck:said';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lo que Chuck ha dicho!';

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
     * @return mixed
     */
    public function handle()
    {
        $all = Chuck::where('shown', '>', 0)->get();

        if ($all->count() > 0) {
            $this->info("Chuck ha dicho...");
            $oldTitle = '';
            foreach ($all as $chuck) {
                if ($oldTitle != $chuck->title) {
                    $this->warn($chuck->title);
                    $oldTitle = $chuck->title;
                }
                $this->line($chuck->phrase);

            }
        } else {
            $this->info("Chuck aún no ha hablado.");
        }
    }
}
