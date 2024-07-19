<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Log;
use App\Repositories\VehicleRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{
    protected $vehicleRepository;

    /**
     * Constructor del controlador VehicleController.
     *
     * @param VehicleRepository $vehicleRepository Instancia del repositorio de vehículos.
     */
    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Obtener todos los vehículos.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con todos los vehículos.
     */
    public function index()
    {
        try {
            $vehicles = $this->vehicleRepository->getAllVehicles();
            return response()->json($vehicles);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los vehículos'], 500);
        }
    }

    /**
     * Incrementar el contador de un vehículo.
     *
     * @param int $id ID del vehículo.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con mensaje de éxito y vehículo modificado.
     */
    public function incrementCount($id)
    {
        try {
            $vehicle = Vehicle::findOrFail($id);
            $this->vehicleRepository->incrementCount($vehicle);

            return response()->json(['message' => 'Contador de vehículo incrementado exitosamente', 'vehicle' => $vehicle]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Vehículo no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al incrementar el contador de vehículo'], 500);
        }
    }

    /**
     * Decrementar el contador de un vehículo.
     *
     * @param int $id ID del vehículo.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con mensaje de éxito y vehículo modificado.
     */
    public function decrementCount($id)
    {
        try {
            $vehicle = Vehicle::findOrFail($id);
            $this->vehicleRepository->decrementCount($vehicle);

            return response()->json(['message' => 'Contador de vehículo decrementado exitosamente', 'vehicle' => $vehicle]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Vehículo no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al decrementar el contador de vehículo'], 500);
        }
    }

    /**
     * Establecer el contador de un vehículo a una cantidad específica.
     *
     * @param int $id ID del vehículo.
     * @param \Illuminate\Http\Request $request Objeto Request que contiene el parámetro 'quantity'.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con mensaje de éxito y vehículo modificado.
     */
    public function setCount($id, Request $request)
    {
        try {
            $vehicle = Vehicle::findOrFail($id);
            $this->vehicleRepository->setCount($vehicle, $request->input('quantity'));

            return response()->json(['message' => 'Contador de vehículo establecido exitosamente', 'vehicle' => $vehicle]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Vehículo no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al establecer el contador de nave, la entrada solo admite numeros'], 500);
        }
    }
}