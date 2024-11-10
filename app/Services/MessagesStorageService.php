<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class MessagesStorageService
{
    public function all()
    {
        return $this->read();
    }

    public function has(string $id)
    {
        return property_exists($this->read(), $id);
    }

    public function get(string $id)
    {
        return $this->read()->$id;
    }

    public function findOrFail(string $id)
    {
        if (!$this->has($id)) {
            abort(404, "Message #{$id} not found");
        }
        return $this->get($id);
    }

    protected function read()
    {
        if (!Storage::exists('messages.json')) {
            $this->save([]);
        }

        $data = json_decode(Storage::read('messages.json'));
        return $data;
    }

    protected function save($data)
    {
        Storage::write('messages.json', json_encode($data));
    }
}
