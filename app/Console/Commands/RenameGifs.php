<?php

namespace App\Console\Commands;

use App\Gif;
use App\GifImage;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Connection;

class RenameGifs extends Command
{
    protected $signature = 'gifs:rename';
    protected $description = 'Renames GIFs with to append a timestamp on the end';
    private $db;

    public function __construct(Connection $db)
    {
        parent::__construct();
        $this->db = $db;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = Carbon::now()->format('U');

        $this->db
            ->table((new GifImage)->getTable())
            ->where('file_name', 'not regexp', '_[0-9].gif$')
            ->update([
                'file_name' => $this->db->raw("replace(file_name, '.gif', '_{$date}.gif')"),
            ]);
    }
}
