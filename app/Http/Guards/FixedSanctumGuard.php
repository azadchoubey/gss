<?php

namespace App\Http\Guards;

use Laravel\Sanctum\Guard;
use Laravel\Sanctum\Sanctum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Contracts\Auth\UserProvider;


class FixedSanctumGuard extends Guard
{
    private static $resolving = false;
      protected $user;
  public function __construct(AuthFactory $auth, Encrypter $encrypter, UserProvider $provider, Request $request)
    {
        parent::__construct($auth, $encrypter, $provider, $request);
    }
    public function user()
    {
        // Prevent infinite recursion
    if (self::$resolving) {
    return null;
}

        // Return cached user if already resolved
        if ($this->user !== null) {
            return $this->user;
        }

        self::$resolving = true;

        try {
            $token = $this->getTokenFromRequest($this->request);
            
            if ($token) {
                $model = Sanctum::$personalAccessTokenModel;
                $accessToken = $model::findToken($token);

                if ($this->isValidAccessToken($accessToken) && 
                    $this->supportsTokens($accessToken->tokenable ?? null)) {
                    
                    $this->user = $accessToken->tokenable->withAccessToken($accessToken);
                }
            }
        } catch (\Exception $e) {
            // Log the error but don't throw to prevent recursion
            Log::error('Sanctum authentication error: ' . $e->getMessage());
        } finally {
            self::$resolving = false;
        }

        return $this->user;
    }
public function check()
{
    return ! is_null($this->user());
}

    /**
     * Get the token from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function getTokenFromRequest(Request $request)
    {
        return $request->bearerToken();
    }

    /**
     * Determine if the provided access token is valid.
     *
     * @param mixed $accessToken
     * @return bool
     */
    protected function isValidAccessToken($accessToken): bool
    {
        if (!$accessToken) {
            return false;
        }

        return !$accessToken->expires_at || $accessToken->expires_at->isFuture();
    }

    /**
     * Determine if the tokenable model supports API tokens.
     *
     * @param mixed $tokenable
     * @return bool
     */
    protected function supportsTokens($tokenable = null): bool
    {
        return $tokenable && in_array(
            \Laravel\Sanctum\HasApiTokens::class, 
            class_uses_recursive(get_class($tokenable))
        );
    }
}