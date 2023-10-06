<?php

namespace App\tools;

class paramsHelper
{
    private array $inputs = array();
    /**
     * @param array $inputs
     * @return ParamsHelper
     */
    public function setInputs(?array $inputs): ParamsHelper
    {
        $this->inputs = $inputs;
        return $this;
    }

    /**
     * @return array
     */
    public function getInputs(): ?array
    {
        return $this->inputs;
    }

}