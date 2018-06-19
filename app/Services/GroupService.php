<?php

namespace App\Services;

use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Databse\QueryException;
use Exception;

class GroupService {

	private $repository;
	private $validator;

	public function __construct(GroupRepository $repository, GroupValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function store(array $data)
	{
		try{

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$grupo = $this->repository->create($data);

			return [
				'success' =>  true,
				'message' => 'Grupo Cadastrado!',
				'data' => $grupo
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
				'message' => 'Grupo Removido!',
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