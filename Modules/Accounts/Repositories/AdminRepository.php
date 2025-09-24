<?php

namespace Modules\Accounts\Repositories;

use App\Contracts\CrudRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Entities\Admin;
use Modules\Accounts\Http\Filters\AdminFilter;

class AdminRepository implements CrudRepository
{
    /**
     * @var AdminFilter
     */
    private $filter;

    /**
     * AdminRepository constructor.
     *
     * @param  AdminFilter  $filter
     */
    public function __construct(AdminFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all clients as a collection.
     *
     * @return LengthAwarePaginator
     */
    public function all()
    {
        if (\Module::isEnabled('Roles')) {
            return Admin::where('email', '!=', 'root@demo.com')->filter($this->filter)->paginate(request('perPage'));
        }

        return Admin::where('email', '!=', 'admin@demo.com')->where('email', '!=',
            'root@demo.com')->filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param  array  $data
     * @return Admin
     */
    public function create(array $data)
    {

        $admin = Admin::create($data);

        $this->setType($admin, $data);
        if (\Module::isEnabled('Roles')) {
            $admin->addRoles([$data['role_id']]);
        }

        $admin->setVerified();

        if (isset($data['avatar'])) {
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        return $admin;
    }

    /**
     * Set the client type.
     *
     * @param  Admin  $admin
     * @param  array  $data
     * @return Admin
     */
    private function setType(Admin $admin, array $data)
    {
        if (isset($data['type'])) {
            $admin->setType($data['type']);
        }

        return $admin;
    }

    /**
     * Update the given client in the storage.
     *
     * @param  mixed  $model
     * @param  array  $data
     * @return Model
     */
    public function update($model, array $data)
    {
        $admin = $this->find($model);

        $admin->update($data);

        $this->setType($admin, $data);

        if (\Module::isEnabled('Roles')) {
            $admin->syncRoles([$data['role_id']]);
        }

        if (isset($data['avatar'])) {
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        if (auth()->id() == $admin->id) {
            Session::put('locale', $admin->preferred_locale ?? app()->getLocale());
        }

        return $admin;
    }

    /**
     * Display the given client instance.
     *
     * @param  mixed  $model
     * @return Admin
     */
    public function find($model)
    {
        if ($model instanceof Admin) {
            return $model;
        }

        return Admin::findOrFail($model);
    }

    /**
     * Delete the given client from storage.
     *
     * @param  mixed  $model
     * @return void
     * @throws Exception
     */
    public function delete($model)
    {
        $this->find($model)->delete();
    }

    /**
     * @param  Admin  $admin
     * @return Admin
     */
    public function block(Admin $admin)
    {
        $admin->block()->save();

        return $admin;
    }

    /**
     * @param  Admin  $admin
     * @return Admin
     */
    public function unblock(Admin $admin)
    {
        $admin->unblock()->save();

        return $admin;
    }
}
