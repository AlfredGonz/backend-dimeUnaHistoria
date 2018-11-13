<?php

use Faker\Factory as Faker;
use App\Models\Seccion;
use App\Repositories\SeccionRepository;

trait MakeSeccionTrait
{
    /**
     * Create fake instance of Seccion and save it in database
     *
     * @param array $seccionFields
     * @return Seccion
     */
    public function makeSeccion($seccionFields = [])
    {
        /** @var SeccionRepository $seccionRepo */
        $seccionRepo = App::make(SeccionRepository::class);
        $theme = $this->fakeSeccionData($seccionFields);
        return $seccionRepo->create($theme);
    }

    /**
     * Get fake instance of Seccion
     *
     * @param array $seccionFields
     * @return Seccion
     */
    public function fakeSeccion($seccionFields = [])
    {
        return new Seccion($this->fakeSeccionData($seccionFields));
    }

    /**
     * Get fake data of Seccion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSeccionData($seccionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_story' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'description' => $fake->word,
            'url' => $fake->word,
            'audio_url' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $seccionFields);
    }
}
