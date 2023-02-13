<?php

namespace App\Services\Equipment;

use App\Models\Equipment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationExtendException;
use App\Models\EquipmentType;
use App\Services\Regex\Constructor;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Resources\Equipment\IndexResource;
use App\Http\Resources\Equipment\StoreResource;

/**
 * EquipmentService
 * This is service class for Equipment model
 */
class EquipmentService
{
    private $errors = null;
    /**
     * @param int $id
     *
     * @return IndexResource|Response
     */
    public function show(int $id)
    {
        try {
            $status = 'complete';
            $message = Equipment::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            $status = 'error';
            $message = $e->getMessage();
        }
        return (['status' => $status,'message' => $message]);
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->input('data');
        try {
            $result = $this->validateArrayEquipment($input);
            Equipment::insert($result);
            $status = 'complete';
            $message = 'store complete';
        } catch (Exception $e) {
            $status = 'error';
            $message = $this->errors;
        }
        return (['status' => $status,'message' => $message]);
    }

    /**
     * @param mixed   $id
     * @param Request $request
     *
     * @return [type]
     */
    public function update($id, Request $request)
    {
        $input = $request->input('data');
        try {
            $equipment = Equipment::find($id);
            $result = $this->validateEquipment($input, $id);
            $equipment->update($result[0]);
            $status = 'complete';
            $message = 'update complete';
        } catch (Exception $e) {
            $status = 'error';
            $message = $e->getMessage();
        }
        return (['status' => $status,'message' => $message]);
    }

    /**
     * @param int $id
     *
     * @return Response
     */
    public function destroy(int $id)
    {
        if (Equipment::find($id)) {
            Equipment::destroy($id);
            $status = 'complete';
            $message = 'destroy complete';
        } else {
            $status = 'error';
            $message = 'record with this id does not exist';
        }
        return (['status' => $status,'message' => $message]);
    }

    /**
     * @param array $input
     *
     * @return array|ValidationExtendException
     */
    public function validateArrayEquipment(array $input): array|ValidationExtendException
    {
        $resultData = [];
        foreach ($input as $equipment) {
            if ($this->validateId($equipment)) {
                $serialNumberMask = $this->getMask($equipment['equipment_type_id']);
                $regexConstructor = new Constructor();
                $regex = $regexConstructor->make($serialNumberMask);
                $validator = Validator::make(
                    $equipment,
                    [
                    'equipment_type_id' => 'required|integer',
                    'serial_number' => [
                        'required', Rule::unique('App\Models\Equipment')->where(
                            fn ($query) => $query->where('equipment_type_id', $equipment['equipment_type_id'])
                        ), 'regex:/' . $regex . '/',
                    ],
                    'note' => 'string'
                    ]
                );
                if (!$validator->fails()) {
                    $tmp = $validator->validated();
                    $tmp['created_at'] = now();
                    $tmp['updated_at'] = now();
                    $resultData[] = $tmp;
                } else {
                    $validator->errorInput = $equipment;
                    $validatorErrors[] = $validator;
                }
            }
        }

        if ($validatorErrors) {
            foreach ($validatorErrors as $validator) {
                $validatorError = new ValidationExtendException($validator);
                $errors[] = $validatorError->getMessage();
            }
            $this->errors = $errors;
            throw (new Exception());
        } else {
            return $resultData;
        }
    }

    /**
     * @param array $input
     * @param mixed $id
     *
     * @return array|ValidationExtendException
     */
    public function validateEquipment(array $input, $id): array|ValidationExtendException
    {
        $resultData = [];
        foreach ($input as $equipment) {
            if ($this->validateId($equipment)) {
                $serialNumberMask = $this->getMask($equipment['equipment_type_id']);
                $regexConstructor = new Constructor();
                $regex = $regexConstructor->make($serialNumberMask);
                $validator = Validator::make(
                    $equipment,
                    [
                    'equipment_type_id' => 'required|integer',
                    'serial_number' => [
                        'required',
                        Rule::unique('App\Models\Equipment')->where(
                            fn ($query) => $query->where('equipment_type_id', $equipment['equipment_type_id'])
                        )->ignore($id), 'regex:/' . $regex . '/',
                    ],
                    'note' => 'string'
                    ]
                );
                if (!$validator->fails()) {
                    $tmp = $validator->validated();
                    $tmp['created_at'] = now();
                    $resultData[] = $tmp;
                } else {
                    $validator->errorInput = $equipment;
                    throw (new ValidationExtendException($validator));
                }
            }
        }
        return $resultData;
    }

    /**
     * @param int|null $id
     *
     * @return string|null
     */
    public function getMask(int|null $id): string|null
    {
        return EquipmentType::where('id', $id)->value('serial_number_mask');
    }

    /**
     * @param array $equipment
     *
     * @return bool|ValidationExtendException
     */
    public function validateId(array $equipment): bool|ValidationExtendException
    {
        $validator = Validator::make($equipment, ['equipment_type_id' => 'required|integer',]);
        if ($validator->fails()) {
            $validator->errorInput = $equipment;
            throw (new ValidationExtendException($validator));
        } else {
            if (EquipmentType::where('id', $equipment['equipment_type_id'])->exists()) {
                return true;
            } else {
                throw (new Exception('equipment_type_id not found'));
            }
        }
    }
}
