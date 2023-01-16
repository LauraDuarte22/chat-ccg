<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller

{

    public function sendMessages()
    {
        try {
            $token = 'EAAS2zzRB9NMBAMW0AdCmKZBxZARgl7QhZCj50EFgSr9p82LHlhM2ebWWJvUhZCpaTNEJTelOfaCu2ZB9ynFmrZCgamrcD7EBzNEzGzVV4V9KZCvV0yMZCiPoEFtUhWkN3OOvTW961011yZBZAFJJLdD8BtUmu5Mc2wNu22pZBTIhabpumAcCQMk5jtp0c4wNkNjXkIoTEaCUOaxngZDZD';
            $phoneId = '107798042168198';
            $version = 'v12.0';
            $payload = [
                "messaging_product" => "whatsapp",
                "to" => "573193691016",
                "type" => "template",
                "template" => [
                    "name" => "hello_world",
                    "language" => [
                        "code" => "en_US"
                    ]
                ]
            ];


            $response = Http::withToken($token)->post('https://graph.facebook.com/' . $version . '/' . $phoneId . '/messages', $payload)->throw()->json();

            return response()->json([
                'success' => true,
                'data' => $response,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function verifyToken(Request $request)
    {
        try {
            $verifyToken = 'CCGltda2023**';
            $query = $request->query();

            $mode = $query['hub_mode'];
            $token = $query['hub_verify_token'];
            $challenge = $query['hub_challenge'];

            if ($mode && $token) {
                if ($mode === 'subscribe' && $token == $verifyToken) {
                    return response($challenge, 200)->header('content-type', 'text-plain');
                }
            }
            throw new Exception('Invalid request');
        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function processWebhook(Request $request)
    {
        try {
            $bodyContent = json_decode($request->getContent(), true);
            //Determinar que paso con la petición
            $value = $bodyContent['entry'][0]['changes'][0]['value'];

            //Si está vacio, va recibir un mensaje
            if (!empty($value['messages'])) {
                if ($value['messages'][0]['type'] == 'text') {
                    $body = $value['messages'][0]['text']['body'];
                }
            }
            return response()->json([
                'success' => true,
                'data' => $body
            ], 200);
        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getTemplates(Request $request)
    {
        try {
            $token = 'EAAS2zzRB9NMBAMW0AdCmKZBxZARgl7QhZCj50EFgSr9p82LHlhM2ebWWJvUhZCpaTNEJTelOfaCu2ZB9ynFmrZCgamrcD7EBzNEzGzVV4V9KZCvV0yMZCiPoEFtUhWkN3OOvTW961011yZBZAFJJLdD8BtUmu5Mc2wNu22pZBTIhabpumAcCQMk5jtp0c4wNkNjXkIoTEaCUOaxngZDZD';
            $whatsappId = '101098232848328';
            $version = 'v12.0';
            $response = Http::withToken($token)->get('https://graph.facebook.com/' . $version . '/' . $whatsappId . '/message_templates')->throw()->json();
           
            return response()->json([
                'success' => true,
                'data' => $response
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
