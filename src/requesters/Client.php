<?php

namespace WebforceHQ\ActiveCampaign\requesters;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use WebforceHQ\Exceptions\UnsetRequestException;

class Client
{

    private $client;
    private $currentRequest;
    private $url;
    private $token;
    private $headers;
    private $params;

    public function __construct($mainUrl, $token)
    {
        $this->url = $mainUrl;
        $this->token = $token;
    }

    public function getClient($params = null)
    {
        $this->client = new Guzzle([
            'base_uri' => $this->url,
        ]);
        $this->setDefaultHeaders();
        $this->setParams($params);
        return $this;
    }

    public function setDefaultHeaders()
    {
        $this->headers = [
            'Api-Token' => $this->token,
            "content-type" => 'application/json',
        ];
    }

    public function post($endpoint, $payload)
    {
        $payload = json_encode($payload);
        $this->currentRequest = new Request('POST', $endpoint, $this->headers, $payload);
        return $this;
    }

    public function get($endpoint)
    {
        $this->currentRequest = new Request('GET', $endpoint . $this->params, $this->headers);
        return $this;
    }

    public function delete($endpoint)
    {
        $this->currentRequest   = new Request("DELETE", $endpoint, $this->headers);
        return $this;
    }

    public function put($endpoint, $payload)
    {
        $payload = json_encode($payload);
        $this->currentRequest   = new Request('PUT', $endpoint, $this->headers, $payload);
        return $this;
    }

    public function send()
    {
        if (!$this->currentRequest) {
            throw new UnsetRequestException();
        }
        try {

            $responseObj = new \stdClass();

            $response = $this->client->send($this->currentRequest);

            $responseObj->success = true;
            $responseObj->code = $response->getStatusCode();
            $responseObj->body = json_decode($response->getBody());
        } catch (ClientException $e) {

            $response       = $e->getResponse();
            $responseObj->code = $response->getStatusCode();
            $responseObj->body   = json_decode($response->getBody()->getContents());
            $responseObj->success = false;
        } finally {

            return $responseObj;
        }
    }

    public function setParams($params)
    {
        $query = '';

        if ($params) {
            $query = '?' . http_build_query($params);
        }

        $this->params = $query;
    }
}
