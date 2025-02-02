<?php
namespace App\Domain\Repositories;
use App\Domain\Contracts\WishlistInterface;
use App\Domain\Entities\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;
/**
 * Class WishlistRepository
 * @package App\Domain\Repositories
 */
final class WishlistRepository extends AbstractRepository implements WishlistInterface
{
    protected $model;
    public function __construct(Wishlist $wishlist)
    {
        $this->model = $wishlist;
    }
    /**
     * @param int $limit
     * @param array $columns
     * @param string $key
     * @param string $value
     * @return Paginator|mixed
     */
    public function paginate($limit, array $columns , $key, $value)
    {
        return parent::paginate($limit, $columns, $key, $value);
    }
    /**
     * @param array $data
     * @return mixed|Response
     */
    public function store(array $data)
    {
        return parent::create([
            'item_options'  => e($data['item_options']),
            'shared'        => e($data['shared']),
        ]);
    }
    /**
     * @param $id
     * @param array $data
     * @return mixed|Response
     */
    public function update($id, array $data)
    {
        return parent::update($id, $data);
    }
    /**
     * @param int $id
     * @param array $columns
     * @return Model|mixed
     */
    public function find($id, array $columns = ['*'])
    {
        return parent::find($id, $columns);
    }
    /**
     * @param $id
     * @return mixed|Response
     * @throws \Exception
     */
    public function delete($id)
    {
        return parent::delete($id);
    }
}