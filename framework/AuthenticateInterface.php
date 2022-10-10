<?php


interface AuthenticationInterface
{

  static public function getInstance() : AuthenticationInterface;  
  
  static public function authenticate (User $user,string $page);

}