# Encryptable
Trait for use with Laravel 5 models allowing easy encryption/decryption of attributes.


## Installation

Add the following to the `composer.json` file in your project:

    "chriswillerton/encryptable": "1.*"

or you can run the below on the command line in the root of your project:

    composer require "chriswillerton/encryptable" "1.*"


## Setup

To get started, add the trait to the model:

    use ChrisWillerton\Encryptable\Encryptable;

    class YourModel extends Eloquent
    {
        use Encryptable;

        protected $encryptedAttributes = [
            'first_name',
            'surname',
            'email_address'
        ];

You also need to add an array detailing which attributes should be encrypted. Add this as a property on your model called `$encryptedAttributes`.


## Notes

As this uses the encryption that ships with Laravel, please ensure you have set an app key before using this, otherwise your encrypted values will not be secure.

Any issues decrypting values will be logged to the Laravel log file, so if things aren't working as expected check here.
