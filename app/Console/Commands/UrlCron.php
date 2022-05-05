<?php

namespace App\Console\Commands;

use App\Repositories\Contracts\IUrlRepository;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class UrlCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:url-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command url cron';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $urlRepository;
    public function __construct(IUrlRepository $urlRepository)
    {
        parent::__construct();
        $this->urlRepository = $urlRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $urls = $this->urlRepository->getAll();

        foreach ($urls as $url) {

            try {
                $client = new Client(['timeout'  => 150.0]);
                $response = $client->get($url->description);
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();

            } catch (\Throwable $th) {
                $this->error(date('Y-m-d H:i:s') .': '. $th->getMessage());
                $statusCode = 500;
                $body = $th->getMessage();
            }

            $urlRequest = ['code' => $statusCode, 'body' => $body];
            $url->urlRequests()->create($urlRequest);
        }

    }
}
