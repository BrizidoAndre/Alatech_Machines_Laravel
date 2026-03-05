<?php

namespace App\Http\Controllers;

use App\Http\Requests\MachineRequest;
use App\Http\Requests\MachineUpdateRequest;
use App\Http\Requests\VerifyMachineRequest;
use App\Http\Resources\MachineResource;
use App\Models\GraphicCard;
use App\Models\Machine;
use App\Models\MachineHasStorageDevice;
use App\Models\Motherboard;
use App\Models\PowerSupply;
use App\Models\Processor;
use App\Models\RamMemory;
use App\Models\StorageDevice;
use File;

class GeneralController extends Controller
{
    /**
     * Query the model based on string value given by model parameter
     * by default it returns motherboards
     * @param $model
     * @return GraphicCard[]|Machine[]|Motherboard[]|PowerSupply[]|Processor[]|RamMemory[]|StorageDevice[]|array
     */
    public function index($model)
    {
        $model = $this->getRightModel($model);
        $query = $model->paginate(request()->query('pageSize', 10));
        $query->setPageName('page');
        return $query->all();
    }

    /**
     *  Query the model based on string value given by model parameter and the query given by the q url parameter
     *  by default it returns motherboards
     * @param $model
     * @return GraphicCard[]|Machine[]|Motherboard[]|PowerSupply[]|Processor[]|RamMemory[]|StorageDevice[]|array
     */
    public function search($model)
    {
        $search = request()->query('q', '');
        $model = $this->getRightModel($model);
        $query = $model->whereLike('name', "%$search%")
            ->paginate(request()->query('pageSize', 10));
        $query->setPageName('page');
        return $query->all();
    }

    /**
     * Get the model based on specific string
     * defaults motherboards
     */
    public function getRightModel($modelString)
    {
        return match ($modelString) {
            'processors' => Processor::query(),
            'ram-memories' => RamMemory::query(),
            'storage-devices' => StorageDevice::query(),
            'graphic-cards' => GraphicCard::query(),
            'power-supplies' => PowerSupply::query(),
            'machines' => Machine::query()->with('storageDevices'),
            default => Motherboard::query(),
        };
    }

    /**
     * Creates a machine
     */
    public function store(MachineRequest $request)
    {
        $machine = Machine::create([
            ...$request->validated(),
            'ramMemoryAmount' => $request->validated('memoryAmount'),
            'ramMemoryId' => $request->validated('memoryId'),
        ]);
        $storages = $request->validated('storageDevices');
        $storages = collect($storages)->transform(function ($storage) use ($machine) {
            $storage['machineId'] = $machine->id;
            return $storage;
        });
        MachineHasStorageDevice::insert($storages->toArray());
        return $machine;
    }

    /**
     * Updated an existing machine
     * @param MachineUpdateRequest $request
     * @param Machine $model
     * @return Machine
     */
    public function update(MachineUpdateRequest $request, Machine $model)
    {
        $model->update([
            ...$request->validated(),
            'ramMemoryAmount' => $request->validated('memoryAmount', $model->ramMemoryAmount),
            'ramMemoryId' => $request->validated('memoryId', $model->ramMemoryId),
        ]);
        MachineHasStorageDevice::where(['machineId' => $model->id])->delete();
        $storages = $request->validated('storageDevices');
        $storages = collect($storages)->transform(function ($storage) use ($model) {
            $storage['machineId'] = $model->id;
            return $storage;
        });
        MachineHasStorageDevice::insert($storages->toArray());
        return $model;
    }

    /**
     * Destroy a machine record
     * @param Machine $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $model)
    {
        $model->delete();
        return response()->noContent();
    }

    /**
     * Verify if the user components are valid to create a machine
     * @param VerifyMachineRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(VerifyMachineRequest $request)
    {
        return $this->message(200, [
            'message' => 'Máquina válida'
        ]);
    }

    /**
     * get the image name of the string
     */
    public function images($id)
    {
        $files = File::allFiles(public_path('/images'));
        $image = collect($files)->first(function ($file) use ($id) {
            return $file->getFilenameWithoutExtension() === $id;
        });
        if (!$image) {
            return $this->message(404, [
                'message' => 'imagem não encontrada'
            ]);
        }
        return response()->file($image);
    }
}
