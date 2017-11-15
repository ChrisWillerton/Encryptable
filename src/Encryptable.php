<?php

namespace ChrisWillerton\Encryptable;

use Log;
use Illuminate\Contracts\Encryption\DecryptException;

trait Encryptable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (isset($this->encryptedAttributes) && in_array($key, $this->encryptedAttributes))
        {
            try
            {
                $value = decrypt($value);
            }
            catch (DecryptException $e)
            {
                Log::error('Attribute "' . $key . '" cannot be decrypted in class ' . get_class($this));
            }
        }

        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (isset($this->encryptedAttributes) && in_array($key, $this->encryptedAttributes))
        {
            $value = encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}