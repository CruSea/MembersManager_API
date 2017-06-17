<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 5/24/17
 * Time: 1:43 PM
 */

namespace MembersManager\Controller;

use MembersManager\Entities\Privilege;
use MembersManager\Entities\User;
use MembersManager\Services\Service;

class Responses {
    const Invalid_Request_Format = 'Invalid Request Format';
    const USER_PASS = 'user_pass';
    const SERVICE = 'service';
    const PARAM = 'param';
    const Unknown_Service_Request = "Unknown Service Request";
    const Invalid_Param_For_Signup = "Invalid Param for Sign up";
    const Invalid_User_Account = "Invalid User Credential used!";
    const Registration_Failed = "Registration Failed";
    const Failed = "Failed";
    const Invalid_Param = "Invalid Parameter Used!";
    const UnAuthorized_User = "UnAuthorized User!";
    const Permission_Denied = "Permission Denied";
}
class ResponsesType {
    const ERROR = 'error';
    const RESPONSE = 'response';
    const SERVICE = 'service';
    const PARAM = 'param';
    const Unknown_Service_Request = "Unknown Service Request";
}
class RequestFormat extends BasicEnum {
    const USER_NAME = 'user_name';
    const USER_PASS = 'user_pass';
    const SERVICE = 'service';
    const PARAM = 'param';
}
abstract class AvailableServices extends BasicEnum {
    const AUTHENTICATE = 'authenticate';
    const LOG_IN = 'log_in';
    const REGISTER = 'register';
    const FORGOT_PASSWORD = 'forgot_password';

    const ADD_USER = 'add_user';
    const GET_ALL_USERS = 'get_all_users';

}
class FORMAT_REGISTER extends BasicEnum {
    const USER_NAME = 'user_name';
    const USER_PASS = 'user_pass';
    const USER_EMAIL = 'email';
    const FULL_NAME = 'full_name';
}

class FORMAT_ByItemID extends BasicEnum {
    const ITEM_ID = 'item_id';
}
class ProcessRequest
{
    /**
     * @var Service $ServiceManager;
     */
    protected $ServiceManager;
    protected $Request;
    protected $Message;

    /**
     * ProcessRequest constructor.
     * @param Service $ServiceManager
     * @param $Request
     */
    public function __construct(Service $ServiceManager, $Request)
    {
        $this->ServiceManager = $ServiceManager;
        $this->Request = $Request;
    }

    /**
     * @return Service
     */
    public function getServiceManager()
    {
        return $this->ServiceManager;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->Request;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->Message;
    }

    private function isValidRequestFormat(){
        return RequestFormat::isValidParam($this->Request);
    }
    private function getRequestedService(){
        return $this->Request[RequestFormat::SERVICE];
    }
    private function getRequestParam(){
        return json_decode($this->Request[RequestFormat::PARAM],true);
    }
    private function getMainUser(){
        $newUser = new User();
        $newUser->setId(1);
        $newUser->setUserPass($this->Request[RequestFormat::USER_PASS]);
        $newUser->setUserName($this->Request[RequestFormat::USER_NAME]);
        $newUser->setEmail($this->Request[RequestFormat::USER_NAME]);
        $foundUser = $this->ServiceManager->checkUser($newUser);
        if($foundUser){
            if($foundUser && $foundUser->getPrivilege()->getId() != 0){
                return $foundUser;
            }else{
                $this->Message[ResponsesType::ERROR] = Responses::Invalid_User_Account;
            }
        }else{
            $this->Message[ResponsesType::ERROR] = Responses::Invalid_User_Account;
        }

    }
    private function getSuperAdmin(){
        $newUser = new User();
        $newUser->setId(1);
        $foundUser = $this->ServiceManager->getUser($newUser);
        if($foundUser){
            return $foundUser;
        }else{
            return null;
        }
    }

    /**
     * @return bool
     */
    private function ProcessRequest()
    {
        if (in_array($this->getRequestedService(), array_values(AvailableServices::getConstants()))) {
            /**
             * Check for Services
             */
            if ($this->getRequestedService() == AvailableServices::AUTHENTICATE) {
                /** Authenticate user */
                return true;
            } elseif ($this->getRequestedService() == AvailableServices::LOG_IN) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if($found->getisActive()){
                        $this->Message[ResponsesType::RESPONSE] = $found->getArray();
                    }else{
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            } elseif ($this->getRequestedService() == AvailableServices::REGISTER) {
                /** Sign up new user */
                if (FORMAT_REGISTER::isValidParam($this->getRequestParam())) {
                    /**
                     * @var User $superAdmin
                     */
                    $superAdmin = $this->getSuperAdmin();
                    if($superAdmin){
                        $newUser = new User();
                        $newUser->setUserPass($this->getRequestParam()[FORMAT_REGISTER::USER_PASS]);
                        $newUser->setUserName($this->getRequestParam()[FORMAT_REGISTER::USER_NAME]);
                        $newUser->setFullName($this->getRequestParam()[FORMAT_REGISTER::FULL_NAME]);
                        $newUser->setEmail($this->getRequestParam()[FORMAT_REGISTER::USER_EMAIL]);
                        $newUser->setUpdatedBy($superAdmin);
                        $newUser->setCreatedBy($superAdmin);
                        $newPriv = new Privilege();
                        $newPriv->setId(2);
                        // Get Privilege
                        $privilege = $this->ServiceManager->getPrivilege($newPriv);
                        if($privilege){
                            $newUser->setPrivilege($privilege);
                            $addedUser = $this->ServiceManager->addUser($newUser);
                            if ($addedUser) {
                                $this->Message[ResponsesType::RESPONSE] = $addedUser->getArray();
                            } else {
                                $this->Message[ResponsesType::ERROR] = "Failed to Register the user";
                            }
                        }else{
                            $this->Message[ResponsesType::ERROR] = "Privilege not Found";
                        }
                    }else{
                        $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = "Invalid Registration Param used!";
                }
            }elseif ($this->getRequestedService() == AvailableServices::REGISTER){

            }else {
                $this->Message[ResponsesType::ERROR] = Responses::Unknown_Service_Request;
            }
        }else{
            $this->Message[ResponsesType::ERROR] = Responses::Unknown_Service_Request;
        }
    }
    public function Process(){
        if($this->isValidRequestFormat()){
            $this->ProcessRequest();
        }else{
            $this->Message[ResponsesType::ERROR] = Responses::Invalid_Request_Format;
        }
    }
    private function getRandomString(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = "";
        for($i = 0; $i<36; $i++){
            $randString .=$characters[rand(0,strlen($characters)-1)];
        }
        return $randString;
    }
    private function getCapitalRandomString($length){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = "";
        for($i = 0; $i<$length; $i++){
            $randString .=$characters[rand(0,strlen($characters)-1)];
        }
        return $randString;
    }

//    private function SendActivationEmail(ActivationEmail $activationEmail){
//        $mail = new \PHPMailer();
//        $mail ->IsSmtp();
//        $mail ->SMTPDebug = 0;
//        $mail ->SMTPAuth = true;
//        $mail ->SMTPSecure = 'ssl';
//        $mail ->Host = "23.236.62.147";
//        $mail ->Port = 465; // or 587
//        $mail ->IsHTML(true);
//        $mail ->Username = "george.beng@gmail.com";
//        $mail ->Password = "georgeben";
//        $mail ->SetFrom("george.beng@gmail.com");
//        $mail ->Subject = "Negarit SMS Solution";
//        $mail ->Body = $activationEmail->getActivationCode();
//        $mail ->AddAddress($activationEmail->getEmailAddress());
//        if($mail->send()){
//            return true;
//        }else{
//            return false;
//        }
//
//    }
//    private function ProcessMessage(Contact $contact, $message){
//        $newMessage = $message;
//        $str = $message;
//        $sample = "{NAME}";
//        $NamePos = strrpos($str,$sample);
//        if($NamePos){
//            if(substr($newMessage,$NamePos,strlen($sample)) == "{NAME}"){
//                $newMessage = substr($str,0,$NamePos).$contact->getFullName().substr($str,$NamePos+strlen($sample),strlen($str));
//            }
//        }
//        return $newMessage;
//    }

}