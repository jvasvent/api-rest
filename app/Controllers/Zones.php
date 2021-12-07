<?php
namespace App\Controllers;
use Config\Controller;
use App\Models\ZonesModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Zones extends Controller
{
	protected $zones;

	public function __construct(){
		$this->zones = $this->loadModel("Zones");
	}

	public function getAll(Response $response){		

		$results = $this->zones->getAll();

		return $response->json($results);
	}

	public function getById(Response $response, $id){

		$result = $this->zones->findById($id);

		return $response->json($result);
	}

	public function create(Request $request, Response $response)
	{
		$statusOk = false;
		$messageError = "";

		try {

			if (count($request->json()->all()) == 0) {
				throw new \Exception("No existe parámetros");
			}

			$data = $request->json()->all();
			
			if($data['nombre'] == ""){
				throw new \Exception("Ingrese el nombre de la zona");
			}
			if($data['estado'] == ""){
				throw new \Exception("Seleccione el estado de la zona");
			}

			$result = $this->zones->create($data);

			[$statusOk, $messageError] = array_values((array)$result);
			
		} catch (\Exception $e) {
			$messageError = $e->getMessage();
		}

		return $response->json(["success" => $statusOk, "message" => $messageError], 201);
	}

	public function update(Request $request, Response $response, $id)
	{
		$statusOk = false;
		$messageError = "";

		try {

			if (count($request->json()->all()) == 0) {
				throw new \Exception("No existe parámetros");
			}

			$data = $request->json()->all();
			
			if($id == ""){
				throw new \Exception("No existe el id de la zona");
			}
			if($data['nombre'] == ""){
				throw new \Exception("Ingrese el nombre de la zona");
			}
			if($data['estado'] == ""){
				throw new \Exception("Seleccione el estado de la zona");
			}

			$result = $this->zones->update($data, $id);

			[$statusOk, $messageError] = array_values((array)$result);
			
		} catch (\Exception $e) {
			$messageError = $e->getMessage();
		}

		return $response->json(["success" => $statusOk, "message" => $messageError], 200);
	}

	public function delete(Request $request, Response $response, $id)
	{
		$statusOk = false;
		$messageError = "";

		try {
			
			if($id == ""){
				throw new \Exception("No existe el id de la zona");
			}

			$result = $this->zones->delete($id);

			[$statusOk, $messageError] = array_values((array)$result);
			
		} catch (\Exception $e) {
			$messageError = $e->getMessage();
		}

		return $response->json(["success" => $statusOk, "message" => $messageError], 200);
	}

	private function pruebas(Request $request, Response $response){
		//$data = $request->getContent();//getClientIps()
		//$data = $request->json("nombre");

		/*$result = $this->zones->create([
				"nombre" => "LIMA SUR",
				"estado" => "ACTIVO"
			]);*/

		//codigo de respuesta para apis
		//https://restfulapi.net/http-methods/
	}
}
?>