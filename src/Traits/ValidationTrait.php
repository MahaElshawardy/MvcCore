<?php

namespace MahaElshawardy\MvcCore\Traits;

use MahaElshawardy\MvcCore\Validations\ValidateInputs;
use MahaElshawardy\MvcCore\Helpers\ArrayValidator;
use MahaElshawardy\MvcCore\Helpers\Response;

trait ValidationTrait
{
    public function validated()
    {
        $arrayValidator = new ArrayValidator($this->all());
        if ($arrayValidator->array_keys_exists('io', 'jtl_token')) {
            $this->unset('io', 'jtl_token');
        }
        else{
            $this->unset('io');
        }
        $data = $this->all();
        $validator     = new ValidateInputs($data);
        if ($validator->passing_inputs_throw_validation_rules($this->rules())) {
            $errors = $validator->get_errors();
            if (count($errors) > 0) {
                return Response::json($errors, 422);
            } else {
                return $validator->get_validated_inputs();
            }
        };
    }
}
