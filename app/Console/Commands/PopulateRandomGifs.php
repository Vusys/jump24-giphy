<?php

namespace App\Console\Commands;

use App\Gif;
use App\GifImage;
use App\Services\Giphy;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Validation\Factory;

class PopulateRandomGifs extends Command
{
    protected $signature = 'gifs:random {total=500} {sleep=1}';
    protected $description = 'Add Random GIFs into the database';

    private $giphy;
    private $validator;
    private $backoff = 5;
    private $failures = 0;

    public function __construct(Giphy $giphy, Factory $validator)
    {
        parent::__construct();
        $this->giphy     = $giphy;
        $this->validator = $validator;
    }

    public function handle(): void
    {
        $validator = $this->validator->make($this->arguments(), [
            'total' => ['integer'],
            'sleep' => ['integer', 'between:0,10'],
        ]);

        if ($validator->fails()) {
            $this->error('Unable to comply:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
        }


        for ($i = 1; $i <= $this->argument('total'); $i++) {
            $this->info('Fetching image ' . $i . ' of ' . $this->argument('total'));

            try {
                $gif = $this->giphy->random()->getData();
            } catch (Exception $exception) {
                $this->failures++;
                $this->backoff = ($this->failures ** 2) * 5;

                if ($this->failures >= 5) {
                    $this->error('Too many GIPHY errors... Giving up');
                    return;
                }

                $this->warn('GIPHY error... backing off for ' . $this->backoff . ' seconds.');

                sleep($this->backoff);
                continue;
            }

            $gifModel = Gif::firstOrCreate(['giphy_id' => $gif->getId()]);
            $image    = new GifImage([
                'type'      => 'image_url',
                'file_name' => $gif->getId() . 'gif',
                'url'       => $gif->getImageUrl(),
            ]);
            $gifModel->images()->save($image);

            sleep($this->argument('sleep'));
        }

    }
}
