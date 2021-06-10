<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userList;
    private $userDetail;

    public function __construct()
    {
        $this->userList = [
            [
                'id' => 1,
                'nit' => '00111',
                'nombre' => 'Pablo Andres Diaz',
                'consecutivo' => '00111-2',
                'estado' => '2'
            ],
            [
                'id' => 2,
                'nit' => '00123',
                'nombre' => 'Pablo Andres Diaz',
                'consecutivo' => '00123-1',
                'estado' => '1'
            ],
        ];

        $this->userDetail = [
            // 1
            [
                'id' => 1,
                'id_ficha' => 1,
                'cod_personal' => '12345',
                'cantidad_personal' => 10,
                'categoria' => 'dotación',
                'presupuesto' => 50000
            ],
            [
                'id' => 2,
                'id_ficha' => 1,
                'cod_personal' => '12345',
                'cantidad_personal' => 5,
                'categoria' => 'dotación',
                'presupuesto' => 25000
            ],
        ];

    }
    public function getUserDetail(Request $request)
    {
        $result = [];
        $ficha_id = $request->get('id');
        foreach ($this->userDetail as $key => $value) {
            if($value['id_ficha'] == $ficha_id) {
                $result[]= $value;
            }
        }
        return response()
            ->json($result)
            ->setStatusCode(200);
    }

    public function getTableList()
    {
        return response()
            ->json($this->userList)
            ->setStatusCode(200);
    }

    public function getDetailList()
    {
        return response()
            ->json($this->userDetail)
            ->setStatusCode(200);
    }
}
