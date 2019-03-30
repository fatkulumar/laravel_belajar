<?php
namespace App\AppServices\Lokasi;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\AppServices\ApplicationService;
use App\Lokasi;

use \Softon\LaravelFaceDetect\Facades\FaceDetect;



class StoreLokasiService extends ApplicationService
{
    /**
     * @var id
     */
    protected $id;
    protected $crop_params;
    /**
     * @param array $data
     * @param Lokasi lokasi saat ini
     * @return array
     */
    public function call(array $data)
    {
        $this->crop_params = (FaceDetect::extract('assets/pp.jpg')->face_found)=='1'?'true':'false';
        try {
            $crop_params = (FaceDetect::extract('assets/pp.jpg')->face_found)=='1'?'true':'false';
                $result=false;
                if ($crop_params==='true') {
                    DB::beginTransaction();
                    $lokasi = new Lokasi();
                    $lokasi->longitude = $data['longitude'];
                    $lokasi->latitude = $data['latitude'];
                    $lokasi->photo = $data['foto'];
                    $lokasi->face = $this->crop_params;
                    $lokasi->save();
                }
            $this->id = $lokasi->id;
            DB::commit();
            return $this->successResponse();
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public function getCropParams()
    {
        return $this->crop_params;
    }

}
