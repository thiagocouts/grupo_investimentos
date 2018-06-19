<?php

namespace App\Services;

use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Databse\QueryException;
use Exception;

class InstituitionService {

	private $repository;
	private $validator;

	public function __construct(InstituitionRepository $repository, InstituitionValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function store(array $data)
	{
		try{

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$instituition = $this->repository->create($data);

			return [
				'success' =>  true,
				'message' => 'Instituição Cadastrada!',
				'data' => $instituition
			];
			
		}catch(Exception $e) {
			
			switch(get_class($e)){
				case QueryException::class     : return ['success' => false, 'message' => $e->getMessage()];
				case ValidatorException::class : return ['success' => false, 'message' => $e->getMessageBag()];
				case Exception::class          : return ['success' => false, 'message' => $e->getMessage()];
				default                        : return ['success' => false, 'message' => $e->getMessage()];
			}
		}
	}

	public function destroy($id)
	{
		try{

			$this->repository->delete($id);

			return [
				'success' =>  true,
				'message' => 'Instituição Removida!',
				'data' => null
			];
			
		}catch(Exception $e){

			switch(get_class($e)){
				case QueryException::class     : return ['success' => false, 'message' => $e->getMessage()];
				case ValidatorException::class : return ['success' => false, 'message' => $e->getMessageBag()];
				case Exception::class          : return ['success' => false, 'message' => $e->getMessage()];
				default                        : return ['success' => false, 'message' => $e->getMessage()];
			}
		}
	}
}