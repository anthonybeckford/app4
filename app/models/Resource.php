<?php


class Resource extends Eloquent
{

    protected $fillable = ['name', 'image'];


    public function __toString()
    {
        return (string) $this->name;
    }

}