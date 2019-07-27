# Laravel GraphQL Client

Wrapper over [softonic/graphql-client](https://github.com/softonic/graphql-client) library for laravel/lumen.

## Installation

You can install the package via composer:

```
composer require alexaandrov/laravel-graphql-client
```

## For laravel:

```
php artisan vendor:publish --provider="Alexaandrov\GraphQL\GraphQLClientServiceProvider" 
```

## For lumen:

Copy and setting up config:

```
cp vendor/alexaandrov/laravel-graphql-client/config/config.php config/graphql-client.php
```

Add to `bootstrap/app.php`

```
$app->configure('graphql-client');
$app->register(Alexaandrov\GraphQL\GraphQLClientServiceProvider::class);
```

## Usage

### Code
```php
<?php

$guery = <<<QUERY
query {
    users {
        id
        email
    }
}
QUERY;

$mutation = <<<MUTATION
mutation {
    login(data: {
        username: "user@mail.com"
        password: "qwerty"
    }) {
        access_token
        refresh_token
        expires_in
        token_type
    }
}
MUTATION;

$queryResponse = Alexaandrov\GraphQL\Facades\Client::fetch($query);
$queryData = $queryResponse->getData();
var_dump($queryData);

$mutationResponse = Alexaandrov\GraphQL\Facades\Client::fetch($mutation);
$mutationData = $mutationResponse->getData();
var_dump($mutationData);
```

### Output

Query response data:
```
[
 "user" => [
   "id" => "1",
   "email" => "user@mail.com"
 ],
]
```

Mutation response data:

```
[
 "login" => [
   "access_token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZjY2JkNzA3Y2YxMGQ0NjU0YWQyZTlhNmQwMjcwNGQ4NTUzOTNiYzYzZGRiOWNhMGVmNTFlZGEwMDEwNTBhZTkyNGZjMjU3MDQ2MWYwYjA4In0.eyJhdWQiOiI0IiwianRpIjoiZmNjYmQ3MDdjZjEwZDQ2NTRhZD
JlOWE2ZDAyNzA0ZDg1NTM5M2JjNjNkZGI5Y2EwZWY1MWVkYTAwMTA1MGFlOTI0ZmMyNTcwNDYxZjBiMDgiLCJpYXQiOjE1NjQxNjk3NzgsIm5iZiI6MTU2NDE2OTc3OCwiZXhwIjoxNTk1NzkyMTc4LCJzdWIiOiI0NCIsInNjb3BlcyI6W119.JddtNummLGQPUWdpy71VhQlxeUVisMCu43UmBV9hQOeNA5zxa
vJPM_kLNQxiZWfr_jrDam4l2_TZiv6IKSg8EpvDxZSy71I93b3VdSuOefW0aZUy8-lgEqn7qx6m2wkkrvG4wQBsbaKwXsCj_3C6DHmE7l3dEdjx8cYMw441neMTe2_Y76l1JsSP0Z8G222i4Ny-7AjAvx_m6_fKnIKUajSUdIV5gUjRDRYsdi8M_21Up6j_El4YNPiX9fCi9bWEUbGtej8lFyktkUWnKxWOGgUu4
dT9k0_E3pI2ysAJIkGcB9bFTzhun-LirWI1y_88pr6Yb8d7bKKVuow__VZsBO3B1o8Z-3G-eb2lzaVj5isUEQjjlN4ml60TSBX-j3hct5my2j4q4gIzIK-X3dLoY3TQ7sWQxOvz1f2S319h4BeG1YLjLJ4Ee840nReZoE_hyOIQuyLpiba0e6u-IeDO2wZygGVWnvoFDM8d3DBO-0u1Zu-DVoTi826fHm8OyXaEB
uYuWncExXnhAp_RxKliuxclF5tRTRS3SldkTsXt4JQtOsIuLwkH9JvnSV5W3gTR5hcBZfle2vEzwOJvdBDzFDLHtR9GCaOc2VHjpQE4dXeywu5QkkrqL8uOPdiIoJJcxTUum6RCcu9gcGDOQVpUAHEwjB54K4hQPhZY96cibQk",
   "refresh_token" => "def502009273d79a7ff4241ad49975a696ac41af19dfffbbcf742bc90b38c4db75198102e693b84609d962d6a0b87d3fc5510b4f3ff5e10d2ce31542bab29c40cf06b712258e71fe944e15358996276a35c889de11cb99c9a49945f146f7b8c5d2d622425d58b
316af3dddfe1ac4ab781e3cf00d61d5c5d92b99a574a89fec4468264f9c28705c882e5d13e86961374b822c01f647a71b186b3fbe35cb737fdef4642816887ec3ee07a8c3637db7e8708cddb78f5d03f926364a968f5fe3515bbcdc5866ad75a4d070d7bac30583125a942ea1eb53e99c789cf5c
5135d4af790f23232cf4ad5f58ab659cb54cd27e68b476611ec11167fe31f303f2032333262c873b955ff7a8ca4e3bf0306196c5027f1c84dd2b12bb282863c236ac60a0f38ae09669a83aca4c621a16b4f3f0207033785993bc148177dd3e9ab22cbc39c1d3f0b511fdf015ab1abce59a5c70c1
a50018240eb5ab69c37c1ffffa0eefe28f466d2",
   "expires_in" => 31622400,
   "token_type" => "Bearer",
 ],
]
```

