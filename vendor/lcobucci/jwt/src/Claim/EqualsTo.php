<?php
/**
 *
 */

namespace Lcobucci\JWT\Claim;

use Lcobucci\JWT\Claim;
use Lcobucci\JWT\ValidationData;

/**
 * Validatable claim that checks if value is strictly equals to the given data
 *
 * @since 2.0.0
 */
class EqualsTo extends Basic implements Claim, Validatable
{
    /**
     * {@inheritdoc}
     */
    public function validate(ValidationData $data)
    {
        if ($data->has($this->getName())) {
            return $this->getValue() === $data->get($this->getName());
        }

        return true;
    }
}
