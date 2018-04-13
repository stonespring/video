<?php
/**
 * Api接口 交互
 */

namespace App\Http\Controllers\Code\api;

use App\Http\Controllers\ApiController;
use App\Models\Task;
use App\Models\Vods;
use app\Transformer\VodsTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AddController extends ApiController
{
    /**
     * @var VodsTransformer
     */
    protected $vodsTransformer;

    /**
     * AddController constructor.
     * @param VodsTransformer $vodsTransformer
     */
    public function __construct(VodsTransformer $vodsTransformer)
    {
        $this->vodsTransformer = $vodsTransformer;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    //审核接口通过
    public function httpAdd()
    {
        $row = isset($_POST) ? $_POST : '';
        $data = Vods::find($row);
        if (!$data) {
            return $this->responseNotFound();
        }
        return $this->apiResponse([
            'status' => 'success',
            'data' => $this->vodsTransformer->transformCollection($data->toArray(), '')   //隐藏数据库字段名(重构)
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function editApi()
    {
        if (!$_POST) {
            $data = [
                'stauts' => 'success',
                'code' => 404,
                'data' => 'Not Found'
            ];
            return $this->apiResponse($data);
        }
        $row = isset($_POST) ? $_POST : '';
        $data = Vods::find($row);
        if (!$data) {
            return $this->responseNotFound();
        }
        return $this->apiResponse([
            'status' => 'success',
            'data' => $this->vodsTransformer->transformCollection($data->toArray(), '')   //隐藏数据库字段名(重构)
        ]);
    }

    /**
     *接收任务接口
     */
    public function taskApi()
    {
        $data = isset($_POST) ? $_POST : '请求失败';
        $u = [];
        if (is_array($data)) {
            $u = $data['name'];
            foreach ($data['list'] as $key => $value) {
                $value['identifier'] = $u;
                $value['name'] = $value['vod_name'];
                unset($value['vod_name']);
                $row = DB::table('tasks')->insert($value);
            }
        }
        if ($row !== false) {
            return $this->apiResponse([
                'status' => 200
            ]);
        } else {
            return $this->apiResponse([
                $this->responseNotFound()
            ]);
        }
    }

    /**
     * 删除任务
     */
    public function taskDelApi()
    {
        $id = isset($_POST) ? $_POST : '没数据';
        $del = Task::find($id);
        $del->delete();
        return $this->apiResponse([
            'Code' => 200,
            'message' => '删除成功',
        ]);
    }
}
