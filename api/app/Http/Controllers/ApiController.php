<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class ApiController extends Controller
{
	protected $statusCode = 200;

	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $statusCode;
	}

	public function respondOk($message = 'Successful request!')
	{
		$this->setStatusCode(200);
    	return $this->respond([
    		'message' => $message,
    	]);
	}

	public function respondCreated($message = 'Successfully Created!')
	{
		$this->setStatusCode(201);
    	return $this->respond([
    		'message' => $message,
    	]);
	}

	public function respondAccepted($message = 'Accepted Request and Currently Processing!')
	{
		$this->setStatusCode(202);
    	return $this->respond([
    		'message' => $message,
    	]);
	}

	public function respondNotFound($message = 'Not Found!')
	{
		$this->setStatusCode(404);
		return $this->respondWithError($message);
	}

	public function respondUnprocessableEntity($message = 'Unprocessable Entity!')
	{
		$this->setStatusCode(422);
    	return $this->respondWithError($message);
	}

	public function respondInternalServerError($message = 'Internal Server Error!')
	{
		$this->setStatusCode(500);
		return $this->respondWithError($message);
	}

	public function respond($data, $headers = [])
	{
		return response()->json($data, $this->getStatusCode(), $headers);
	}

	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode(),
			]
		]);
	}

}