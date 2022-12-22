<?php

namespace App\Services;

use App\Models\Kangaroo;

class KangarooService
{
    /**
	 * @var Kangaroo
	 */
	private $kangaroo;

    /**
	 * @param Kangaroo $kangaroo
	 */
    public function __construct(Kangaroo $kangaroo)
    {
        $this->kangaroo = $kangaroo;
    }

    /**
     * List kangaroos in storage.
     *
     * @param  object $data
     * @return object
     */
    public function list(): object
    {
        return $this->kangaroo->get();
    }    

    /**
     * Find specified kangaroo in storage.
     *
     * @param  object $data
     * @return object
     */
    public function find($id): object
    {
        return $this->kangaroo->find($id);
    }    


    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     * @return object
     */
    public function store(array $data): object
    {
        return $this->kangaroo->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  object $data
     * @param  int  $id
     * @return array
     */
    public function update(object $data, int $id): object
    {
        $kangaroo = $this->kangaroo->find($id);

        $kangaroo->update($data->input());

        return $kangaroo;
    }
}