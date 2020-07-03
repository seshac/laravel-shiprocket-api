<?php

namespace Sesha\Sketch\Commands;

use Illuminate\Console\Command;

class SketchCommand extends Command
{
    public $signature = 'sketch';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
