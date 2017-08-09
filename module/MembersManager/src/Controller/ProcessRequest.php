<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 5/24/17
 * Time: 1:43 PM
 */

namespace MembersManager\Controller;

use MembersManager\Entities\Group;
use MembersManager\Entities\GroupedContact;
use MembersManager\Entities\GroupMessages;
use MembersManager\Entities\MemberProfile;
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
    const ADD_MEMBER_PROFILE = 'add_member_profile';
    const ADD_NEW_CONTACT = 'add_new_contact';
    const ADD_NEW_GROUP = 'add_new_group';
    const ADD_GROUP_CONTACT = 'add_group_contact';
    const ADD_NEW_GROUP_MESSAGE = 'add_new_group_message';


    const GET_ALL_USERS = 'get_all_users';
    const GET_ALL_GROUPS = 'get_all_groups';
    const GET_ALL_GROUP_MESSAGES = 'get_all_group_messages';
    const GET_ALL_MEMBER_CONTACTS = 'get_all_member_contacts';
    const GET_ALL_MEMBER_CONTACTS_IN_GROUP = 'get_all_member_contacts_in_group';
    const GET_ALL_MEMBER_CONTACTS_NOT_IN_GROUP = 'get_all_member_contacts_not_in_group';
    const GET_USER_PRIVILEGE = 'get_user_privilege';

    const ACTIVATE_USER = 'activate_user';
    const DEACTIVATE_USER = 'deactivate_user';

    const REMOVE_USER = 'remove_user';
    const REMOVE_GROUP = 'remove_group';
    const REMOVE_CONTACT = 'remove_contact';
    const REMOVE_GROUPED_CONTACT = 'remove_grouped_contact';
    const REMOVE_GROUP_MESSAGE = 'remove_group_message';

    const UPDATE_CONTACT = 'update_contact';

}
class FORMAT_REGISTER extends BasicEnum {
    const USER_NAME = 'user_name';
    const USER_PASS = 'user_pass';
    const USER_EMAIL = 'email';
    const FULL_NAME = 'full_name';
}
class FORMAT_USER_REGISTER extends BasicEnum {
    const USER_NAME = 'user_name';
    const USER_PASS = 'user_pass';
    const USER_EMAIL = 'email';
    const FULL_NAME = 'full_name';
    const PRIVILEGE = 'privilege_id';
}
class FORMAT_GROUP extends BasicEnum {
    const GROUP_NAME = 'name';
    const GROUP_DESCRIPTION = 'description';
}
class FORMAT_NEW_CONTACT extends BasicEnum {
    const CONTACT_FIRST_NAME = 'first_name';
    const CONTACT_MIDDLE_NAME = 'middle_name';
    const CONTACT_LAST_NAME = 'last_name';
    const CONTACT_PHONE = 'phone';
    const CONTACT_EMAIL = 'email';
    const CONTACT_AGE = 'age';
    const CONTACT_SEX = 'sex';
}
class FORMAT_CONTACT extends BasicEnum {
    const CONTACT_FIRST_NAME = 'first_name';
    const CONTACT_MIDDLE_NAME = 'middle_name';
    const CONTACT_LAST_NAME = 'last_name';
    const CONTACT_PHONE = 'phone';
    const CONTACT_EMAIL = 'email';
    const CONTACT_AGE = 'age';
    const CONTACT_SEX = 'sex';
    const CONTACT_COUNTRY = 'country';
    const CONTACT_REGION = 'region';
    const CONTACT_CITY = 'city';
    const CONTACT_WEREDA = 'wereda';
    const CONTACT_KEBELE = 'kebele';
    const CONTACT_HOUSE_NUM = 'house_num';
    const CONTACT_POSTAL_BOX = 'postal_box';
    const CONTACT_SYNOD = 'synod';
    const CONTACT_PRESBYTERY = 'presbytery';
    const CONTACT_CONGREGATION = 'congregation';
    const CONTACT_OTHER_CONGREGATION = 'other_congregation';
    const CONTACT_OCCUPATION = 'occupation';
    const CONTACT_OTHER_OCCUPATION = 'occupation';
    const CONTACT_EDUCATIONAL_BACKGROUND = 'educational_background';
    const CONTACT_QUALIFICATION = 'qualification';
    const CONTACT_CONTRIBUTION_PERIOD = 'contribution_period';
    const CONTACT_OTHER_CONTRIBUTION = 'other_contribution';
    const CONTACT_SPECIAL_GIFT= 'special_gift';
}
class FORMAT_UPDATE_CONTACT extends BasicEnum {
    const CONTACT_CONTACT_ID = 'contact_id';
    const CONTACT_FIRST_NAME = 'first_name';
    const CONTACT_MIDDLE_NAME = 'middle_name';
    const CONTACT_PHONE = 'phone';
    const CONTACT_EMAIL = 'email';
}
class FORMAT_GROUP_CONTACT extends BasicEnum {
    const GROUP_ID = 'group_id';
    const CONTACT_ID = 'contact_id';
}
class FORMAT_GROUP_MESSAGE extends BasicEnum {
    const GROUP_ID = 'group_id';
    const CAMPAIGN_NAME = 'campaign_name';
    const MESSAGE = 'message';
}
class FORMAT_MEMBER_REGISTER extends BasicEnum {
    const USER_NAME = 'user_name';
    const USER_PASS = 'user_pass';
    const USER_EMAIL = 'email';
    const FULL_NAME = 'full_name';
    const PRIVILEGE = 'privilege_id';
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
                    if ($found->getisActive()) {
                        $this->Message[ResponsesType::RESPONSE] = $found->getArray();
                    } else {
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
                    if ($superAdmin) {
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
                        if ($privilege) {
                            $newUser->setPrivilege($privilege);
                            $addedUser = $this->ServiceManager->addUser($newUser);
                            if ($addedUser) {
                                $this->Message[ResponsesType::RESPONSE] = $addedUser->getArray();
                            } else {
                                $this->Message[ResponsesType::ERROR] = "Failed to Register the user";
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Privilege not Found";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = "Invalid Registration Param used!";
                }
            } elseif ($this->getRequestedService() == AvailableServices::ADD_USER) {
                /** Add new user */
                if (FORMAT_USER_REGISTER::isValidParam($this->getRequestParam())) {
                    /**
                     * @var User $superAdmin
                     */
                    $superAdmin = $this->getSuperAdmin();
                    if ($superAdmin) {
                        $newUser = new User();
                        $newUser->setUserPass($this->getRequestParam()[FORMAT_USER_REGISTER::USER_PASS]);
                        $newUser->setUserName($this->getRequestParam()[FORMAT_USER_REGISTER::USER_NAME]);
                        $newUser->setFullName($this->getRequestParam()[FORMAT_USER_REGISTER::FULL_NAME]);
                        $newUser->setEmail($this->getRequestParam()[FORMAT_USER_REGISTER::USER_EMAIL]);
                        $newUser->setUpdatedBy($superAdmin);
                        $newUser->setCreatedBy($superAdmin);
                        $newPriv = new Privilege();
                        $newPriv->setId($this->getRequestParam()[FORMAT_USER_REGISTER::PRIVILEGE]);
                        // Get Privilege
                        $privilege = $this->ServiceManager->getPrivilege($newPriv);
                        if ($privilege) {
                            $newUser->setPrivilege($privilege);
                            $addedUser = $this->ServiceManager->addUser($newUser);
                            if ($addedUser) {
                                $this->Message[ResponsesType::RESPONSE] = $addedUser->getArray();
                            } else {
                                $this->Message[ResponsesType::ERROR] = "Failed to Register the user";
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Privilege not Found";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = "Invalid Registration Param used!";
                }
            } elseif ($this->getRequestedService() == AvailableServices::ADD_NEW_GROUP) {
                /** Add new user */
                if (FORMAT_GROUP::isValidParam($this->getRequestParam())) {
                    /**
                     * @var User $superAdmin
                     */
                    $superAdmin = $this->getSuperAdmin();
                    if ($superAdmin) {
                        $newGroup = new Group();
                        $newGroup->setName($this->getRequestParam()[FORMAT_GROUP::GROUP_NAME]);
                        $newGroup->setDescription($this->getRequestParam()[FORMAT_GROUP::GROUP_DESCRIPTION]);
                        $newGroup->setUpdatedBy($superAdmin);
                        $newGroup->setCreatedBy($superAdmin);
                        $addedGroup = $this->ServiceManager->addGroup($newGroup);
                        if ($addedGroup) {
                            $this->Message[ResponsesType::RESPONSE] = $addedGroup->getArray();
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Failed to add Group";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = "Invalid Registration Param used!";
                }
            } elseif ($this->getRequestedService() == AvailableServices::ADD_NEW_CONTACT) {
                /** Add new user */
                if (FORMAT_CONTACT::isValidParam($this->getRequestParam())) {
                    /**
                     * @var User $superAdmin
                     */
                    $superAdmin = $this->getSuperAdmin();
                    if ($superAdmin) {
                        $newMemberProfile = new MemberProfile();
                        $newMemberProfile->setFirstName($this->getRequestParam()[FORMAT_CONTACT::CONTACT_FIRST_NAME] ? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_FIRST_NAME]:"");
                        $newMemberProfile->setMiddleName($this->getRequestParam()[FORMAT_CONTACT::CONTACT_MIDDLE_NAME] ? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_MIDDLE_NAME]: "");
                        $newMemberProfile->setLastName($this->getRequestParam()[FORMAT_CONTACT::CONTACT_LAST_NAME]? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_LAST_NAME]: "");
                        $newMemberProfile->setPhone($this->getRequestParam()[FORMAT_CONTACT::CONTACT_PHONE]? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_PHONE]: "");
                        $newMemberProfile->setEmail($this->getRequestParam()[FORMAT_CONTACT::CONTACT_EMAIL]? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_EMAIL]: "");
                        $newMemberProfile->setAge($this->getRequestParam()[FORMAT_CONTACT::CONTACT_AGE]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_AGE]:"0");
                        $newMemberProfile->setSex($this->getRequestParam()[FORMAT_CONTACT::CONTACT_SEX]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_SEX]:"Male");
                        $newMemberProfile->setWereda($this->getRequestParam()[FORMAT_CONTACT::CONTACT_WEREDA]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_WEREDA]:"");
                        $newMemberProfile->setHouseNumber($this->getRequestParam()[FORMAT_CONTACT::CONTACT_HOUSE_NUM]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_HOUSE_NUM]:"");
                        $newMemberProfile->setPostalBox($this->getRequestParam()[FORMAT_CONTACT::CONTACT_POSTAL_BOX]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_POSTAL_BOX]:"");
                        $newMemberProfile->setOtherOccupation($this->getRequestParam()[FORMAT_CONTACT::CONTACT_OTHER_OCCUPATION]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_OTHER_OCCUPATION]:"");
                        $newMemberProfile->setOtherCongregation($this->getRequestParam()[FORMAT_CONTACT::CONTACT_OTHER_CONGREGATION]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_OTHER_CONGREGATION]:"");
                        $newMemberProfile->setQualification($this->getRequestParam()[FORMAT_CONTACT::CONTACT_QUALIFICATION]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_QUALIFICATION]:"");
                        $newMemberProfile->setUpdatedBy($superAdmin);
                        $newMemberProfile->setCreatedBy($superAdmin);
                        $addedContact = $this->ServiceManager->addMemberProfile($newMemberProfile);
                        if ($addedContact) {
                            $this->Message[ResponsesType::RESPONSE] = "Contact Registered Successfully";
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Failed to add Group";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = "Invalid Registration Param used!";
                }
            } elseif ($this->getRequestedService() == AvailableServices::UPDATE_CONTACT) {
                /** Add new user */
                $superAdmin = $this->getSuperAdmin();
                if ($superAdmin) {
                    $oldMember = new MemberProfile();
                    $oldMember->setId($this->getRequestParam()[FORMAT_UPDATE_CONTACT::CONTACT_CONTACT_ID]);
                    /**
                     * @var MemberProfile $newMemberProfile
                     */
                    $newMemberProfile = $this->ServiceManager->getMemberProfile($oldMember);
                    if($newMemberProfile){
                        $newMemberProfile->setFirstName($this->getRequestParam()[FORMAT_CONTACT::CONTACT_FIRST_NAME] ? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_FIRST_NAME]:"");
                        $newMemberProfile->setMiddleName($this->getRequestParam()[FORMAT_CONTACT::CONTACT_MIDDLE_NAME] ? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_MIDDLE_NAME]: "");
                        $newMemberProfile->setLastName($this->getRequestParam()[FORMAT_CONTACT::CONTACT_LAST_NAME]? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_LAST_NAME]: "");
                        $newMemberProfile->setPhone($this->getRequestParam()[FORMAT_CONTACT::CONTACT_PHONE]? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_PHONE]: "");
                        $newMemberProfile->setEmail($this->getRequestParam()[FORMAT_CONTACT::CONTACT_EMAIL]? $this->getRequestParam()[FORMAT_CONTACT::CONTACT_EMAIL]: "");
                        $newMemberProfile->setAge($this->getRequestParam()[FORMAT_CONTACT::CONTACT_AGE]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_AGE]:"0");
                        $newMemberProfile->setSex($this->getRequestParam()[FORMAT_CONTACT::CONTACT_SEX]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_SEX]:"Male");
                        $newMemberProfile->setWereda($this->getRequestParam()[FORMAT_CONTACT::CONTACT_WEREDA]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_WEREDA]:"");
                        $newMemberProfile->setHouseNumber($this->getRequestParam()[FORMAT_CONTACT::CONTACT_HOUSE_NUM]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_HOUSE_NUM]:"");
                        $newMemberProfile->setPostalBox($this->getRequestParam()[FORMAT_CONTACT::CONTACT_POSTAL_BOX]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_POSTAL_BOX]:"");
                        $newMemberProfile->setOtherOccupation($this->getRequestParam()[FORMAT_CONTACT::CONTACT_OTHER_OCCUPATION]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_OTHER_OCCUPATION]:"");
                        $newMemberProfile->setOtherCongregation($this->getRequestParam()[FORMAT_CONTACT::CONTACT_OTHER_CONGREGATION]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_OTHER_CONGREGATION]:"");
                        $newMemberProfile->setQualification($this->getRequestParam()[FORMAT_CONTACT::CONTACT_QUALIFICATION]?$this->getRequestParam()[FORMAT_CONTACT::CONTACT_QUALIFICATION]:"");
                        $newMemberProfile->setUpdatedBy($superAdmin);
                        $addedContact = $this->ServiceManager->updateMemberProfile($newMemberProfile);
                        if ($addedContact) {
                            $this->Message[ResponsesType::RESPONSE] = "Contact Updated Successfully";
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Failed to add Group";
                        }
                    }else{
                        $this->Message[ResponsesType::ERROR] = "member not found";
                    }

                } else {
                    $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                }
            }elseif ($this->getRequestedService() == AvailableServices::ADD_NEW_GROUP_MESSAGE) {
                /**
                 * @var User $superAdmin
                 */
                $mainUser = $this->getMainUser();
                if ($mainUser) {
                    if (FORMAT_GROUP_MESSAGE::isValidParam($this->getRequestParam())) {
                        $newGroup = new Group();
                        $newGroup->setId($this->getRequestParam()[FORMAT_GROUP_MESSAGE::GROUP_ID]);
                        /**
                         * @var Group $foundGroup
                         */
                        $foundGroup = $this->ServiceManager->getGroup($newGroup);
                        if($foundGroup){
                            $newGroupMessage = new GroupMessages();
                            $newGroupMessage->setMessage($this->getRequestParam()[FORMAT_GROUP_MESSAGE::MESSAGE]);
                            $newGroupMessage->setCampaignName($this->getRequestParam()[FORMAT_GROUP_MESSAGE::CAMPAIGN_NAME]);
                            $newGroupMessage->setGroup($foundGroup);
                            $newGroupMessage->setCreatedBy($mainUser);
                            $newGroupMessage->setUpdatedBy($mainUser);
                            $foundGroupedMessage = $this->ServiceManager->addGroupMessage($newGroupMessage);
                            if($foundGroupedMessage){
                                $contacts = $this->ServiceManager->listContactsByGroup($foundGroup);
                                if($contacts){
                                    foreach ($contacts as $contact){
                                        /**
                                         * @var MemberProfile $contact
                                         */
                                        $message = $this->ProcessMessage($contact,$this->getRequestParam()[FORMAT_GROUP_MESSAGE::MESSAGE]);
                                        $newSendMessage = array(
                                            "campaign_name"=>$this->getRequestParam()[FORMAT_GROUP_MESSAGE::CAMPAIGN_NAME],
                                            "to"=>$contact->getPhone(),
                                            "message"=>$message,
                                            );
                                        $sendData = array(
//                                            "user_name"=>$this->getRequestParam()[FORMAT_GROUP_MESSAGE::CAMPAIGN_NAME],
                                            "user_name"=>"ims",
//                                            "user_pass"=>$this->getRequestParam()[FORMAT_GROUP_MESSAGE::CAMPAIGN_NAME],
                                            "user_pass"=>"passims123",
                                            "service"=>"add_new_send_message",
                                            "param"=>json_encode($newSendMessage),
                                        );
                                        $this->sendNegaritSMS($sendData);
                                    }
                                }
                                $this->Message[ResponsesType::RESPONSE] = $foundGroupedMessage->getArray();
                            }else{
                                $this->Message[ResponsesType::ERROR] = "Error in adding contact group";
                            }
                        }else{
                            $this->Message[ResponsesType::ERROR] = "data not found here";
                        }
                    }else{
                        $this->Message[ResponsesType::ERROR] = Responses::Invalid_Param;
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                }
            } elseif ($this->getRequestedService() == AvailableServices::ADD_GROUP_CONTACT) {
                /** Add new user */
                if (FORMAT_GROUP_CONTACT::isValidParam($this->getRequestParam())) {
                    /**
                     * @var User $superAdmin
                     */
                    $mainUser = $this->getMainUser();
                    if ($mainUser) {
                        if (FORMAT_GROUP_CONTACT::isValidParam($this->getRequestParam())) {
                            $newContact = new MemberProfile();
                            $newContact->setId($this->getRequestParam()[FORMAT_GROUP_CONTACT::CONTACT_ID]);
                            /**
                             * @var MemberProfile $foundContact
                             */
                            $foundContact = $this->ServiceManager->getMemberProfile($newContact);

                            $newGroup = new Group();
                            $newGroup->setId($this->getRequestParam()[FORMAT_GROUP_CONTACT::GROUP_ID]);
                            /**
                             * @var Group $foundGroup
                             */
                            $foundGroup = $this->ServiceManager->getGroup($newGroup);
                            if($foundContact && $foundGroup){
                                $newGroupedContact = new GroupedContact();
                                $newGroupedContact->setMemberProfile($foundContact);
                                $newGroupedContact->setGroup($foundGroup);
                                $newGroupedContact->setCreatedBy($mainUser);
                                $newGroupedContact->setUpdatedBy($mainUser);
                                $foundGroupedContact = $this->ServiceManager->addGroupedContact($newGroupedContact);
                                if($foundGroupedContact){
                                    $this->Message[ResponsesType::RESPONSE] = $foundGroupedContact->getArray();
                                }else{
                                    $this->Message[ResponsesType::ERROR] = "Error in adding contact group";
                                }
                            }else{
                                $this->Message[ResponsesType::ERROR] = "could not found contact and group";
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = Responses::Invalid_Param;
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = "Invalid Registration Param used!";
                }
            } elseif ($this->getRequestedService() == AvailableServices::ADD_MEMBER_PROFILE) {
                /** Add new user */
                if (FORMAT_USER_REGISTER::isValidParam($this->getRequestParam())) {
                    /**
                     * @var User $superAdmin
                     */
                    $superAdmin = $this->getSuperAdmin();
                    if ($superAdmin) {
                        $newMemberProfile = new MemberProfile();
                        $newUser = new User();
                        $newUser->setUserPass($this->getRequestParam()[FORMAT_USER_REGISTER::USER_PASS]);
                        $newUser->setUserName($this->getRequestParam()[FORMAT_USER_REGISTER::USER_NAME]);
                        $newUser->setFullName($this->getRequestParam()[FORMAT_USER_REGISTER::FULL_NAME]);
                        $newUser->setEmail($this->getRequestParam()[FORMAT_USER_REGISTER::USER_EMAIL]);
                        $newUser->setUpdatedBy($superAdmin);
                        $newUser->setCreatedBy($superAdmin);
                        $newPriv = new Privilege();
                        $newPriv->setId($this->getRequestParam()[FORMAT_USER_REGISTER::PRIVILEGE]);
                        // Get Privilege
                        $privilege = $this->ServiceManager->getPrivilege($newPriv);
                        if ($privilege) {
                            $newUser->setPrivilege($privilege);
                            $addedUser = $this->ServiceManager->addUser($newUser);
                            if ($addedUser) {
                                $this->Message[ResponsesType::RESPONSE] = $addedUser->getArray();
                            } else {
                                $this->Message[ResponsesType::ERROR] = "Failed to Register the user";
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Privilege not Found";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "The Super Admin could not be found now! please try again!!!";
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = "Invalid Registration Param used!";
                }
            } elseif ($this->getRequestedService() == AvailableServices::GET_ALL_USERS) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        $foundUsers = $this->ServiceManager->getAllUsers();
                        $this->Message[ResponsesType::RESPONSE] = $foundUsers;
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            } elseif ($this->getRequestedService() == AvailableServices::GET_ALL_GROUPS) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        $foundUsers = $this->ServiceManager->getAllGroup();
                        $this->Message[ResponsesType::RESPONSE] = $foundUsers;
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            }elseif ($this->getRequestedService() == AvailableServices::GET_ALL_GROUP_MESSAGES) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        $foundUsers = $this->ServiceManager->getGroupMessages();
                        $this->Message[ResponsesType::RESPONSE] = $foundUsers;
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            }elseif ($this->getRequestedService() == AvailableServices::GET_ALL_MEMBER_CONTACTS) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 5) {
                        $foundUsers = $this->ServiceManager->getAllMemberProfile();
                        $this->Message[ResponsesType::RESPONSE] = $foundUsers;
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            }elseif ($this->getRequestedService() == AvailableServices::GET_ALL_MEMBER_CONTACTS_IN_GROUP) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newGroup = new Group();
                            $newGroup->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var Group $foundGroup
                             */
                            $foundGroup = $this->ServiceManager->getGroup($newGroup);
                            if($foundGroup){
                                $foundContact = $this->ServiceManager->getGroupedContactsByGroup($foundGroup);
                                $this->Message[ResponsesType::RESPONSE] = $foundContact;
                            }else{
                                $this->Message[ResponsesType::ERROR] = "there is no contacts in the company group";
                            }
                        }else{
                            $this->Message[ResponsesType::ERROR] = Responses::Invalid_Param;
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            }elseif ($this->getRequestedService() == AvailableServices::GET_ALL_MEMBER_CONTACTS_NOT_IN_GROUP) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newGroup = new Group();
                            $newGroup->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var Group $foundGroup
                             */
                            $foundGroup = $this->ServiceManager->getGroup($newGroup);
                            if($foundGroup){
                                $foundContact = $this->ServiceManager->getMemberContactsNotInByGroup($foundGroup);
                                $this->Message[ResponsesType::RESPONSE] = $foundContact;
                            }else{
                                $this->Message[ResponsesType::ERROR] = "there is no contacts in the company group";
                            }
                        }else{
                            $this->Message[ResponsesType::ERROR] = Responses::Invalid_Param;
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            } elseif ($this->getRequestedService() == AvailableServices::GET_USER_PRIVILEGE) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        $foundPrivileges = $this->ServiceManager->getLessPrivilege($found->getPrivilege());
                        $this->Message[ResponsesType::RESPONSE] = $foundPrivileges;
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            } elseif ($this->getRequestedService() == AvailableServices::REMOVE_USER) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newUser = new User();
                            $newUser->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var User $foundUser
                             */
                            $foundUser = $this->ServiceManager->getUser($newUser);
                            if ($foundUser) {
                                $foundUser->setIsActive(0);
                                $foundUser->setIsDeleted(1);
                                if ($this->ServiceManager->updateUser($foundUser)) {
                                    $this->Message[ResponsesType::RESPONSE] = "Account Deleted!!!";
                                } else {
                                    $this->Message[ResponsesType::ERROR] = Responses::Failed;
                                }
                            } else {
                                $this->Message[ResponsesType::ERROR] = Responses::Failed;
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Invalid Param";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            } elseif ($this->getRequestedService() == AvailableServices::REMOVE_GROUP) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newGroup = new Group();
                            $newGroup->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var Group $foundGroup
                             */
                            $foundGroup = $this->ServiceManager->getGroup($newGroup);
                            if ($foundGroup) {
                                $foundGroup->setIsActive(0);
                                $foundGroup->setIsDeleted(1);
                                if ($this->ServiceManager->updateGroup($foundGroup)) {
                                    $this->Message[ResponsesType::RESPONSE] = "Group Deleted!!!";
                                } else {
                                    $this->Message[ResponsesType::ERROR] = Responses::Failed;
                                }
                            } else {
                                $this->Message[ResponsesType::ERROR] = Responses::Failed;
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Invalid Param";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            }elseif ($this->getRequestedService() == AvailableServices::REMOVE_CONTACT) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newGroup = new MemberProfile();
                            $newGroup->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var MemberProfile $foundMemberProfile
                             */
                            $foundMemberProfile = $this->ServiceManager->getMemberProfile($newGroup);
                            if ($foundMemberProfile) {
                                $foundMemberProfile->setIsActive(0);
                                $foundMemberProfile->setIsDeleted(1);
                                if ($this->ServiceManager->updateMemberProfile($foundMemberProfile)) {
                                    $this->Message[ResponsesType::RESPONSE] = "Member Deleted!!!";
                                } else {
                                    $this->Message[ResponsesType::ERROR] = Responses::Failed;
                                }
                            } else {
                                $this->Message[ResponsesType::ERROR] = Responses::Failed;
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Invalid Param";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            }elseif ($this->getRequestedService() == AvailableServices::REMOVE_GROUP_MESSAGE) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newGroup = new GroupMessages();
                            $newGroup->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var GroupMessages $foundGroupMessage
                             */
                            $foundGroupMessage = $this->ServiceManager->getGroupMessage($newGroup);
                            if ($foundGroupMessage) {
                                $foundGroupMessage->setIsActive(0);
                                $foundGroupMessage->setIsDeleted(1);
                                if ($this->ServiceManager->removeGroupMessage($foundGroupMessage)) {
                                    $this->Message[ResponsesType::RESPONSE] = "Group Message Deleted!!!";
                                } else {
                                    $this->Message[ResponsesType::ERROR] = Responses::Failed;
                                }
                            } else {
                                $this->Message[ResponsesType::ERROR] = Responses::Failed;
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Invalid Param";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            }elseif ($this->getRequestedService() == AvailableServices::REMOVE_GROUPED_CONTACT) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newGroup = new GroupedContact();
                            $newGroup->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var GroupedContact $foundGroup
                             */
                            $foundGroup = $this->ServiceManager->getGroupedContact($newGroup);
                            if ($foundGroup) {
                                if ($this->ServiceManager->removeGroupedContact($foundGroup)) {
                                    $this->Message[ResponsesType::RESPONSE] = "Group Deleted!!!";
                                } else {
                                    $this->Message[ResponsesType::ERROR] = Responses::Failed;
                                }
                            } else {
                                $this->Message[ResponsesType::ERROR] = Responses::Failed;
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Invalid Param";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            }elseif ($this->getRequestedService() == AvailableServices::ACTIVATE_USER) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if ($found->getisActive() && $found->getPrivilege()->getId() < 3) {
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newUser = new User();
                            $newUser->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var User $foundUser
                             */
                            $foundUser = $this->ServiceManager->getUser($newUser);
                            if ($foundUser) {
                                $foundUser->setIsActive(1);
                                $foundUser->setIsDeleted(0);
                                if ($this->ServiceManager->updateUser($foundUser)) {
                                    $this->Message[ResponsesType::RESPONSE] = "Account Activated";
                                } else {
                                    $this->Message[ResponsesType::ERROR] = Responses::Failed;
                                }
                            } else {
                                $this->Message[ResponsesType::ERROR] = Responses::Failed;
                            }
                        } else {
                            $this->Message[ResponsesType::ERROR] = "Invalid Param";
                        }
                    } else {
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                } else {
                    $this->Message[ResponsesType::ERROR] = Responses::UnAuthorized_User;
                }
            } elseif ($this->getRequestedService() == AvailableServices::DEACTIVATE_USER) {
                /** Log in user */
                $found = $this->getMainUser();
                if ($found) {
                    if($found->getisActive() && $found->getPrivilege()->getId() < 3){
                        if (FORMAT_ByItemID::isValidParam($this->getRequestParam())) {
                            $newUser = new User();
                            $newUser->setId($this->getRequestParam()[FORMAT_ByItemID::ITEM_ID]);
                            /**
                             * @var User $foundUser
                             */
                            $foundUser = $this->ServiceManager->getUser($newUser);
                            if($foundUser){
                                $foundUser->setIsActive(0);
                                $foundUser->setIsDeleted(0);
                                if($this->ServiceManager->updateUser($foundUser)){
                                    $this->Message[ResponsesType::RESPONSE] = "Account DeActivated";
                                }else{
                                    $this->Message[ResponsesType::ERROR] = Responses::Failed;
                                }
                            }else{
                                $this->Message[ResponsesType::ERROR] = Responses::Failed;
                            }
                        }else{
                            $this->Message[ResponsesType::ERROR] = "Invalid Param";
                        }
                    }else{
                        $this->Message[ResponsesType::ERROR] = "Your account is inactive!";
                    }
                }
            } else {
                $this->Message[ResponsesType::ERROR] = Responses::Unknown_Service_Request;
            }
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
    private function sendNegaritSMS($data){
        $url = 'http://api.negarit.net/negarit';
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        file_get_contents($url, false, $context);

    }
    private function ProcessMessage(MemberProfile $contact, $message){
        $newMessage = $message;
        $str = $message;
        $sample = "{NAME}";
        $NamePos = strrpos($str,$sample);
        if($NamePos){
            if(substr($newMessage,$NamePos,strlen($sample)) == "{NAME}"){
                $newMessage = substr($str,0,$NamePos).$contact->getFirstName()." ".$contact->getMiddleName().substr($str,$NamePos+strlen($sample),strlen($str));
            }
        }
        return $newMessage;
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
