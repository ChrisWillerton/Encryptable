# Encryptable
A trait for use with Laravel 5 models allowing easy encryption/decryption of attributes.


## Installation

Add the following to the `composer.json` file in your project:

    "chriswillerton/encryptable": "1.*"

or you can run the below on the command line in the root of your project:

    composer require "chriswillerton/encryptable" "1.*"


## Setup

To get started, add the trait to the model.

You also need to add an array detailing which attributes should be encrypted. Add this as a property on your model called `$encryptedAttributes`.

    use ChrisWillerton\Encryptable\Encryptable;

    class YourModel extends Eloquent
    {
        use Encryptable;

        protected $encryptedAttributes = [
            'first_name',
            'surname',
            'email_address'
        ];


## Notes

As this uses the encryption that ships with Laravel, **please ensure you have set an app key before using this**, otherwise your encrypted attributes will not be secure. Additionally, do not lose your app key, or you will not be able to decrypt your attributes.

Any issues decrypting attributes will be added to the Laravel log file, so if things aren't working as expected then check here first for details about the problem.
