<?php

namespace App\Http\Controllers;

use Core\Application\RequireSearch;
use Core\Domain\Entities\PostcodeRequest;
use DomainException;
use Exception;
use Illuminate\Http\Request;
use App\Http\Helper\ResponseHelper;
use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;

class CountryController extends Controller
{
    private ResponseHelper $helper;
    private LoggerInterface $logger;
    private RequireSearch $requireSearch;

    public function __construct(
        ResponseHelper $helper,
        LoggerInterface $logger ,
    ) {
        $this->helper = $helper;
        $this->logger = $logger ;
        $this->requireSearch =  new RequireSearch($this->logger) ;
    }

    /**
     * @OA\Post(
     *     path="/location/country",
     *     operationId="/location/country",
     *     tags={"countries"},
     *     @OA\Parameter(
     *         name="country",
     *         in="query",
     *         description="ISO 2 Code of countrys in World, like NL,BR,US,PT",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="continent",
     *         in="query",
     *         description="ISO 2 Code of continents in World, like EU,AS,SA,AF,NA,AN,OC",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="geonameid",
     *         in="query",
     *         description="ISO 2 Code of continents in World, like EU,AS,SA,AF,NA,AN,OC",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns array with address information about de postcode",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */

    public function search(Request $request) :object
    {
        Log::info('Received postcode search', ['payload' => $request->all()]);
        try {
            if (empty($request->country)) {
                throw new DomainException('Country request may not be null');
            }
            if (empty($request->code)) {
                throw new DomainException('Postcode request may not be null');
            }
            $result = $this->requireSearch->handle(new PostcodeRequest($request->country,$request->code)) ;
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), ['exception' => $exception]);
            return $this->helper->error([$exception->getMessage()], 400);
        }
        return $this->helper->success([$result], 200);
    }
}
