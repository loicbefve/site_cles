<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    // porperty:

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="#[ ]#",
     *     match=false,
     *     message="Il est interdit d'utiliser des espaces ou des chiffres dans le Prénom."
     * )
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="#[ 0-9]#",
     *     match=false,
     *     message="Il est interdit d'utiliser des espaces ou des chiffres dans le Nom."
     * )
     */
    private $lastName;

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     max="3",
     *     maxMessage="Ouahouh ça fait un peu âgé! Vérifiez votre âge."
     * )
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $address1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"default":null})
     *
     */
    private $address2;

    /**
     * @ORM\Column(type="integer", length=5)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="5",
     *     max="5",
     *     maxMessage="S'il vous plait, vérifiez votre code postal",
     *     minMessage="S'il vous plait, vérifiez votre code postal")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=2)
     * @Assert\NotBlank()
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $roles;


    //**********************************************************


    //Constructor:

    public function _construct(){
    }
    //**********************************************************

    //getters:

    /**
     * @return mixed
     */
    public function getRoles(){
        return array($this->roles);
    }

    /**
     * @return mixed
     */
    public function getAge(){
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getCountry(){
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getAddress2(){
        return $this->address2;
    }

    /**
     * @return mixed
     */
    public function getCity(){
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getPostalCode(){
        return $this->postalCode;
    }

    /**
     * @return mixed
     */
    public function getAddress1(){
        return $this->address1;
    }

    /**
     * @return mixed
     */
    public function getLastName(){
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName(){
        return $this->firstName;
    }

    public function getUsername(){
        return $this->email;
    }

    public function getSalt(){
        return null;
    }

    public function getPassword(){
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword(){
        return $this->plainPassword;
    }
    //**********************************************

    //setters

    /**
     * @param mixed $roles
     */
    public function setRoles($roles): void{
        $this->role = $roles;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void{
        $this->age = $age;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void{
        $this->country = $country;
    }

    /**
     * @param mixed $address2
     */
    public function setAddress2($address2): void{
        $this->address2 = $address2;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void{
        $this->city = $city;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode): void{
        $this->postalCode = $postalCode;
    }

    /**
     * @param mixed $address1
     */
    public function setAddress1($address1): void{
        $this->address1 = $address1;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void{
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void{
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void{
        $this->password = $password;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void{
        $this->id = $id;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void{
        $this->email = $email;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword): void{
        $this->plainPassword = $plainPassword;
    }
    //**************************************************

    //serializer

    public function serialize(){
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            $this->firstName,
        ));
    }

    public function unserialize($serialized){
        list(
            $this->id,
            $this->email,
            $this->password,
            $this->firstName,
            ) = unserialize($serialized);
    }
    //*************************************************

    //erase

    public function eraseCredentials(){

    }
    //*************************************************
}
