<?php namespace App\Http\Middleware;

use Closure;

class CorsMiddleware {

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // ALLOW OPTIONS METHOD
      header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
      header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS, HEAD');
      header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, X-CSRF-TOKEN');
      header('Access-Control-Allow-Credentials: true');
  $headers = [

         'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
         'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
     ];
  if($request->getMethod() == "OPTIONS") {
         // The client-side application can set only headers allowed in Access-Control-Allow-Headers
         return response('OK', 200, $headers);
     }

     $response = $next($request);
     foreach($headers as $key => $value)
      $response->header($key, $value);
  return $response;
 }
}
