<?php

use Faker\Factory as Faker;
use App\Models\Historia;
use App\Repositories\HistoriaRepository;

trait MakeHistoriaTrait
{
    /**
     * Create fake instance of Historia and save it in database
     *
     * @param array $historiaFields
     * @return Historia
     */
    public function makeHistoria($historiaFields = [])
    {
        /** @var HistoriaRepository $historiaRepo */
        $historiaRepo = App::make(HistoriaRepository::class);
        $theme = $this->fakeHistoriaData($historiaFields);
        return $historiaRepo->create($theme);
    }

    /**
     * Get fake instance of Historia
     *
     * @param array $historiaFields
     * @return Historia
     */
    public function fakeHistoria($historiaFields = [])
    {
        return new Historia($this->fakeHistoriaData($historiaFields));
    }

    /**
     * Get fake data of Historia
     *
     * @param array $postFields
     * @return array
     */
    public function fakeHistoriaData($historiaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'state' => $fake->randomDigitNotNull,
            'url' => $fake->word,
            'url_banner' => $fake->word,
            'id_category' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $historiaFields);
    }
}
