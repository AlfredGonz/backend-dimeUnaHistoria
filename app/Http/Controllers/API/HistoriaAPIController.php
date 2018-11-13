<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHistoriaAPIRequest;
use App\Http\Requests\API\UpdateHistoriaAPIRequest;
use App\Models\Historia;
use App\Repositories\HistoriaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class HistoriaController
 * @package App\Http\Controllers\API
 */

class HistoriaAPIController extends AppBaseController
{
    /** @var  HistoriaRepository */
    private $historiaRepository;

    public function __construct(HistoriaRepository $historiaRepo)
    {
        $this->historiaRepository = $historiaRepo;
    }

    /**
     * Display a listing of the Historia.
     * GET|HEAD /historias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historiaRepository->pushCriteria(new RequestCriteria($request));
        $this->historiaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $historias = $this->historiaRepository->all();

        return $this->sendResponse($historias->toArray(), 'Historias retrieved successfully');
    }

    /**
     * Store a newly created Historia in storage.
     * POST /historias
     *
     * @param CreateHistoriaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoriaAPIRequest $request)
    {
        $input = $request->all();

        $historias = $this->historiaRepository->create($input);

        return $this->sendResponse($historias->toArray(), 'Historia saved successfully');
    }

    /**
     * Display the specified Historia.
     * GET|HEAD /historias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Historia $historia */
        $historia = $this->historiaRepository->findWithoutFail($id);

        if (empty($historia)) {
            return $this->sendError('Historia not found');
        }

        return $this->sendResponse($historia->toArray(), 'Historia retrieved successfully');
    }

    /**
     * Update the specified Historia in storage.
     * PUT/PATCH /historias/{id}
     *
     * @param  int $id
     * @param UpdateHistoriaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoriaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Historia $historia */
        $historia = $this->historiaRepository->findWithoutFail($id);

        if (empty($historia)) {
            return $this->sendError('Historia not found');
        }

        $historia = $this->historiaRepository->update($input, $id);

        return $this->sendResponse($historia->toArray(), 'Historia updated successfully');
    }

    /**
     * Remove the specified Historia from storage.
     * DELETE /historias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Historia $historia */
        $historia = $this->historiaRepository->findWithoutFail($id);

        if (empty($historia)) {
            return $this->sendError('Historia not found');
        }

        $historia->delete();

        return $this->sendResponse($id, 'Historia deleted successfully');
    }
}
