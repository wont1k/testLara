<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ListIntervalsCommand extends Command{
    protected $signature = 'intervals:list
                        {--left= : Left boundary}
                        {--right= : Right boundary}';

    public function handle() {
        $left = (int)$this->option('left');
        $right = (int)$this->option('right');

        $intervals = DB::table('intervals')->where('start', '<=', $right)->where(function ($query) use ($left) {
            $query->where('end', '>=', $left)
                ->orWhereNull('end');
        })
            ->orderBy('id', 'ASC')
            ->get();

        $this->table(
            ['ID', 'Start', 'End'],
            $intervals->map(fn($i) => [$i->id, $i->start, $i->end ?? '∞'])
        );
    }
}

