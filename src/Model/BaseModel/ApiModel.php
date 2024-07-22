<?php
namespace src\Model\BaseModel;
use Symfony\Component\HttpFoundation\Response;

class ApiModel{
    const ERROR_REQUIRED        = "001";
    const ERROR_FAILED          = "002";
    const ERROR_NOT_AUTHORIZED  = "003";

    
    /**
     * Validations
     */
    public static function checkRequired($field, $required, $request=true){
        foreach($required as $key){
            if ($request) {
                if(!$field->input($key)){
                    return self::resultError(self::ERROR_REQUIRED, "Required field ".$key);
                }
            }else{
                if(!$field[$key]){
                    return self::resultError(self::ERROR_REQUIRED, $key . " Unavailable");
                }
            }
        }
        return false;
    }


    /**
     * Result returns
     */
    public static function resultSuccess($rst, $message=''){
        if($message == ''){
            $message = 'OK';
        }
        $response = [
            'code'      => 200, 
            'message'   => $message,
            'status'    => true,
            'data'      => $rst
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    public static function resultError($code, $message=''){
        if($message == ''){
            $message = 'ERROR';
        }
        $response = [
            'code'      => $code, 
            'message'   => $message,
            'status'    => false,
        ];

        return response()->json($response, Response::HTTP_OK);
    }   
}