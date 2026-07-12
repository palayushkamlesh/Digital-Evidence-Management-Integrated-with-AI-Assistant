<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evidences;
use Prism\Prism\Facades\Prism;

class AIChatController extends Controller
{

    public function askEvidence(Request $request)
    {
        try {

            set_time_limit(300);

            $question = $request->question;

            $evidences = Evidences::latest()
                ->take(20)
                ->get();

            $context = '';

            foreach ($evidences as $evidence) {

                $context .= "

Evidence Number:
{$evidence->evidence_number}

Title:
{$evidence->title}

Status:
{$evidence->status}

--------------------------------

";
            }

            $prompt = "

You are an AI Investigator Assistant.

You work inside a Digital Evidence Management System.

Answer ONLY using the evidence data below.

Evidence Records:

$context

Question:

$question

Provide a concise answer.

";

            $response = Prism::text()
                ->using('ollama', 'qwen3:8b')
                ->withPrompt($prompt)
                ->asText();

            return response()->json([

                'answer' => $response->text

            ]);

        } catch (\Throwable $e) {

            return response()->json([

                'error' => $e->getMessage()

            ], 500);

        }
    }


    /*
    |--------------------------------------------------------------------------
    | NLP Entity Extraction
    |--------------------------------------------------------------------------
    */

    public function extractEntities($text)
    {

        $prompt = "

Extract entities.

Return JSON only.

{
persons:[],
dates:[],
amounts:[],
communications:[],
locations:[]
}

Text:

$text

";

        $response = Prism::text()

            ->using('ollama', 'qwen3:8b')

            ->withPrompt($prompt)

            ->asText();

        return $response->text;
    }


    /*
    |--------------------------------------------------------------------------
    | NLP Test Endpoint
    |--------------------------------------------------------------------------
    */

    public function entityTest()
    {

        set_time_limit(300);

        $text = "

John transferred ₹50,000 to Rahul
on 14 June 2025.

Communication via WhatsApp.

";

        $entities = $this->extractEntities($text);

        return response()->json([

            'entities' => json_decode($entities, true)

        ]);

    }

    //......................//
    public function timelineTest()
{
    set_time_limit(300);

    $text = "

John transferred ₹50,000 to Rahul
on 14 June 2025.

Communication occurred via WhatsApp.

Evidence collected on 16 June 2025.

Analysis completed on 18 June 2025.

";

    $prompt = "

Generate an investigation timeline.

Sort events chronologically.

Return only timeline entries.

Text:

$text

";

    $response = Prism::text()

        ->using('ollama','qwen3:8b')

        ->withPrompt($prompt)

        ->asText();

    return response()->json([

        'timeline' => $response->text

    ]);

}

}