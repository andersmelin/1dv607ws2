<?php
namespace model;
require_once("Validate.php");

class Member {

    private $firstname;
    private $lastname;

    public function __construct() {
        $this->validate = new Validate();
    }

    // TODO clarify which type of identification number the boatclub actually wants.
    // "personal number" could be a bad translation of Swedish "Personnummer", in req's, which in English would be Social Security Number.
    // and in some countries called something complete different.
    // a personal number can be anything, a social security number follows a certain format and contains numbers/letters
    // and dashes depening on country... could also be passport number etc.. so the requirement is not clear.
    // i made it into passportNumber since that's a globally recognized thing that everyone has. (and it'd be easier to get formatting, presumably).

    private $passportNumber;

    public function getFirstName() {
        return $this->firstname;
    }

    public function getLastName() {
        return $this->lastname;
    }

    public function setMemberName($firstname, $lastname) {
        $nameMinLength = 2;
        $nameMaxLength = 30;

        $this->validate->containsScript($firstname);
        $this->validate->containsScript($lastname);
        $this->validate->checkLength(strlen($lastname), $nameMinLength, $nameMaxLength);
        $this->validate->checkLength(strlen($firstname), $nameMinLength, $nameMaxLength);

        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getPassportNumber() {
        return $this->passportNumber;
    }

    public function setPassportNumber($passportNumber) {
        $this->validate->containsScript($passportNumber);
        $this->passportNumber = $passportNumber;
    }
}