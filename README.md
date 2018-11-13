# laravel-restrict-soft-deletes
Restrict deletes for Eloquent models that implement soft deletes. Based on the idea of Michael Dyrynda at https://dyrynda.com.au/blog/cascading-soft-deletes-with-laravel-and-eloquent

# Installation
Run `composer require kobalazs/laravel-restrict-soft-deletes`

# Usage
1. Use RestrictSoftDeletes in your Model you want to have restricted
2. Add a protected attibute to your Model class listing the foreign keys to be watched
3. In case of a restricted deletion the trait will throw a `Netpok\Database\Support\DeleteRestrictionException` (HTTP 403)

# Example
```
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Netpok\Database\Support\RestrictSoftDeletes;

class User extends Model
{
    use SoftDeletes;
    use RestrictSoftDeletes;

    /**
     * The foreign keys restricted to delete
     */
    protected $restrictDeletes = ['posts'];

    ...
}
```

In this example a User can not be deleted while they have any Post that is not soft-deleted.
