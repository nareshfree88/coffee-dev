<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Support\Helper;
use App\Currencyrate;

class GetCurrency extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will show the latest price';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://data.fixer.io/api/latest?access_key=7c150b040386976db4d6ff3557aa2a35&symbols=CAD,%20USD",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cookie: __cfduid=d68bf60c57f63a14b93b50a31eee71b201600047860"
            ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            return $error;
        }

        $result = json_decode($response, true);
        $cad = $result['rates']['CAD'];
        $usd = $result['rates']['USD'];
        $conversion_rate = $usd/$cad;
        Currencyrate::updateOrCreate(['base' => $result['base']],
                [
                    'base' => $result['base'],
                    'date' => $result['date'],
                    'cad_rate' => $result['rates']['CAD'],
                    'usd_rate' => $result['rates']['USD'],
                    'conversion_rate' => $conversion_rate,
        ]);
        
        echo $cad . "--------";
        echo $usd . "--------";
        echo $conversion_rate;
    }

}
