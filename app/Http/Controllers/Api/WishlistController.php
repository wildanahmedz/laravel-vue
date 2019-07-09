<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\WishlistInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\WishlistCreateRequest;
use App\Http\Requests\WishlistEditRequest;
use App\Domain\Entities\Wishlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class WishlistController extends Controller
{
    /**
     * @var WishlistInterface
     */
    protected $wishlist;

    /**
     * UserController constructor.
     * @param UserInterface $user
     */
    public function __construct(WishlistInterface $wishlist)
    {
        $this->wishlist = $wishlist;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request){
        return $this->wishlist->paginate(10,  $columns = ['*'], 'item_options' ,''  );
    }

    /**
     * @param UserCreateRequest $request
     * @return mixed
     */
    public function store(WishlistCreateRequest $request){
        return $this->wishlist->store($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id){
        return $this->wishlist->find($id);
    }

    /**
     * @param UserEditRequest $request
     * @param $id
     * @return mixed
     */
    public function update(WishlistEditRequest $request, $id){
       return $this->wishlist->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){
        return $this->wishlist->delete($id);
    }
}
