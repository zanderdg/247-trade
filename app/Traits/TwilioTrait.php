<?php

namespace App\Traits;

use Exception;
use Twilio\Rest\Client;
use libphonenumber\PhoneNumberType;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use Twilio\Exceptions\TwilioException;
use libphonenumber\NumberParseException;
use Illuminate\Support\Facades\Validator;
use libphonenumber\PhoneNumberToCarrierMapper;
use libphonenumber\PhoneNumberToTimeZonesMapper;

trait TwilioTrait {

    
    /**
     * Get a validator for an incoming verification request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function verificationRequestValidator(array $data){
        return Validator::make($data, [
            'phone_number' => 'required|string',
            'via' => 'required|string|max:4',
        ]);
    }

    /**
     * Google Lookup service.
     * 
     * @param int|number
     * @param string|countryShortName
     * @return Illuminate\Support\Facades\Response
     */
    protected function NumberValidation($number, $countryShortName) {

        $phoneUtil = PhoneNumberUtil::getInstance();
        $carrierMapper = PhoneNumberToCarrierMapper::getInstance();
        $timezoneMapper = PhoneNumberToTimeZonesMapper::getInstance();
        $NumberType = PhoneNumberType::values();

        try {
            $swissNumberProto = $phoneUtil->parse($number, $countryShortName);
            $data = ([
                'basic' => $swissNumberProto,
                'International_Formatter' => $phoneUtil->format($swissNumberProto, PhoneNumberFormat::INTERNATIONAL),
                'National_Formatter' => $phoneUtil->format($swissNumberProto, PhoneNumberFormat::NATIONAL),
                'E164_Formatter' => $phoneUtil->format($swissNumberProto, PhoneNumberFormat::E164),
                'carrierName' => $carrierMapper->getNameForNumber($swissNumberProto, 'en'),
                'getNumberType' => $NumberType[$phoneUtil->getNumberType($swissNumberProto)],
                'isPossibleNumber' => $phoneUtil->isPossibleNumber($swissNumberProto),
                'isValidNumber' => $phoneUtil->isValidNumber($swissNumberProto),
                'isValidNumberForRegion' => $phoneUtil->isValidNumberForRegion($swissNumberProto, $countryShortName),
                'getTimeZonesForNumber' => $timezoneMapper->getTimeZonesForNumber($swissNumberProto)
            ]);

            return $data;
            
        } catch (NumberParseException $e) {
            return response()->json(['numberError' => $e]);
        }
    }

    /**
     * Request phone verification via PhoneVerificationService.
     *
     * @param  array  $data
     * @return Illuminate\Support\Facades\Response;
     */
    protected function startVerification($data) {
        
        $validator = $this->verificationRequestValidator($data);
        if ($validator->passes()) {
            try {
                $sid = config("app.twilio.account_sid");
                $token = config("app.twilio.auth_token");
                $twilio = new Client($sid, $token);

                $verification = $twilio->verify->v2->services(config('app.twilio.verification_sid'))
                        ->verifications
                        ->create(
                            $data['phone_number'], 
                            $data['via']
                        );

                return $verification;
            } catch (TwilioException $exception) {
                $message = "Verification failed to start: {$exception->getMessage()}";
                return response()->json($message, 400);
            }
        }

        return response()->json(['errors'=>$validator->errors()], 403);
    }

    /**
     * Verified give code via sms.
     *
     * @param  array  $request
     * @return Illuminate\Support\Facades\Response;
     */
    public function verifyToken(Array $request) {
        $sid = config('app.twilio.account_sid');
        $token = config('app.twilio.auth_token');
        $twilio = new Client($sid, $token);
        $data = (object)$request;
        try {
            $verification_check = $twilio->verify->v2->services(config('app.twilio.verification_sid'))
                ->verificationChecks
                ->create($data->code, // code
                        ["to" => $data->full_number]
                );
            
            return $verification_check;
        } catch(\Exception $execption) {
            return dd($execption);
        }
        
    }
}