<?php

namespace Razorpay\Api;

class Patient extends Entity
{
    /**
     *  @param $id Patient id description
     */
    public function fetch($id)
    {
        return parent::fetch($id);
    }

    public function all($options = array())
    {
        return parent::all($options);
    }

    public function create($attributes = array())
    {
        return parent::create($attributes);
    }

    public function edit($attributes = null)
    {
        $entityUrl = $this->getEntityUrl().$this->id;

        return $this->request('PUT', $entityUrl, $attributes);
    }

    public function tokens()
    {
        $token = new Token();

        $token['patient_id'] = $this->id;

        return $token;
    }
}
