<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSeccionAPIRequest;
use App\Http\Requests\API\UpdateSeccionAPIRequest;
use App\Models\Seccion;
use App\Repositories\SeccionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SeccionController
 * @package App\Http\Controllers\API
 */

class SeccionAPIController extends AppBaseController
{
    /** @var  SeccionRepository */
    private $seccionRepository;

    public function __construct(SeccionRepository $seccionRepo)
    {
        $this->seccionRepository = $seccionRepo;
    }

    /**
     * Display a listing of the Seccion.
     * GET|HEAD /seccions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seccionRepository->pushCriteria(new RequestCriteria($request));
        $this->seccionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $seccions = $this->seccionRepository->all();

        return $this->sendResponse($seccions->toArray(), 'Seccions retrieved successfully');
    }

    /**
     * Store a newly created Seccion in storage.
     * POST /seccions
     *
     * @param CreateSeccionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSeccionAPIRequest $request)
    {
        $input = $request->all();

        $seccions = $this->seccionRepository->create($input);

        return $this->sendResponse($seccions->toArray(), 'Seccion saved successfully');
    }

    /**
     * Display the specified Seccion.
     * GET|HEAD /seccions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        return $this->sendResponse($seccion->toArray(), 'Seccion retrieved successfully');
    }

    /**
     * Update the specified Seccion in storage.
     * PUT/PATCH /seccions/{id}
     *
     * @param  int $id
     * @param UpdateSeccionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeccionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        $seccion = $this->seccionRepository->update($input, $id);

        return $this->sendResponse($seccion->toArray(), 'Seccion updated successfully');
    }

    /**
     * Remove the specified Seccion from storage.
     * DELETE /seccions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Seccion $seccion */
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            return $this->sendError('Seccion not found');
        }

        $seccion->delete();

        return $this->sendResponse($id, 'Seccion deleted successfully');
    }
}
