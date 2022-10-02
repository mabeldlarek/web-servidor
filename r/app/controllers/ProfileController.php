<?php

class ProfileController extends PublicController
{

    public function __construct()
    {
        parent::__construct('perfil' ,  new EmprestimoDAO());
    }

}