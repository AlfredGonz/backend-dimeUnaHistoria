<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHistoriaRequest;
use App\Http\Requests\UpdateHistoriaRequest;
use App\Repositories\HistoriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HistoriaController extends AppBaseController
{
    /** @var  HistoriaRepository */
    private $historiaRepository;

    public function __construct(HistoriaRepository $historiaRepo)
    {
        $this->historiaRepository = $historiaRepo;
    }

    /**
     * Display a listing of the Historia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historiaRepository->pushCriteria(new RequestCriteria($request));
        $historias = $this->historiaRepository->all();

        return view('historias.index')
            ->with('historias', $historias);
    }

    /**
     * Show the form for creating a new Historia.
     *
     * @return Response
     */
    public function create()
    {
        return view('historias.create');
    }

    /**
     * Store a newly created Historia in storage.
     *
     * @param CreateHistoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoriaRequest $request)
    {
        $input = $request->all();

        $historia = $this->historiaRepository->create($input);

        Flash::success('Historia saved successfully.');

        return redirect(route('historias.index'));
    }

    /**
     * Display the specified Historia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historia = $this->historiaRepository->findWithoutFail($id);

        if (empty($historia)) {
            Flash::error('Historia not found');

            return redirect(route('historias.index'));
        }

        return view('historias.show')->with('historia', $historia);
    }

    /**
     * Show the form for editing the specified Historia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historia = $this->historiaRepository->findWithoutFail($id);

        if (empty($historia)) {
            Flash::error('Historia not found');

            return redirect(route('historias.index'));
        }

        return view('historias.edit')->with('historia', $historia);
    }

    /**
     * Update the specified Historia in storage.
     *
     * @param  int              $id
     * @param UpdateHistoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoriaRequest $request)
    {
        $historia = $this->historiaRepository->findWithoutFail($id);

        if (empty($historia)) {
            Flash::error('Historia not found');

            return redirect(route('historias.index'));
        }

        $historia = $this->historiaRepository->update($request->all(), $id);

        Flash::success('Historia updated successfully.');

        return redirect(route('historias.index'));
    }

    /**
     * Remove the specified Historia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historia = $this->historiaRepository->findWithoutFail($id);

        if (empty($historia)) {
            Flash::error('Historia not found');

            return redirect(route('historias.index'));
        }

        $this->historiaRepository->delete($id);

        Flash::success('Historia deleted successfully.');

        return redirect(route('historias.index'));
    }
}
