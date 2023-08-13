<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    public function index()
    {
        return view('openai.dashboard');
    }

    public function process(Request $request)
    {
        $apiKey = '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'; // Replace with your actual API key
        $engine = 'text-davinci-003'; // Or any other engine you want to use
        $prompt = $request->input('prompt');

        $endpoint = "https://api.openai.com/v1/engines/$engine/completions";
        $client = new Client();
        $response = $client->post($endpoint, [
            'headers' => [
                'Authorization' => "Bearer $apiKey",
                'Content-Type' => 'application/json',
            ],
            'json' => ['prompt' => $prompt, 'max_tokens' => 2000],
        ]);

        $responseBody = json_decode($response->getBody(), true);
        $completion = $responseBody['choices'][0]['text'];

        return view('openai.result', ['prompt' => $prompt, 'completion' => $completion]);
    }
}
