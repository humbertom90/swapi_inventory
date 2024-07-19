<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Repositories\StarshipRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShipController extends Controller
{
    protected $starShipRepository;

    /**
     * Constructor del controlador ShipController.
     *
     * @param StarShipRepository $starShipRepository Instancia del repositorio de naves espaciales.
     */
    public function __construct(StarShipRepository $starShipRepository)
    {
        $this->starShipRepository = $starShipRepository;
    }

    /**
     * Obtener todas las naves espaciales.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con todas las naves espaciales.
     */
    public function index()
    {
        try {
            $starships = $this->starShipRepository->getAllStarShip();
            return response()->json($starships);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener las naves espaciales'], 500);
        }
    }

    /**
     * Incrementar el contador de una nave.
     *
     * @param int $id ID de la nave.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con mensaje de éxito y nave modificada.
     */
    public function incrementCount($id)
    {
        try {
            $ship = Ship::findOrFail($id);
            $this->starShipRepository->incrementCount($ship);

            return response()->json(['message' => 'Contador de nave incrementado exitosamente', 'ship' => $ship]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Nave no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al incrementar el contador de nave'], 500);
        }
    }

    /**
     * Decrementar el contador de una nave.
     *
     * @param int $id ID de la nave.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con mensaje de éxito y nave modificada.
     */
    public function decrementCount($id)
    {
        try {
            $ship = Ship::findOrFail($id);
            $this->starShipRepository->decrementCount($ship);

            return response()->json(['message' => 'Contador de nave decrementado exitosamente', 'ship' => $ship]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Nave no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al decrementar el contador de nave'], 500);
        }
    }

    /**
     * Establecer el contador de una nave a una cantidad específica.
     *
     * @param int $id ID de la nave.
     * @param \Illuminate\Http\Request $request Objeto Request que contiene el parámetro 'quantity'.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con mensaje de éxito y nave modificada.
     */
    public function setCount($id, Request $request)
    {
        try {
            $ship = Ship::findOrFail($id);
            $this->starShipRepository->setCount($ship, $request->input('quantity'));

            return response()->json(['message' => 'Contador de nave establecido exitosamente', 'ship' => $ship]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Nave no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al establecer el contador de nave, la entrada solo admite numeros'], 500);
        }
    }
}