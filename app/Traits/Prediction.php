<?php
namespace App\Traits;
use Illuminate\Support\Facades\Http;

trait Prediction {
    public static function getPrediction($data, $filename) {
        return Http::withHeaders([
            'X-Api-Token' => env('API_TOKEN')
          ])
          ->attach('image',file_get_contents($data), $filename)
          ->post(env('API_URL') ?? 'http://127.0.0.1:7777')
          ->json();
    }
}