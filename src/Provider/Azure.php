<?php

namespace McCallister\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class Azure extends AbstractProvider
{
    public $baseUrl = 'https://login.microsoftwindows.com/common';
    public $authorizationUri = '/oauth2/authorize';
    public $tokenUri = '/oauth2/token';
    public $defaultScopes = [];

    /**
     * Get the authorization URL.
     * @return string
     */
    public function getBaseAuthorizationUrl()
    {
        return $this->baseUrl . $this->authorizationUri;
    }

    /**
     * Get the access token URL.
     * @param array $params
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        return $this->baseUrl . $this->tokenUri;
    }

    /**
     * Get the URL for the resource owner.
     * @param AccessToken $token
     * @return null
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return null;
    }

    /**
     * Define the default scopes.
     * @return array
     */
    protected function getDefaultScopes()
    {
        return $this->defaultScopes;
    }

    /**
     * Check the response.
     * @param ResponseInterface $response
     * @param array|string $data
     * @throws IdentityProviderException
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
//        die(var_dump($data));
//
//        if (isset($data['odata.error']) || isset($data['error'])) {
//            if (isset($data['odata.error']['message']['value'])) {
//                $message = $data['odata.error']['message']['value'];
//            } elseif (isset($data['error']['message'])) {
//                $message = $data['error']['message'];
//            } else {
//                $message = $response->getReasonPhrase();
//            }
//
//            throw new IdentityProviderException(
//                $message,
//                $response->getStatusCode(),
//                $response
//            );
//        }
    }

    /**
     * Create a resource owner from the response and token.
     * @param array $response
     * @param AccessToken $token
     * @return AzureResourceOwner
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new AzureResourceOwner($response);
    }

}