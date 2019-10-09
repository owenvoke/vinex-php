<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Adapter;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use pxgamer\Vinex\Exception\HttpException;
use pxgamer\HttpAdapters\HttpAdapter as BaseAdapter;

class HttpAdapter implements BaseAdapter
{
    /** @var ClientInterface */
    protected $client;

    /** @var Response */
    protected $response;

    /**
     * Create a new HttpAdaptor instance with a given token and client.
     *
     * @param string|null $token
     * @param ClientInterface|null $client
     */
    public function __construct(?string $token = null, ?ClientInterface $client = null)
    {
        $this->client = $client ?: new Client([
            'headers' => [
                'api-key' => $token ?? ''
            ]
        ]);
    }

    /**
     * Perform a GET request to the given URL.
     *
     * @param string $url
     * @return string
     */
    public function get(string $url): string
    {
        try {
            $this->response = $this->client->get($url);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return (string) $this->response->getBody();
    }

    /**
     * Perform a DELETE request to the given URL.
     *
     * @param string $url
     * @return string
     */
    public function delete(string $url): string
    {
        try {
            $this->response = $this->client->delete($url);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return (string) $this->response->getBody();
    }

    /**
     * Perform a PUT request to the given URL.
     *
     * @param string            $url
     * @param array|string|null $content
     * @return string
     * @throws HttpException
     */
    public function put(string $url, $content = null): string
    {
        $options = [];

        $options[is_array($content) ? 'json' : 'body'] = $content ?? '';

        try {
            $this->response = $this->client->put($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return (string) $this->response->getBody();
    }

    /**
     * Perform a POST request to the given URL.
     *
     * @param string            $url
     * @param array|string|null $content
     * @return string
     * @throws HttpException
     */
    public function post(string $url, $content = null): string
    {
        $options = [];

        $options[is_array($content) ? 'json' : 'body'] = $content ?? '';

        try {
            $this->response = $this->client->post($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return (string) $this->response->getBody();
    }

    /**
     * Get the headers from the last response.
     *
     * @return array|null
     */
    public function getLatestResponseHeaders(): ?array
    {
        if (null === $this->response) {
            return null;
        }

        return [
            'reset' => (int) (string) $this->response->getHeader('RateLimit-Reset'),
            'remaining' => (int) (string) $this->response->getHeader('RateLimit-Remaining'),
            'limit' => (int) (string) $this->response->getHeader('RateLimit-Limit'),
        ];
    }

    /**
     * Handle a request exception.
     *
     * @return void
     * @throws HttpException
     */
    protected function handleError(): void
    {
        $body = (string) $this->response->getBody();
        $code = (int) $this->response->getStatusCode();

        $content = \GuzzleHttp\json_decode($body);

        throw new HttpException($content->error->message ?? 'Request not processed.', $code);
    }
}
