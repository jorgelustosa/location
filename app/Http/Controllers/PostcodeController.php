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

class PostcodeController extends Controller
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
