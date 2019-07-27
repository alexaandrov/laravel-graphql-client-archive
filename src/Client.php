<?php

namespace Alexaandrov\GraphQL;

use Softonic\GraphQL\ClientBuilder;

class Client
{
    protected $client;

    public function __construct()
    {
        $config = config('graphql-client');
        if ($config['oauth']['enabled']) {
            $options = [
                'clientId' => $config['oauth']['client_id'],
                'clientSecret' => $config['oauth']['client_secret'],
            ];

            $provider = new Softonic\OAuth2\Client\Provider\Softonic($options);

            $config = ['grant_type' => 'client_credentials'];

            $cache = new Symfony\Component\Cache\Adapter\FilesystemAdapter();

            $this->client = ClientBuilder::buildWithOAuth2Provider(
                $config['endpoint'],
                $provider,
                $config,
                $cache
            );
        } else {
            $this->client = ClientBuilder::build($config['endpoint']);
        }
    }

    /**
     * @param string $query
     * @param array|null $variables
     * @return \Softonic\GraphQL\Response
     */
    public function fetch(string $query, array $variables = null): \Softonic\GraphQL\Response
    {
        return $this->client->query($query, $variables);
    }
}
