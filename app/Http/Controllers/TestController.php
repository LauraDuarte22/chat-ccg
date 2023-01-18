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
            $token = 'EAAS2zzRB9NMBAKSD9cZB0BjIak8F1UAM8IvAbFq2OG3P6mNr8V3MRYgF5fC7jZASBHpl2UaEysHpOaQZCtTsEZAPQYMKzPire17yTJM7ZAvgS9sAgzQv4J8WJSEbbHxccJVueltAgafgKdcqXqb8RdjkmhkNQmGc8vKq4OzIAlCOvHZBkfPUQMf1D8sv5nvKU5tvgMixmhvwZDZD';
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

    public function getTemplates()
    {
        try {
            $token = 'EAAS2zzRB9NMBAKSD9cZB0BjIak8F1UAM8IvAbFq2OG3P6mNr8V3MRYgF5fC7jZASBHpl2UaEysHpOaQZCtTsEZAPQYMKzPire17yTJM7ZAvgS9sAgzQv4J8WJSEbbHxccJVueltAgafgKdcqXqb8RdjkmhkNQmGc8vKq4OzIAlCOvHZBkfPUQMf1D8sv5nvKU5tvgMixmhvwZDZD';
            $whatsappId = '101098232848328';
            $version = 'v12.0';
            $response = Http::withToken($token)->get('https://graph.facebook.com/' . $version . '/' . $whatsappId . '/message_templates')->throw()->json();
            print_r($response['data'][0]); 
            foreach ($response['data'] as $key => $value) {
                if ($response['data'][$key]['status'] == "APPROVED") {
                    echo("<b>Nombre de la plantilla: </b>" . $response['data'][$key]['name']);
                    echo"<br>";
                    //Cantidad de componentes que tiene la plantilla
                    $components = count($response['data'][$key]['components']);
                  

                }
                // echo "<br>";
                // echo "Siguiente plantilla";
                // echo "<br>";
            }

            return response()->json([
                'success' => true,
                // 'data' => count($response)
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
